<?php
/* 
 * RosePHP自动加载类
 * 
 * @author luoxun007@gmail.com
 */

define('Modeldir',PATH_ROOT.'/App/Model/');
define('Controllerdir',PATH_ROOT.'/App/Controllers/');
define('Interfacedir',PATH_ROOT.'/RosePHP/IRose/');

 
function Rose_autoload($class_name){

	 

    //先去model里面查找是否有对应model有则加载
    if(file_exists(Modeldir.$class_name.'.php')){
        require_once Modeldir.$class_name.'.php';
    }//查找Controller里面是否有对应控制器加载
     else if(file_exists(Controllerdir.$class_name.'.php')){
        require_once Controllerdir.$class_name.'.php';
    } 
   
     else if(file_exists(Interfacedir.$class_name.'.php')){
     	
     	
        require_once Interfacedir.$class_name.'.php';
    } 

}

 spl_autoload_register('Rose_autoload');

?>