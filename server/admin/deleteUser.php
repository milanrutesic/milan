<?php
$userId = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_NUMBER_INT);
$deleteUserConfirmed = filter_input(INPUT_GET, 'deleteUserConfirmed', FILTER_SANITIZE_STRING);
$userEmail  = filter_input(INPUT_GET, 'userEmail', FILTER_SANITIZE_STRING);

if(1 == $deleteUserConfirmed) {
    //Delete User from DB
    $query = "DELETE FROM adminUsers WHERE user_id = $userId";
    $db->exec($query);
    $smarty->assign('messageClass', 'success');
    $smarty->assign('message', 'User Removed Successfully!');
} else {
    $smarty->assign('message', 'Are you sure you want to remove user ' . $userEmail . '? <br><br><a href="?action=deleteUser&deleteUserConfirmed=1&userId='.$userId.'&userEmail='.$userEmail.'"><input type="button" style="width: 150px" value="Remove"></a> <a href="?action=users"><input type="button" style="width: 150px" value="Cancel">');    
}
?>