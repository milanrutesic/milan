<?php
ini_set('display_errors', 1);
//ini_set("include_path", ".:/var/www/alefos/server/library/");

# Main configuration
require_once 'Zend/Config.php';
$config = new Zend_Config(require 'mainConfig.php', true);
if (strpos($_SERVER['HTTP_HOST'], "192.168.") === 0 or strpos($_SERVER['HTTP_HOST'], "localhost") === 0) {
    $localConfig = new Zend_Config(require 'localConfig.php');
    $config->merge($localConfig);
}

# Initialize Zend_DB adapter
require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
$db = new Zend_Db_Adapter_Pdo_Mysql($config->database->params);

# Smarty:
require_once 'Smarty/Smarty.class.php';
$smarty = new Smarty;	
$smarty->template_dir = 'templates/';
$smarty->compile_dir = 'templates_c/';
$smarty->debugging = false;
$smarty->caching = false;

# Initialize Zend Session
require_once 'Zend/Session/Namespace.php';
$session = new Zend_Session_Namespace($config->sessionNs);

# Zend Auth
require_once 'Zend/Auth.php';
require_once 'Zend/Auth/Storage/Session.php';
$auth = Zend_Auth::getInstance();
$auth->setStorage(new Zend_Auth_Storage_Session($config->sessionNs));
