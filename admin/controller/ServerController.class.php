<?php
class ServerController extends Controller{
	function __construct(){

	}
	function server(){
		include "./admin/view/server/server_bar.html";
	}
	function insert1(){
		M('Server')->insert('zt_server',$_POST);
	}
}





?>