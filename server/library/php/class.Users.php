<?php
class Users
{
	function __construct()
	{
		
	}
	
	public function createNewUser($email, $companyId)
	{
		global $db, $lang;
		// If email is empty - return error
		if(empty($email)) {
			return $lang->translate('Email address is empty!');
		}
		// If email is badly formatted - return error
		if(!$this->validEmail($email)) {
			return $lang->translate('Email address is in bad format!');
		}		
		
		// If this user is already registered with current company - return error
		$query = "SELECT user_id 
				  FROM users, usersCompanies 
				  WHERE users.username = '$email'
				  AND usersCompanies.userId = users.user_id
				  AND usersCompanies.companyId = $companyId";		
		if($result = $db->fetchOne($query)) {
			return $lang->translate('This user is already registered!');
		}
		
		// check if there is user with this email address
		$query = "SELECT user_id FROM users WHERE username = '$email'";
		if($result = $db->fetchOne($query)){// Check if user with this email address already exists
			$userId = $result;
			//Insert this user in usersCompanies 
			$data = array(
						'userId' 	=> $userId,
						'companyId' => $companyId
			);
			$db->insert('usersCompanies', $data);
		} else {// Create new user and send email notification
			//Insert into  users table
			$newPassword = $this->createPassword(8);
			$data = array(
						'username' => $email,
						'password' => md5($newPassword),
						'locale'   => 'en_US',
						'theme'    => 'hot-sneaks'				
						);
			$db->insert('users', $data);
			$userId = $db->lastInsertId();
			//Insert this user in usersCompanies 
			$data = array(
						'userId' 	=> $userId,
						'companyId' => $companyId
			);
			$db->insert('usersCompanies', $data);
			// TODO Send email notification for a new user (make nice email)
			$mail = new Zend_Mail();
			$mail->setBodyText('My Nice Test Text');
			$mail->setBodyHtml('My Nice <b>Test</b> Text');
			$mail->setFrom($config->fromEmail, $config->fromEmailSender);
			$mail->addTo($email, '');
			$mail->setSubject('TestSubject');
			if($config->emailEnabled) {
				$mail->send();
			}		
		}		
		return $userId;
	}
	
	private function createPassword($length = 32, $chars = '1234567890abcdef') 
	{
	    // length of character list
	    $charsLength = (strlen($chars) - 1);
	 
	    // start our string
	    $string = $chars{rand(0, $charsLength)};
	 
	    // generate random string
	    for ($i = 1; $i < $length; $i = strlen($string)) {
	        // grab a random character from our list
	        $r = $chars{rand(0, $charsLength)};
	        // make sure the same two characters don't appear next to each other
	        if ($r != $string{$i - 1}) {
	            $string .=  $r;
	        } else {
	            $i–;
	        }
	    }
	 
	    // return the string
	    return $string;
	}
	
