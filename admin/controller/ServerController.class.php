<?php
	class ServerController extends Controller
	{
		function __construct(){
	}

	function index(){
		$lists = M('Server')->select('select * from zt_server');
		include "./admin/view/server/index.html";
	}
	function server(){
		include "./admin/view/server/server_bar.html";
	}
	function insert1(){
		M('Server')->insert('zt_server',$_POST);
		redirect('index.php?m=admin&c=server&a=index');
	}
	function xin(){
		$name = gv('name');
		$link = gv('link');
		$id = gv('id');
		include "./admin/view/server/xin.html";
	}
	function update1(){
		$id = gv('id');
		M('Server')->update('zt_server',$_POST,"id = $id");
		redirect('index.php?m=admin&c=server&a=index');
	}
	function delete1(){
		$id = gv('id');
		M('Server')->delete('zt_server',"id = $id");
		redirect('index.php?m=admin&c=server&a=index');
	}

}
?>