<?php
function signIn($authTable, $username, $password)
{
    global $db, $auth, $config;
    require_once 'Zend/Auth/Adapter/DbTable.php';
    $password = crypt($password, $config->cryptSalt);
    $authAdapter = new Zend_Auth_Adapter_DbTable($db, $authTable, 'username', 'password');
    $authAdapter->setIdentity($username)
                ->setCredential($password);
    $result = $auth->authenticate($authAdapter);
        
    if ($result->getCode() == Zend_Auth_Result::SUCCESS) {
        $auth->getStorage()->write($authAdapter->getResultRowObject(array('user_id', 'username','locale','theme')));
        return true;
    } else {
    	return false;
    }
}

function signOut()
{
	Zend_Auth::getInstance()->clearIdentity();
    Zend_Session::destroy(true);
}