<?php
class FriendlinkController extends Controller{
	function __construct(){
		
	}
	function index(){
		$lists = M('Friendlink')->select('select * from zt_friend_link');
		include './admin/view/friendlink/index.html';
	}
	function bar(){
		include "./admin/view/friendlink/bar.html";
	}
	function insert1(){
		M('Friendlink')->insert('zt_friend_link',$_POST);
		redirect('index.php?m=admin&c=friendlink&a=index');
	}
	function xin(){
		$name = gv('name');
		$link = gv('link');
		$id = gv('id');
		$is_del = gv('is_del');
		include "./admin/view/friendlink/xin.html";
	}
	function update1(){
		$id = gv('id');
		//var_dump($_POST);die();
		M('Friendlink')->update('zt_friend_link',$_POST,"id = $id");
		redirect('index.php?m=admin&c=friendlink&a=index');
	}
	function delete1(){
		$id= gv('id');
		M('Friendlink')->delete('zt_friend_link',"id = $id");
		redirect('index.php?m=admin&c=friendlink&a=index');
	}
}	





?>