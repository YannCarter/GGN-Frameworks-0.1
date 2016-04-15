<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS Gougnon
	PAGE cores/_natives/PHP/ggn.core/.class.php
======================================================

*/

	
class GSystem
{

	/* INFOS */
	CONST NAME = 'Gougnon System Core';
	CONST VERSION = '0.1';
	CONST REEL_VERSION = '0.1.140508.1200';
	CONST TYPE = 'PHP.CORE';
	
	
	
	
	
	
	
	
	/* RESSOURCES */
	CONST CPREF = 'function';
	CONST FUNCTIONS_STORE = 'functions/';
	CONST CSUF = 'PHPCore.php';

	
	
	/* Interface Manager */

	CONST IMKey = 'ggn.interface.rk.1'; // Interface Manager Application : Clé de l'application
	
	


	
	/* Cleaner Manager */

	CONST CleanerKey = 'ggn.cleaner.rk.1'; // Cleaner Manager Application : Clé de l'application
	
	
	


	/* Documentaions */

	CONST DocsKey = 'ggn.cores.docs.rk.1'; // GGN Docks : Clé de l'application
	


	
	
	
	
	/* CONSTRUCTEUR */
	public function __construct(){
		$this->PARAM = func_get_args(); 	
		}
		
	
	
	/* FUNCTIONS */
	public static function getCoreFolder(){
		return dirname(__FILE__) . '/';	
		}
		
		
		
	public static function __callStatic($F,$A){
		return self::loadNewFunction($F,$A, '-s');	
		}
		
		
		
	public function __call($F,$A){
		$this->loadNewFunction($F,$A, '-d');	
		}
		
		
	protected static function loadNewFunction($func,$args,$calledMode){
		global $Gougnon, $GLANG;
		
		$funcCompo = self::getCoreFolder() . '/' . self::FUNCTIONS_STORE . self::CPREF . '.' . $func . '.' . self::CSUF;
		if(file_exists($funcCompo)){
			if($calledMode == '-s'){ return include $funcCompo; }
			if($calledMode == '-d'){ include $funcCompo; }
			 }
			
		if(!file_exists($funcCompo)){ _native::wCnsl("Erreur: <b>" . ($func) . "</b> n'existe pas"); }
		
		}

	
}
	
	
 
 
 
?>