<?php

/**
 * JPHPFramework
 * Template class
 *
 * @version 0.1
 * @author José Villena
 */
if ( ! defined( 'JPHP_SECURITY' ) )
{
    echo 'Error de acceso';
    exit();
}

require_once(APP_PATH.'config.php');	
// require our registry
require_once(CONTROLLER_URL.'/jphpController.php');
	
$registry->storeObject('login','login');
$registry->getObject('login')->generateOutput();
exit();

?>