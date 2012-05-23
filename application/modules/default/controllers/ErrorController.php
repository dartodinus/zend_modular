<?php

class ErrorController extends Zend_Controller_Action
{
  public function errorAction()
  {
    // Ensure the default view suffix is used so we always return good
    // content
    $this->_helper->viewRenderer->setViewSuffix('phtml');
 
    // Grab the error object from the request
    $errors = $this->_getParam('error_handler');

    switch ($errors->type) {
      case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
      case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
        // 404 error -- controller or action not found
        $this->getResponse()->setHttpResponseCode(404);
        $this->view->message = 'Page not found';
        $this->view->code  = 404;
        if ($errors->type == Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER) {
          $this->view->info = sprintf(
                      'Unable to find controller "%s" in module "%s"',
                      $errors->request->getControllerName(),
                      $errors->request->getModuleName()
                    );
        }
        if ($errors->type == Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION) {
          $this->view->info = sprintf(
                      'Unable to find action "%s" in controller "%s" in module "%s"',
                      $errors->request->getActionName(),
                      $errors->request->getControllerName(),
                      $errors->request->getModuleName()
                    );
        }
        break;
      case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
        // application error
        $this->getResponse()->setHttpResponseCode(500);
        $this->view->message = 'Application error ' . var_export($errors->request, true);
        $this->view->code  = 500;
        $this->view->info  = $errors->exception;
        break;

      default:
	  	// 404 error -- controller or action not found
        $this->getResponse()->setHttpResponseCode(404);

#		$this->view->message = var_export($this->getResponse(), true);

        #$this->view->message = 'Page not found';
        $this->view->code  = 404;
		$this->view->info  = $errors->exception;

    }

    $this->view->title = 'Error!';
    $this->view->heading = 'Error!';
 
    // pass the environment to the view script so we can conditionally
    // display more/less information
    $this->view->env   = $this->getInvokeArg('env');
 
    // pass the actual exception object to the view
    $this->view->exception = $errors->exception;
 
    // pass the request to the view
    $this->view->request = $errors->request;
  }
}