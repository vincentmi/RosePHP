<?php
define('EXEC', 1);
//define('PATH_BASE',  dirname(__FILE__));
define('DS',DIRECTORY_SEPARATOR);
define('PATH_ROOT',dirname(__FILE__));


header("Content-type:text/html;charset = utf-8");

define('Rose_Core_ROOT',dirname(__FILE__).'/RosePHP/Core');



/**
 * 导入配置文件
 */
require  PATH_ROOT.'/Config/Config.php';




/**
 * 导入自动加载类
 * 
 */
require  Rose_Core_ROOT.'/AutoLoad.php';

/**
 * 导入基础model文件
 */
require  Rose_Core_ROOT.'/RoseMysqlDB.php';


/**
 * 导入基础控制文件
 */
require  Rose_Core_ROOT.'/Controller.php';



/**
 * 导入基础model文件
 */
require  Rose_Core_ROOT.'/Model.php';




/**
 * 导入AMFPHP扩展
 */

require_once PATH_ROOT.'/RosePHP/Lib/Amfphp/index.php';




/**
 * 导入Apprun文件
 */
require  Rose_Core_ROOT.'/Apprun.php';

echo 'RosePHP service is running';

//$app = new Apprun();
//$app->run();
?>			