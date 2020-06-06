<?php
	function classAutoloader($class) {
		$class = strtolower($class);
		$path = 'classes/class-';
		require  $path . $class .'.php';
	}
	spl_autoload_register('classAutoloader');
?>