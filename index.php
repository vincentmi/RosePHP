<?php
/*****************************************************
 * RosePHP
 * ---------------------------------------------------
 * @author luoxun
 * 
 * 
 * ---------------------------------------------------
 */
define('EXEC', 1);
//define('PATH_BASE',  dirname(__FILE__));
define('DS',DIRECTORY_SEPARATOR);
define('PATH_ROOT',dirname(__FILE__));


require  PATH_ROOT.'/RosePHP/Core/init.php';



$app = new Apprun();
$app->run();

?>