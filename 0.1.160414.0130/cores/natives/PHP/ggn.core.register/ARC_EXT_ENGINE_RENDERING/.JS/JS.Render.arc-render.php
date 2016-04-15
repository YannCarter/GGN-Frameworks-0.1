<?php
	
	/* Chargement du Noyau */
	/* Paramètres */
	define('DEFAULT_STYLE', self::_REQUEST('style'));
	
	
	
	
	/* Chargement du Noyau */
	$jsCore = _native::JSCore('ggn.core');
	$CSSCore = _native::CSSCore('ggn.core');
	
	$alert = '';
	$alert .= 'G_ALERT=function(m){var A=Gougnon||G||false,str=[];';
	$alert .= 'for(var x in arguments){str.push(arguments[x]);}';
	$alert .= 'if(A!==false){A.notice.open({html:str.join(""),delay:7*1000});}';
	$alert .= 'else{alert(str);}';
	$alert .= '};';
	
	_native::write($alert);
	
	
	
	
	include $this->file;
	
	
?>