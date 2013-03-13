<?php

define('Rose_Core_ROOT',dirname(__FILE__));

//echo Rose_Core_ROOT;exit;
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
 * 导入错误提示文件
 */
//require  Rose_Core_ROOT.'/RoseError.php';


/**
 * 是否导入Ripcord扩展
 * 用于需要XML-RPC,SOAP1.1的时候
 */
if(boolXMLRPC)
{
   // require_once PATH_ROOT.'/RosePHP/Lib/ripcord/ripcord.php';
}


/**
 * 导入Apprun文件
 */
require  Rose_Core_ROOT.'/Apprun.php';

?>
