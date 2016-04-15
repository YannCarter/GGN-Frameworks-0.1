<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS Gougnon
	PAGE cores/_natives/PHP/ggn.core.variables/.class.php
======================================================

*/


/* Gougnon Storages */
if(!class_exists('GStorages')){
	$GStorages = _native::PHPcore('ggn.core.storages');
}



/* Gougnon Variables */
if(!class_exists('GVariables')){
		
	class GVariables extends GGNCorePHP implements GGNCoreInterface
	{

		/* INFOS */
		CONST NAME = 'Gougnon Variables';
		CONST VERSION = '0.1';
		CONST REEL_VERSION = '0.1.150218.1549';
		
		
		
		
		
		
		
		
		/* RESSOURCES */
		CONST CPREF = 'function';
		CONST FUNCTIONS_STORE = 'functions/';
		CONST CSUF = 'PHPCore.php';


		
		
		
		
		
		
		/* CONSTRUCTEUR */
		public function __construct(){
			$this->arguments = func_get_args(); 	
		}
			
		
		
		/* FUNCTIONS */
		public static function getCoreDir(){
			return dirname(__FILE__) . '/';	
		}
		
		public static function getVarsPath(){
			return GSTORAGE_VARIABLE_INVOKE;	
		}
		


		
		public static function functionsDir($function, $mode){
			return self::getCoreDir() . '/' . self::FUNCTIONS_STORE . $mode . '/' . self::CPREF . '.' . $function . '.' . self::CSUF;
		}


		
		public static function isFunction($function, $mode){
			$f = self::functionsDir($function, $mode);
			return (is_file($f)?$f:false);
		}


		
		public static function loadFunction($function, $args, $mode, $context){
			global $Gougnon, $GLANG;

			$is = self::isFunction($function, $mode);
			$return = null;

			if(is_string($is)){include $is; }
			else{_native::wCnsl("<h1>" . self::NAME . "</h1> la méthode <b>" . ($function) . "</b> n'existe pas en mode <b>" . $mode . "</b> "); }

			return $return;
		}
			
			
			
		public static function __callStatic($function,$args){
			return self::loadFunction($function, $args, '~statics', false);
		}
			
			
			
		public function __call($function,$args){
			return self::loadFunction($function, $args, '~dynamics', $this);
		}
			


		
	}
		
		
	 
}
 
 
?>