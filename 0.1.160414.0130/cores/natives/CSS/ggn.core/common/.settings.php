<?php

global $_DPO_DEVICE, $_Gougnon;




/* PARAMETRES */
if(!isset($GUI) || !is_array($GUI)){



$GUI=[];

$Core = ((class_exists('GougnonCSS')) && @(self::NAME==GougnonCSS::NAME)) ? $this: (isset($CSSCore)?$CSSCore:$Core);


$bgOnly = 'background-repeat:no-repeat;background-position:center center;';

$textEllipsis = 'white-space:nowrap;overflow:hidden;text-overflow:ellipsis;';


/* OPTIONS */
$GUI['option.responsive'] = (isset($option['responsivity']))?(($option['responsivity']=='1')?true:false):true;




/* GOUGNON USER INTERFACE */

	/* CHEMIN */

	$Path = HTTP_HOST . 'ggn.default/';

	$SysPath = HTTP_HOST . 'ggn.system/';

	$GAppsPath = HTTP_HOST . 'ggn.apps/';

	$IconPath = HTTP_HOST . 'x.icons/';







	/* VARIANTE DE COULEUR */
	$GUI['STANDARD-COLOR-VARIANT'] = 20;






	/* TON DE COULEUR */

	$GUI['LIGHT_TONE'] = $Core->styleProperty('palette-light-color');

	$GUI['LIGHT_TONE_RGB'] = implode(',',Gougnon::HEXtoRGB($GUI['LIGHT_TONE']));

	$GUI['LIGHT_GRAY'] = '#888';

	$GUI['LIGHT_GRAY_RGB'] = implode(',',Gougnon::HEXtoRGB($GUI['LIGHT_GRAY']));

	$GUI['DARK_TONE'] = $Core->styleProperty('palette-dark-color');

	$GUI['DARK_TONE_RGB'] = implode(',',Gougnon::HEXtoRGB($GUI['DARK_TONE']));



	

	/* TON DE COULEUR FILTRE COULEUR IMAGE  */

	$GUI['IMAGE_FILTER_LIGHT_TONE'] = '?mode=-gd&filter=colorize:'.$Core::rgbToParam($GUI['LIGHT_TONE_RGB']).'';

	$GUI['IMAGE_FILTER_GRAY_TONE'] = '?mode=-gd&filter=colorize:'.$Core::rgbToParam($GUI['LIGHT_GRAY_RGB']).'';

	$GUI['IMAGE_FILTER_DARK_TONE'] = '?mode=-gd&filter=colorize:'.$Core::rgbToParam($GUI['DARK_TONE_RGB']).'';

	$GUI['IMAGE_FILTER_TEXT_COLOR_TONE'] = '?mode=-gd&filter=colorize:'.$Core::rgbToParam($Core->styleProperty('font-color-rgb')).'';

	$GUI['IMAGE_FILTER_TEXT_HOVER_TONE'] = '?mode=-gd&filter=colorize:'.$Core::rgbToParam($Core->styleProperty('font-color-rgb:hover')).'';

	$GUI['IMAGE_FILTER_NORMAL_PATTERN_TONE'] = '?mode=-gd&filter=colorize:'.$Core::rgbToParam($Core->styleProperty('background-color-rgb')).'';

	$GUI['IMAGE_FILTER_DARK_PATTERN_TONE'] = '?mode=-gd&filter=colorize:'.$Core::rgbToParam($Core->styleProperty('dark-background-color-rgb')).'';


	foreach(explode(',', $Core::COLOR_PATTERN) as $name){

		$name = trim($name);	

		$GUI['IMAGE_FILTER_' . strtoupper($name) . '_TONE'] = '?mode=-gd&filter=colorize:'.$Core::rgbToParam($Core->styleProperty('pattern-' . ($name) . '-color')).'';

	}





	/* ARRIÈRE PLAN */

	$GUI['background-image-only'] = 'background-repeat:no-repeat;background-position:center center;';





	/* DIMENSIONS LARGEUR-HAUTEUR PREFINIES */

	$GUI['size']=array(16,25,32,48,64,70,86,96,128,256,512,768,1024);





	/* DIMENSIONS LARGEUR-HAUTEUR PREFINIES POUR LE SELECTEUR ".loading" */

	$GUI['loading.size'] = ['16','32','48','64','128'];







	/* ICONS List */

	$GUI['gui.icon.list'] = 'app browse calendar checked cross contact edit file home link music photo search setting settings video user hand shield lock unlock message group out-right out-left shutdown menu-pad send alert back forward sync-error sync-warning sync install-pkg uninstall-pkg reset-pkg create-pkg play pause plugin clean-list arrow-up arrow-down audio-off audio-on reload';
	
	$GUI['gui.icon.size'] = '32';









	$GUI['is.mobile'] = $_DPO_DEVICE->current=='-c'?false: true;




}





?>