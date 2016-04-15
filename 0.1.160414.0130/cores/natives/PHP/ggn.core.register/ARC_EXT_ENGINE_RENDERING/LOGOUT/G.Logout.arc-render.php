<?php
/*
	Copyright GOBOU Y. Yannick
	
*/
global $_Gougnon;


$GLOGIN_NATIVE_VARS = 'LOGIN_PAGE';

/* Variable exists */
$GLOGIN_NATIVE_VARS_EXPLODE = explode(' ',$GLOGIN_NATIVE_VARS);
for($x=0;$x<count($GLOGIN_NATIVE_VARS_EXPLODE);$x++){
	if(!_native::varn($GLOGIN_NATIVE_VARS_EXPLODE[$x])) {
		_native::wCnsl('Erreur Données Manquantes: Gougnon Native "'.$GLOGIN_NATIVE_VARS_EXPLODE[$x].'" ');
		break;
	}
}




/* Class GUSERS */
if(!class_exists('GUSERS')){
	_native::PHPCore('ggn.core.users');
}



/* Class GAPPS */
if(!class_exists('GAPPS')){
	_native::PHPCore('ggn.core.applications');
}





/* Existance d'utilisateur connecté */
$_USER = GSystem::requires('users.login/secures');




/* Redirection ers l'espace membre */
// if(!is_array($_USER)){
// 	// header('location:'._native::setvar(_native::varn('LOGIN_PAGE')) );exit;
// }




$this->requireARCRenderClass('LOGIN/G.Login');



$render = new GLogin(
	(isset($_GET['next']))?$_GET['next']:false
	,(isset($_GET['previous']))?$_GET['previous']:false
	,(isset($_GET['app']))?$_GET['app']:false
	);




/* Application à deconnectée */
$destroyResponses = $render->destroySession();







/* ===================== CORPS ================================== */

$render->_theme->Register=$this;
$render->_theme->render=$render;

$render->_theme->_USER=$_USER;



// $render->_theme->brique('logout.header');

$render->_theme->brique('logout.app');

// $render->_theme->brique('logout.footer');

$render->engine();
	
?>