<?php


class Application_Model_Groups extends Zend_Db_Table_Abstract
{
    protected $_name = 'groups';
    protected $_primary = 'group_id';
    protected $_dependentTables = array('UserGroups');
    protected $_rowClass = 'Group';


    public function __construct($config = array()) {
        $db = Zend_Registry::get('db');
        Zend_Db_Table::setDefaultAdapter($db);
        parent::__construct($config);
    }

}