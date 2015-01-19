<?php
class Zend_Controller_Action_Helper_Auth extends Zend_Controller_Action_Helper_Abstract
{
    function direct($values)
    {
        $adapter = Zend_Registry::get('authAdapter');
        $adapter->setIdentity($values['name']);
        $adapter->setCredential($values['password']);

        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($adapter);
        if ($result->isValid()) {
            $user = $adapter->getResultRowObject();
            $auth->getStorage()->write($user);
            return true;
        }
        return false;
    }
}