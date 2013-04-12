<?php
$addNewUser = filter_input(INPUT_POST, 'addNewUser', FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

if(1 == $addNewUser) {
    //Save user in the DB
    $userData = array(
        'username'	=> $email,
        'password'	=> md5($password),
        'name'		=> $name
    );
    $db->insert('adminUsers', $userData);
    $smarty->assign('messageClass', 'success');
    $smarty->assign('message', 'User Added Successfully!');
}
?>