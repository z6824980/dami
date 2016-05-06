<?php 
/**
* 
*/
class IndexController extends Controller
{
	
	function __construct()
	{

	}
	function index(){
		echo $_GET['c'];
	}
}


 ?>