/* Fichier : Gougnon.CSS.framework.cssg, Nom : Gougnon CSS Framework, version 0.0.1.140103.1748, site: http://gougnon.com , License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU */
<?php
/* PARAMETRES */
require self::commonFile('.settings');



/* FEUILLE DE STYLE */
_native::write('a, a img{');
	_native::write('outline:0px solid !important;');
	_native::write('border:0px solid;');
	_native::write('}');

_native::write('a{');
	_native::write('text-decoration:none;');
	_native::write('color:'.$Core->styleProperty('font-color:hover').';');
	_native::write('}');

_native::write('a:hover{');
	_native::write('text-decoration:underline;');
	_native::write('}');

_native::write('body{');
	_native::write('background-color:'.$Core->styleProperty('background-color').';');
	_native::write('color:'.$Core->styleProperty('font-color').';');
	_native::write('font-family:'.$Core->styleProperty('font-family').';');
	_native::write('font-size:'.$Core->styleProperty('font-size').';');
	_native::write('}');




/* BUTTON */
_native::write('button,input[type="reset"],input[type="submit"],input[type="button"]{');
	_native::write('color:'.$Core->styleProperty('button-font-color').';');
	_native::write('border:1px solid '.$Core->styleProperty('button-border-color').' !important;');
	_native::write('background-color:rgba('.$Core->styleProperty('button-background-color-rgb').',.10);');
	_native::write('padding:5px 7px;');
	_native::write('font-family:'.$Core->styleProperty('font-family').';');
	_native::write('font-size:'.$Core->styleProperty('font-size').';');
	_native::write( $Core::browserKey('transition', 'background-color 0.25s ease-in') );
	_native::write('}');
	
_native::write('button:hover,input[type="reset"]:hover,input[type="submit"]:hover,input[type="button"]:hover');
_native::write(',button.active,input[type="reset"].active,input[type="submit"].active,input[type="button"].active{');
	_native::write('color:'.$Core->styleProperty('button-font-color:hover').';');
	_native::write('background-color:rgba('.$Core->styleProperty('button-background-color-rgb:hover').',.10);');
	_native::write('border:1px solid '.$Core->styleProperty('button-background-color:hover').' !important;');
	// _native::write( $Core::browserKey('box-shadow', $Core->styleProperty('button-shadow:hover')) );
	_native::write( $Core::browserKey('transition', 'background-color 0.25s ease-out') );
	_native::write('}');


_native::write('button.active:hover,input[type="reset"].active:hover,input[type="submit"].active:hover,input[type="button"].active:hover{');
	_native::write('background-color:rgba('.$Core->styleProperty('button-background-color-rgb:hover').',.45);');
	_native::write('}');




/* TEXTFIELD */
_native::write('textarea,input[type="text"],input[type="password"],select{');
	_native::write('color:'.$Core->styleProperty('textfield-font-color').';');
	_native::write('padding:10px 12px;');
	// _native::write('border:1px dashed red !important;');
	_native::write('border:1px solid '.$Core->styleProperty('textfield-border-color').' !important;');
	_native::write('background-color:rgba('.$Core->styleProperty('textfield-background-color-rgb').',.10);');
	_native::write('font-family:'.$Core->styleProperty('font-family').';');
	_native::write('font-size:'.$Core->styleProperty('font-size').';');
	_native::write( $Core::browserKey('border-radius', '0px') );
	_native::write( $Core::browserKey('transition', 'background-color 0.25s ease-in') );
	_native::write('}');

_native::write('textarea:hover,input[type="text"]:hover,input[type="password"]:hover,textarea:focus,input[type="text"]:focus,input[type="password"]:focus,select:hover,select:focus{');
	_native::write('color:'.$Core->styleProperty('textfield-font-color:hover').';');
	_native::write('background-color:rgba('.$Core->styleProperty('textfield-background-color-rgb:hover').',.10);');
	// _native::write( $Core::browserKey('box-shadow', $Core->styleProperty('textfield-shadow:hover')) );
	_native::write('outline:0px dashed transparent !important;');
	_native::write('}');

	
	

/* GOUGNON USER INTERFACE */
$GUI['background-image-only'] = 'background-repeat:no-repeat;background-position:center center;';



/* DIMENSIONS LARGEUR-HAUTEUR PREFINIES */
$GUI['size']=array(16,25,32,48,64,70,86,128,256,512,768,1024);
for($size=0; $size<count($GUI['size']); $size++){
	_native::write('.gui.x'.$GUI['size'][$size].'{width:'.$GUI['size'][$size].'px;height:'.$GUI['size'][$size].'px;}');
}

	
	

	
/* Feuille */
_native::write('.gui.sheet, .gui.underSheet, .gui.preloader{');
	_native::write('position:absolute;');
	_native::write('top:0px;');
	_native::write('left:0px;');
	_native::write('z-index:10 !important;');
	_native::write('width:100%;');
	_native::write('padding:0px !important;');
	_native::write('margin:0px !important;');
	_native::write('}');

