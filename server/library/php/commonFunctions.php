<?php
function getFlagForIndex($index) {
    global $db;
    $query = "SELECT flag FROM resources WHERE flagIndex = '$index'";
    $result = $db->fetchOne($query);
    return $result;
}

function getDefaultCompany($userId) {
    global $db;
    $query = "SELECT companies.*
    		  FROM companies
			  LEFT JOIN usersCompanies ON usersCompanies.companyId = companies.id
			  WHERE usersCompanies.userId = '$userId'
              AND usersCompanies.permissionFlag & '" . getFlagForIndex('generalSystemAccess') . "'
              GROUP BY usersCompanies.companyId 
              ORDER BY usersCompanies.companyId ASC LIMIT 1";
    $result = $db->fetchOne($query);
    return $result;
}

function getPermissionFlag($userId, $companyId) {
    global $db;
    $query = "SELECT permissionFlag FROM usersCompanies WHERE userId = '$userId' AND companyId = '$companyId' LIMIT 1";
    $result = $db->fetchOne($query);
    if(bindec($result)) {
        return $result;
    } else {
        return 0;    
    }
}

function getListOfCompanies($userId){
    global $db;
    $query = "SELECT companies.*
    		  FROM companies
			  LEFT JOIN usersCompanies ON usersCompanies.companyId = companies.id
			  WHERE usersCompanies.userId = '$userId'
			  AND usersCompanies.permissionFlag & '" . getFlagForIndex('generalSystemAccess') . "'
              GROUP BY usersCompanies.companyId
              ORDER BY usersCompanies.companyId ASC";
    $result = $db->fetchAll($query);
    $return = array();
    foreach ($result as $a) {
        $return[$a['id']] = $a['name'];
    }
    return $return;
}

function getListOfHotels($companyId){
    global $db, $auth;
    $query = "SELECT companiesHotels.hotelId, hotels.name 
              FROM companiesHotels 
              LEFT JOIN hotels ON hotels.hotelId = companiesHotels.hotelId
              LEFT JOIN usersHotels ON usersHotels.hotelId = companiesHotels.hotelId 
              WHERE companiesHotels.companyId = '$companyId'              
              AND usersHotels.userId = '" . $auth->getIdentity()->user_id . "'
              ORDER BY companiesHotels.hotelId ASC";
    $result = $db->fetchAll($query);
    $return = array();
    foreach ($result as $a) {
        $return[$a['hotelId']] = $a['name'];
    }
    return $return;          
}

function getListOfLocales() {
    $result = array(
                    'en_US' => 'English US',
                    'de_DE' => 'German',
                    'fr_FR' => 'French',
                    'sr_RS' => 'Serbian'
                    );
    return $result;
}

function getListOfThemes() {
	global $lang;
    $result = array(
                    'start' 	=> $lang->translate('Start Theme'),
                    'blitzer' 	=> $lang->translate('Blitzer Theme'),
                    'hot-sneaks'=> $lang->translate('Hot Sneaks Theme'),
                    'redmond' 	=> $lang->translate('Redmond Theme'),
    				'smoothness'=> $lang->translate('Smoothness Theme'),
    				'sunny'		=> $lang->translate('Sunny Theme'),
    				'lightness'		=> $lang->translate('Lightness Theme'),
    				'darkness'		=> $lang->translate('Darkness Theme'),
    				'overcast'		=> $lang->translate('Overcast Theme'),
    				'le-frog'		=> $lang->translate('Le Frog Theme'),
    				'flick'			=> $lang->translate('Flick Theme'),
    				'pepper-grinder'=> $lang->translate('Pepper Grinder Theme'),
    				'eggplant'		=> $lang->translate('Eggplant Theme'),
    				'dark-hive'		=> $lang->translate('Dark Hive Theme'),
    				'cupertino'		=> $lang->translate('Cupertino Theme'),
    				'cupertino'		=> $lang->translate('Cupertino Theme'),
    				'south-street'	=> $lang->translate('South Street Theme'),
    				'humanity'		=> $lang->translate('Humanity Theme'),
    				'excite-bike'	=> $lang->translate('Excite Bike Theme'),
    				'vader'			=> $lang->translate('Vader Theme'),
    				'dot-luv'		=> $lang->translate('Dot Luv Theme'),
    				'mint-choc'		=> $lang->translate('Mint Choc Theme'),
    				'black-tie'		=> $lang->translate('Black Tie Theme'),
    				'trontastic'	=> $lang->translate('Trontastic Theme'),
    				'swanky-purse'	=> $lang->translate('Swanky Purse Theme')
                    );
    return $result;
}

