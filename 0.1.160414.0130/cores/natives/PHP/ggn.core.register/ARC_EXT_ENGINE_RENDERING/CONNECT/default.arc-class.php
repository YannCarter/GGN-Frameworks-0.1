<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS IHTML
	PAGE cores/_natives/PHP/Register.core.g/ARC_ENGINE_RENDING/ACTIVEUSERSESSION/G.Active.User.Session.arc-render
======================================================
	
*/

/*
	CLASS 'IHTML'
*/

global $_Gougnon;

if(!class_exists('_native')){exit('Class Native introuvable');}
if(!class_exists('Gougnon')){_native::wCnsl('Class Gougnon introuvable');}


/* Class GUSERS */
if(!class_exists('GUSERS')){
	_native::PHPCore('ggn.core.users');
}

	/* Verification */
	if(!isset($_Gougnon)){
		_native::wCnsl('Erreur Données Manquantes: Variable Gougnon ');
	}

	if(!class_exists('GUSERS')){
		_native::wCnsl('Erreur Classe Manquantes: Gougnon Users ');
	}

	if(!isset(_native::varn('ACTIVESESSION_MODE')[0])){
		_native::wCnsl('Erreur Données Manquantes: Gougnon Native "ACTIVESESSION_MODE" ');
	}



	$GLOGIN_NATIVE_VARS_NUM = 'LOGIN_USERNAME_LENGTH_MIN LOGIN_USERNAME_LENGTH_MAX LOGIN_PASSWORD_LENGTH_MIN LOGIN_PASSWORD_LENGTH_MAX USERS_SESSION_DURATION USERS_SESSION_REMEMBER_DURATION';

	/* Variables de type numérique */
	$GLOGIN_NATIVE_VARS_NUM_EXPLODE = explode(' ',$GLOGIN_NATIVE_VARS_NUM);
	for($x=0;$x<count($GLOGIN_NATIVE_VARS_NUM_EXPLODE);$x++){
		if(!_native::varn($GLOGIN_NATIVE_VARS_NUM_EXPLODE[$x])){
			_native::wCnsl('Erreur Données incorrectes: Gougnon Native "'.$GLOGIN_NATIVE_VARS_NUM_EXPLODE[$x].'" n\'existe pas ');
			break;
		}
		
		if(!is_numeric(_native::varn($GLOGIN_NATIVE_VARS_NUM_EXPLODE[$x]))){
			_native::wCnsl('Erreur Données incorrectes: Gougnon Native "'.$GLOGIN_NATIVE_VARS_NUM_EXPLODE[$x].'" n\'est pas du type numérique ');
			break;
		}
	}




if(!class_exists('ActiveUserSession')){
	








	class ActiveUserSession{

		CONST TBL_USER_SESSION='NATIVE_ACTIVE_USER_SESSION';
		CONST sessionName = 'gougnon.active.user.session';
		CONST sessionPATH = 'gougnon.active.user.session.path';
		CONST sessionAPPName = 'gougnon.active.user.__app__.session';

		var $users=false;

		
		public function __construct(){
			global $GLANG,$_Gougnon;
			$this->syslang = $GLANG;
			$this->arguments = func_get_args();
			$this->username = (isset($this->arguments[0]))?(($this->arguments[0]!=false)?$this->arguments[0]:false):false;
			$this->password = (isset($this->arguments[1]))?(($this->arguments[1]!=false)?$this->arguments[1]:false):false;
			$this->remember = (isset($this->arguments[2]))?(($this->arguments[2]!=false)?strtolower($this->arguments[2]):false):false;
			$this->remember = ($this->remember=='on')?true:false;
			$this->app = (isset($this->arguments[3]))?(($this->arguments[3]!=false)?$this->arguments[3]:false):false;

			$this->mode = strtolower(_native::varn('ACTIVESESSION_MODE'));
			}
		
		





		public function validate(){
			global $_Gougnon;

			if($this->username===false){return '-username.not.found';}
			if($this->password===false){return '-password.not.found';}

			if(strlen($this->username)<_native::varn('LOGIN_USERNAME_LENGTH_MIN')){return '-username.length.min.failed';}
			if(strlen($this->username)>_native::varn('LOGIN_USERNAME_LENGTH_MAX')){return '-username.length.max.failed';}

			if(strlen($this->password)<_native::varn('LOGIN_USERNAME_LENGTH_MIN')){return '-password.length.min.failed';}
			if(strlen($this->password)>_native::varn('LOGIN_USERNAME_LENGTH_MAX')){return '-password.length.max.failed';}


			/* Utilisateurs */
			$this->users = new GUSERS($this->username, $this->password, $this->mode);
			$this->userExists = $this->users->exists();
			$this->data = (isset($this->userExists))?$this->userExists:false;

			// exit('response : ' . $this->userExists);

			if($this->userExists===TRUE){
				return TRUE;
			}

			return $this->userExists;
		}











		static public function appSessionName($app){
			return str_replace('__app__',$app,self::sessionAPPName);
		}



		public function create(){
			global $_Gougnon;

			$this->_handler = $this->users->sessionClass;
			$this->session=new $this->_handler;
			$this->session->name=self::sessionName;
			$this->session->path=self::sessionPATH;
			$this->session->type=$this->users->sessionLocation;


			$dtm=date(_native::DATETIMEM_NUM);
			$duration=($this->remember===true)?_native::varn('USERS_SESSION_REMEMBER_DURATION'):false;
				$exists = $this->session->exists(false);

				// print_r($this->app); exit;
				

				if($exists==false){
					$access =  'G/' . __IP__ . '::' . _nativeCrypt::RKCRand(_nativeCrypt::PALETTE_iALPHA . ' ' ._nativeCrypt::PALETTE_NUMERIC,64);
					$this->users->update('IDACCESS', $access);
				}

				if($exists!=false){
					$access =  $this->users->getter->data['IDACCESS'][0];
				}


			$this->session->set($access,$duration);

			if(is_string($this->app)){
				$this->_handlerApp = $this->users->sessionClass;
				$this->sessionAPP=new $this->_handlerApp;

				$this->sessionAPP->name=self::appSessionName($this->app);
				$this->sessionAPP->path=self::sessionPATH;
				$this->sessionAPP->type=$this->users->sessionLocation;
				$this->sessionAPP->set($access,$duration);
			}


		}








	}
	
}
	
	
?>