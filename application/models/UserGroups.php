<?php


class Application_Model_UserGroups extends Zend_Db_Table_Abstract
{
    protected $_name = 'user_groups';
    protected $_primary = array('user_id' , 'group_id');
    protected $_referenceMap = array(
        'User' => array(
            'columns' => array('user_id'),
            'refTableClass' => 'Users',
            'refColumns' => array('user_id')
        ),
        'Group' => array(
            'columns' => array('group_id'),
            'refTableClass' => 'Groups',
            'refColumns' => array('group_id')
        ));


    public function __construct($config = array()) {
        $db = Zend_Registry::get('db');
        Zend_Db_Table::setDefaultAdapter($db);
        parent::__construct($config);
    }

}