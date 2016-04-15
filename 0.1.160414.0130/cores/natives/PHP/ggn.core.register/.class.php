<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS Register
	CLASS Render
	PAGE cores/_natives/PHP/Register.core.g/.class.php
======================================================

*/

if(!class_exists('_native')){exit('Class native introuvable');}

if(!class_exists('Gougnon')){exit('Gougnon PHP Framework introuvable');}


class Register extends _native
{

	/* INFOS */
	CONST NAME = 'Gougnon Core Register';
	
	CONST VERSION = '0.0.2';
	
	CONST REEL_VERSION = '160325.1024';
	
	CONST TYPE = 'PHP.CORE';
	
	
	/* Active Register Core */
	CONST MODE_EXT_STATIC = 'EXT.FILES.STATIC:MODE';
	
	CONST MODE_EXT_DYNAMIC = 'EXT.FILES.DYNAMIC:MODE';
	
	CONST ARC_EXT = 'ARC_EXT_FILES/';
	
	CONST ARC_EXT_RENDERING = 'ARC_EXT_ENGINE_RENDERING/';
	
	CONST ARC_EXT_RENDERING_EXT = '.arc-render.php';
	
	CONST ARC_EXT_RENDERING_CLASS_EXT = '.arc-class.php';


	CONST MODE_SLASH_PATH = 'SLASH.PATH:MODE';
	
	CONST ARC_SLASH_PATH = 'ARC_SLASH_PATH/';
	
	CONST ARC_SLASH_PATH_RENDERING = 'ARC_SLASH_PATH_ENGINE_RENDERING/';
	
	CONST ARC_SLASH_PATH_RENDERING_EXT = '.arc-render.php';
	
	CONST ARC_SLASH_PATH_RENDERING_CLASS_EXT = '.arc-class.php';


	/* Evenements du registre */
	CONST ARC_EVENTS_DIR = 'ARC_EVENTS/';



	/* Registre libre */
	CONST MODE_FREE_REGISTER = 'ARC.FREE.REGISTER:MODE';
	
	CONST ARC_FREE_REGISTER_DIR = 'ARC_FREE_REGISTER/';



	/* Registre libre */
	CONST MODE_USERS_BLOGGING = 'ARC.USERS.BLOGGING:MODE';
	
	CONST ARC_USERS_BLOGGING_DIR = 'ARC_USERS_BLOGGING/';



	/* Cible Meta */
	CONST META_EXT = '.meta';






	
	var $mode = '-release';

	var $Blog = false;
	
	var $controlAccessError = false;

	var $getUserAccessRightError = false;



	/* Accessessibilité */
	var $controlAccessMode;

	var $controlAccessActived = false;



	/* Espace Disk et Memoire */
	var $MemoryUsage;

	var $DiskFreeSpace;

	var $DiskSpace;



	
	public function __construct(){

		$this->natives = func_get_args();

	}
	


	
	public function SysRsrc(){

		$this->SysMemoryUsage = memory_get_usage(true);

		$this->SysMemoryMax = memory_get_peak_usage(true);

		$this->SysMemoryLimit = (integer) ini_get('memory_limit') * 1024 * 1024;

		$this->DiskFreeSpace = disk_free_space(__MAIN__);

		$this->DiskSpace = disk_total_space(__MAIN__);

	}
	
	
	public function Invoke(){
		$this->invokers = func_get_args();
	}
	
	
	
	
	public function eventOn($on){
		$evt = dirname(__FILE__) . '/' . self::ARC_EVENTS_DIR . $on . '/default.event.php';
		$exists = is_file($evt);
		$args = func_get_args();

		if($exists===true){include $evt;}
		else{return false;}
	}
	
	
	public static function getDataPath($mode){

		switch ($mode) {
			case GGN_REGISTER_MODE_FREE:
				return GSTORAGE_REGISTER_FREE_MODE;
			break;
			
			default:
				return GSTORAGE_REGISTER;
			break;

		}
	}
	
	
	public static function getDataColumns($mode){

		switch ($mode) {
			case GGN_REGISTER_MODE_FREE:
				return ['NAME', 'TYPE', 'DATA', 'LABEL', 'COMMENTS'];
			break;
			
			default:
				return false;
			break;

		}
	}
	
	
	
	
	public static function getHTTPErrorMessages($_TYPE){
		switch($_TYPE){

			case HTTP_ERROR_301:
				@header(_native::HTTP_HEADER_301);
				$t = 'Donnée déplacée';
				$c = 301;
				$a = 'Donnée déplacée de façon permanente';
			break;

			case HTTP_ERROR_302:
				@header(_native::HTTP_HEADER_302);
				$t = 'Rédirection invalide';
				$c = 302;
				$a = 'Trouvé est une façon courante d\'effectuer la redirection d\'URL';
			break;

			case HTTP_ERROR_403:
				@header(_native::HTTP_HEADER_403);
				$t = 'Accès réfusé';
				$c = 403;
				$a = 'Droit d\'accès insuffisant';
			break;

			case HTTP_ERROR_500:
				@header(_native::HTTP_HEADER_500);
				$t = 'Erreur';
				$c = 500;
				$a = 'Erreur interne du serveur';
			break;

			case HTTP_ERROR_502:
				@header(_native::HTTP_HEADER_502);
				$t = 'Erreur';
				$c = 502;
				$a = 'Passerelle incorrecte';
			break;

			default:
				@header(_native::HTTP_HEADER_404);
				$t = 'Erreur';
				$c = 404;
				$a = 'Page non-trouvée';
			break;

		}

		return ['title'=>$t, 'code'=>$c, 'about'=>$a];
		
	}
	
	
	
