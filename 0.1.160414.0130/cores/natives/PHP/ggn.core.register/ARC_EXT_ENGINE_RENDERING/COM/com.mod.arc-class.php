<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS IHTML
	PAGE cores/_natives/PHP/Register.core.g/ARC_ENGINE_RENDING/COM/com.mod.arc-render
======================================================
	
*/

/*
	CLASS 'COM'
*/

global $_Gougnon;

if(!class_exists('_native')){exit('Class Native introuvable');}
if(!class_exists('Gougnon')){_native::wCnsl('Class Gougnon introuvable');}



/* Class GAPPS */
if(!class_exists('GCOMCore')){
	_native::PHPCore('gougnon.core.com');
}




?>