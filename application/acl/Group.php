<?php

class Application_Acl_Group extends Zend_Db_Table_Row_Abstract implements Application_Acl_RoleInterface
{
    public function getType()
    {
        return 'Group';
    }


    public function getRoleId()
    {
        return $this->getType().':'.$this->group_id;
    }
}