	public function Rendering(){

			global $GLANG, $Gougnon, $database;

		
			$this->_CORE = $Gougnon;
		
	
		if($this->verifAllVars()===TRUE){
				
			if($this->primaryVars()===TRUE){
				
					$this->mode = $this->RegMode()->getARC()->toString;
				
					// $this->USER = false;

					$this->USER = GSystem::requires('users.login/secures');



					/* Rafraichissement de la session */
					if(is_array($this->USER)){

						$this->USER_SESSION = GSystem::requires('users.login.refresh/sessions');

					}

					



					/* Mode : GRAND - SLASH */
					if($this->arcExists==false){

						$slashPath = $this->getSlashPath();

						if($this->ARCINIExists!==true){


							/* Mode : BLOG */
							if(self::varn('SYSTEM_ACTIVATION_BLOGGING_USERS')=='1'){

								/* Recherche de l\'utlisateur */
								if(is_object($this->getBloggingUserName())){
									$this->getBloggingMaster();
								}

								/* Mode : Registre libre */
								else{$this->getFreeReg();}
							}


							/* Mode : Registre libre */
							else{$this->getFreeReg();}


						}


						/* Mode : SLASH.PATH */
						else{

							$this->ARC = self::ini($this->ARCINI);


							/* Petite Sécurité */
							$this->LittleSecure();
						

						/* Rendu */
						$this->getSlashPathRenderingEngine();
					
						if($this->RenderingEngineExists!==TRUE){
					
							$this->eventOn('ERROR.RENDERING.ENGINE.NOT.FOUND');
					
							$this->close();
					
						}


						$this->fileSourceExists = is_file($this->RenderingEngine);


						if(is_file($this->RenderingEngine) || ($this->fileSourceExists)){

							$this->eventOn('SUCCESS.REQUEST.OK', self::MODE_SLASH_PATH, $this->ARC['CONFIG']['HEADER'], $this->fileType);



							/* Entete de la page "Content-Type" */

							if(isset($this->ARC['CONFIG']['HEADER'])){

								if(!Gougnon::isEmpty($this->ARC['CONFIG']['HEADER'])){

									header(''.$this->ARC['CONFIG']['HEADER'].';charset='.$GLANG['INFO']['CHARSET'].'');

								}

							}

							include $this->RenderingEngine;	

							$this->close();							

						}




					}

				}




				/* Mode : EXTENSION */
				if($this->arcExists==true){

					$this->getARCVars();

					if($this->ARCINIExists===TRUE){

						$this->ARC = self::ini($this->ARCINI);

						$this->ARC_ROOT = Render::serverRootVars($this->ARC['CONFIG']['ROOT_SRC']);


						/* Petite Sécurité */
						$this->LittleSecure();
								
						/* Rendu */
						$this->getRenderingEngine();
						if($this->RenderingEngineExists!==TRUE){
							$this->eventOn('ERROR.RENDERING.ENGINE.NOT.FOUND');
							$this->close();
						}



						/* Existence du fichier */
						$fileExtence =  (isset($this->ARC['ON']['FILE_EXISTENCE']))?$this->ARC['ON']['FILE_EXISTENCE']: 'true';
						$this->file = $this->ARC_ROOT . $this->file . $this->ARC['CONFIG']['EXT'];
						$this->fileSourceExists = ($fileExtence=='true')?file_exists($this->file):true;

						

						/* Ouverture du moteur de rendu */
						if($this->file=='**'){
							$this->eventOn('SUCCESS.REQUEST.OK', self::MODE_EXT_STATIC, $this->ARC['CONFIG']['HEADER'], $this->fileType);

							/* Entete de la page "Content-Type" */
							if(isset($this->ARC['CONFIG']['HEADER'])){
								if(!Gougnon::isEmpty($this->ARC['CONFIG']['HEADER'])){
									header(''.$this->ARC['CONFIG']['HEADER'].';charset='.$GLANG['INFO']['CHARSET'].'');
								}
							}
			
							include $this->RenderingEngine;

							$this->close();

						}
							
						if($this->file!='**'){
							if($this->fileSourceExists!==TRUE){
								$this->eventOn('ERROR.FILESOURCE.NOT.FOUND');
								$this->close();
							}
							if($this->fileSourceExists===TRUE && $this->RenderingEngineExists===TRUE){
								$this->eventOn('SUCCESS.REQUEST.OK', self::MODE_EXT_DYNAMIC, (isset($this->ARC['CONFIG']['HEADER']) ? $this->ARC['CONFIG']['HEADER']:false), $this->fileType);
								
								/* Entete de la page "Content-Type" */
								if(isset($this->ARC['CONFIG']['HEADER'])){
									if(!Gougnon::isEmpty($this->ARC['CONFIG']['HEADER'])){
										header(''.$this->ARC['CONFIG']['HEADER'].';charset='.$GLANG['INFO']['CHARSET'].'');
									}
								}
				
								include $this->RenderingEngine;

								$this->close();

							}

						}
		
						
					}

					if($this->ARCINIExists!==TRUE){
				
						$this->eventOn('ERROR.ARCINI.NOT.FOUND');
				
						$this->close();
				
					}
					
				}

			}

		}
				
		$this->close();

		return $this;

	}
	
