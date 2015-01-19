<?php

interface Application_Acl_RoleInterface extends Zend_Acl_Role_Interface
{
    public function getType();
}