	/**
	Validate an email address.
	Provide email address (raw input)
	Returns true if the email address has the email 
	address format and the domain exists.
	*/
	private function validEmail($email)
	{
	   $isValid = true;
	   $atIndex = strrpos($email, "@");
	   if (is_bool($atIndex) && !$atIndex){
	      $isValid = false;
	   } else {
	      $domain = substr($email, $atIndex+1);
	      $local = substr($email, 0, $atIndex);
	      $localLen = strlen($local);
	      $domainLen = strlen($domain);
	      if ($localLen < 1 || $localLen > 64) {
	         // local part length exceeded
	         $isValid = false;
	      } else if ($domainLen < 1 || $domainLen > 255) {
	         // domain part length exceeded
	         $isValid = false;
	      } else if ($local[0] == '.' || $local[$localLen-1] == '.') {
	         // local part starts or ends with '.'
	         $isValid = false;
	      } else if (preg_match('/\\.\\./', $local)) {
	         // local part has two consecutive dots
	         $isValid = false;
	      } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
	         // character not valid in domain part
	         $isValid = false;
	      } else if (preg_match('/\\.\\./', $domain)) {
	         // domain part has two consecutive dots
	         $isValid = false;
	      } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))) {
	         // character not valid in local part unless 
	         // local part is quoted
	         if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
	            $isValid = false;
	         }
	      }
	      //if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
	         // domain not found in DNS
	         //$isValid = false;
	      //}
	   }
	   return $isValid;
	}
	
	public function getUser($userId)
	{
		global $db, $lang, $putuySession;
		$query = "SELECT * FROM users WHERE user_id = '$userId'";
		$result = $db->fetchRow($query);
		return $result;
	}
	
	public function editUser($userId, $postData)
	{
		global $db, $lang, $putuySession;
		$message = '';
		$newPassword = filter_var($postData['newPassword'], FILTER_SANITIZE_STRING);
		$newPasswordConfirm = filter_var($postData['newPasswordConfirm'], FILTER_SANITIZE_STRING);
		$editUserIndicator = filter_var($postData['editUserIndicator'], FILTER_SANITIZE_NUMBER_INT);
		$roleIds = array();
		$hotelIds = array();
		foreach($postData as $key => $value) {
    		if('roles' == $key){
    			foreach($postData[$key] as $key1 => $value1) {
    				$roleIds[] = filter_var($value1, FILTER_SANITIZE_NUMBER_INT);
    			}
    		}	
			if('hotels' == $key){
    			foreach($postData[$key] as $key2 => $value2) {
    				$hotelIds[] = filter_var($value2, FILTER_SANITIZE_NUMBER_INT);
    			}
    		}		
    	}		
    	
    	if(1 == $editUserIndicator) {
	    	//Delete current roles and insert new
	    	$deleteAction = $db->delete('usersRoles', "userId = '$userId' AND companyId = '" . $putuySession->activeCompany . "'");
    		
    		$message = true;
    		// Insert New
    		foreach($roleIds as $a){
    			$data = array(
    						'roleId' => $a,
    						'companyId' => $putuySession->activeCompany,
    						'userId' => $userId
    						);
    			$insertResult = $db->insert('usersRoles', $data);
    			
    			if(!$insertResult) {
    				$message = $lang->translate('Roles update failed. Please try again!');
    			}
    		}
    		// Update permissions flag
    		$this->updatePermissionFlag($userId);

    		//Delete current hotels and insert new
    		// First, select all hotels of current company, then delete them from current user
	    	$query = "SELECT hotels.hotelId AS id FROM hotels
					  LEFT JOIN usersHotels ON usersHotels.hotelId = hotels.hotelId
					  LEFT JOIN companiesHotels ON companiesHotels.hotelId = hotels.hotelId
					  WHERE usersHotels.userId = $userId
					  AND companiesHotels.companyId = " . $putuySession->activeCompany;
			$result = $db->fetchAll($query);			
			foreach($result as $a) {
				$usersHotels[] = $a['id'];
				$deleteAction = $db->delete('usersHotels', "userId = '$userId' AND hotelId = '" . $a['id'] . "'");
			}	    	
    		
    		// Insert New
    		foreach($hotelIds as $a){
    			$data = array(
    						'hotelId' => $a,    						
    						'userId' => $userId
    						);
    			$insertResult = $db->insert('usersHotels', $data);
    			
    			if(!$insertResult) {
    				$message = $lang->translate('Rental resources update failed. Please try again!');
    			}
    		}
    		// Update permissions flag
    		$this->updatePermissionFlag($userId);
    	}
		if(!empty($newPassword) && !empty($userId)) {
			if($newPassword == $newPasswordConfirm) {
				//change password
				$data = array('password' => md5($newPassword));
				$db->update('users', $data, "user_id = '$userId'");
				$message = true;
			} else {
				$message = $lang->translate('New password and New password confirmation do not match!');
			}
		}		
		return $message;
	}
	
	public function getUserRoles($userId)
	{
		global $db, $lang, $putuySession;
		$query = "SELECT roles.id FROM roles
				  LEFT JOIN usersRoles ON usersRoles.roleId = roles.id
				  WHERE usersRoles.userId = $userId
				  AND usersRoles.companyId = " . $putuySession->activeCompany;
		$result = $db->fetchAll($query);
		$usersRoles = array();
		foreach($result as $a) {
			$usersRoles[] = $a['id'];
		}
		$query = "SELECT roles.id, roles.name FROM roles				  
				  WHERE roles.companyId = " . $putuySession->activeCompany;				 
		$allRoles = $db->fetchAll($query);
		
		foreach($allRoles as $key => $value) {
			if(in_array($value['id'], $usersRoles)){
				$allRoles[$key]['selected'] = true;
			} else {
				$allRoles[$key]['selected'] = false;
			}
		}		
		return $allRoles;
	}
	
	/*
	 * This method returns list of all hotels in the current company
	 * with indications of which hotels are selected for the given user.
	 * This is used on permissions page to create a list of hotels that
	 * are allowed to single user
	 */
	public function getUserHotels($userId)
	{
		global $db, $lang, $putuySession;
		$usersHotels = $this->getHotelsForThisUser($userId);
		
		$query = "SELECT hotels.hotelId AS id, hotels.name FROM hotels
				  LEFT JOIN companiesHotels ON companiesHotels.hotelId = hotels.hotelId
				  WHERE companiesHotels.companyId = " . $putuySession->activeCompany;;
		$allHotels = $db->fetchAll($query);
		
		foreach($allHotels as $key => $value) {
			if(in_array($value['id'], $usersHotels)){
				$allHotels[$key]['selected'] = true;
			} else {
				$allHotels[$key]['selected'] = false;
			}
		}		
		return $allHotels;
	}
	
	/*
	 * This method is used to return a list of hotels for which
	 * single user has access in the current company
	 */
	public function getHotelsForThisUser($userId)
	{
		global $db, $lang, $putuySession;
		$query = "SELECT hotels.hotelId AS id FROM hotels
				  LEFT JOIN usersHotels ON usersHotels.hotelId = hotels.hotelId
				  LEFT JOIN companiesHotels ON companiesHotels.hotelId = hotels.hotelId
				  WHERE usersHotels.userId = $userId
				  AND companiesHotels.companyId = " . $putuySession->activeCompany;
		$result = $db->fetchAll($query);
		$usersHotels = array();
		foreach($result as $a) {
			$usersHotels[] = $a['id'];
		}
		return $usersHotels;
	}
	
	public function updatePermissionFlag($userId)
	{
		global $db, $lang, $putuySession;
		$query = "SELECT roles.permissionsFlag FROM roles
				  LEFT JOIN usersRoles ON usersRoles.roleId = roles.id
				  WHERE usersRoles.userId = $userId
				  AND usersRoles.companyId = " . $putuySession->activeCompany;
		$result = $db->fetchAll($query);
		$newFlag = '0';
		foreach($result as $a) {
			$newFlag = $newFlag | $a['permissionsFlag'];
		}
		$data = array(
					'permissionFlag' => $newFlag
					);		
		$db->update('usersCompanies', $data, "userId = '$userId' AND companyId = '" . $putuySession->activeCompany . "'");
	}
	
	public function deleteUser($userId)
	{
		global $db, $lang, $putuySession;		
		
		// Delete user from the current company
		$db->delete('usersCompanies', 'userId = ' . $userId . ' AND companyId = ' . $putuySession->activeCompany);
		// Delete user for current company from usersHotels
		// Select all hotels for the current company and then delete this user from all these hotels
		$query = "SELECT hotelId FROM companiesHotels
				  WHERE companyId = " . $putuySession->activeCompany;
		$result = $db->fetchAll($query);		
		foreach($result as $a) {
			$db->delete('usersHotels', 'userId = ' . $userId . ' AND hotelId = ' . $a['hotelId']);
		}		
		// Delete user for current company from UsersRoles
		$db->delete('usersRoles', 'userId = ' . $userId . ' AND companyId = ' . $putuySession->activeCompany);
		return true;
	}
	
	public function updateAction() {
		$return = array('success' => true);
		//var_dump(json_decode(file_get_contents('php://input')));
		$serverMessage = file_get_contents('php://input');
		Alefos::printJsonOutput($return);
	}
}