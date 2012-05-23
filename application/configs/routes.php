<?PHP

	$useDefaultRoutes = false;


	$routes['index'] = new Zend_Controller_Router_Route('', array(  'controller' => 'index',
																  	'action' => 'index', 
																	'module' => 'default'));
	
	$routes['admin'] = new Zend_Controller_Router_Route('admin', array(	'controller' => 'index',
																  		'action' => 'index', 
																		'module' => 'admin'));

?>