<?php 

function M($names){
	static $models;  //静态
	$names = $names.'Model';
	$module = gv('m','home');
	if (!isset($models[$module.'/'.$names]) || !is_object($models[$module.'/'.$names])){
		include "./".$module."/model/$names.class.php";
		$a = new $names();
		$models[$module.'/'.$names] = $a;   //module下的$names.class.php 
	}
	return $models[$module.'/'.$names];
}

function redirect($url){
	header("location:$url");
}

function run(){
	$module 	= gv('m', 'home');
	$controller	= gv('c', 'Index');
	$action		= gv('a', 'index');
	$controller = ucfirst($controller) . 'Controller';
	include "./".$module."/controller/".$controller.".class.php";
	$demo = new $controller;
	$demo ->$action();
}

function gv($name, $default=''){
	return isset($_GET[$name]) ? $_GET[$name] : $default;
}

/*function showPage(){
	include "./".gv('m','home').'/'.'view/'.ucfirst(gv('c','Index')).'/'.gv('a', 'index').'.html';
}*/


?>