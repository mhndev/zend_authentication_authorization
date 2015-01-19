<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    public function _initRegistry(){
        // Set for use in App_Helper
        Zend_Registry::set("application", $this->getApplication());
        Zend_Registry::set("bootstrap", $this);
        $app = $this->getOption("app");
        Zend_Registry::set("APP_VERSION", $app["version"]);
        Zend_Registry::set("APP_TITLE", $app["title"]);

    }

    public function _initActionHelpers()
    {
        Zend_Controller_Action_HelperBroker::addPath(
            APPLICATION_PATH .'/controllers/helpers');
    }

    protected function _initSession(){
        try{
            Zend_Session::start();
        }catch(Zend_Session_Exception $exc){
            die(sprintf("%s: %s", get_class($exc), $exc->getMessage()));
        }
        return true;
    }

    protected function _init_Language()
    {

    }




    protected function _initConfig()
    {
        $config = new Zend_Config($this->getOptions(), true);
        Zend_Registry::set('config', $config);
        return $config;
    }

    public function _initDatabase()
    {
        $dboptions = array(
            Zend_Db::CASE_FOLDING => Zend_Db::CASE_UPPER
        );

        $connection = Zend_Registry::get('config')->database;

        $params = array(
            'host'           => $connection->params->host ,
            'username'       => $connection->params->username,
            'password'       => $connection->params->password,
            'dbname'         => $connection->params->dbname,
            'options'        => $dboptions
        );

        $db = Zend_Db::factory($connection->adapter, $params);
        Zend_Registry::set('db', $db);
    }


    protected function _init_Auth()
    {
        $dbAdapter = Zend_Registry::get('db');
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

        $authAdapter->setTableName('users')
            ->setIdentityColumn('name')
            ->setCredentialColumn('password')
            ->setCredentialTreatment('SHA1(CONCAT(?,salt))');

        Zend_Registry::set('authAdapter' , $authAdapter);
    }



//    public function _initRouting() {
//
//        // Get Front Controller Instance
//        $front = Zend_Controller_Front::getInstance();
//
//        // Get Router
//        $router = $front->getRouter();
//        $routedetialevent = new Zend_Controller_Router_Route(
//            '/events/detail/:id',
//            array(
//                'controller' => 'events',
//                'action'     => 'detail'
//            )
//        );
//        $routeregister = new Zend_Controller_Router_Route(
//            '/index/register/:id',
//            array(
//                'controller' => 'index',
//                'action'     => 'register'
//            )
//        );
//
//        $routerdetail = new Zend_Controller_Router_Route(
//            '/commentaries/details/:id',
//            array(
//                'controller' => 'commentaries',
//                'action'     => 'details'
//            )
//        );
//
//
//        $router->addRoute('post', $routedetialevent);
//        $router->addRoute('register', $routeregister);
//        $router->addRoute('detail', $routerdetail);
//    }


}
