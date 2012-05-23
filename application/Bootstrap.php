<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	public static function setRoutes(){

		$frontController = Zend_Controller_Front::getInstance(); 
		$router = $frontController->getRouter();

		$routes = array();

		// now include the routes file.  NOTE: PLEASE ENSURE routes.php is formatted correctly
		if(file_exists('../application/configs/routes.php')) // getcwd() shows we are in /public/
		{

			require_once "configs/routes.php";

			foreach($routes as $routeName => $routeValue){
				$router->addRoute($routeName, $routeValue);
			}

			if($useDefaultRoutes == false)
			{
				// remove Zend default routes -- model/controller/action
				$router->removeDefaultRoutes();
			}

		}

	}

	protected function _initFrontModules() {
		$this->bootstrap('frontController');
		$front = $this->getResource('frontController');		
		$this->setRoutes();
	}

}