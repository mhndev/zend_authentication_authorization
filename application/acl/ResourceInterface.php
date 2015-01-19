<?php

interface Application_Acl_ResourceInterface extends Zend_Acl_Resource_Interface
{
    public function getType();
}