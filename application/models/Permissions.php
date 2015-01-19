<?php


class Application_Model_Permissions extends Zend_Db_Table_Abstract
{
    protected $_name = 'permissions';
    protected $_primary = 'permission_id';
    protected $_referenceMap = array(
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