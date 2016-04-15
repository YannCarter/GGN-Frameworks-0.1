<?php 
/*
	License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU
======================================================
	FICHIER 'runtimes.php'
======================================================

*/
	
	REQUIRE_ONCE dirname(__FILE__) . '/cores/run.php';
	
	if(!class_exists('Register')){exit('Class "Register" introuvable');}

	if(!isset($GRegister)){exit('La déclaration de "Register" est introuvable');}
	
	$GRegister->Invoke('GET', '___auto_open_file___');

	$GRegister->SetMode('-debug'); /* Mode d'utilisationlimit (-debug/-release) */

	$GRegister->Rendering('-g auh');
	
	
?>