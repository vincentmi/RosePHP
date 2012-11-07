<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome
 *
 * @author luoxun
 */
class WelcomeController  extends RoseController{
    //put your code here

    function  __init() {
			
    	//echo ('welcome_ _init');

    }  

    function index(){
       // parent::__construct();
         echo 'welcome_index!<br/>';
    }
    
    function welcome(){
       // parent::__construct();
         echo 'welcome_welcome!<br/>';
    }

    function server(){

       $wel = new WelcomeController();

       $server = ripcord::server($wel);
       $server->run();
       
    }

    function clinet(){
            $client = ripcord::xmlrpcClient( 'http://222.18.149.11:9090/php/rose_svn/welcome/server' );

            //var_dump($client->);
            $score = $client->process( '袜子粘到手' );
            //var_dump($client);
            //$client = ripcord::client( 'http://127.0.0.1/XMLPRCdemo/rpc_server_1.php' );
            //var_dump($client);


            //header('Content-Type: text/xml');
            print_r($client->_response);
        
    }


    	function process($request)
	{

            $ur = new UserModel();
            // $all = $ur->getall();
            $u = $ur->fields("name,pwd")->where('id in (1,2)')->litedata->select();

//            $arr = new ArrayIterator();
//            foreach ($u as $key => $value) {
//
//                return $value->data;
//            }

            return $u;
	}




    function show(){

        $ur = new UserModel();
       // $all = $ur->getall();
        $u = $ur->fields("pwd,name")->where('id in (2)')->find();

        var_dump($u);
       // return $all;
    }
}

?>