	public function close(){

		$this->nclose();exit;

	}
	
	public function nclose(){
	
		_native::closeDataBase();
	
		return $this;
	
	}
		
		
		
		
		
		
	
	/* Droit d'ouverture */
	public function LittleSecure(){

		if(isset($this->ARC['CONFIG']['ACCESS_OR_RIGHT']) && ($this->ARC['CONFIG']['ACCESS_OR_RIGHT'] == 1)){
			

			/* Droit d'access utilisateurs */
			$URight = $this->getUserAccessRight(true);


			/* Droit d'access domaine */
			$DAccess = $this->getDomaineAccessRight(true);


			/* Droit douverture depuis le manifest du ARC */
			$Right =  isset($this->ARC['CONFIG']['OPENED_RIGHT']) ? $this->ARC['CONFIG']['OPENED_RIGHT']*1 : false;



			/* Vérification */
			if( ($URight === true && $DAccess === true) || ($Right <= 0 && $this->controlAccessActived===true && !is_array($this->USER && __HTTP_REFERER__===false)) ){

				@header_remove($this->ARC['CONFIG']['HEADER']);

				$this->eventOn('ERROR.USER.ACCESS.RIGHT.NOT.ENOUGH');

				$this->close();

			}


		}
		

		if(!isset($this->ARC['CONFIG']['ACCESS_OR_RIGHT']) || (isset($this->ARC['CONFIG']['ACCESS_OR_RIGHT']) && ($this->ARC['CONFIG']['ACCESS_OR_RIGHT'] == 0))){


			/* Droit d'access utilisateurs */
			$this->getUserAccessRight();


			/* Droit d'access domaine */
			$this->getDomaineAccessRight();


		}

		return $this;

	}
		
		
		
		
	
	/* Mode Blogging */
	private function getBloggingUserName(){

		global $database;

		$ret = false;


		
		/* 
			SYSTEM // DEBUT ------------------
		*/

		// $Q = $database->SelectFromTable('NATIVE_USERS', "WHERE USERNAME='".$this->concatenate[0]."'")->results();

		// if($Q->row > 0){

		// 	$ret = $Q; 

		// 	$this->bloggingUSER = $Q->data;

		// }

		/* 
			SYSTEM // FIN ------------------
		*/



		/* 
			PERSO //
			'STYLIVOIR' // DEBUT ------------------
		*/

		\Gougnon::loadPlugins('PHP/stylIvoir.2.0');


			$STYLIVOIR = new \StylIvoir('Blogs.Now');




		$Is = $STYLIVOIR->UserBlogBySlug($this->concatenate[0]);



		if($Is->row > 0){

			$this->Blog = $Is->data[0];

			$Us = $database->SelectFromTable('NATIVE_USERS', "WHERE UKEY='" . $this->Blog->UKEY . "' ");


			if(is_object($Us)){

				$Us->results($database::RESULTS_METHOD_LINE_OBJECT);

				if($Us->row > 0){

					$this->BlogUser = $Us->data[0];

					$ret = $Is;

				}

			}


		}

		/* 
			PERSO //
			'STYLIVOIR' // FIN ------------------
		*/



		return $ret;
	}
	
	private function getBloggingMaster(){

		$f = $this->PATH . self::ARC_USERS_BLOGGING_DIR . 'default.php';
		if(is_file($f)){
			include $f;
		}
		else{$this->eventOn('ERROR.BLOGGING.MASTER.NOT.FOUND');}

	}
	
		
		
		
	
	/* Registre libre */
	private function getFreeReg(){
		global $GLANG;
		if($this->freeReg()===true){}
		else{$this->eventOn('ERROR.ARC.NOT.FOUND');}
	}
	private function freeReg(){
		global $GLANG;
		
		$_RETURN = false;
		$f = $this->PATH . self::ARC_FREE_REGISTER_DIR . 'default.php';
		if(is_file($f)){include $f;}
		return $_RETURN;

	}
		
		
		
		
		
		
	
