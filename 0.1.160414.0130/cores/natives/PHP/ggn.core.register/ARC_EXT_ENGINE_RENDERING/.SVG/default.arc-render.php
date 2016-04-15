<?php
	
	/* Chargement du Noyau */



	/* Paramètres */
	define('DEFAULT_STYLE', self::_REQUEST('style'));

	$GetColors = $this::_REQUEST('color', false);

	$Size = explode('x', $this::_REQUEST('size', '64x64'));
		$Width = isset($Size[0]) && is_numeric($Size[0]) ? $Size[0]: 64;
		$Height = isset($Size[1]) && is_numeric($Size[1]) ? $Size[1]: $Width;
	
	
	
	
	/* Chargement du Noyau */
	$Style = [];
	$jsCore = _native::JSCore('ggn.core');
	$CSSCore = _native::CSSCore('ggn.core');
		$CSSCore->Style(DEFAULT_STYLE);
	


	if(is_string($GetColors)){
		foreach (explode(',', $GetColors) as $key => $value) {
			$color[$key] = $value;
		}
	}


	

	$Style['color:hover'] = isset($color[0]) ? $color[0]: $CSSCore->styleProperty('font-color:hover');
	$Style['color'] = isset($color[1]) ? $color[1]: $CSSCore->styleProperty('font-color');
	
	
	include $this->file;
	
	
?>