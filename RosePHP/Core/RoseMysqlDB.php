<?php

class RoseMysqlDB {

    private static $connet ;

    private function  __construct() {
        $hostport = DBhost.':' .DBport;
        self::$connet = mysql_connect($hostport,DBuser, DBpwd);
        mysql_select_db(DBname);
        
    }

    /**
     *
     * @return $connect
     */
    public static function getConnet(){

        if(empty (self::$connet)){

            self::$connet = new RoseMysqlDB();
        }
        return self::$connet;

    }

    public function   __destruct() {

        //mysql_close();

        // echo'__destruct<br/>';
    }



}
?>
