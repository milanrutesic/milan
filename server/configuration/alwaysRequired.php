<?php
ini_set('include_path', __DIR__ . '/../library/');

# Main configuration
require_once 'Zend/Config.php';
// Live config
$config = new Zend_Config(require 'mainConfig.php', true);
if (strpos($_SERVER['HTTP_HOST'], "192.168.") === 0 or strpos($_SERVER['HTTP_HOST'], "localhost") === 0) {
    // Local config
    $localConfig = new Zend_Config(require 'localConfig.php');
    $config->merge($localConfig);
}

# Display errors
ini_set('display_errors', $config->displayErorrs);

# Initialize Zend_DB adapter
require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
$db = new Zend_Db_Adapter_Pdo_Mysql($config->database->params);

# Include common functiones used application wide
require_once 'php/commonFunctions.php';

# Initialize Zend Session
require_once 'Zend/Session/SaveHandler/DbTable.php';
require_once 'Zend/Session/Namespace.php';
Zend_Db_Table_Abstract::setDefaultAdapter($db);
Zend_Session::setOptions(array(
    'name' => $config->sessionName
));
Zend_Session::setSaveHandler(new Zend_Session_SaveHandler_DbTable($config->sessionDbTable));
$alefosSession = new Zend_Session_Namespace($config->sessionNs);

# Session Hijacking and Fixation prevention
if (!isset($alefosSession->initialized)) {
    Zend_Session::regenerateId();
    $alefosSession->initialized = true;
}

# Zend Auth
require_once 'Zend/Auth.php';
require_once 'Zend/Auth/Storage/Session.php';
$auth = Zend_Auth::getInstance();
$auth->setStorage(new Zend_Auth_Storage_Session($config->sessionNs));

# Initialize Zend Registry
require_once 'Zend/Registry.php';

# Initialize Zend Locale
require_once 'Zend/Locale.php';
$listOfLocales = getListOfLocales();

if($auth->hasIdentity()) {
    $locale = new Zend_Locale($auth->getIdentity()->locale);
    
    // Prevent multiple logins with same account
    $checkUserId = $db->fetchOne("SELECT user_id 
        FROM " . $config->sessionDbTable->name . " 
        WHERE session_id = '" . Zend_Session::getId() . "' 
        AND session_name = '" . $config->sessionName . "'");
    if (!($checkUserId > 0)) {
    	if ($db->update(
            $config->sessionDbTable->name,
            array(
                'user_id'       => $auth->getIdentity()->user_id,
                'ip_address'    => $_SERVER['REMOTE_ADDR']
            ),
            array(
                "session_id = '" . Zend_Session::getId() . "'",
                "session_name = '" . $config->sessionName . "'"
            )
        )) {
        	$db->delete(
                $config->sessionDbTable->name,
                array(
	                "session_id <> '" . Zend_Session::getId() . "'",
	                "session_name = '" . $config->sessionName . "'",
                    "user_id = '" . $auth->getIdentity()->user_id . "'"
                )
        	);
        }
    }
} elseif(!empty($_COOKIE['locale'])) {
	$locale = new Zend_Locale($_COOKIE['locale']);
} else {
    $locale = new Zend_Locale('en_US');      
}
Zend_Registry::set('Zend_Locale', $locale);

# Initialize Zend Date
require_once 'Zend/Date.php';

# Authenticate user
require_once 'php/authentification.php';
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if('' == trim($action)) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
}
if ('login' == $action) {
    $username = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!(signIn('users', $username, $password) && $auth->hasIdentity())) {
        //login failed
    } else {
    	//Update locale
    	$locale = new Zend_Locale($auth->getIdentity()->locale);
    	Zend_Registry::set('Zend_Locale', $locale);
    }
}

# Initialize active company account and permission flag
$company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_NUMBER_INT);

if (!isset($alefosSession->activeCompany) OR !bindec(getFlagForIndex('generalSystemAccess') & $alefosSession->permissionFlag)) {
    if(is_object($auth->getIdentity())){
        $alefosSession->activeCompany = getDefaultCompany($auth->getIdentity()->user_id);
        $alefosSession->permissionFlag = getPermissionFlag($auth->getIdentity()->user_id, $alefosSession->activeCompany);
        $alefosSession->listOfCompanies = getListOfCompanies($auth->getIdentity()->user_id);
    }
} elseif ($company) {
    $alefosSession->activeCompany = $company;
    $alefosSession->permissionFlag = getPermissionFlag($auth->getIdentity()->user_id, $alefosSession->activeCompany);
}

# Create list of the companies
if (!isset($alefosSession->listOfCompanies)) {
    if(is_object($auth->getIdentity())){
        $alefosSession->listOfCompanies = getListOfCompanies($auth->getIdentity()->user_id);
    }    
}

# Initialize JSON
require_once 'Zend/Json.php';

# Initialize Zend Mail
require_once 'Zend/Mail.php';
require_once 'Zend/Mail/Transport/Smtp.php';
$transport = new Zend_Mail_Transport_Smtp($config->smtpServer, $config->smtpAuth->toArray());
Zend_Mail::setDefaultTransport($transport);
