<?php

class IndexController extends Zend_Controller_Action
{

	public function preDispatch()
	{

		$this->view->pageIdentity = $this->_request->getActionName();

	}

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$this->_auth = Zend_Auth::getInstance();

	}

}