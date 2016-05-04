<?php 
/**
* 
*/
class IndexController extends Controller
{
	
	function __construct()
	{
		//parent::__construct();
	}
	function index(){
		//$a=M('User')->select('select * from zt_user');
		//var_dump($a);
		$b='124312412';
		//$this->display();
		include "./home/view/index/index.html";
	}
}


 ?>