	/* Fonctions Privées */
	private function verifAllVars(){
		global $GLANG;
			if(!isset($this->natives)){$this->eventOn('ERROR.NATIVE.VAR.NOT.FOUND');}
			if(!isset($this->invokers)){$this->eventOn('ERROR.INVOKE.VAR.NOT.FOUND');}
			$this->lang = $GLANG;
		return true;}
		
		
	private function getUserAccessRight($return = false){

		$ret = false;

		$Right =  isset($this->ARC['CONFIG']['OPENED_RIGHT']) ? $this->ARC['CONFIG']['OPENED_RIGHT']*1 : false;


		if($Right!==false && $Right > 0){

			if(isset($this->USER) && is_array($this->USER)){
		
				if($this->USER['ACCOUNT_TYPE'] < $Right && $this->USER['ACCOUNT_TYPE']!=null){
		
					$ret = true;
		
					$this->getUserAccessRightError = true;
		
				}
		
			}
		
			else{
		
				if(0<$Right){
		
					$ret = true;
		
					$this->getUserAccessRightError = true;
		
				}
		
			}

		}
		
		if($return===false && $ret===true){$this->eventOn('ERROR.USER.ACCESS.RIGHT.NOT.ENOUGH');}

		return $ret;
	}
	

	private function getDomaineAccessRight($return = false){

		$ret = false;

		if(isset($this->ARC['CONFIG']['CONTROL-ACCESS'])){

			$this->setControlAccessFromARC(
	
				$this->ARC['CONFIG']['CONTROL-ACCESS']
	
				, ((isset($this->ARC['CONFIG']['CONTROL-ACCESS-EXCLUDES']))?$this->ARC['CONFIG']['CONTROL-ACCESS-EXCLUDES']: FALSE) 

				, $return
				
			);

			$ret = $this->controlAccessActived;
		
		}

		return $ret;
	}
		
		
		
	private function primaryVars(){
		global $GLANG;
			$this->ROOT = (isset($this->natives[0]))?$this->natives[0]:__MAIN__;
			$this->CAP = (isset($this->natives[1]))?$this->natives[1]: $_GET;
			$this->PATH = dirname(__FILE__); $this->PATH .= (substr($this->PATH,-1)=='/')?'':'/';
			$this->mCAP = (isset($this->invokers[0]))?$this->invokers[0]: 'GET';
			$this->naCAP = (isset($this->invokers[1]))?$this->invokers[1]: FALSE;
				if($this->naCAP==FALSE){$this->eventOn('ERROR.NACAP.IS.FALSE');}
			$this->gFile = (isset($this->CAP[$this->naCAP]))?$this->CAP[$this->naCAP]:FALSE;
				if($this->gFile==FALSE){$this->eventOn('ERROR.FILE.SOURCE.FAILED');}
			$this->file = $this->gFile;
		return true;}
		
		
	private function getgFileSourceExploded(){
		$this->gFileSourceExploded = explode('.', $this->gFile);
		$this->gFileSourceExplodedReverse = array_reverse($this->gFileSourceExploded);
		return array($this->gFileSourceExploded, $this->gFileSourceExplodedReverse);}
		
		
	private function RegMode(){
		global $Gougnon;
			$this->getgFileSourceExploded();		
			$this->fileType = ((count($this->gFileSourceExploded)<=1)?'':'.') . strtoupper($this->gFileSourceExplodedReverse[0]);
			$this->file = substr($this->file, 0, -1*strlen($this->fileType));
			$this->toString = strtoupper((count($this->gFileSourceExploded)<=1)?'nerc': 'erc');
		return $this;}
		
		
	private function createARC_EXT($ext){
		global $Gougnon;
		return $Gougnon::createFolders($this->arcPath . $ext);
	}
		
		
	private function getARC(){
		$this->arcPath = $this->PATH . self::ARC_EXT;
		$this->arcFile = $this->arcPath . $this->fileType;
		$this->arcExists = is_dir($this->arcFile);
		
		// var_dump( $this->createARC_EXT('.MP3') );

		return $this;}
		
		
	static public function isARC($fn){
		
		$path = dirname(__FILE__) . '/';

		// $fn = ;

		if(
			
			is_file($path . self::ARC_EXT . $fn . '/default.manifest')

			|| 

			is_file($path . self::ARC_SLASH_PATH . $fn . '/default.manifest')

		){

			return true;

		}

		else{

			$ex = explode('.', $fn);

			$rex = array_reverse($ex);

			if(isset($rex[0])){

				if(is_file($path . self::ARC_EXT . '.' . $rex[0] . '/default.manifest')){

					return true;
				}

			}

		}

		return false;

	}
		
		
	private function getARCVars(){
		$this->ARCINI = $this->arcFile . '/default.manifest';
		$this->ARCINIExists = is_file($this->ARCINI);
		return $this;}
		
