<?php
require_once '../configuration/alwaysRequiredAdmin.php';
require_once '../library/php/authentification.php';
require_once '../library/php/adminFunctions.php';
$ajax = filter_input(INPUT_GET, 'ajax', FILTER_SANITIZE_NUMBER_INT);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if('' == trim($action)) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
}
$menuIndex = filter_input(INPUT_GET, 'menuIndex', FILTER_SANITIZE_STRING);
if('' != $menuIndex) {
    $session->menuIndex = $menuIndex;
}

if ('login' == $action) {
    $username = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    signIn('adminUsers', $username, $password);
    if (!$auth->hasIdentity()) {
        $smarty->assign('email', $username);
        $smarty->assign('message', 'Login failed! Please try again.');
    } else {
        $session->permissionsFlag = getUserPermissions();        
    }
} elseif ('logout' == $action) {
    signOut();
}
if ($auth->hasIdentity()) {  
    if (bindec(getFlagForAction($action) & $session->permissionsFlag)) {  
        if(file_exists($action . '.php')) {
            require_once $action . '.php';
            $smarty->assign('templatePage', $action . '.htpl');
        } else {
            $smarty->assign('phpExecute', 'phpMyEdit/' . $action . '.php');
        }
    } else {
        if ('' == $action || 'login' == $action) {
            $smarty->assign('templatePage', 'landing.htpl');
        } else {
            $smarty->assign('templatePage', 'permissionDenied.htpl');
        }        
    }
    if (1 != $ajax) {
        $menuContent = getMenuContent();    
        $smarty->assign('menuContent', $menuContent);
        $smarty->assign('menuIndex', $session->menuIndex);
        $smarty->display('adminLayout.htpl');   
    }
} else {
    $smarty->display('login.htpl');
}