<?php
// Always Required
require_once 'server/configuration/alwaysRequired.php';

// Include autoloader
require_once 'php/smartFileInclusion.php';

// Auth indicator
$numberOfCompanies = count($alefosSession->listOfCompanies); 
if($auth->hasIdentity() && bindec(getFlagForIndex('generalSystemAccess') & $alefosSession->permissionFlag) && $numberOfCompanies > 0){
	require_once('app.php');
} else {
	require_once('signin.html');
}