	private function getRenderingEngine(){
		$this->RenderingEngine = $this->PATH . self::ARC_EXT_RENDERING . $this->fileType . '/' . $this->ARC['CONFIG']['RENDERING_ENGINE'] . self::ARC_EXT_RENDERING_EXT;
		$this->RenderingEngineExists = is_file($this->RenderingEngine);
		return $this;
	}
	
	private function getSlashPathRenderingEngine(){
		$this->RenderingEngine = $this->PATH . self::ARC_SLASH_PATH_RENDERING . $this->pathType . '/' . $this->ARC['CONFIG']['RENDERING_ENGINE'] . self::ARC_SLASH_PATH_RENDERING_EXT;
		$this->RenderingEngineExists = is_file($this->RenderingEngine);
		return $this;
	}
	
		
		
		
	/* Control de l'accès à partir du ARC */
	private function controlAccessAllow($access, $excludes, $return = false){
		$this_ = $this;

		$this->controlAccessError = true;

		Gougnon::clientsRefererControlAccess('-allow', explode(',', $access), explode(',', $excludes), function($code) use ($this_, $return){

			$this_->controlAccessActived = true;

			if($return===false){

				$this_->eventOn('ERROR.403', $code);

				$this_->close();

			}

		});

	}
		
	private function controlAccessDeny($access, $excludes, $return = false){
		$this_ = $this;

		$this->controlAccessError = true;

		Gougnon::clientsRefererControlAccess('-deny', explode(',', $access), explode(',', $excludes), function($code) use ($this_, $return){

			$this_->controlAccessActived = true;

			if($return===false){

				$this_->eventOn('ERROR.403', $code);

				$this_->close();

			}

		});

	}
		
	private function getControlAccessFromARCMode($ctrl){
	
		$scrt = explode(' from ', $ctrl);
	
		$accessMode = (isset($scrt[0]))?trim(strtolower($scrt[0])):FALSE;

		$this->controlAccessMode = $accessMode;

		return [$accessMode, (isset($scrt[1]))?strtolower($scrt[1]):FALSE ];
		
	}
		
	private function setControlAccessFromARC($ctrl, $excludes = [], $return = false){
	
		$strctrl = $this->getControlAccessFromARCMode($ctrl);
	
		$accessMode = $strctrl[0];
	
		$access = $strctrl[1];
		
		if($accessMode=='allow'){$this->controlAccessAllow($access, $excludes, $return);}

		if($accessMode=='deny'){$this->controlAccessDeny($access, $excludes, $return);}
			
		return $this;

	}
	
		
		
	protected function requireARCRender($arc){
		$arcRender = $this->PATH . self::ARC_EXT_RENDERING . $arc . self::ARC_EXT_RENDERING_EXT;
		$arcRenderExists = is_file($arcRender);
			if($arcRenderExists==FALSE){$this->eventOn('ERROR.REQUIRE.RENDERING.ENGINE.NOT.FOUND');}
			else{require $arcRender;}
	}
	
	public function requireARCRenderClass($class){
		$arcClass = $this->PATH . self::ARC_EXT_RENDERING . $class . self::ARC_EXT_RENDERING_CLASS_EXT;
		$arcClassExists = is_file($arcClass);
			if($arcClassExists==FALSE){$this->eventOn('ERROR.REQUIRE.RENDERING.ENGINE.CLASS.NOT.FOUND');}
			else{require $arcClass; }
	}
			
	
		
		
	
	public function getSlashPath(){
		$path = $this->gFile;
		$slash = explode('/', $path);
		$this->ARCINI = $this->PATH . self::ARC_SLASH_PATH . strtoupper($slash[0]) . '/default.manifest';
		$this->ARCINIExists = (is_file($this->ARCINI))?true: false;
		$this->concatenate = $slash;
		$this->pathType = strtoupper($this->concatenate[0]);
		return (!$this->ARCINIExists)?false:$this->ARCINI;
	}
		
		
	protected function requireSlashPathARCRender($arc){
		$arcRender = $this->PATH . self::ARC_SLASH_PATH_RENDERING . $arc . self::ARC_EXT_RENDERING_EXT;
		$arcRenderExists = is_file($arcRender);
			if($arcRenderExists==FALSE){$this->eventOn('ERROR.REQUIRE.RENDERING.ENGINE.NOT.FOUND');}
			else{require $arcRender;}
	}
	