function setNewTheme($theme) {
    global $auth, $db;
    $data = array('theme' => $theme);
    $db->update('users', $data, 'user_id = ' . $auth->getIdentity()->user_id);
    // save in cookie
    setcookie('theme', $theme);
}

function getSortDirection($fieldName, $sortByFieldName, $setSortDirection)
{	
	if(strtolower($fieldName) == strtolower($sortByFieldName)) {
		$sortDirection = $setSortDirection;
	} else {
		$sortDirection = '';
	}
	return $sortDirection;
}

function smartyBitwise($var1, $var2, $op='') 
{ 
	if (!empty($var1) && !empty($var2)) { 
		switch ($op) { 
	        case '&':  return bindec($var1 & $var2); break; 
	        case '|':  return bindec($var1 | $var2); break; 
	        case '^':  return bindec($var1 ^ $var2); break; 
	        case '~':  return bindec(~$var1); break; 
	        case '<<': return bindec($var1 << $var2); break; 
	        case '>>': return bindec($var1 >> $var2); break; 
	        default:   return bindec($var1 & $var2); break; 
      	} 
    } else { 
    	return false; 
    } 
}

function stringForJs($input)
{
	return htmlspecialchars(addslashes($input), ENT_QUOTES, 'UTF-8', false);
}

function getListOfCountries()
{
	global $db, $lang;
	$countries = array('' => '');
	$query = "SELECT * FROM countries
			  WHERE name != ''
			  ORDER BY name ASC";
	$result = $db->fetchAll($query);
	foreach($result as $a) {
		$countries[$a['code']] = $lang->translate($a['name']); 
	}	
	return $countries;
}

function getListOfPropertyTypes()
{
	global $db, $lang;
	$types = array('' => '');
	$query = "SELECT * FROM propertyType
			  ORDER BY name ASC";
	$result = $db->fetchAll($query);
	foreach($result as $a) {
		$types[$a['propertyTypeCode']] = $lang->translate($a['name']); 
	}	
	return $types;
}

function getListOfAmmenities()
{
	global $db, $lang;
	$ammenities = array();
	$query = "SELECT * FROM ammenities
			  WHERE public = 'yes'
			  ORDER BY name ASC";
	$result = $db->fetchAll($query);
	foreach($result as $a) {
		$ammenities[$a['ammenityId']] = $lang->translate($a['name']); 
	}	
	return $ammenities;
}

function getNumberOfActiveAccordionInMainLayout($engine)
{
	$openAccordionNum = 0;
    if('payments' == $engine || 'users' == $engine || 'resources' == $engine || 'myAccount' == $engine){
    	$openAccordionNum = 1;
    }
    return $openAccordionNum;
}

function getRandomString($lenght = 5, $smallLetters = true, $bigLetters = true, $numbers = true)
{
    // makes random string of a given length 
    $material = array();
    if(true === $smallLetters) {
        $material = array_merge($material, range('a', 'z'));
    }
    if(true === $bigLetters) {
        $material = array_merge($material, range('A', 'Z'));
    }  
    if(true === $numbers) {
        $material = array_merge($material, range('0', '9'));
    } 
    $randomString = ''; 
    for ($i = 0; $i < $lenght; $i++) { 
       $randomString .= $material[mt_rand(0, count($material)-1)]; 
    } 
    return $randomString; 
}