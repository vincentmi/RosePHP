<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor. implements IRoseModel
 */
class  Model  implements IRoseModel  {

    //数据库连接
    protected $dbconnet = NULL;

    //真是表名
    protected  $tablename = NULL;

    //根据表分析字段
    protected $fields = array();

    //根据表分析字段
    protected $selectfields = array();
    
    //表的数据
    public  $data = array();

	//where 条件
    protected $where ;

    //limit 条件
    protected $limit ;

    //原生SQL
    protected $sql;

    
    protected $lite;

    /**
     * 初始化构造函数
     *
     */
    function __construct() {

        $this->dbconnet= RoseMysqlDB::getConnet();
        if(is_null($this->tablename)){
            $basicmodel = get_called_class();
            $turename = trim($basicmodel,'Model');
            $this->tablename = strtolower($turename);
        }
        mysql_query('set names utf8');
        $this->getFields($this->tablename);// 获得表结构
    }

    /**
     *  分析表结构,获得表字段信息
     * 
     * @param <string> $tablename
     * 
     */
    protected function getFields($tablename){
        
        $res = $this->query('SHOW COLUMNS FROM '.$tablename);

        while(($row = mysql_fetch_object($res)) != false)
         {
            
            array_push($this->fields, $row->Field);
        }
        
    }

    public  function getlastsql(){

        return $this->sql;
    }


    /**
     * 执行SQL语句
     * @param <type> $sql
     * @return <type>
     */
    public function query($sql){

        $res = mysql_query($sql) or exit(mysql_error());

        return $res;


    }

    /**
     *
     * @param <type> $res
     * @param <type> $type
     * @return <type> 
     */
    final protected function Fetch($res){
       $arr = array();
       while(($row = mysql_fetch_object($res)) != false){

           $basicmodel = get_called_class();
           $sonymodel = new $basicmodel();
           $sonymodel->data = $row;

           if($this->lite) {
               array_push ($arr,$row);
           }else{
               array_push($arr,$sonymodel);
           }

           for($i=0;$i<sizeof($this->fields);$i++){ 
                $datavalue = $this->fields[$i];
                $sonymodel->$datavalue = $row->$datavalue;

         }
       }
		
       	$this->lite = false;
        return $arr;

    }

    /**
     * 获得表全部数据
     * @return array
     */
    public  function  getall(){

        $this->sql = "select *from  " . $this->tablename;

      
        return  $this->Fetch($this->query($this->sql));

    }
    
    /**
     * 限定只返回data里面的数据其他的不需要
     * Enter description here ...
     */
	public function litedata(){
		
		$this->lite = true;
		
		return $this;
		
	}
    
    
    /**
     * 限定where条件
     * @param <string> $_where
     * @return Model
     */
    public function where($_where){

        $this->where = ' where '.$_where.' ';

        return $this;
    }


    /**
     * 限定选择字段
     * @param <string> $arrstr
     * @return Model
     */
    public function fields($arrstr){

        $arr = explode(',',$arrstr);
        $this->selectfields = $arr;

        return $this;
    }

    /***
     * 返回对象用数组表示
     * @return array
     */
    public function select(){

        $this->sql = 'select '.implode(',',$this->fields).' from ' .$this->tablename.$this->where.''.$this->limit.';';

       
        return $this->Fetch($this->query($this->sql));

    }

	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $type
	 */
    public function find(){

        $this->sql = 'select '.implode(',',$this->fields).' from ' .$this->tablename.$this->where.' '.$this->limit;
        $res = $this->query($this->sql);
        
        var_dump($this->sql);
        
        $row = mysql_fetch_object($res);
        $basicmodel = get_called_class();
        $sonymodel = new $basicmodel();
        $sonymodel->data = $row;
        for($i=0;$i<sizeof($this->fields);$i++){
                $datavalue = $this->fields[$i];
               $sonymodel->$datavalue = $row->$datavalue;
         }

         $return = null;
         
         if($this->lite){
         	
         	$return = $row;
         }else {
         	
         	$return =  $sonymodel;      	
         }
       	
        $this->lite = false;
        return $return;

    }

	public function set(){
		
	}
    
    /**
     *limit条件限制
     * @param <string> $_limit
     * @return Model
     */
    public function limit($_limit = '0,30'){

        $this->limit = ' limit '.$_limit;
        return $this;
    }
/* (non-PHPdoc)
	 * @see IRoseModel::add()
	 */
	public function insert($model) {
		
//		$arrfields = $model->fields;
//		var_dump($model);
		$this->sql = 'insert into '.$this->tablename.' ('. implode(",", array_keys($model)).") values ('".implode("','", array_values($model))."')";
//		var_dump($this->sql);
		$this->query($this->sql);	
		return ( mysql_insert_id()); //返回最后插入的ID
	}

/* (non-PHPdoc)
	 * @see IRoseModel::delete()
	 */
	public function delete($id) {
		// TODO Auto-generated method stub
		$delsql = 'delete form '.$this->tablename.'where id = ' ;
		
		
	}

	/**
	 * update一个记录
	 * @author luoxun
	 *  
	 */
	public function update($model) {
		
		$upsql = 'set ';
		while (@list($key, $val) = each($model)) {   
			$upsql .=$key."= '" .$val."' ,";
		}
		$upsql =  substr($upsql, 0, -1);  
		$wheresql ='';
		if($this->where){
			$wheresql=$this->where;
		}
		$this->sql = 'UPDATE  '.$this->tablename.' '.$upsql.$wheresql;
		
		return $this->query($this->sql);	//成功返回true
		
	}

/* (non-PHPdoc)
	 * @see IRoseModel::save()
	 */
	public function save($model) {
		// TODO Auto-generated method stub
		
	}




}
?>