	public function requireSlashPathARCRenderClass($class){
		$arcClass = $this->PATH . self::ARC_SLASH_PATH_RENDERING . $class . self::ARC_EXT_RENDERING_CLASS_EXT;
		$arcClassExists = is_file($arcClass);
			if($arcClassExists==FALSE){$this->eventOn('ERROR.REQUIRE.RENDERING.ENGINE.CLASS.NOT.FOUND');}
			else{require $arcClass; }
	}
			
	
		
		
		
	
		
		
	static public function GLOBALS($var, $alt = false){return (isset($GLOBALS[$var]))?$GLOBALS[$var]:$alt;}
	static public function _SERVER($var, $alt = false){return (isset($_SERVER[$var]))?$_SERVER[$var]:$alt;}
	static public function _GET($var, $alt = false){return (isset($_GET[$var]))?$_GET[$var]:$alt;}
	static public function _POST($var, $alt = false){return (isset($_POST[$var]))?$_POST[$var]:$alt;}
	static public function _FILES($var, $alt = false){return (isset($_FILES[$var]))?$_FILES[$var]:$alt;}
	static public function _REQUEST($var, $alt = false){return (isset($_REQUEST[$var]))?$_REQUEST[$var]:$alt;}
	static public function _SESSION($var, $alt = false){return (isset($_SESSION[$var]))?$_SESSION[$var]:$alt;}
	static public function _ENV($var, $alt = false){return (isset($_ENV[$var]))?$_ENV[$var]:$alt;}
	static public function _COOKIE($var, $alt = false){return (isset($_COOKIE[$var]))?$_COOKIE[$var]:$alt;}
	


	/* utils */
	public function getCFileName(){

		$is = isset($this->concatenate);

		if($is){

			$row = count($this->concatenate);
			if($row==1){
				$file = false;
			}
			else{
				$f=[];
				for($x=1; $x<$row; $x++) {
					array_push($f, $this->concatenate[$x]);
				}
				$file = implode('/', $f);
			}

			return (is_bool($file))?false:$file;

		}

		else{
			return false; 
		}

	}



	
	/* Gestion d'erreur */
	public function SetMode($mode){
		
		switch($mode){
		
			case '-debug':
				$this->mode = '-debug';
				error_reporting(E_ALL);
				// error_log();
				break;
				
			case '-release':
				$this->mode = '-release';
				error_reporting(0);
				break;
				
			}
			
		}
		

		
	
	/* Gestion des fichier meta */
	static public function newMeta($file){
		if(!is_file($file)){return false;}

		$dataHash = _nativeCrypt::_sha256(file_get_contents($file));
		$basename = basename($file);

		$meta = new SimpleXMLElement('<META/>');
		$meta->originalFileName = $file . self::META_EXT;

		$meta->addChild('hash', $dataHash);
		$meta->addChild('filename', $basename);
		$meta->addChild('datetime', date(_native::DATETIME_NUM));
		return $meta;
	}
		
	static public function renameFileWithMeta($old, $new){
		if(!is_string($old)){return false;}
		if(!is_string($new)){return false;}
		if(!is_file($old)){return false;}

		rename($old, $new);
		rename($old . self::META_EXT, $new . self::META_EXT);

		return true;
	}
		
	static public function createMeta($meta){
		if(!is_object($meta)){return false;}
		$meta->createFileResponses = Gougnon::createFile($meta->originalFileName, $meta->asXML());
		return $meta;
	}
		
	static public function getMeta($file){
		if(!is_file($file)){return false;}

		$m = $file . self::META_EXT;

		if(!is_file($m)){return false;}
		
		$c = file_get_contents($m);
$ctn = <<<XML
{$c}
XML;
		return new SimpleXMLElement($ctn);
	}
		
	static public function deleteMeta($file){
		if(!is_file($file)){return false;}
		$fileName = $file . '.meta';
		if(is_file($fileName)){@unlink($fileName);}
		return $meta;
	}
		


}
	





	
	
	
	
	
	
	
	
/*

	Historique du registre // DEBUT /////////////////////////////

*/
class RegisterHistories extends Register{


	/*
		Visites
	*/
		CONST _VISIT_KEY = 'visits';

		CONST _VISIT_HIT = 'hits';

		CONST _VISIT_KEY_PERIOD = 'visits.period';

		CONST _VISIT_SESSION_NAME = 'ggn.visits.timer';



	/*
		Enregistrement
	*/
		CONST _RECORDS = '.records';


	/*
		Compteur d'entré	
	*/
		CONST _COUNTER = '.counter';

		CONST _COUNTER_LIMIT = 512;



	static public function Dir($Path = ''){

		return dirname(__FILE__) . '/RSRC_HISTORIES/' . (is_string($Path) ? $Path . '/' : '' );

	}



	static protected function _Counter($Type = false, $Content = false){

		if(is_string($Type)){

			$Path = self::Dir($Type);

			$LastCounter = self::GetLastCounter($Type);

			$File = $Path . $LastCounter . self::_COUNTER;

			if(!is_dir($Path)){

				\Gougnon::createFolders($Path);

			}

			if(is_array($Content)){

				$length = count($Content);

				if($length > self::_COUNTER_LIMIT){

					$File = $Path . ($LastCounter + 1) . self::_COUNTER;

					$rContent = array_reverse($Content);

					$Content = isset($rContent[0]) ? [$rContent[0]] : [];

				}

			}

			if(!is_array($Content) && !is_object($Content)){

				$Content = [];

			}

			return \Gougnon::createFile($File, json_encode($Content, GStorages::JSON_OPT() ) );

		}

		return false;

	}



