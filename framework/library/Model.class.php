<?php 

class Model
{
	public $mysqli;
	public function __construct()
	{
	$this->mysqli = new Mysqli('localhost','root','','project');
	$this->mysqli->query('set names utf8');
	}
	public function query($sql){
		return $this->mysqli->query($sql);
	}
	public function affected_rows(){
		return $this->mysqli->affected_rows;
	}
	public function fetch_array($sql){
		$result=$this->query($sql);
		$list=$result->fetch_array(MYSQLI_ASSOC);
		return $list;
	}
	public function select($sql){
		$result = $this->query($sql);
		$lists=array();
		while($list = $result->fetch_array(MYSQLI_ASSOC)){
			$lists[] = $list;  //二维数组
		}
		return $lists;

	}
	//array('username','school','abc');
	//array('name'=>'maying','age'=>22,'abc'=>2)
	public function insert($table,$data){
		$res=$this->descTable($table); //一维数组
		//var_dump($res);die();
		$sql = 'insert into '.$table;
		$key_str = '(';
		$value_str = '(';
		foreach($data as $k=>$v){
			$data[$k]=htmlspecialchars($v);
		}
		foreach($data as $key=>$value){
			if(!isset($res[$key])){   //过滤脏数据  不存在就跳过去
				continue;
			}
			$key_str .=$key.',';
			if(strstr($res[$key],'int')){ //strstr()搜索字符串在另一字符串中是否出现 
				$value_str.=$value.",";
			}else{
				$value_str.="'".$value."',";
		    }
			

		}
		$key_str   =rtrim($key_str,',').')';
 		$value_str   =rtrim($value_str,',').')';
 		$sql.=$key_str.' value '.$value_str;
 	    $this->query($sql);
 	    //var_dump($sql);
 	    return $this->affected_rows();
 	   
 		
	}
	//delete from mess where id = $id
	public function delete($table,$where){
		$sql = 'delete from '.$table.' where '.$where;
		/*foreach($where as $key=>$value){
         $sql.=$key.'='.$value.' and ';
		}
		$sql = rtrim($sql,' and ');*/
        $this->query($sql);
        //return $sql;
        return $this->affected_rows();
		}
	//update mess set title ='{$title}',concent='{$concent}',telephone='{$telephone}'where id = $id"
	public function update($table,$data,$where){
		$sql = 'update '.$table.' set ';
		$str='';
		foreach($data as $key=>$value){
			$str .= $key.'='."'".$value."',";
		}

       $sql .=rtrim($str,',').' where '.$where;
       //var_dump($sql);die();
       $this->query($sql);
       //return $sql;
       return $this->affected_rows();
	}
	//$sql = "select * from mess where id = $id";
	/*function select($field,$table,$where){
		$sql='select';
		$sql.=$field;
		$sql.='from'.$table;
		foreach($where as $key=>$value){
			$sql.="where".$key.'='.$value.'and';
		}
		rtrim($sql,'and');
		$this->query($sql);

	}*/
	//insert into user (id,name,email,sex) value (1,'maying','627',1);
    public function descTable($table){
    $table_info = $this->select('desc '.$table); //查询表的信息 二维数组
    //var_dump($table_info);die();
    foreach($table_info as $key=>$value){
    	$table_field[$value['Field']]=$value['Type'];
    }
    //var_dump($table_field);die();
    return $table_field;
	}
}
?>
