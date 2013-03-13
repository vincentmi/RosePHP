<?php
/*****************************************************
 * 
 * ---------------------------------------------------
 * 
 * 
 * 
 * ---------------------------------------------------
 */
define('EXEC', 1);
//define('PATH_BASE',  dirname(__FILE__));
define('DS',DIRECTORY_SEPARATOR);
define('PATH_ROOT',dirname(__FILE__));

define('ROSEPHP_ROOT', '../RosePHP/');
//echo ROSEPHP_ROOT;

require  ROSEPHP_ROOT.'Core/init.php';



$app = new Apprun();
$app->run();

?>