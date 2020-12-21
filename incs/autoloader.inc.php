<?php

	spl_autoload_register('myAutoloader');

	function myAutoloader($classname){
		$path = "class/";
		$ext = ".class.php";
		$fullPath = $path . $classname . $ext;

		if(!file_exists($fullPath)){
			return false;
		}

		include_once $fullPath;
	}

?>