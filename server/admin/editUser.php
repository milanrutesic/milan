<?php
$userId = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_NUMBER_INT);
$editUser = filter_input(INPUT_POST, 'editUser', FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

if(1 == $editUser) {    
    $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
    //Save user in the DB
    if('' == $password) {
        $userData = array(            
            'name'		=> $name
        );  
    } else {
        $userData = array(       
            'password'	=> md5($password),
            'name'		=> $name
        );   
    }
    $db->update('adminUsers', $userData, 'user_id=' . $userId);
    $smarty->assign('messageClass', 'success');
    $smarty->assign('message', 'Saved Successfully!');
}

$query = "SELECT * FROM adminUsers WHERE user_id = $userId";
$result = $db->fetchRow($query);
$smarty->assign('name', $result['name']);
$smarty->assign('email', $result['username']);
$smarty->assign('userId', $userId);
?>