<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS GAPPS_PHP
	PAGE cores/_natives/PHP/Register.core.g/ARC_ENGINE_RENDING/.APP/default.arc-render
======================================================
	
*/

/*
	CLASS 'GAPPS_PHP'
*/

global $_Gougnon;

if(!class_exists('_native')){exit('Class Native introuvable');}
if(!class_exists('Gougnon')){_native::wCnsl('Class Gougnon introuvable');}


/* Class GUSERS */
if(!class_exists('GUSERS')){
	_native::PHPCore('ggn.core.users');
}

/* Class GAPPS */
if(!class_exists('GAPPS')){
	_native::PHPCore('ggn.core.applications');
}

	/* Verification */
	if(!isset($_Gougnon)){
		_native::wCnsl('Erreur Données Manquantes: Variable Gougnon ');
	}

	if(!class_exists('GUSERS')){
		_native::wCnsl('Erreur Classe Manquantes: Gougnon Users ');
	}

	if(!class_exists('GAPPS')){
		_native::wCnsl('Erreur Classe Manquantes: Gougnon Users ');
	}


	$_NATIVE_VARS = 'USERS_SESSION_DURATION USERS_SESSION_REMEMBER_DURATION';

	/* Variables de type numérique */
	$_NATIVE_VARS_EXPLODE = explode(' ',$_NATIVE_VARS);
	for($x=0;$x<count($_NATIVE_VARS_EXPLODE);$x++){
		if(!is_numeric(_native::varn($_NATIVE_VARS_EXPLODE[$x]))){
			_native::wCnsl('Erreur Données incorrectes: Gougnon Native "'.$_NATIVE_VARS_EXPLODE[$x].'" n\'est pas du type numérique ');
			break;
		}
	}



	
?>