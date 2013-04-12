<?php
$userId = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_NUMBER_INT);
$nameOfUser = filter_input(INPUT_GET, 'nameOfUser', FILTER_SANITIZE_STRING);
$saveRoles = filter_input(INPUT_POST, 'saveRoles', FILTER_SANITIZE_NUMBER_INT);

if(1 == $saveRoles) {
    $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
    $nameOfUser = filter_input(INPUT_POST, 'nameOfUser', FILTER_SANITIZE_STRING);
    $userRoles = $_POST[userRoles];
    
    $query = "DELETE FROM adminUserRoles WHERE userId = $userId";
    $result = $db->exec($query);
    if(is_array($userRoles)){
        foreach ($userRoles as $value) {
            $insert = array('userId' => $userId, 'roleId' => $value);
            $db->insert('adminUserRoles', $insert);
        }    
    }
    
    $smarty->assign('messageClass', 'success');
    $smarty->assign('message', 'Roles Saved Successfully!');
}


$query = "SELECT adminRoles.name, adminRoles.id FROM adminRoles";
$result = $db->fetchAll($query);
$smarty->assign('rolesAndIds', $result);
$checkboxes = array();
$selectedRoles = array();
foreach ($result as $a) {
    $checkboxes[$a['id']] = $a['name'];
    $askForRole = "SELECT adminUserRoles.roleId FROM adminUserRoles WHERE adminUserRoles.roleId = $a[id] AND adminUserRoles.userId = $userId";
    $roleAnswer = $db->fetchOne($askForRole);
    if ($roleAnswer == $a['id']) {
        $selectedRoles[] = $a['id'];
    }
}

$smarty->assign('rolesAndIds', $checkboxes);
$smarty->assign('selectedRoles', $selectedRoles);
$smarty->assign('userId', $userId);
$smarty->assign('nameOfUser', $nameOfUser);
?>