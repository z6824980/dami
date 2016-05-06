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
		//$this->display();
		$list = M('Friendlink')->select('select * from zt_friend_link where is_del = 0 order by sort desc limit 8');
		$lists = M('Server')->select('select * from zt_server limit 6');
		include "./home/view/index/index.html";
		
	}
}


 ?>