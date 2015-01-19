<?php
class AuthController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $form = new Application_Form_Login();
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                if ($this->_helper->auth($form->getValues())) {
                    $this->_helper->redirector('index', 'index');
                }
            }
        }
        $this->view->form = $form;
    }


    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index');
    }
}