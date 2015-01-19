<?php

class Application_Acl_User extends Zend_Db_Table_Row_Abstract implements Application_Acl_RoleInterface
{
    public function getType()
    {
        return 'User';
    }


    public function getRoleId()
    {
        return $this->getType().':'.$this->user_id;
    }
}