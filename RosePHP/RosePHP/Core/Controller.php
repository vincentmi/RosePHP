<?php
/*
 * 基础控制类
 * @author luoxun
 */

/**
 * Description of Controller
 *
 * @author luoxun
 */
abstract class RoseController {

    
    /**
     * 构造函数
     */
      function  __construct() {

         $songname  = get_called_class();
         if(method_exists($this,'__init')){
             $this->__init();
         }
    }

}




/**
 * AMFPHP扩展基类
 * 
 * @author luoxun
 *
 */
/*abstract class RoseAMFController extends RoseController {

     function  __construct() {
			
      		$this->exists__init();
         	$songname = get_called_class();

    }

		
}*/
/**
 * ripcord 扩展基类
 * 
 * @author luoxun
 *
 */
abstract class RoseXMLRPController extends RoseController {
		
		function __construct(){
			$this->exists__init();
         	$songname = get_called_class();
         	require_once PATH_ROOT.'/RosePHP/Lib/ripcord/ripcord.php';
		}
		
}



?>
