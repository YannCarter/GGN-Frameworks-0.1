<?php
/*
	License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU
======================================================
	FICHIER 'cores/run.php'
======================================================

*/

	session_start();


	define('PHP_VERSION_AVAILABLE', '5.3');

	
	
	/* Parametres */
	$_Gougnon = array();

	$_GougnonDB = array();

	$Native = array();
	
	$GGNCoresPath = dirname(__FILE__);


	$_VARS = [];

	
	require $GGNCoresPath . '/settings.root.php';
	
	
	
	
	/* Class Native */
	require $GGNCoresPath . '/native.core.interface.php';
	
	require $GGNCoresPath . '/native.cores.php';
	
	
	if(_native::versionValidate(PHP_VERSION, PHP_VERSION_AVAILABLE)!==true){
	
		_native::wCnsl('<b>'._native::_SYSTEM_NAME.'</b> est compatible avec <b>PHP '.PHP_VERSION_AVAILABLE.'</b> au minimum.<br>votre version de PHP est '.PHP_VERSION);
	
	}
	
	
	
	
	/* Chargement des Noyaux PHP */
	$Gougnon 		= _native::PHPCore('ggn.core');
	
	$GStorages 		= _native::PHPcore('ggn.core.storages');
	
	$GVariables 	= _native::PHPcore('ggn.core.variables');
	
	$GRegister 		= _native::PHPCore('ggn.core.register');
	
	$GNameSpace		= _native::PHPCore('ggn.core.ns');
	

	
	
	
	/* Constantes */
	require $GGNCoresPath . '/settings.constantes.php';
	
	
	
	
	
	/* Chargement de langue */
	$GLANG = _native::loadLang(_LANG_ . '/GougnonRT.ini');
	
	
	
	
	/* Class Native Base de Donnée */
	require $GGNCoresPath . '/native.database.php';
	
	
	
	
	
	/* Connexion Base de donnée */
	if(!isset($database)){_native::wCnsl('Classe base de donnée introuvable');}
	
	
	
	
	
	require $GGNCoresPath . '/settings.variables.php';
	

	
	
	/* DPO */
	$DPO			= new \GGN\Using('DPO');
	
	$DPODevice		= new \GGN\Using('DPO\Device');
	
	$DPODriver		= new \GGN\Using('DPO\Driver');


	
	


	/* Chargement des Plugins PHP */
	$Gougnon::loadPlugins(
		// 'PHP/designPackage.Object'
	);

	


	$GSystem 		= Gougnon::System();
	
	$GUsers			= _native::PHPCore('ggn.core.users');
	







	/* Variable & Constantes addtionnelle */
	$_DPO_DEVICE = new \GGN\DPO\Device();
	
	define('CLIENT_BROWSER', $_DPO_DEVICE->name);



	
?>