<?php 

/**
* 
*/
class Model
{
	public $mysqli;
	
	function __construct()
	{
		$this->mysqli = new Mysqli('localhost','root','','ztdemo');
		$this->mysqli->query('set names utf8');
	}
	function query($sql){
		return $this->mysqli->query($sql);
	}
	function select($sql){
		$result = $this->query($sql);
		while($list = $result->fetch_array(MYSQLI_ASSOC)){
			$lists[] = $list;
		}
		return $lists;
	}
	function insert($table, $data){
		$res = $this->descTable($table);
		$sql = 'insert into '.$table;
		$key_str 	=  ' (';
		$value_str 	= '(';
		foreach ($data as $key => $value) {
			if (!isset($res[$key])) {
				continue;
			}
			$key_str 	.=  $key.',';
			if (strstr($res[$key], 'int')) {
				$value_str 	.= $value.",";
			} else {
				$value_str 	.= "'".$value."',";
			}
		}
		$key_str 		= rtrim($key_str, ','). ')';
		$value_str 		= rtrim($value_str, ','). ')';
		$sql .= $key_str . ' value '.$value_str;
		return $this->query($sql);
	}
	//
	function update($table,$data,$where){
		//update user set email='11@qq.com', password="" where id=2
	}
	function descTable($table){
		$table_info = $this->select('desc '.$table);
		foreach ($table_info as $key => $value) {
			$table_field[$value['Field']] = $value['Type'];
		}
		return $table_field;
	}
}

 ?>