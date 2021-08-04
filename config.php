<?php
	
	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	function myAutoload($class){
		if(file_exists("classes/".$class.".php"))
			include "classes/".$class.".php";
	}
	spl_autoload_register("myAutoload");


	define('INCLUDE_PATH_PAINEL', 'http://localhost/projeto02painel/');
	define('HOST', 'localhost');
	define('DATABASE', 'phpprojeto02');
	define('USER', 'root');
	define('PASSWORD', '');


?>