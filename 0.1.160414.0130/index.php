<?php
/*
	License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU
======================================================
	FICHIER 'index.php'
======================================================

*/

	// $_GGN_URL_VERIFY_VAR = str_replace(' ','', $_SERVER["REQUEST_URI"]);
	// $_GGN_URL_VERIFY_INST = $_GGN_URL_VERIFY_VAR==='/';

	
	// if($_GGN_URL_VERIFY_INST===true){
	// 	header('location:./intl');exit;
	// }


	REQUIRE_ONCE dirname(__FILE__) . '/cores/autorun.php';
	
	
	if(!class_exists('AutoRun')){exit('Class AutoRun introuvable');}
	if(!isset($AutoRun)){exit('La déclaration de "AutoRun" est introuvable');}

	
	$AutoRun->bootOn = (_native::varn('BootOn'))?_native::varn('BootOn'):false;
	// $AutoRun->bootOn = false;
	$AutoRun->start();
	
	
?>