<?php
	

global $_Gougnon;



/* Class GAPPS */
// if(!class_exists('GUSERS')){
// 	_native::PHPCore('ggn.core.users');
// }





// $GLOGIN_NATIVE_VARS = 'LOGIN_PAGE USERS_SESSION_LOCATION USERS_SESSION_MANAGER_PLUGIN_NAME USERS_SESSION_MANAGER_PLUGIN_PLG SYSTEM_THEME';
// _native::keyExists(explode(' ',$GLOGIN_NATIVE_VARS));







/* Application */
if(_native::varn('COMINGSOONPAGE_ACTIVE')!=='1'){
	_native::wCnsl('Cette page a été désactivé par le gestionnaire');
}

$theme = (new dpo('html'))->load(_native::varn('COMINGSOONPAGE_THEME'));
$theme->brique('comingsoon.page');
$theme->generate();


	
?>