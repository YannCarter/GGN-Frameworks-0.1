<?php
	

global $_Gougnon;

	
	header("Access-Control-Allow-Origin: * ");


	$r = '';

	$r .= '{';
		$r .= '"response": "user.exist"';
		$r .= ',"session": "code.session"';
	$r .= '}';


	echo $r;
	
?>