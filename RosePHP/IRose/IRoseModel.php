<?php

/**
 *
 */
interface IRoseModel {
	
	/**
	 * 添加数据操作
	 * ----------------------
	 */
	function insert($model);
	/**
	 * 删除数据操作
	 * ----------------------
	 */	
	function delete($id);
	/**
	 * 添加数据操作
	 * ----------------------
	 */	
	function update($model);
	/**
	 * 添加数据操作
	 * ----------------------
	 */	
	function save($model);
}

?>