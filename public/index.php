<?php

// Define path to application directory
defined('APPLICATION_PATH')
|| define('APPLICATION_PATH',
realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
|| define('APPLICATION_ENV',
(getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
: 'production'));

// Typically, you will also want to add your library/ directory
// to the include_path, particularly if it contains your ZF installed
set_include_path(implode(PATH_SEPARATOR, array(
dirname(dirname(__FILE__)) . '/library',
get_include_path(),
)));


require_once 'Zend/Loader/Autoloader.php';
$loader = Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('Application_');

require_once 'Zend/Loader/Autoloader/Resource.php';
$resources = new Zend_Loader_Autoloader_Resource(array(
    'namespace' => 'Application',
    'basePath' => APPLICATION_PATH
));

$resources->addResourceType('acl','acl','Acl');
$resources->addResourceType('model','models','Model');
$resources->addResourceType('form','forms','Form');
//$resources->addResourceType('dbtable','models/DbTable','Model_DbTable');




/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
APPLICATION_ENV,
APPLICATION_PATH . '/configs/app.ini'
);
$application->bootstrap()
->run();