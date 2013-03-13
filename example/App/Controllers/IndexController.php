<?php
/**
 * Description of Index
 *
 * @author luoxun
 */
class IndexController  extends RoseController {

    /**
     * init初始化
     */
    function  __init() {
			
    	var_dump('index_init');

    }

    function index(){    	
			
    	echo "<div><font color='red'>RosePHP</font> is running</div>";
    	exit;
    	$user = new UserModel();
    	//返回数据集，并且有该表的name和一些其他基本信息
    	$reall  = $user->getall();
    	
    	var_dump($reall);
    	exit;
    	
    	//返回数据只有data里面的数据无其他信息，如：字段名等
    	$reall  = $user->where('id = 1')->litedata()->getall();
    	//select返回数据集
    	$reall  = $user->fields('name,pwd')->select();
    	//find只返回一个对象
    	$reall  = $user->where('id = 1')->fields('name,pwd')->limit(1)->select('data');
    	
//    	var_dump($user);
    	$user->name = 'rose';
    	$user->pwd='bugzila';

    	$value['name'] = 'rose' ;
    	$value['pwd'] = 'zila' ;
    	
    	//×××数据库插入	
 //   	$addid = $user->insert($value);/
    	
    	//××××数据库修改
//    	$bool = $user->where('id=1')->update($value);
    	
    	var_dump($bool);
//     	$value['name'] = 'rose' ;
//    	$value['pwd'] = 'php' ;   	
//    	$addid = $user->where('id = 5')->update($value);
    	
//    	var_dump($reall);
    }

    
    
}

?>
