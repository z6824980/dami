<?php 
/**
* 
*/
class Controller
{
	
	function __construct()
	{
		//echo "123123";
	}
	function display(){
		include './'.gv('m', 'home')."/view/".gv('c', 'Index').'/'.gv('a', 'index').'.html';
	}
}


 ?>