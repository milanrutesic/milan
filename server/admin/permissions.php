<?php
$savePermissions = filter_input(INPUT_POST, 'savePermissions', FILTER_SANITIZE_NUMBER_INT);

if(1 == $savePermissions) {
    //reset all permissions
    $newPermission = '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    $updateData = array('permissionsFlag' => $newPermission);
    $db->update('adminRoles', $updateData);
    if(is_array($_POST[resources])) {
        foreach ($_POST[resources] as $roleId => $flags) {
            $newPermission = '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
            if(is_array($flags)) {
                foreach ($flags as $value){
                    $newPermission = $newPermission | $value;
                }
            }            
            $updateData = array('permissionsFlag' => $newPermission);
            $db->update('adminRoles', $updateData, 'id=' . $roleId);
        }    
    }
    $smarty->assign('messageClass', 'success');
    $smarty->assign('style', 'padding: 10px;');
    $smarty->assign('message', 'Permissions Saved Successfully!');
    //Update session permissions flag for current user
    $session->permissionsFlag = getUserPermissions();
}

$query = "SELECT * FROM adminRoles";
$result = $db->fetchAll($query);
$smarty->assign('roles', $result);
$checkboxes = array();
$selected = array();
foreach ($result as $value) {    
    $fetchResources = "SELECT * FROM adminResources WHERE parent = 0 AND menuItem='yes' ORDER BY id DESC";
    $resourcesResult = $db->fetchAll($fetchResources);
    foreach ($resourcesResult as $a) {
        $checkboxes[$value['id']][$a['flag']] = $a['name'] . '&nbsp;&nbsp;<span style="font-size: 0.9em;">[main menu item]</span>';
        if(bindec($value['permissionsFlag'] & $a['flag'])) {
           $selected[$value['id']][] = $a['flag']; 
        }
        $queryChilds = "SELECT * FROM adminResources WHERE parent = " . $a['id'];
    	$childs = $db->fetchAll($queryChilds);
    	foreach ($childs as $b) {
    	    if ('yes' == $b['menuItem']) {
    	        $addThis = '&nbsp;&nbsp;<span style="font-size: 0.8em;">[submenu item]</span>';
    	    } else {
    	        $addThis = '';
    	    }
        	$checkboxes[$value['id']][$b['flag']] = '<span style="font-size: 0.9em;">'.$b["name"].'</span>'.$addThis;
            if(bindec($value['permissionsFlag'] & $b['flag'])) {
               $selected[$value['id']][] = $b['flag']; 
            }
    	}
    }
}

$smarty->assign('checkboxes', $checkboxes);
$smarty->assign('selected', $selected);