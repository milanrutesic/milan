<?php
// Always Required
require_once 'configuration/alwaysRequired.php';

$engine = filter_input(INPUT_GET, 'engine', FILTER_SANITIZE_STRING);
$engine = ucfirst(strtolower($engine));

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$action = strtolower($action);

// Include autoloader
require_once 'library/php/smartFileInclusion.php';

// Auth indicator
$authArray = array('auth' => 0);
$numberOfCompanies = count($alefosSession->listOfCompanies);
if ($auth->hasIdentity() 
			&& bindec(getFlagForIndex('generalSystemAccess') & $alefosSession->permissionFlag) 
			&& $numberOfCompanies > 0) {
	// Working section
	if(empty($engine)){
		// call default action of the Auth object
		Auth::defaultAction();
	} else {
		if(empty($action)){
			// call default action of the $engine object
			$engine::defaultAction();
		} elseif('login' != $action) {
			// call $action action of $engine object
			$method = $action . 'Action';
			$engine::$method();
		} else {
			Auth::defaultAction();
		}
	}
} else {
	Auth::defaultAction();
}