	static public function GetLastCounter($Type = ''){

		if(is_string($Type)){

			$Path = self::Dir($Type);

			if(is_dir($Path)){

				$f = 0;

				$Counters = \Gougnon::scanFolder($Path);

				foreach ($Counters as $key => $counter) {

					if(substr($counter, -1 * strlen(self::_COUNTER)) == self::_COUNTER){

						$f++;

					}
					
				}

				return ($f>0) ? $f-1 : $f;

			}

			else{

				return 0;

			}

		}

		return 0;

	}



	static public function Load($Type = ''){

		$Path = self::Dir($Type);

		$Counter = $Path . self::GetLastCounter($Type) . self::_COUNTER;

		if(!is_file($Counter)){

			$New = self::_Counter($Type);

			if($New){

				return [];

			}

			else{

				return false;

			}

		}

		else{

			$Get = file_get_contents($Counter);

			try{

				return json_decode($Get, GStorages::JSON_OPT() );
				
			}

			catch(Exception $e){

				return [];

			}

		}

	}

	

	static public function Base(){

		$Path = self::Dir();

		$File = $Path . self::_RECORDS;

		$IsFile = is_file($File);

		if($IsFile){

			$Data = file_get_contents($File);

			return json_decode($Data, GStorages::JSON_OPT() );

		}

		return false;

	}

	

	static protected function UpdateBase($Record, $Mime = false){

		$Path = self::Dir();

		$File = $Path . self::_RECORDS;

		$IsFile = is_file($File);
		
		$ctime = time();

		$Visited = true;
					

		if(!$IsFile){

			$Data = [];

			if(!is_dir($Path)){\Gougnon::createFolders($Path);}

		}

		
		if($IsFile){

			$Get = file_get_contents($File);

			$Data = json_decode($Get, GStorages::JSON_OPT() );

		}


		if(is_array($Record)){

			foreach ($Record as $Column) {

				if(strtolower($Column)==self::_VISIT_KEY) {


					if(!(

						substr_count($Mime, 'text/plain') 

						|| substr_count($Mime, 'text/html')

					)){

						$Visited = false;

						continue;

					}


					$limit = \_native::varn('REGISTER_VISITORS_TIME_LIMIT');

					$limit = !is_numeric($limit) ? 0 : $limit;


					$time = $ctime + $limit;


					if(

						is_string($Mime)  

					){

						if(!isset($_SESSION[self::_VISIT_SESSION_NAME])){

							$_SESSION[self::_VISIT_SESSION_NAME] = $time;

						}

						else{

							$timeout = $_SESSION[self::_VISIT_SESSION_NAME]; 

							if($timeout > $ctime){

								$Visited = false;

								continue;

							}

							else{

								$_SESSION[self::_VISIT_SESSION_NAME] = $time; 

							}


						}

					}

				}


				$Data[$Column] = isset($Data[$Column]) ? $Data[$Column] : 0;

				$Data[$Column]++;

				
			}

		}


		/* Enregistrement de la base */

		if($Visited === true){

			$oDPd = isset($Data['visits.period']) ? $Data['visits.period'] : [];

			$DPd = [];


			foreach (['Y', 'm', 'W', 'd', 'H', 'i', 's'] as $vt) {

				$t = date($vt);

				$f = $vt . ':' . $t;

				if(isset($oDPd[$f])){

					$DPd[$f] = $oDPd[$f] + 1;

				}
				
				else{

					$DPd[$f] = 0;

				}

			}

			$Data[self::_VISIT_KEY_PERIOD] = $DPd;

		}

		return \Gougnon::createFile($File, json_encode($Data, GStorages::JSON_OPT() ) );

	}

	

	public function Record($Type = false, $Mime = false, $Mode = false, $User = false){

		if(is_string($Type)){

			$Entries = self::Load($Type);

			if(is_array($Entries)){

				$Length = count($Entries);

				$Entries[$Length] = [

					'mime' => $Mime

					,'mode' => $Mode

					,'uri' => \Gougnon::pageUrlSelf()

					,'client' => $_SERVER['HTTP_USER_AGENT']

					,'user' => ((is_array($User) && isset($User['UKEY'])) ? $User['UKEY'] : false)

					,'ip' => __IP__

					,'time' => time()

				];

				if(self::_Counter($Type, $Entries)){

					self::UpdateBase([

						self::_VISIT_KEY

						, self::_VISIT_HIT

						, $Type

						, $Mime

						, $Mode

					], $Mime);

				}

			}

			return true;

		}

		return false;

	}

}
	
/*

	Historique du registre // FIN /////////////////////////////

*/	





	
	
	
	
	
	
	
	
/*
==========RENDER=================
*/
class Render extends Register{
	
