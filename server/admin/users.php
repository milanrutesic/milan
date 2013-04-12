<?php
$query = "SELECT * FROM adminUsers ORDER BY user_id ASC";
$results = $db->fetchAll($query);
$smarty->assign('users', $results);
?>