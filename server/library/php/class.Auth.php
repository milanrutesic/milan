<?php
class Auth {
	
	/**
	 * return auth status
	 */
	
	public function defaultAction()
	{
		if (Alefos::auth()->hasIdentity() 
				&& bindec(getFlagForIndex('generalSystemAccess') & Alefos::alefosSession()->permissionFlag) 
				&& Alefos::numberOfCompanies() > 0) {
			// user authenticated
				
			$authArray = array(
				'success' => true,
				'auth' => 1
			);
			echo json_encode($authArray);
		} else {	
			if(Alefos::auth()->hasIdentity() 
					&& !bindec(getFlagForIndex('generalSystemAccess') & Alefos::alefosSession()->permissionFlag) 
					|| (Alefos::auth()->hasIdentity() && Alefos::numberOfCompanies() == 0)){
				signOut();
				// User exists but ther is no access permission or no companies assigned
				$authArray = array(
					'success' => true,
					'auth' => 2
				); 	
				echo json_encode($authArray);
			} elseif (!Alefos::auth()->hasIdentity()){
				// Wrong username|password or session expired
				$authArray = array(
					'success' => true,
					'auth' => 3
				); 	
				echo json_encode($authArray);
			}
		}
	}

	public function signoutAction()
	{
		signOut();
		header('Location: ' . Alefos::config()->mainUrl);
	} 
}
