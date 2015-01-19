<?php


class Application_Model_Users extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    protected $_primary = 'user_id';
    protected $_dependentTables = array('UserGroups');
    protected $_rowClass = 'User';



    public function __construct($config = array()) {
        $db = Zend_Registry::get('db');
        Zend_Db_Table::setDefaultAdapter($db);
        parent::__construct($config);
    }
}