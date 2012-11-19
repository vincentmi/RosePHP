<?php
/**
 *  This file is part of amfPHP
 *
 * LICENSE
 *
 * This source file is subject to the license that is bundled
 * with this package in the file license.txt.
 * @package Amfphp
 */


/**
 * includes ClassLoader.php 文件
 * -------------------------------------------------
 */
require_once dirname(__FILE__) . '/ClassLoader.php';


/**
 * 改变servier目录
 * -------------------------------------------------
 */
$config = new Amfphp_Core_Config();
$config->serviceFolderPaths = array( PATH_ROOT.'/App/Services/' );
//$config->pluginsFolder =  PATH_ROOT.'/Lib/Amfphp/Plugins/';

/* 
 * main entry point (gateway) for service calls. instanciates the gateway class and uses it to handle the call.
 * 
 * @package Amfphp
 * @author Ariel Sommeria-klein
 */
$gateway = Amfphp_Core_HttpRequestGatewayFactory::createGateway($config);

//use this to change the current folder to the services folder. Be careful of the case.
//This was done in 1.9 and can be used to support relative includes, and should be used when upgrading from 1.9 to 2.0 if you use relative includes
//chdir(dirname(__FILE__) . "/Services");
//var_dump( $config);exit;
$gateway->service();

$gateway->output();



$config = new Amfphp_Core_Config();
$config->serviceFolderPaths = array(PATH_ROOT.'/App/Services/');
$gateway = Amfphp_Core_HttpRequestGatewayFactory::createGateway($config);

?>
