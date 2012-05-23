<?PHP
error_reporting(E_ALL | E_STRICT);    
ini_set('display_startup_errors', 1);    
ini_set('display_errors', 1);


#error_reporting(0);

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../../system/library'),
    get_include_path(),
)));


/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

if(!Zend_Session::isStarted())
{
	Zend_Session::start();
	Zend_Session::setOptions();
}
$application->bootstrap()->run();


?>