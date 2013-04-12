<?php
$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRING);
$sql = "SELECT user_id FROM adminUsers
        WHERE username = '" . $email ."'";
if (($userExists = $db->fetchOne($sql))) {
    echo 'false';
} else {
    echo 'true';
}
?>