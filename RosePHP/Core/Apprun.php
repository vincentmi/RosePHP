<?php

/**
* AppRun 运行类
*----------------------------
*
*/
class Apprun {
    
       public function run(){
        
        $this->analysis();
        $control  = $_GET['c'];
        $action = $_GET['a'];
        $controlFile = PATH_ROOT . '/App/Controllers/' . $control.'Controller' . '.php';
        
        //var_dump($_GET['c']);exit;
       // echo $controlFile;
        include($controlFile); 
        $class = ucwords($control); //将控制器名称中的每个单词首字母大写,来当作控制器的类名 

        $_POST = $_POST['value'];

        

        if(!class_exists($class.'Controller')) //判断类是否存在, 如果不存在提示错误
        { 
            exit('no Controller ' . $class);
        }

        $trueclass = $class.'Controller';
        $instance = new $trueclass(); //否则创建实例


 
        if(!method_exists($instance, $action)) //判断实例$instance中是否存在$action方法, 不存在则提示错误
        {
/*        	 if($action == 'index')
        	 $action = $control;
        	 else */
             exit('no action as ' . $action);
        }

       
          $instance->$action();
        
    }
    
    /**
     * 解析 URL
     * @access protected
     * @return void
     */
    protected function analysis(){
        
    	//var_dump($_SERVER);die();
        $path  =@trim($_SERVER['PATH_INFO'],'/');
        $paths = explode('/', $path);
        $control = array_shift($paths);
        $action = array_shift($paths);
        $arr = array();

        $arrlenth = sizeof($paths)/2;
        
        for($i=1;$i<=$arrlenth;$i++){
        //var_dump($i);
            $objname = array_shift($paths);
            $objvaleu = array_shift($paths);
            $arr[$objname]= $objvaleu;
        }

        $_POST['value'] = $arr;
        $_GET['c']  = $control = !empty ($control)? $control:'Index';
        $_GET['a']  = $action = !empty ($action)? $action:'index';

        
    }
}
?>