_native::write('.gui.underSheet{');
	_native::write('z-index:5 !important;');
	_native::write('}');

	

/* Preloader */
_native::write('.gui.preloader{');
	_native::write('position:fixed;');
	_native::write('height:100%;');
	_native::write('z-index:1;');
	_native::write('color:'.$Core->styleProperty('font-color').';');
	_native::write('background-color:'.$Core->styleProperty('background-color').';');
	// _native::write('background-color:rgba('.$Core->styleProperty('background-color-rgb').',.70);');
	_native::write('}');

_native::write('.gui.preloader div.title{');
	_native::write('padding:0px;');
	_native::write('}');

_native::write('.gui.preloader div.about{');
	_native::write('margin-top:-10px;');
	_native::write('}');




/* ICONES */
_native::write('.gui.icon{'.$GUI['background-image-only'].'}');
_native::write('.gui.icon.x16{}');
_native::write('.gui.icon.x16.infos{background-image:url('.HTTP_HOST.'icons/infos-w16.png);}');
_native::write('.gui.icon.x16.warning{background-image:url('.HTTP_HOST.'icons/warning-w16.png);}');






/* Gougnon UI Notice API */
_native::write('div.gui.toast-api{');
_native::write('background-color:'.$Core->styleProperty('notice-background-color').';');
_native::write('color:'.$Core->styleProperty('notice-font-color').';');
_native::write('z-index:999;');
_native::write('}');

/* Gougnon Notice API Bubble */
_native::write('div.gui.toast-api.bubble{');
_native::write('padding:8px 15px;');
_native::write('}');

/* Gougnon Notice API Slide */
_native::write('div.gui.toast-api.slide{');
_native::write('padding:8px 15px;');
_native::write('height:18px;');
_native::write('}');

_native::write('div.gui.toast-api.slide > div.track{');
_native::write('');
_native::write('}');







/* LockBox Transparent */
_native::write('div.big.transparent[gui-api="g.lockbox"]{');
_native::write('}');

_native::write('div.light.transparent[gui-api-lockbox="ultra.light"]{');
_native::write('background-color: transparent;');
_native::write('}');

_native::write('div.box.transparent[gui-api-lockbox="ultra.box"]{');
_native::write('background-color: transparent;');
_native::write('}');











/* Gougnon UI LockBox API */
_native::write('div[gui-api="g.lockbox"]{}');
_native::write('div[gui-api="g.lockbox"] > div[gui-api-lockbox="ultra.light"]{');
_native::write('background-color: rgba(0,0,0,.75);');
_native::write('}');
_native::write('div[gui-api="g.lockbox"] > div[gui-api-lockbox="ultra.box"]{');
_native::write('background-color: #fff;');
_native::write('}');





/* Gougnon UI Progress API */
_native::write('div[gui-api="g.progress"]{position:relative;overflow:hidden;}');
_native::write('div[gui-api="g.progress"][gui-api-progress="g.progress.bar"]{');
_native::write('background-color:#DDD;');
_native::write('min-height:1px;');
_native::write('}');

_native::write('div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="purcent.bar"]');
_native::write(',div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="cache.bar"]');
_native::write(',div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="text.bar"]');
_native::write('{');
_native::write('position:absolute;');
_native::write('width:0px;');
_native::write('min-height:1px;');
_native::write('height:100%;');
_native::write('overflow:hidden;');
_native::write('}');

_native::write('div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="purcent.bar"] > div[gui-api-progress="label.bar"]');
_native::write(',div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="cache.bar"] > div[gui-api-progress="label.bar"]');
_native::write(',div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="text.bar"] > div[gui-api-progress="label.bar"]');
_native::write('{');
_native::write('text-overflow:hidden;');
_native::write('whiteSpace:nowrap;');
_native::write('font-size:11px;');
_native::write('overflow:hidden;');
_native::write('}');



_native::write('div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="purcent.bar"]{');
_native::write('background-color: #ff4800;');
_native::write('}');
_native::write('div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="purcent.bar"] > div[gui-api-progress="label.bar"]{');
_native::write('color:#fff;');
_native::write('}');



_native::write('div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="cache.bar"]{');
_native::write('background-color: #CFCFCF;');
_native::write('}');
_native::write('div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="cache.bar"] > div[gui-api-progress="label.bar"]{');
_native::write('color:#222;');
_native::write('}');



_native::write('div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="text.bar"]{');
_native::write('background-color: transparent !important;');
_native::write('width:100%;');
_native::write('height:100%;');
_native::write('}');
_native::write('div[gui-api-progress="g.progress.bar"] > div[gui-api-progress="text.bar"] > div[gui-api-progress="label.bar"]{');
_native::write('color:#222;');
_native::write('}');



?>
