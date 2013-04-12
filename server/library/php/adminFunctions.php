<?php
function getFlagForAction($action) {
    global $auth, $db;
    $query = "SELECT flag FROM adminResources WHERE action = '$action'";
    $result = $db->fetchOne($query);
    return $result;
}

function getUserPermissions() {
    global $auth, $db;
    $query = "SELECT * FROM adminUserRoles WHERE userId = " . $auth->getIdentity()->user_id;
    $result = $db->fetchAll($query);
    $userPermissionsFlag = '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    foreach ($result as $a) {
        $flagQuery = "SELECT permissionsFlag FROM adminRoles WHERE id = " . $a['roleId'];
        $flag = $db->fetchOne($flagQuery);
        $userPermissionsFlag = $userPermissionsFlag | $flag;
    }
    return $userPermissionsFlag;
}

function getMenuContent() {
    global $auth, $db, $session;
    $menuContent = "<ul id='menu'>";
    $menuIndex = 0;
    $addThis = '';
    $query = "SELECT * FROM adminResources WHERE parent = 0 AND menuItem='yes' ORDER BY id DESC";
    $result = $db->fetchAll($query);
    foreach ($result as $a) {
        if(bindec($session->permissionsFlag & $a['flag'])) {
            if(0 == $menuIndex) {
                $addThis = "class='first'";
            } else {
                $addThis = '';
            }
            $menuContent .= "<li $addThis>
    							<a href='#'>".$a['name']."</a>
    							<ul>";
    		$queryChilds = "SELECT * FROM adminResources WHERE parent = " . $a['id'] . " AND menuItem='yes'";
    		$childs = $db->fetchAll($queryChilds);
    		foreach ($childs as $b) {
    		    if(bindec($session->permissionsFlag & $b['flag'])) {
    		        $menuContent .= "<li><a href='?action=".$b['action']."&menuIndex=".$menuIndex."'>".$b['name']."</a></li>";
    		    }
    		}
    		$menuContent .= "</ul></li>";
    		$menuIndex ++;
        }
    }
    $menuContent .= "    <li>
    						<a href='?action=logout'>Sign Out</a>
    					</li>
    				</ul>";
    return $menuContent;
}

function getFileList ($dir)
{
    global $config;
    $files = array();
    if ($handle = opendir($dir)) {    
        while (false !== ($file = readdir($handle))) {
            if('.' != $file && '..' != $file) {
                if(is_dir($dir.$file)) {
                    $files[] = getFileList($dir . $file . '/');
                } else {                    
                    $files[ $config->mainUrl . str_replace('../', '', $dir) . $file ] = str_replace('../documents/', '', $dir) . $file;
                }   
            }            
        }
        closedir($handle);
    }
    return $files;
}

function makeSelectOptions ($array) 
{
    $returnString = ''; 
    foreach($array as $key => $value) {
        if (is_array($value)) {
            $returnString .= makeSelectOptions($value);      
        } else {
            $returnString .= "<option value='".$key."'>".$value."</option>";
        }
    }
    return $returnString;
}
?>