	const T_NORM = '-nomalize';
	const T_NTS = '-native.script';
	const T_NTSC = '-native.script.code';
	const T_NRMSC = '-native.normalize.script.code';
	const T_NDCWR = '-native.doc.write';
	
	
	const attrLib = 'LIB';
	const attrPHP = 'PHP';
	const attrCSS = 'CSS';
	const attrJS = 'JS';
	const attrHTML = 'HTML';
	const attrAUN = 'AUN';
	const attrSYSJS = 'FRAMEWORK-JS';
	const attrSYSCSS = 'FRAMEWORK-CSS';
	
	
	const _JSLib = '-:js.lib';
	const _PHPLib = '-:php.lib';
	const _HTMLLib = '-:html.lib';
	const _CSSLib = '-:css.lib';
	
	
	static public function fileSources($file){
		return (is_file($file))?file_get_contents($file):FALSE;
		}
	
		
		
	static public function serverRootVars($data){
		global $_Gougnon;
		foreach($_Gougnon as $n=>$v){$data = str_replace('{%'.$n.'%}', $v, $data);}
		return $data;}
	
		
		
	static public function loadFile($dom,$file){
		return @$dom->load($file);
		}
	
	
	static public function innerNodeByTagName($node, $name){
		$C14N = $node->C14N();
		$res = substr($C14N, strlen('<'.$name.'>'), -1*(strlen('</'.$name.'>')));
		return $res;}
		
		
	static public function nodeScanner($toScan){
		$data = array();
		$data['NODES'] = array();
		$data['CHILDNODES'] = array();
		$isset = @isset($toScan->childNodes);
			if($isset){
				foreach($toScan->childNodes as $node){
					$data['NODES'][strtoupper($node->nodeName)] = (isset($data['NODES'][strtoupper($node->nodeName)]))?$data['NODES'][strtoupper($node->nodeName)]: array();
					$data['CHILDNODES'][strtoupper($node->nodeName)] = (isset($data['CHILDNODES'][strtoupper($node->nodeName)]))?$data['CHILDNODES'][strtoupper($node->nodeName)]: array();
					array_push($data['NODES'][strtoupper($node->nodeName)], $node);
					array_push($data['CHILDNODES'][strtoupper($node->nodeName)], self::nodeScanner($node));
					}
				}
		return $data;
		}
	
	
	static public function nodeScannerLast($toScan){
		$data = array();
		$data['NODES'] = array();
		$data['CHILDNODES'] = array();
		$isset = @isset($toScan->childNodes);
			if($isset){
				foreach($toScan->childNodes as $node){
					$scnlen = count($scn);
					$data['NODES'][strtoupper($node->nodeName)] = $node;
					$data['CHILDNODES'][strtoupper($node->nodeName)] = self::nodeScannerSchemas($node);
					}
				}
		return $data;
		}
		
		
	static public function getNodeAttributes($node){
		$attrib=array();
		if(isset($node)){
			if(isset($node->attributes)){
				if($node->hasAttributes()){
					foreach($node->attributes as $attr){
						$attrib[strtolower($attr->nodeName)] = $attr->nodeValue;
						}
					}
				}
			}
		return $attrib;}
		
	
	
	static public function sterilizeString($string){
		return addslashes($string);
		}
	
	
	static public function writeQuotes($string){
		$string = self::sterilizeString($string);
		return str_replace('\"', '"', $string);
		}
	
	
	static public function toJSDocWrite($string){
		$string = htmlentities($string, ENT_QUOTES, 'utf-8');
		$string = self::alignHString($string);
		return str_replace('&lt;', '<', str_replace('&gt;', '>', $string ) );
		}
		
		
	static public function alignHString($string){
		$a = explode("	", $string);$b=array();
		for($x=0; $x<count($a); $x++){ array_push($b, rtrim(ltrim($a[$x]))); }
		return implode(" ", $b);
		}
		
	
	
	
	static public function nativeHTML($doctype, $head,$body){
		$html = '';
		$html .= '<!-- Gougnon Native HTML -->';
		$html .= '<!DOCTYPE '.$doctype.'>';
		$html .= '<HTML>';
		$html .= '<HEAD>';
		$html .= $head;
		$html .= '</HEAD>';
		$html .= '<BODY>';
		$html .= $body;
		$html .= '<!-- Copyright Gougnon '.gmdate('Y').' GOBOU Y. Yannick - Code Source du Générateur - Tous droits réservés -->';
		$html .= '</BODY>';
		$html .= '</HTML>';
		return $html;
		}
		
		
		
	static public function nativeHTMLProtected($doctype, $head,$body){
		$html = '';
		$html .= '_native::write(\'<!DOCTYPE '.$doctype.'>';
		$html .= '<HTML>';
		$html .= '<HEAD>';
		$html .= '<!-- Gougnon Native HTML -->\');';
		$html .= $head;
		$html .= '_native::write(\'</HEAD>';
		$html .= '<BODY>\');';
		$html .= $body;
		$html .= '_native::write(\'<!-- Copyright Gougnon 2013 - '.gmdate('Y').' GOBOU Y. Yannick - Code Source du Générateur - Tous droits réservés -->';
		$html .= '</BODY>';
		$html .= '</HTML>\');';
		return $html;
		}
		
		
		
	
		
	}
	
 
 
 
?>