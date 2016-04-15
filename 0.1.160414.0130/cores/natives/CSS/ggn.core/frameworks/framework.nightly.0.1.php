/* Fichier : Gougnon.CSS.framework.cssg, Nom : Gougnon CSS Framework, version 0.0.1.160119.1425, site: http://gougnon.com , License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU */
<?php






/* PARAMETRES */
require self::commonFile('.settings');

require self::commonFile('.functions');







/* Selector */
$__Selector = [

	'color'=>$Core->styleProperty('palette-light-color')

	,'background-color'=>$Core->LDColor($Core->styleProperty('palette-primary-color'), -20)

];


$Core->selector('::-moz-selection', $__Selector );

// $Core->selector('::selection', $__Selector );







/*

	ICONS // DEBUT ////////////////////

*/

	/* Dimension */

	$Core->selector('[class*="icon"].auto-size', ['font-size'=>'85%']);
	
	$Core->selector('[class*="icon"].half-size', ['font-size'=>'50%']);
	
	$Core->selector('[class*="icon"].min-size', ['font-size'=>'16px']);
	
	$Core->selector('[class*="icon"].n-size', ['font-size'=>'25px']);
	
	$Core->selector('[class*="icon"].max-size', ['font-size'=>'32px']);
	
	$Core->selector('[class*="icon"].max-size', ['font-size'=>'32px']);



	/* Couleur */

	$Core->selector('[class*="icon"].normal'.',[class*="icon"].static-normal'.',[class*="icon"].color:hover', ['fill && color'=> $Core->styleProperty('font-color') ] );

	$Core->selector('[class*="icon"].normal:hover'.',[class*="icon"].color'.',[class*="icon"].static-color', ['fill && color'=>$Core->styleProperty('palette-primary-color') ] );

	$Core->selector('[class*="icon"].dark'.',[class*="icon"].static-dark'.',[class*="icon"].light:hover', ['fill && color'=>$GUI['DARK_TONE'] ] );

	$Core->selector('[class*="icon"].light'.',[class*="icon"].static-light'. ',[class*="icon"].dark:hover', ['fill && color'=>$GUI['LIGHT_TONE'] ] );

	$Core->selector('[class*="icon"].pattern'.',[class*="icon"].static-pattern'. ',[class*="icon"].dark-pattern:hover', ['fill && color'=>$Core->styleProperty('background-color') ] );

	$Core->selector('[class*="icon"].dark-pattern'.',[class*="icon"].static-dark-pattern'. ',[class*="icon"].pattern:hover', ['fill && color'=>$Core->styleProperty('dark-background-color') ] );


/*

	ICONS // FIN ////////////////////

*/







/* DIMENSIONS LARGEUR-HAUTEUR PREFINIES */
// foreach ($GUI['size'] as $k => $size) 

$Core->selector('.x12-min,.x12-w-min', ['width'=>'12px']);

$Core->selector('.x12-min,.x12-h-min', ['height'=>'12px']);

$Core->selector('.x12,.x12-w', ['width'=>'12px']);

$Core->selector('.x12,.x12-h', ['height'=>'12px']);

$Core->selector('.gui[class~="-icon"].x12', ['font-size'=>'12px']);


for ($kx=16; $kx<=1024; $kx+=16) {

	$Core->selector('[class*="icon"].x' . $kx , ['font-size'=>$kx . 'px']);


	$Core->selector('.x' . $kx . ',.x' . $kx . '-w' , ['width'=>$kx . 'px']);
	
	$Core->selector('.x' . $kx . ',.x' . $kx . '-h' , ['height'=>$kx . 'px']);


	$Core->selector('.x' . $kx . '-min' . ',.x' . $kx . '-w-min' , ['min-width'=>$kx . 'px']);
	
	$Core->selector('.x' . $kx . '-min' . ',.x' . $kx . '-h-min' , ['min-height'=>$kx . 'px']);


	$Core->selector('.x' . $kx . '-max' . ',.x' . $kx . '-w-max' , ['max-width'=>$kx . 'px']);
	
	$Core->selector('.x' . $kx . '-max' . ',.x' . $kx . '-h-max' , ['max-height'=>$kx . 'px']);

}











/* ============= Initialisation des balises */
$Core->selector('html, body, div, span, object, iframe, q, dl, dt, dd, ol, ul, li, a, abbr, acronym, address, code, h1, h2, h3, h4, h5, h6, p, blockquote, pre, fieldset, form, label, legend, del, dfn, em, img, table, caption, tbody, tfoot, thead, tr, th, td'

	, [

		'padding && margin && border'=>'0px'

		, 'font-weight && font-style && font-family'=>'inherit'

	]

);

$Core->selector('table', ['border-collapse'=>'separate','border-spacing'=>'0']);

$Core->selector('caption, th, td', ['font-weight'=>'normal','text-align'=>'left']);

$Core->selector('table, td, th', ['vertical-align'=>'middle']);

$Core->selector('a img', ['border'=>'none', 'outline'=>'none']);

// $Core->selector('img', ['padding'=>'5px']);





/* ============= Dimension : Largeur */
$Core->selector('._11', ['width'=>'100%']);

$Core->selector('._34', ['width'=>'75%']);

$Core->selector('._23', ['width'=>'66.666%']);

$Core->selector('._12', ['width'=>'50%']);

$Core->selector('._14', ['width'=>'25%']);

$Core->selector('._13', ['width'=>'33.333%']);

$Core->selector('._15', ['width'=>'20%']);

$Core->selector('.w-inherit', ['width'=>'inherit']);

$Core->selector('.h-inherit', ['height'=>'inherit']);


for($x=0; $x<=10; $x++){

	$pXx = ($x/10)*100;

	$Core->selector('._w' . $x, ['width'=>''.($pXx).'%']);
	
	$Core->selector('._h' . $x, ['height'=>''.($pXx).'%']);
	
	$Core->selector('.vw' . $x, ['width'=>''.($pXx).'vw']);
	
	$Core->selector('.vh' . $x, ['height'=>''.($pXx).'vh']);
	
	$Core->selector('.wh' . $x, ['width'=>''.($pXx).'vw', 'height'=>''.($pXx).'vh']);
	

	
	$Core->selector('._w' . $x .'-min', ['min-width'=>''.($pXx).'%']);
	
	$Core->selector('._h' . $x .'-min', ['min-height'=>''.($pXx).'%']);
	
	$Core->selector('.vw' . $x .'-min', ['min-width'=>''.($pXx).'vw']);
	
	$Core->selector('.vh' . $x .'-min', ['min-height'=>''.($pXx).'vh']);
	
	$Core->selector('.wh' . $x .'-min', ['min-width'=>''.($pXx).'vw', 'min-height'=>''.($pXx).'vh']);



	$Core->selector('.gui._w' . $x .'-max', ['max-width'=>''.($pXx).'%']); 

	$Core->selector('.gui._h' . $x .'-max', ['max-height'=>''.($pXx).'%']);

	$Core->selector('.gui.vw' . $x .'-max', ['max-width'=>''.($pXx).'vw']);

	$Core->selector('.gui.vh' . $x .'-max', ['max-height'=>''.($pXx).'vh']);

	$Core->selector('.gui.wh' . $x .'-max', ['max-width'=>''.($pXx).'vw', 'max-height'=>''.($pXx).'vh']);


}

















/* 
	Opacité // DEBUT -------------------
*/
	$Core->selector('.opacity-cancel', ['opacity'=> '1']);

for($opx=0; $opx<100; $opx+=10){

	$Core->selector('.opacity-x' . $opx, ['opacity'=> '0.' . $opx]);
	
}
/* 
	Opacité // FIN -------------------
*/

















/* 
	Affichages // DEBUT -------------------
*/


	$Core->selector('.disable', ['display'=>'none !important'] );

	$Core->selector('.enable', ['display'=>'block !important'] );


	$GUI['Property.Display.ForEach']('.enable-');
	

	// $Core->selector('[class*="-disable"]', ['display'=>'none'] );

	// $Core->selector('[class*="-enable"]', ['display'=>'block'] );



// enable-
/* 
	Affichages // FIN -------------------
*/











	
/* 
	Flex // DEBUT ======================================
*/

$Core->selector(
		'.gui.space'
		. ',.gui.flex'

	, [

		'display'=> ['-webkit-flex', 'flex']

	]

);

$Core->selector('.gui.space.center'. ',.gui.flex.center', ['align-items'=>'center','justify-content'=>'center'] );


$Core->selector('.gui.flex.row', ['flex-direction'=>'row']);

$Core->selector('.gui.flex.row-rev', ['flex-direction'=>'row-reverse']);

$Core->selector('.gui.flex.column', ['flex-direction'=>'column']);

$Core->selector('.gui.flex.column-rev', ['flex-direction'=>'column-reverse']);

$Core->selector(
		'.gui.space.full'
		. ',.gui.flex.full'

	, [

		'width && height'=>'100%'

	]

);

$Core->selector('.gui.space > .align-center'. ',.gui.flex > .align-center', ['margin'=>'auto']);
$Core->selector('.gui.space > .align-bottom'. ',.gui.flex > .align-bottom', ['margin-top'=>'auto']);
$Core->selector('.gui.space > .align-top'. ',.gui.flex > .align-top', ['margin-bottom'=>'auto']);
$Core->selector('.gui.space > .align-left'. ',.gui.flex > .align-left', ['margin-right'=>'auto']);
$Core->selector('.gui.space > .align-right'. ',.gui.flex > .align-right', ['margin-left'=>'auto']);

$Core->selector('.gui.space > .align-vertical'. ',.gui.flex > .align-vertical', ['margin-top && margin-bottom'=>'auto']);
$Core->selector('.gui.space > .align-horizontal'. ',.gui.flex > .align-horizontal', ['margin-left && margin-right'=>'auto']);


$Core->selector('.gui.flex.start', ['justify-content'=>'flex-start']);
$Core->selector('.gui.flex.end', ['justify-content'=>'flex-end']);
$Core->selector('.gui.flex.center', ['justify-content'=>'center']);
$Core->selector('.gui.flex.space-between', ['justify-content'=>'space-between']);
$Core->selector('.gui.flex.space-around', ['justify-content'=>'space-around']);


$Core->selector('.gui.flex.align-items-start', ['align-items'=>'flex-start']);
$Core->selector('.gui.flex.align-items-end', ['align-items'=>'flex-end']);
$Core->selector('.gui.flex.align-items-center', ['align-items'=>'flex-center']);
$Core->selector('.gui.flex.align-items-baseline', ['align-items'=>'flex-baseline']);
$Core->selector('.gui.flex.align-items-stretch', ['align-items'=>'flex-stretch']);


$Core->selector('.gui.flex.wrap', ['flex-wrap'=>'wrap']);
$Core->selector('.gui.flex.nowrap', ['flex-wrap'=>'nowrap']);
$Core->selector('.gui.flex.wrap-reverse', ['flex-wrap'=>'wrap-reverse']);


// $Core->selector('.flex-order-1', ['order'=>'1']);
// $Core->selector('.flex-order-2', ['order'=>'2']);
// $Core->selector('.flex-order-3', ['order'=>'3']);
// $Core->selector('.flex-order-4', ['order'=>'4']);
// $Core->selector('.flex-order-5', ['order'=>'5']);

for ($flx=0; $flx <= 16; $flx++) {

	$Core->selector('.flex-order-' . $flx, ['order'=>'' . $flx . '']);

}


/* 
	Flex // FIN ======================================
*/










/* ============= Positionnement */
foreach (explode(' ', 'static relative fixed absolute sticky inherit') as $pos) {

	$Core->selector('.gui.pos-'.$pos.'' . ',.gui.pos-'.substr($pos, 0, 3).'', ['position'=>$pos]);

	$Core->selector('.gui.pos-'.$pos.'-i' . ',.gui.pos-'.substr($pos, 0, 3).'-i', ['position'=>$pos . ' !important']);

}










/* ============= Background */
	$Core->selector('.background-abs-center',[
	
	 		'background-repeat'=>'no-repeat'
	
			,'background-position'=>'center'
	
		]
	
	);

	$Core->selector('.no-bg', ['background'=>'none'] );

	$Core->selector('.no-bg-color', ['background-color'=>'transparent'] );

	$Core->selector('.no-bg-repeat', ['background-repeat'=>'auto'] );
	
	$Core->selector('.no-bg-position', ['background-position'=>'none'] );

	$Core->selector('.no-bg-attachment', ['background-attachment'=>'none'] );
	











/* 
	Cursor // DEBUT ----------------------

*/

foreach (explode(' ', 'alias all-scroll auto cell context-menu col-resize copy crosshair default e-resize ew-resize grab grabbing help move n-resize ne-resize nesw-resize ns-resize nw-resize nwse-resize no-drop none not-allowed pointer progress row-resize s-resize se-resize sw-resize text vertical-text w-resize wait zoom-in zoom-out initial inherit') as $kxcur => $cursor) {

	$Core->selector('.cursor-' . $cursor, ['cursor'=>$cursor ] );
	
}

/* 
	Cursor // FIN ----------------------

*/










/* ============= Scrollbar */
$Core->selector('.auto-scrollbar',['overflow'=>'auto'] );

$Core->selector('.disable-scrollbar',['overflow'=>'hidden'] );

$Core->selector('.enable-scrollbar',['overflow'=>'scroll'] );

$Core->selector('.enable-y-auto-scrollbar',['overflow-y'=>'auto'] );

$Core->selector('.enable-x-auto-scrollbar',['overflow-x'=>'auto'] );

$Core->selector('.enable-y-scrollbar',['overflow-y'=>'scroll'] );

$Core->selector('.enable-x-scrollbar',['overflow-x'=>'scroll'] );

$Core->selector('.enable-only-y-scrollbar',['overflow'=>'hidden','overflow-y'=>'scroll'] );

$Core->selector('.enable-only-x-scrollbar',['overflow'=>'hidden','overflow-x'=>'scroll'] );

$Core->selector('.disable-y-scrollbar',['overflow-y'=>'hidden'] );

$Core->selector('.disable-x-scrollbar',['overflow-x'=>'hidden'] );

$Core->selector('.disable-only-y-scrollbar',['overflow'=>'scroll','overflow-y'=>'hidden'] );

$Core->selector('.disable-only-x-scrollbar',['overflow'=>'scroll','overflow-x'=>'hidden'] );



$Core->selector('.enable-y-scrollbar-hover',['overflow-y'=>'hidden'] );

$Core->selector('.enable-y-scrollbar-hover:hover',['overflow-y'=>'auto'] );

$Core->selector('.enable-x-scrollbar-hover',['overflow-x'=>'hidden'] );

$Core->selector('.enable-x-scrollbar-hover:hover',['overflow-x'=>'auto'] );


$Core->selector('.scroll-on-mobile', ['overflow'=>($GUI['is.mobile']===true) ? 'auto !important':'initial']);









/* ============= Text */
$Core->selector('.text-left',['text-align'=>'left'] );

$Core->selector('.text-center',['text-align'=>'center'] );

$Core->selector('.text-right',['text-align'=>'right'] );

$Core->selector('.text-justify',['text-align'=>'justify','text-justify'=>'initial'] );



$Core->selector('.text-thin',['font-family'=>$Core->styleProperty('font-family-thin')] );

$Core->selector('.text-light',['font-family'=>$Core->styleProperty('font-family-light')] );

$Core->selector('.text-regular',['font-family'=>$Core->styleProperty('font-family-regular')] );

$Core->selector('.text-bold',['font-family'=>$Core->styleProperty('font-family-bold')] );

$Core->selector('.text-black',['font-family'=>$Core->styleProperty('font-family-black')] );



$Core->selector('.text-ellipsis',['white-space'=>'nowrap','overflow'=>'hidden','text-overflow'=>'ellipsis'] );

	$Core->selector('.text-ellipsis-multiline,[class*="text-ellipsis-multiline-"]'
		, [
			'overflow'=>'hidden'
			, 'text-overflow'=>'ellipsis'
			, 'display'=>['-webkit-box', '-moz-box', 'box']
			, 'line-clamp'=>'3'
			, 'box-orient'=>'vertical'
		]
	);

	for ($temlx=0; $temlx < 10; $temlx++) {$Core->selector('.text-ellipsis-multiline-' . $temlx	, ['line-clamp'=>$temlx]); }

		



// $Core->selector('.text-size-mini',['font-size'=>'11px'] );

// $Core->selector('.text-size-little',['font-size'=>'12px'] );

// $Core->selector('.text-size-normal',['font-size'=>'13px'] );

// $Core->selector('.text-size-big',['font-size'=>'15px'] );

// $Core->selector('.text-size-headling-little',['font-size'=>'20px'] );

// $Core->selector('.text-size-headling-normal',['font-size'=>'30px'] );

// $Core->selector('.text-size-headling-big',['font-size'=>'50px'] );

// $Core->selector(

// 		'.text-h-big'

// 		.',.text-h-normal'

// 		.',.text-h-little'

// 	,['font-family'=>$Core->styleProperty('headling-fontLight-family')] 

// );

$Core->selector('.text-weight-normal',['font-weight'=>'normal'] );

$Core->selector('.text-bold',['font-weight'=>'bold'] );

$Core->selector('.text-uppercase',['text-transform'=>'uppercase'] );


$Core->selector('.text-spacing-plus',['letter-spacing'=>'0.1em'] );

$Core->selector('.text-spacing-minus',['letter-spacing'=>'-0.1em'] );

$Core->selector('.text-spacing-ml',['letter-spacing'=>'-0.04em'] );


$Core->selector('.text-normal',['font-style'=>'normal'] );

$Core->selector('.text-italic',['font-style'=>'italic'] );

$Core->selector('.text-oblique ',['font-style'=>'oblique'] );
















/* ============= Extra : Code */
$Core->selector('.gui.pre-code'
	,[
		// 'overflow-wrap && word-wrap'=>'break-word'
		'background-color'=> '#282828'
		,'width'=> 'inherit'
		,'overflow'=> 'hidden'
		,'overflow-x'=> 'auto'
		,'font-size'=> '14px'
		,'padding'=> '7px 15px'
	]
);

$Core->selector('.gui.pre-code.mini'
	,[
		'background-color'=> 'rgba(10,10,10,.62)'
		,'border-radius'=> '3px'
		,'padding'=> '2px 7px'
		,'box-shadow'=> '0px 0px 5px #000 inset'
	]
);


$Core->selector('.gui.pre-code ::-moz-selection', ['color'=>'#aaa' ,'background-color'=>'#555' ] );

$Core->selector('.gui.pre-code > .tools',['right && top'=> '0px','padding'=>'5px 15px']);

	$Core->selector('.gui.pre-code > .tools .tool'
		,[
			'right && top'=> '0px'
			,'padding'=>'5px 10px'
			,'color'=>'#999'
			,'background-color'=>'rgba(0,0,0,.2)'
			,'transition'=>'color,background-color, 0.3s ease'
		]
	);

	$Core->selector('.gui.pre-code > .tools .tool:hover'
		,[
			'color'=>'#ffffff'
			,'background-color'=>'#ff4800'
		]
	);

$Core->selector('.gui.pre-code > .content',['r'=> '0px']);

$Core->selector('.gui.pre-code,.gui.pre-code .txt',['color'=> '#efefef']);
$Core->selector('.gui.pre-code .font-italic',['font-style'=>'italic']);
$Core->selector('.gui.pre-code .html-doctype',['color'=>'#999']);
$Core->selector('.gui.pre-code .html-comment',['color'=>'#777']);
$Core->selector('.gui.pre-code .html-tag',['color'=>'#ff3800']);
$Core->selector('.gui.pre-code .html-tag-attrs',['color'=>'#ff7900']);
$Core->selector('.gui.pre-code .html-tag-attr-name',['color'=>'#00c289']);
$Core->selector('.gui.pre-code .html-tag-attr-value',['color'=>'#d59c03']);











/* ============= Entete */
$Core->selector(
		'h1,.h1:not(.no-ff)'
		.',h2,.h2:not(.no-ff)'
		.',h3,.h3:not(.no-ff)'
		.',h4,.h4:not(.no-ff)'
		.',h5,.h5:not(.no-ff)'
		.',h6,.h6:not(.no-ff)'
		.',.xh1:not(.no-ff)'
		.',.xh2:not(.no-ff)'
		.',.xh3:not(.no-ff)'
		.',.xh4:not(.no-ff)'
		.',.xh5:not(.no-ff)'
		.',.xh6:not(.no-ff)'
		.',.xxh1:not(.no-ff)'
		.',.xxh2:not(.no-ff)'
		.',.xxh3:not(.no-ff)'
		.',.xxh4:not(.no-ff)'
		.',.xxh5:not(.no-ff)'
		.',.xxh6:not(.no-ff)'

	,['font-family'=>$Core->styleProperty('headling-fontLight-family')]
);

$Core->selector('h1,.h1',['font-size'=>'40px'] );

$Core->selector('h2,.h2',['font-size'=>'36px'] );

$Core->selector('h3,.h3',['font-size'=>'32px'] );

$Core->selector('h4,.h4',['font-size'=>'28px'] );

$Core->selector('h5,.h5',['font-size'=>'24px'] );

$Core->selector('h6,.h6',['font-size'=>'20px'] );

	$Core->selector(
			'h1 ~ h2'
			.',h1 ~ h3'
			.',h1 ~ h4'
			.',h1 ~ h5'
			.',h1 ~ h6'
		,[
			'padding-left && padding-right'=>'1px'
		]
	);


/* Plus Grand */
$Core->selector('.xh1',['font-size'=>'128px'] );

$Core->selector('.xh2',['font-size'=>'112px'] );

$Core->selector('.xh3',['font-size'=>'96px'] );

$Core->selector('.xh4',['font-size'=>'80px'] );

$Core->selector('.xh5',['font-size'=>'64px'] );

$Core->selector('.xh6',['font-size'=>'48px'] );


/* Très Grand */
$Core->selector('.xxh1',['font-size'=>'270px'] );

$Core->selector('.xxh2',['font-size'=>'238px'] );

$Core->selector('.xxh3',['font-size'=>'206px'] );

$Core->selector('.xxh4',['font-size'=>'174px'] );

$Core->selector('.xxh5',['font-size'=>'142px'] );

$Core->selector('.xxh6',['font-size'=>'144px'] );







/* ============= Liste */
$Core->selector('ul',['margin'=>'5px 12px'] );

$Core->selector('ul > li',['margin-left'=>'12px'] );









/* ============= Box */
$Core->selector('.gui.box'
	, [
		'margin'=>'0.5%'
	]
);

$Core->selector('.gui.box.txt'
	, [
		'padding'=>'10px 15px'
	]
);

$Core->selector('.gui.box > .title,.gui.box .box.more'
	, [
		'padding'=>'7px 12px'
	]
);

$Core->selector('.gui.box > .about'
	, [
		'padding'=>'5px 12px'
	]
);

$Core->selector('.gui.box > .content'
	, [
		'padding'=>'10px 12px'
	]
);


$Core->selector('.gui.box.info'
	, [
		'background'=>$Core->styleProperty('notice-background-color')
		,'color'=>$Core->styleProperty('notice-font-color')
	]
);


$Core->selector('.gui.box.wait'
	, [
		'background-color'=>$Core->styleProperty('notice-wait-background-color')
		,'color'=>$Core->styleProperty('notice-wait-color')
		,'font-style'=>'italic'
	]
);


$Core->selector('.gui.box.warning'
	, [
		'background'=>$Core->styleProperty('notice-warning-background-color')
		,'color'=>$Core->styleProperty('notice-warning-color')
	]
);


$Core->selector('.gui.box.error'
	, [
		'background'=>$Core->styleProperty('notice-error-background-color')
		,'color'=>$Core->styleProperty('notice-error-color')
	]
);


$Core->selector('.gui.box.success'
	, [
		'background'=>$Core->styleProperty('notice-success-background-color')
		,'color'=>$Core->styleProperty('notice-success-color')
	]
);



/* 
	Indexer
*/
$Core->selector('[class*=" indexer-"],[class^="indexer-"]'
	, [
		'width'=>'16px'
		,'height'=>'12px'

	]
);

foreach (explode(' ', 'top bottom') as $t) {
	
	$Core->selector('.indexer-'.$t.'-light', ['background-image'=>'url(' . HTTP_HOST . 'indexer-'.$t.'.png' . $GUI['IMAGE_FILTER_LIGHT_TONE'] . ')']);
	
	$Core->selector('.indexer-'.$t.'-gray', ['background-image'=>'url(' . HTTP_HOST . 'indexer-'.$t.'.png' . $GUI['IMAGE_FILTER_GRAY_TONE'] . ')']);
	
	$Core->selector('.indexer-'.$t.'-dark', ['background-image'=>'url(' . HTTP_HOST . 'indexer-'.$t.'.png' . $GUI['IMAGE_FILTER_DARK_TONE'] . ')']);
	
	$Core->selector('.indexer-'.$t.'-text-color', ['background-image'=>'url(' . HTTP_HOST . 'indexer-'.$t.'.png' . $GUI['IMAGE_FILTER_TEXT_COLOR_TONE'] . ')']);
	
	$Core->selector('.indexer-'.$t.'-color', ['background-image'=>'url(' . HTTP_HOST . 'indexer-'.$t.'.png' . $GUI['IMAGE_FILTER_TEXT_HOVER_TONE'] . ')']);
	
	$Core->selector('.indexer-'.$t.'-normal', ['background-image'=>'url(' . HTTP_HOST . 'indexer-'.$t.'.png' . $GUI['IMAGE_FILTER_NORMAL_PATTERN_TONE'] . ')']);
	
	$Core->selector('.indexer-'.$t.'-darkp', ['background-image'=>'url(' . HTTP_HOST . 'indexer-'.$t.'.png' . $GUI['IMAGE_FILTER_DARK_PATTERN_TONE'] . ')']);

}











/* ============= LIEN "a" */
$Core->selector('a:link', ['text-decoration'=>'none', 'color'=>$Core->styleProperty('palette-primary-color') ]);

$Core->selector('a:visited', ['text-decoration'=>'none', 'color'=>$Core->styleProperty('palette-secondary-color') ]);

$Core->selector('a:hover' . ',a.underline', ['text-decoration'=>'underline', 'color'=>$Core->styleProperty('palette-secondary-color') ]);

$Core->selector('a.no-underline', ['text-decoration'=>'none']);




/* ============= CORPS "body" */
$Core->selector('body'

	, [

		'background-color'=>$Core->styleProperty('background-color')

		,'color'=>$Core->styleProperty('font-color')

		,'font-family'=>$Core->styleProperty('font-family')

		,'font-size'=>$Core->styleProperty('font-size')

	]

);




/* ============= CHAMPS D'EDITION "input" */
$Core->selector('textarea,input ,select'

	, [

		'color'=>''.$Core->styleProperty('textfield-font-color').''

		,'padding'=>'10px 12px 9px'

		,'margin'=>'3px 0px 0px'

		,'background-color'=>''.$Core->styleProperty('textfield-background-color').''

		,'font-family'=>''.$Core->styleProperty('font-family').''

		// ,'font-size'=>''.$Core->styleProperty('font-size').''

		,'border'=>'1px solid '.$Core->styleProperty('textfield-border-color').' '

		,'border-radius'=>$Core->styleProperty('textfield-border-radius')

		,'transition'=>'background-color 0.25s ease'

	]

);

$Core->selector(

		'textarea:hover,input:hover'

		.',textarea:focus,input:focus,select:hover,select:focus'

	, [

		'color'=>''.$Core->styleProperty('textfield-font-color:hover').''

		,'border-color'=>''.$Core->styleProperty('textfield-border-color:hover').''

		,'background-color'=>''.$Core->styleProperty('textfield-background-color:hover').''

		,'outline'=>'0px dashed transparent'

	]

);

$Core->selector(

		'input:invalid'

	, [

		'border-color'=>$Core->styleProperty('notice-error-background-color')

		,'background-color'=>'rgba(' . $Core->styleProperty('notice-error-background-color-rgb') .',.75)'

		,'color'=>$Core->styleProperty('notice-error-color')

		,'box-shadow'=>'0px 0px 0px transparent'

	]

);



/*
	Champ 'INPUT'// DEBUT --------------------------
*/

	$Core->selector('.field-input'

		,[

			'flex'=>['flex','webkit-flex']

			,'flex-direction'=>'row'

			,'flex-wrap'=>'no-wrap'

			,'overflow'=>'hidden'

		]

	);



	$Core->selector(

			'.field-input > .icon'

			// .',.field-input > .list-item'

			.',.field-input > .label'

		,[

			'padding-right && padding-left'=>'15px'

		]

	);



	$Core->selector('.field-input > .label'

		,[

			// 'padding-right && padding-left'=>'15px'

		]

	);



	$Core->selector('.field-input > .list-item'

		,[

			'font-size'=>'14px'

			,'padding'=>'10px 20px'

			,'border-top'=>'1px dashed rgba(' . $Core->styleProperty('font-color-rgb') . ',.2)'

			,'transition'=>'background-color 0.3s ease'

		]

	);



	$Core->selector('.field-input > .list-item:first-child'
		,[

			'margin-top'=>'0px'

			,'border-top'=>'0px solid'

		]
	);



	$Core->selector('.field-input > .list-item:hover'
		,[

			'background-color'=>$Core->styleProperty('background-color:hover')

		]
	);



	$Core->selector(

			'.field-input > input'

			.',.field-input > textarea'

		,[
			'flex'=>'1'

			,'background-color && border-color'=>'transparent'

		]

	);



	$Core->selector(

			'.field-input > input'

			.',.field-input > textarea'

		,[
			// 'padding-left && padding-right'=>'0px'
		]
	);




	$Core->selector('.field-input > button'
		,[
			// 'background-color'=>'transparent'
		]
	);



	/* styled */
	$Core->selector('.field-input.styled'
		,[

			'background-color'=>$Core->styleProperty('background-color')

			,'margin'=>'5px'

			,'transition'=>'border-color 0.3s ease'

			,'border-width'=> '1px'

			,'border-style'=> 'solid'

			,'border-color'=> 'transparent'

		]
	);

	$Core->selector('.field-input.styled.focus'
		,[

			'color'=>$Core->styleProperty('palette-primary-color')

			,'border-color'=> '' . $Core->styleProperty('palette-primary-color') . ''

		]
	);


	$Core->selector('.field-input.styled > .icon'

		,[

			'border-right'=>'1px solid ' . $Core->styleProperty('border-color:hover')

		]

	);


	$Core->selector('.field-input.styled > .icon:last-child'

		,[

			'border-right'=>'0px solid '

		]

	);



	$Core->selector('.field-input.styled.focus > .icon'
		,[

			'border-color'=> $Core->styleProperty('palette-primary-color')

		]
	);

	$Core->selector(

			'.field-input.styled.focus > input'

			.',.field-input.styled.focus > textarea'

		,[

			'color'=> $Core->styleProperty('palette-primary-color')

		]
	);



	/* XL */
	// $Core->selector('.field-input.xl'

	// 	,[

	// 		'padding'=>'0px'

	// 	]

	// );

	$Core->selector(

			'.field-input.xl'

			. ',.field-input.xl > input'

			.',.field-input.xl > textarea'

		,[

			'font-size'=>'18px'

		]

	);

	$Core->selector(

			'.field-input.xl > .icon'

			// . ',.field-input.xl > input'

			// .',.field-input.xl > textarea'

			. ',.field-input.xl > button'

		,[

			'padding'=>'10px 12px'

		]

	);


/*
	Champ 'INPUT' // FIN --------------------------
*/




/* BOUTON "button - input" // DEBUT -------------------------------------------------- */

	$Core->selector('.button,button,input[type="reset"] ,input[type="submit"] ,input[type="button"]'

		, [

			'color'=>$Core->styleProperty('button-font-color')

			,'border-width'=>'0px'

			,'border-style'=>'solid'

			,'background-color'=>''.$Core->styleProperty('button-background-color').''

			,'padding'=>'10px 12px'

			,'font-family'=>''.$Core->styleProperty('font-family').''

			// ,'font-size'=>''.$Core->styleProperty('font-size').''

			,'border-color'=>' '.$Core->styleProperty('button-border-color').' '

			,'border-radius'=>' '.$Core->styleProperty('button-border-radius').' '

			// ,'margin'=>'0px'

			,'transition'=>'background-color,border-color,color, 0.25s ease'

		]

	);



	$Core->selector(

			'.button:hover,button:hover,input[type="reset"]:hover,input[type="submit"]:hover,input[type="button"]:hover'

			.',button.active,input[type="reset"].active,input[type="submit"],input[type="button"].active'

		, [

			'color'=>''.$Core->styleProperty('button-font-color:hover').''

			,'background-color'=>''.$Core->styleProperty('button-background-color:hover').''

			,'border-color'=>''.$Core->styleProperty('button-border-color:hover')

		]

	);

	$Core->selector('.button.active,button.active,input[type="reset"].active,input[type="submit"].active,input[type="button"].active'

		, [

			'background-color'=>''.$Core->styleProperty('palette-primary-color').''

			,'border-color'=>''.$Core->styleProperty('palette-primary-color')

			,'color'=>''.$Core->styleProperty('button-font-color:active')

		]

	);

	$Core->selector(

		'button.active:hover,input[type="reset"].active:hover,input[type="submit"].active:hover,input[type="button"].active:hover'

		, [

			'background-color'=>''.$Core->styleProperty('palette-secondary-color').''

			,'border-color'=>''.$Core->styleProperty('palette-secondary-color')

		]

	);



	$Core->selector('.button:active,button:active,input[type="reset"]:active ,input[type="submit"]:active ,input[type="button"]:active'

		, [

			'background-color'=>''.$Core->styleProperty('palette-secondary-color').''

			,'color'=>''.$Core->styleProperty('button-font-color:active')

			,'border-color'=>''.$Core->styleProperty('palette-secondary-color')

			// , 'animation'=>'ggnScaleixOut 0.1s ease'

		]

	);




	/* 
		Associé à la balise span
	*/

	$Core->selector('span.button'

		, [

			'padding'=>'11px 12px'

			,'cursor'=>'default'
		]

	);




	/* 
		Bouton : information
	*/

	$Core->selector('.button.info'

		, [

			'background-color && border-color'=>''.$Core->styleProperty('notice-background-color').''

			,'color'=>''.$Core->styleProperty('notice-font-color').''
		]

	);





	/* 
		Bouton : Attention
	*/

	$Core->selector('.button.warning'

		, [

			'background-color && border-color'=>''.$Core->styleProperty('notice-warning-background-color').''

			,'color'=>''.$Core->styleProperty('notice-warning-color').''
		]

	);





	/* 
		Bouton : Erreur
	*/

	$Core->selector('.button.error'

		, [

			'background-color && border-color'=>''.$Core->styleProperty('notice-error-background-color').''

			,'color'=>''.$Core->styleProperty('notice-error-color').''
		]

	);





	/* 
		Bouton : Succès
	*/

	$Core->selector('.button.success'

		, [

			'background-color && border-color'=>''.$Core->styleProperty('notice-success-background-color').''

			,'color'=>''.$Core->styleProperty('notice-success-color').''
		]

	);





	/* 
		Bouton : Patientez
	*/

	$Core->selector('.button.wait'

		, [

			'background-color && border-color'=>''.$Core->styleProperty('notice-wait-background-color').''

			,'color'=>''.$Core->styleProperty('notice-wait-color').''

			,'font-style'=>'italic'
		]

	);





	/* 
		Bouton : Lien
	*/

	$Core->selector('.button.link'

		, [

			'background-color && border-color'=>'transparent'

			,'color'=>''.$Core->styleProperty('palette-primary-color').''

			,'font-style'=>'bold'
		]

	);

	$Core->selector('.button.link:hover'

		, [

			'color'=>''.$Core->styleProperty('palette-secondary-color').''

		]

	);





	// /* 
	// 	Bouton : Lien
	// */

	// $Core->selector('.button.link'

	// 	, [

	// 		'background-color && border-color'=>'transparent'

	// 		,'color'=>''.$Core->styleProperty('palette-primary-color').''

	// 		,'font-style'=>'bold'
	// 	]

	// );



/* BOUTON "button - input" // FIN -------------------------------------------------- */







/* ============= Feuille "Sheet" */
$Core->selector('.gui.sheet, .gui.underSheet, .gui.preloader'

	, [

		'position'=>'absolute'

		,'top'=>'0px'

		,'left'=>'0px'

		,'z-index'=>'auto'

		// ,'width'=>'100vw'

		,'padding'=>'0px !important'

		,'margin'=>'0px !important'

		// ,'animation'=> 'ggnBlurMotionOut 0.4s ease'

	]

);

$Core->selector('.gui.sheet.fx, .gui.underSheet.fx, .gui.preloader.fx'

	, [
		
		'animation'=> 'ggnBlurMotionOut 0.4s ease'

	]

);


$Core->selector('.gui.underSheet'

	, [

		'z-index'=>'5 !important'

	]

);

$Core->selector(

		'.gui.sheet[ggn-effect="blur-motion"]'

		.',.gui.sheet[ggn-effect="blur-motion-in"]'

	,[

		'animation'=> 'ggnBlurMotionIn 0.4s ease'

		,'filter'=> 'blur(5px)'

	]

);

$Core->selector('.gui.sheet[ggn-effect="blur-motion-out"]'

	,[

		'animation'=> 'ggnBlurMotionOut 0.4s ease'

		,'filter'=> 'blur(0px)'

	]

);




/* ============= Preloader "Sheet" */
$Core->selector('.gui.preloader'

	, [

		'position'=>'fixed'

		,'width'=>'100vw'

		,'height'=>'100vh'

		,'z-index'=>'20 !important'

		,'color'=>''.$Core->styleProperty('font-color').''

		,'background-color'=>''.$Core->styleProperty('background-color').''

	]

);

$Core->selector('.gui.preloader .title', ['padding'=>'0px']);

$Core->selector('.gui.preloader .about', ['margin-top'=>'-10px']);









/* 
	Conditionnements DEBUT ======================================
*/



	/* 
		Parent 
	*/
	$Core->selector('.gui.cols', [
		'flex-direction'=>'row'
		,'flex-wrap'=>'wrap'
	]);



	/* 
		Reste 
	*/
	$Core->selector('.col-null' , ['width'=> '0px'] );

	$Core->selector('.col-0' , ['flex'=> '1'] );





/* 
	En fonction de l'ecran // DEBUT ================================================
*/


	/* 
		Par defaut : CROSS-Screen, Universel // DEBUT ===========================
	*/

	for ($clz=1; $clz <= 16; $clz++) { 

		$lyclSz = (($clz/16)*100);

		$Core->selector('.col-' . $clz, ['width'=> $lyclSz . '%'] );
		
		$Core->selector('.col-' . $clz . '-min', ['min-width'=> $lyclSz . '%'] );
		
		$Core->selector('.col-' . $clz . '-max', ['max-width'=> $lyclSz . '%'] );

	}


	/* 
		Par defaut : CROSS-Screen, Universel // FIN ===========================
	*/









	/* 
		Responsivité : SCREEN_Mi, Plus Petit // DEBUT ===========================
	*/
	
	/* 
		Taille Max // DEBUT ===========================
	*/

		$Core->openMedia(' (max-width: '.$Core::SCREEN_Mi_MAX.') ');


			/* 
				Affichages // DEBUT -------------------
			*/
				
				$Core->selector('.mi-disable', ['display'=> 'none !important'] );

				$Core->selector('.mi-enable', ['display'=> 'block !important'] );

				$GUI['Property.Display.ForEach']('.mi-enable-', '', true);


				// $Core->selector('.mi-flex-order-1', ['order'=>'1']);
				
				// $Core->selector('.mi-flex-order-2', ['order'=>'2']);
				
				// $Core->selector('.mi-flex-order-3', ['order'=>'3']);
				
				// $Core->selector('.mi-flex-order-4', ['order'=>'4']);
				
				// $Core->selector('.mi-flex-order-5', ['order'=>'5']);


				for ($flx=0; $flx <= 16; $flx++) {

					$Core->selector('.mi-flex-order-' . $flx, ['order'=>'' . $flx . '']);

				}


			/* 
				Affichages // FIN -------------------
			*/

		// $Core->closeMedia();
		
	/* 
		Taille Max // FIN ===========================
	*/





	/* 
		Taille Min // DEBUT ===========================
	*/

	// $Core->openMedia(' (max-width: '.$Core::SCREEN_Mi_MAX.') ');
		/* 
			Colonnes // DEBUT -------------------
		*/

			/* 
				Reste 
			*/
			$Core->selector('.mi-col-0' , ['flex'=> '1'] );
			$Core->selector('.mi-col-null' , ['width'=> '0px'] );

			$Core->selector('.mi-flex-start', ['justify-content'=>'flex-start !important']);
			$Core->selector('.mi-flex-end', ['justify-content'=>'flex-end !importantù']);
			$Core->selector('.mi-flex-center', ['justify-content'=>'center !importantù']);


			for ($clz=1; $clz <= 16; $clz++) { 

				$clSz = (($clz/16)*100);

				$Core->selector('.mi-col-' . $clz , ['width'=> $clSz . '%'] );
				
				$Core->selector('.mi-col-' . $clz . '-min' , ['min-width'=> $clSz . '%'] );
				
				$Core->selector('.mi-col-' . $clz . '-max' , ['max-width'=> $clSz . '%'] );

			}

		/* 
			Colonnes // FIN -------------------
		*/


	$Core->closeMedia();
	

	/* 
		Taille Min // DEBUT ===========================
	*/

	/* 
		Responsivité : SCREEN_Mi, Plus Petit // FIN ===========================
	*/









	/* 
		Responsivité : SCREEN_Li, Plus Petit // DEBUT ===========================
	*/
	
	/* 
		Taille Max // DEBUT ===========================
	*/

		$Core->openMedia(' (min-width: '.$Core::SCREEN_Li_MIN.') and (max-width: '.$Core::SCREEN_Li_MAX.') ');


			/* 
				Affichages // DEBUT -------------------
			*/
				
				$Core->selector('.li-disable', ['display'=> 'none !important'] );

				$Core->selector('.li-enable', ['display'=> 'block !important'] );

				$GUI['Property.Display.ForEach']('.li-enable-', '', true);

				// $Core->selector('.li-flex-order-1', ['order'=>'1']);
				
				// $Core->selector('.li-flex-order-2', ['order'=>'2']);
				
				// $Core->selector('.li-flex-order-3', ['order'=>'3']);
				
				// $Core->selector('.li-flex-order-4', ['order'=>'4']);
				
				// $Core->selector('.li-flex-order-5', ['order'=>'5']);


				for ($flx=0; $flx <= 16; $flx++) {

					$Core->selector('.li-flex-order-' . $flx, ['order'=>'' . $flx . '']);

				}

			/* 
				Affichages // FIN -------------------
			*/

		// $Core->closeMedia();
		
	/* 
		Taille Max // FIN ===========================
	*/





	/* 
		Taille Min // DEBUT ===========================
	*/

	// $Core->openMedia(' (min-width: '.$Core::SCREEN_Li_MIN.') ');
		/* 
			Colonnes // DEBUT -------------------
		*/

			/* 
				Reste 
			*/
			$Core->selector('.li-col-0' , ['flex'=> '1'] );
			$Core->selector('.li-col-null' , ['width'=> '0px'] );

			$Core->selector('.li-flex-start', ['justify-content'=>'flex-start !important']);
			$Core->selector('.li-flex-end', ['justify-content'=>'flex-end !important']);
			$Core->selector('.li-flex-center', ['justify-content'=>'center !important']);


			for ($clz=1; $clz <= 16; $clz++) { 

				$clSz = (($clz/16)*100);

				$Core->selector('.li-col-' . $clz , ['width'=> $clSz . '%'] );
				
				$Core->selector('.li-col-' . $clz . '-min' , ['min-width'=> $clSz . '%'] );
				
				$Core->selector('.li-col-' . $clz . '-max' , ['max-width'=> $clSz . '%'] );

			}

		/* 
			Colonnes // FIN -------------------
		*/


	$Core->closeMedia();
	

	/* 
		Taille Min // DEBUT ===========================
	*/

	/* 
		Responsivité : SCREEN_Li, Plus Petit // FIN ===========================
	*/










	/* 
		Responsivité : SCREEN_S_MIN, Petit // DEBUT ===========================
	*/

	
	/* 
		Taille Max // DEBUT ===========================
	*/

		$Core->openMedia(' (min-width: '.$Core::SCREEN_S_MIN.') and (max-width: '.$Core::SCREEN_S_MAX.') ');


			/* 
				Affichages // DEBUT -------------------
			*/
				
				$Core->selector('.s-disable', ['display'=> 'none !important'] );

				$Core->selector('.s-enable', ['display'=> 'block !important'] );

				$GUI['Property.Display.ForEach']('.s-enable-', '', true);

				// $Core->selector('.s-flex-order-1', ['order'=>'1']);
				
				// $Core->selector('.s-flex-order-2', ['order'=>'2']);
				
				// $Core->selector('.s-flex-order-3', ['order'=>'3']);
				
				// $Core->selector('.s-flex-order-4', ['order'=>'4']);
				
				// $Core->selector('.s-flex-order-5', ['order'=>'5']);


				for ($flx=0; $flx <= 16; $flx++) {

					$Core->selector('.s-flex-order-' . $flx, ['order'=>'' . $flx . '']);

				}

			/* 
				Affichages // FIN -------------------
			*/

		// $Core->closeMedia();
		
	/* 
		Taille Max // FIN ===========================
	*/



	/* 
		Taille Min // DEBUT ===========================
	*/

		// $Core->openMedia(' (min-width: '.$Core::SCREEN_S_MIN.') ');

			/* 
				Colonnes // DEBUT -------------------
			*/

				/* 
					Reste 
				*/
				$Core->selector('.s-col-0' , ['flex'=> '1'] );
				$Core->selector('.s-col-null' , ['width'=> '0px'] );

				$Core->selector('.s-flex-start', ['justify-content'=>'flex-start !important']);
				$Core->selector('.s-flex-end', ['justify-content'=>'flex-end !important']);
				$Core->selector('.s-flex-center', ['justify-content'=>'center !important']);


				for ($clz=1; $clz <= 16; $clz++) { 

					$clSz = (($clz/16)*100);

					$Core->selector('.s-col-' . $clz , ['width'=> $clSz . '%'] );
					
					$Core->selector('.s-col-' . $clz . '-min' , ['min-width'=> $clSz . '%'] );
					
					$Core->selector('.s-col-' . $clz . '-max' , ['max-width'=> $clSz . '%'] );

				}

			/* 
				Colonnes // FIN -------------------
			*/
				
		$Core->closeMedia();
		
	/* 
		Taille Min // FIN ===========================
	*/


	/* 
		Responsivité : SCREEN_S_MIN, Petit // FIN ===========================
	*/










	/* 
		Responsivité : SCREEN_M_MIN, Moyen // DEBUT ===========================
	*/

	
	/* 
		Taille Max // DEBUT ===========================
	*/

		$Core->openMedia(' (min-width: '.$Core::SCREEN_M_MIN.') and (max-width: '.$Core::SCREEN_M_MAX.') ');


			/* 
				Affichages // DEBUT -------------------
			*/
			
				$Core->selector('.m-disable', ['display'=> 'none !important'] );

				$Core->selector('.m-enable', ['display'=> 'block !important'] );

				$GUI['Property.Display.ForEach']('.m-enable-', '', true);

				// $Core->selector('.m-flex-order-1', ['order'=>'1']);
				
				// $Core->selector('.m-flex-order-2', ['order'=>'2']);
				
				// $Core->selector('.m-flex-order-3', ['order'=>'3']);
				
				// $Core->selector('.m-flex-order-4', ['order'=>'4']);
				
				// $Core->selector('.m-flex-order-5', ['order'=>'5']);

				for ($flx=0; $flx <= 16; $flx++) {

					$Core->selector('.m-flex-order-' . $flx, ['order'=>'' . $flx . '']);

				}

			/* 
				Affichages // FIN -------------------
			*/

		// $Core->closeMedia();
		
	/* 
		Taille Max // FIN ===========================
	*/

	
	/* 
		Colonnes // DEBUT ===========================
	*/

		// $Core->openMedia(' (min-width: '.$Core::SCREEN_M_MIN.') ');

			/* 
				Reste 
			*/
			$Core->selector('.m-col-0' , ['flex'=> '1'] );
			$Core->selector('.m-col-null' , ['width'=> '0px'] );

			$Core->selector('.m-flex-start', ['justify-content'=>'flex-start !important']);
			$Core->selector('.m-flex-end', ['justify-content'=>'flex-end !important']);
			$Core->selector('.m-flex-center', ['justify-content'=>'center !important']);
			
			for ($clz=1; $clz <= 16; $clz++) { 

				$clSz = (($clz/16)*100);

				$Core->selector('.m-col-' . $clz , ['width'=> $clSz . '%'] );
				
				$Core->selector('.m-col-' . $clz . '-min' , ['min-width'=> $clSz . '%'] );
				
				$Core->selector('.m-col-' . $clz . '-max' , ['max-width'=> $clSz . '%'] );

			}

		$Core->closeMedia();
		
	/* 
		Colonnes // FIN ===========================
	*/

	/* 
		Responsivité : SCREEN_M_MIN, Moyen // FIN ===========================
	*/











	/* 
		Responsivité : SCREEN_L_MIN, Large // DEBUT ===========================
	*/
	
	/* 
		Taille Max // DEBUT ===========================
	*/

		$Core->openMedia(' (min-width: '.$Core::SCREEN_L_MIN.') and (max-width: '.$Core::SCREEN_L_MAX.') ');


			/* 
				Affichages // DEBUT -------------------
			*/
			
				$Core->selector('.l-disable', ['display'=> 'none !important'] );

				$Core->selector('.l-enable', ['display'=> 'block !important'] );

				$GUI['Property.Display.ForEach']('.l-enable-', '', true);

				// $Core->selector('.l-flex-order-1', ['order'=>'1']);
				
				// $Core->selector('.l-flex-order-2', ['order'=>'2']);
				
				// $Core->selector('.l-flex-order-3', ['order'=>'3']);
				
				// $Core->selector('.l-flex-order-4', ['order'=>'4']);
				
				// $Core->selector('.l-flex-order-5', ['order'=>'5']);

				for ($flx=0; $flx <= 16; $flx++) {

					$Core->selector('.l-flex-order-' . $flx, ['order'=>'' . $flx . '']);

				}

			/* 
				Affichages // FIN -------------------
			*/

		// $Core->closeMedia();
		
	/* 
		Taille Max // FIN ===========================
	*/
	

	/* 
		Colonnes // DEBUT ===========================
	*/

		// $Core->openMedia(' (min-width: '.$Core::SCREEN_L_MIN.') ');

			/* 
				Reste 
			*/
			$Core->selector('.l-col-0' , ['flex'=> '1'] );
			$Core->selector('.l-col-null' , ['width'=> '0px'] );

			$Core->selector('.l-flex-start', ['justify-content'=>'flex-start !important']);
			$Core->selector('.l-flex-end', ['justify-content'=>'flex-end !important']);
			$Core->selector('.l-flex-center', ['justify-content'=>'center !important']);
			
			for ($clz=1; $clz <= 16; $clz++) { 

				$clSz = (($clz/16)*100);

				$Core->selector('.l-col-' . $clz , ['width'=> $clSz . '%'] );
				
				$Core->selector('.l-col-' . $clz . '-min' , ['min-width'=> $clSz . '%'] );
				
				$Core->selector('.l-col-' . $clz . '-max' , ['max-width'=> $clSz . '%'] );

			}

		$Core->closeMedia();
		
	/* 
		Colonnes // FIN ===========================
	*/

	/* 
		Responsivité : SCREEN_L_MIN, Large // FIN ===========================
	*/












	/* 
		Responsivité : SCREEN_F_MIN, Full HD // DEBUT ===========================
	*/

	/* 
		Taille Max // DEBUT ===========================
	*/

		$Core->openMedia(' (min-width: '.$Core::SCREEN_F_MIN.') and (max-width: '.$Core::SCREEN_F_MAX.') ');


			/* 
				Affichages // DEBUT -------------------
			*/
			
				$Core->selector('.f-disable', ['display'=> 'none !important'] );

				$Core->selector('.f-enable', ['display'=> 'block !important'] );

				$GUI['Property.Display.ForEach']('.f-enable-', '', true);

				for ($flx=0; $flx <= 16; $flx++) {

					$Core->selector('.f-flex-order-' . $flx, ['order'=>'' . $flx . '']);

				}

			/* 
				Affichages // FIN -------------------
			*/

		// $Core->closeMedia();
		
	/* 
		Taille Max // FIN ===========================
	*/
	

	/* 
		Colonnes // DEBUT ===========================
	*/
		
		// $Core->openMedia(' (min-width: '.$Core::SCREEN_F_MIN.') ');

			/* 
				Reste 
			*/
			$Core->selector('.f-col-0' , ['flex'=> '1'] );
			$Core->selector('.f-col-null' , ['width'=> '0px'] );

			$Core->selector('.f-flex-start', ['justify-content'=>'flex-start !important']);
			$Core->selector('.f-flex-end', ['justify-content'=>'flex-end !important']);
			$Core->selector('.f-flex-center', ['justify-content'=>'center !important']);

			
			for ($clz=1; $clz <= 16; $clz++) { 

				$clSz = (($clz/16)*100);

				$Core->selector('.f-col-' . $clz , ['width'=> $clSz . '%'] );
				
				$Core->selector('.f-col-' . $clz . '-min' , ['min-width'=> $clSz . '%'] );
				
				$Core->selector('.f-col-' . $clz . '-max' , ['max-width'=> $clSz . '%'] );

			}

		$Core->closeMedia();
		
	/* 
		Colonnes // FIN ===========================
	*/
	
	/* 
		Responsivité : SCREEN_F_MIN, Full HD // FIN ===========================
	*/












	/* 
		Responsivité : Superieur Full HD // DEBUT ===========================
	*/

	/* 
		Taille Max // DEBUT ===========================
	*/

		$Core->openMedia(' (min-width: '.$Core::SCREEN_F_MAX.') ');


			/* 
				Affichages // DEBUT -------------------
			*/
			
				$Core->selector('.sf-disable', ['display'=> 'none !important'] );

				$Core->selector('.sf-enable', ['display'=> 'block !important'] );

				$GUI['Property.Display.ForEach']('.sf-enable-', '', true);

				for ($flx=0; $flx <= 16; $flx++) {

					$Core->selector('.sf-flex-order-' . $flx, ['order'=>'' . $flx . '']);

				}

			/* 
				Affichages // FIN -------------------
			*/

		// $Core->closeMedia();
		
	/* 
		Taille Max // FIN ===========================
	*/
	

	/* 
		Colonnes // DEBUT ===========================
	*/
		
		// $Core->openMedia(' (min-width: '.$Core::SCREEN_F_MIN.') ');

			/* 
				Reste 
			*/
			$Core->selector('.sf-col-0' , ['flex'=> '1'] );
			$Core->selector('.sf-col-null' , ['width'=> '0px'] );

			$Core->selector('.sf-flex-start', ['justify-content'=>'flex-start !important']);
			$Core->selector('.sf-flex-end', ['justify-content'=>'flex-end !important']);
			$Core->selector('.sf-flex-center', ['justify-content'=>'center !important']);

			
			for ($clz=1; $clz <= 16; $clz++) { 

				$clSz = (($clz/16)*100);

				$Core->selector('.sf-col-' . $clz , ['width'=> $clSz . '%'] );
				
				$Core->selector('.sf-col-' . $clz . '-min' , ['min-width'=> $clSz . '%'] );
				
				$Core->selector('.sf-col-' . $clz . '-max' , ['max-width'=> $clSz . '%'] );

			}

		$Core->closeMedia();
		
	/* 
		Colonnes // FIN ===========================
	*/
	
	/* 
		Responsivité : SCREEN_F_MIN, Full HD // FIN ===========================
	*/












	/* 
		Responsivité : SCREEN_2k_MIN, semi-ultra // DEBUT ===========================
	*/

	/* 
		Taille Max // DEBUT ===========================
	*/

		$Core->openMedia(' (min-width: '.$Core::SCREEN_2k_MIN.') and (max-width: '.$Core::SCREEN_2k_MAX.') ');


			/* 
				Affichages // DEBUT -------------------
			*/
			
				$Core->selector('.2k-disable', ['display'=> 'none !important'] );

				$Core->selector('.2k-enable', ['display'=> 'block !important'] );

				$GUI['Property.Display.ForEach']('.2k-enable-', '', true);

				// $Core->selector('.2k-flex-order-1', ['order'=>'1']);
				
				// $Core->selector('.2k-flex-order-2', ['order'=>'2']);
				
				// $Core->selector('.2k-flex-order-3', ['order'=>'3']);
				
				// $Core->selector('.2k-flex-order-4', ['order'=>'4']);
				
				// $Core->selector('.2k-flex-order-5', ['order'=>'5']);

				for ($flx=0; $flx <= 16; $flx++) {

					$Core->selector('.2k-flex-order-' . $flx, ['order'=>'' . $flx . '']);

				}

			/* 
				Affichages // FIN -------------------
			*/

		// $Core->closeMedia();
		
	/* 
		Taille Max // FIN ===========================
	*/
	

	/* 
		Colonnes // DEBUT ===========================
	*/
		
		// $Core->openMedia(' (min-width: '.$Core::SCREEN_2k_MIN.') ');

			/* 
				Reste 
			*/
			$Core->selector('.2k-col-0' , ['flex'=> '1'] );
			$Core->selector('.2k-col-null' , ['width'=> '0px'] );

			$Core->selector('.2k-flex-start', ['justify-content'=>'flex-start !important']);
			$Core->selector('.2k-flex-end', ['justify-content'=>'flex-end !important']);
			$Core->selector('.2k-flex-center', ['justify-content'=>'center !important']);

			
			for ($clz=1; $clz <= 16; $clz++) { 

				$clSz = (($clz/16)*100);

				$Core->selector('.2k-col-' . $clz , ['width'=> $clSz . '%'] );
				
				$Core->selector('.2k-col-' . $clz . '-min' , ['min-width'=> $clSz . '%'] );
				
				$Core->selector('.2k-col-' . $clz . '-max' , ['max-width'=> $clSz . '%'] );

			}

		$Core->closeMedia();
		
	/* 
		Colonnes // FIN ===========================
	*/
	
	/* 
		Responsivité : SCREEN_2k_MIN, demi-ultra // FIN ===========================
	*/













	/* 
		Responsivité : SCREEN_4k_MIN, ultra // DEBUT ===========================
	*/

	/* 
		Taille Max // DEBUT ===========================
	*/

		$Core->openMedia(' (min-width: '.$Core::SCREEN_4k_MIN.') and (max-width: '.$Core::SCREEN_4k_MAX.') ');


			/* 
				Affichages // DEBUT -------------------
			*/
			
				$Core->selector('.4k-disable', ['display'=> 'none !important'] );

				$Core->selector('.4k-enable', ['display'=> 'block !important'] );

				$GUI['Property.Display.ForEach']('.4k-enable-', '', true);

				// $Core->selector('.4k-flex-order-1', ['order'=>'1']);
				
				// $Core->selector('.4k-flex-order-2', ['order'=>'2']);
				
				// $Core->selector('.4k-flex-order-3', ['order'=>'3']);
				
				// $Core->selector('.4k-flex-order-4', ['order'=>'4']);
				
				// $Core->selector('.4k-flex-order-5', ['order'=>'5']);

				for ($flx=0; $flx <= 16; $flx++) {

					$Core->selector('.4k-flex-order-' . $flx, ['order'=>'' . $flx . '']);

				}

			/* 
				Affichages // FIN -------------------
			*/

		// $Core->closeMedia();
		
	/* 
		Taille Max // FIN ===========================
	*/
		

	/* 
		Colonnes // DEBUT ===========================
	*/
		
		// $Core->openMedia(' (min-width: '.$Core::SCREEN_4k_MIN.') ');

			/* 
				Reste 
			*/
			$Core->selector('.4k-col-0' , ['flex'=> '1'] );
			$Core->selector('.4k-col-null' , ['width'=> '0px'] );

			$Core->selector('.4k-flex-start', ['justify-content'=>'flex-start !important']);
			$Core->selector('.4k-flex-end', ['justify-content'=>'flex-end !important']);
			$Core->selector('.4k-flex-center', ['justify-content'=>'center !important']);
			
			for ($clz=1; $clz <= 16; $clz++) { 

				$clSz = (($clz/16)*100);

				$Core->selector('.4k-col-' . $clz , ['width'=> $clSz . '%'] );
				
				$Core->selector('.4k-col-' . $clz . '-min' , ['min-width'=> $clSz . '%'] );
				
				$Core->selector('.4k-col-' . $clz . '-max' , ['max-width'=> $clSz . '%'] );

			}

		$Core->closeMedia();
		
	/* 
		Colonnes // FIN ===========================
	*/
	
	/* 
		Responsivité : SCREEN_4k_MIN, ultra // FIN ===========================
	*/














	/* 
		Responsivité : SCREEN_8k_MIN // DEBUT ===========================
	*/

	/* 
		Taille Max // DEBUT ===========================
	*/

		// $Core->openMedia(' (min-width: '.$Core::SCREEN_8k_MAX.') ');


		// $Core->closeMedia();
		
	/* 
		Taille Max // FIN ===========================
	*/
	

	/* 
		Colonnes // DEBUT ===========================
	*/
			
		$Core->openMedia(' (min-width: '.$Core::SCREEN_8k_MIN.') ');

			/* 
				Affichages // DEBUT -------------------
			*/
			
				$Core->selector('.8k-disable', ['display'=> 'none !important'] );

				$Core->selector('.8k-enable', ['display'=> 'block !important'] );

				$GUI['Property.Display.ForEach']('.8k-enable-', '', true);

				// $Core->selector('.8k-flex-order-1', ['order'=>'1']);
				
				// $Core->selector('.8k-flex-order-2', ['order'=>'2']);
				
				// $Core->selector('.8k-flex-order-3', ['order'=>'3']);
				
				// $Core->selector('.8k-flex-order-4', ['order'=>'4']);
				
				// $Core->selector('.8k-flex-order-5', ['order'=>'5']);

				for ($flx=0; $flx <= 16; $flx++) {

					$Core->selector('.8k-flex-order-' . $flx, ['order'=>'' . $flx . '']);

				}

			/* 
				Affichages // FIN -------------------
			*/

			/* 
				Reste 
			*/
			$Core->selector('.8k-col-0' , ['flex'=> '1'] );
			$Core->selector('.8k-col-null' , ['width'=> '0px'] );

			$Core->selector('.8k-flex-start', ['justify-content'=>'flex-start !important']);
			$Core->selector('.8k-flex-end', ['justify-content'=>'flex-end !important']);
			$Core->selector('.8k-flex-center', ['justify-content'=>'center !important']);

			

			for ($clz=1; $clz <= 16; $clz++) { 

				$clSz = (($clz/16)*100);

				$Core->selector('.8k-col-' . $clz , ['width'=> $clSz . '%'] );
				
				$Core->selector('.8k-col-' . $clz . '-min' , ['min-width'=> $clSz . '%'] );
				
				$Core->selector('.8k-col-' . $clz . '-max' , ['max-width'=> $clSz . '%'] );

			}

		$Core->closeMedia();
			
	/* 
		Colonnes // FIN ===========================
	*/
	
	/* 
		Responsivité : SCREEN_8k_MIN // FIN ===========================
	*/







/* 
	En fonction de l'ecran // DEBUT ================================================
*/



	
/* 
	Conditionnements FIN ======================================
*/






/* ============= Loading */
$Core->selector('.gui.loading'

	, [

		'background-color'=>'transparent'

		,'background-repeat'=>'no-repeat'

		,'background-position'=>'center'

	]
);


foreach ($GUI['loading.size'] as $key => $value) {

	$ldgimg = HTTP_HOST . 'loading/ggn-loading-x'.$value.'.png';

	$ldglimg = $ldgimg . $GUI['IMAGE_FILTER_LIGHT_TONE'];

	$ldgdimg = $ldgimg . $GUI['IMAGE_FILTER_DARK_TONE'];

	$ldgtimg = $ldgimg . $GUI['IMAGE_FILTER_TEXT_COLOR_TONE'];

	$ldgthimg = $ldgimg . $GUI['IMAGE_FILTER_TEXT_HOVER_TONE'];

	$ldgpnimg = $ldgimg . $GUI['IMAGE_FILTER_NORMAL_PATTERN_TONE'];

	$ldgpdimg = $ldgimg . $GUI['IMAGE_FILTER_DARK_PATTERN_TONE'];


	/* div.loading.circle */
	$Core->selector('.gui.loading.circle.x'.$value.''

		, [

			'background-image'=>'url('.$ldglimg.')'

			,'width && height'=> $value.'px'

		]

	);

	/* Clair */
	$Core->selector('div.loading.circle.x'.$value.'.light', ['background-image'=>'url('.$ldglimg.')'] );

	/* Sombre */
	$Core->selector('div.loading.circle.x'.$value.'.dark', ['background-image'=>'url('.$ldgdimg.')'] );

	/* Couleur text */
	$Core->selector('div.loading.circle.x'.$value.'.text-color', ['background-image'=>'url('.$ldgtimg.')'] );

	/* Couleur text survolé */
	$Core->selector('div.loading.circle.x'.$value.'.text-color-hover', ['background-image'=>'url('.$ldgthimg.')'] );

	/* Couleur pattern normal */
	$Core->selector('div.loading.circle.x'.$value.'.normal-color', ['background-image'=>'url('.$ldgpnimg.')'] );

	/* Couleur pattern sombre */
	$Core->selector('div.loading.circle.x'.$value.'.dark-color', ['background-image'=>'url('.$ldgpdimg.')'] );


	/* div.loading.circle.in */
	$Core->selector('div.loading.circle.x'.$value.'.in'

		, ['animation'=>'ggnCircleLoading 1.2s ease infinite']

	);

	/* div.loading.circle.out */
	$Core->selector('div.loading.circle.x'.$value.'.out'

		, ['animation'=>'ggnCircleLoading 1.2s ease infinite']

	);

	/* div.loading.circle.in-out */
	$Core->selector('div.loading.circle.x'.$value.'.in-out'

		, ['animation'=>'ggnCircleLoading 1.2s ease infinite']

	);


}


$Core->selector('.loading.circle', ['animation'=>'ggnCircleLoading 1.2s linear infinite'] );

$Core->selector('.loading.circle.slow', ['animation'=>'ggnCircleLoading 1.9s linear infinite'] );

$Core->selector('.loading.circle.fast', ['animation'=>'ggnCircleLoading 0.25s linear infinite'] );


$Core::keyframes('ggnCircleLoading', $Core::fx('rotate','0','-360'), true);










/*
	GGN TOAST API // DEBUT --------------------------
*/

$Core->selector('[id*="ggn-toast-api-master"]'
	, [

		'width' => '100%'

		,'left && bottom' => '0px'

		,'z-index'=>'999999999999'

	]
);


$Core->selector('.gui.toast-api-item:not([data-toast-item-status="false"])', ['border-top' => '1px dashed rgba(128,128,128,.3)'] );

$Core->selector('.gui.toast-api-item:last-child:not([data-toast-item-status="false"])', ['border-top' => '0px dashed transparent'] );


$Core->selector('.gui.toast-api-item'
	, [

		'background-color' => $Core->styleProperty('palette-primary-color')

		,'color' => $Core->styleProperty('palette-light-color')

		,'width' => '100%'

		,'left' => '0px'

		,'transition' => 'bottom, 0.3s ease'

		,'z-index'=>'1' 


	]
);

$Core->selector('.gui.toast-api-item a'
	, [
		
		'text-decoration' => 'none'

	]
);

$Core->selector('.gui.toast-api-item *'
	, [

		'color' => 'inherit'

	]
);

$Core->selector('.gui.toast-api-item .image'
	, [

		'background-color' => 'rgba(0,0,0,.99)'

		,'height' => 'inherit'

		,'background-size' => '100%'

	]
);

$Core->selector('.gui.toast-api-item > .content'
	, [

		'height' => '100%'
		,'padding' => '10px 20px'

	]
);

$Core->selector('.gui.toast-api-item > .content > .title'
	, [

		// 'height' => '32px'

	]
);

$Core->selector('.gui.toast-api-item > .content > .text'
	, [

		'flex' => '1'
		// ,'height' => '100%'

	]
);

$Core->selector('.gui.toast-api-item.color-wait > .content > .text ', ['font-style' => 'italic'] );

/*
	GGN TOAST API // FIN --------------------------
*/










/* ============= Flou Gaussien & animation */
$Core->selector('[ggn-effect="blur-motion"]'

		.',[ggn-effect="blur-motion-in"]'

	,[

		'animation'=> 'ggnBlurMotionIn 0.4s ease'

		,'filter'=> 'blur(7px)'

	]

);

$Core->selector('[ggn-effect="blur-motion-out"]'

	,[

		'animation'=> 'ggnBlurMotionOut 0.4s ease'

		,'filter'=> 'blur(0px)'

	]

);








/* ============= Gougnon UI LockBox API */
$Core->selector('[gui-api="g.lockbox"]', []);

$Core->selector('[gui-api="g.lockbox"] > [gui-api-lockbox="ultra.light"]', ['background-color'=>'rgba(0,0,0,.75)'] );

$Core->selector('[gui-api="g.lockbox"] > [gui-api-lockbox="ultra.box"]', ['background-color'=>'#fff']);







/* ============= Alert */
$Core->selector('.alert, .alert-mini'

	, [

		'text-align'=>'center'

		,'font-family'=>''.$Core->styleProperty('headling-fontLight-family').''

		,'font-size'=>'40px'

		,'color'=>''.$Core->styleProperty('palette-light-color').''

	]

);

$Core->selector('.alert-mini'

	, [

		'font-family'=>''.$Core->styleProperty('headling-font-family').''

		,'font-size'=>'21px'

	]

);









/* ============= Gougnon UI Progress API */
$Core->selector('[gui-api="g.progress"]'

	, [

		'position'=>'relative'

		,'overflow'=>'hidden'

	]

);

$Core->selector('[gui-api="g.progress"][gui-api-progress="g.progress.bar"]'

	, [

		'background-color'=>'#DDD'

		,'min-height'=>'1px'

	]

);

$Core->selector(

		'[gui-api-progress="g.progress.bar"] > [gui-api-progress="purcent.bar"]'

		. ',[gui-api-progress="g.progress.bar"] > [gui-api-progress="cache.bar"]'

		. ',[gui-api-progress="g.progress.bar"] > [gui-api-progress="text.bar"]'

	, [

		'position'=>'absolute'

		,'width'=>'0px'

		,'min-height'=>'1px'

		,'height'=>'100%'

		,'overflow'=>'hidden'

	]

);

$Core->selector(

		'[gui-api-progress="g.progress.bar"] > [gui-api-progress="purcent.bar"] > [gui-api-progress="label.bar"]'

		. ',[gui-api-progress="g.progress.bar"] > [gui-api-progress="cache.bar"] > [gui-api-progress="label.bar"]'

		. ',[gui-api-progress="g.progress.bar"] > [gui-api-progress="text.bar"] > [gui-api-progress="label.bar"]'

	, [

		'text-overflow'=>'hidden'

		,'whiteSpace'=>'nowrap'

		,'font-size'=>'11px'

		,'overflow'=>'hidden'

	]

);


$Core->selector('[gui-api-progress="g.progress.bar"] > [gui-api-progress="purcent.bar"]', ['background-color'=>''.$Core->styleProperty('palette-primary-color').''] );

$Core->selector('[gui-api-progress="g.progress.bar"] > [gui-api-progress="purcent.bar"] > [gui-api-progress="label.bar"]', ['color'=>'#fff'] );

$Core->selector('[gui-api-progress="g.progress.bar"] > [gui-api-progress="cache.bar"]', ['background-color'=>'#CFCFCF'] );

$Core->selector('[gui-api-progress="g.progress.bar"] > [gui-api-progress="cache.bar"] > [gui-api-progress="label.bar"]', ['color'=>'#222'] );

$Core->selector('[gui-api-progress="g.progress.bar"] > [gui-api-progress="text.bar"]'

	, [

		'background-color'=>'transparent !important'

		,'width'=>'100%'

		,'height'=>'100%'

	]

);

$Core->selector('[gui-api-progress="g.progress.bar"] > [gui-api-progress="text.bar"] > [gui-api-progress="label.bar"]'

	, [

		'color'=>'#222'

	]

);









/*
	Awake // DEBUT -------------------
*/

$Core->selector('*[ggn-awake-promise]'

	, [

		'opacity'=>'0.1'

		,'display'=>'none'

	]

);


$Core->selector('.gui.awake-api-encompass'

	, [

		'left && top'=>'0px'

		,'width && height'=>'0px'

		// ,'width && height'=>'100%'

	]

);

// $Core->selector('.gui.awake-api-encompass.awk-a > .container', ['position'=>'absolute'] );

// $Core->selector('.gui.awake-api-encompass.awk-f > .container', ['position'=>'fixed'] );


$Core->selector('.gui.awake-api-encompass.locked > .container > .content'

	, [

		'animation'=>'ggnBouncedIn 0.3s ease'

		,'transform'=>'scale(0.5)'

		,'opacity'=>'1'

	]

);

$Core->selector('.gui.awake-api-encompass > .light'

	, [

		// 'background-color'=>'' . $Core->LDColor($Core->styleProperty('palette-primary-color'), -32) . ''
		'background-color'=>'' . $Core->styleProperty('palette-dark-color') . ''

		// ,'opacity'=>'0.75'

		,'left && top'=>'0px'

		,'width && height'=>'100%'

		,'z-index'=>'auto'

		,'transition'=>'all 0.3s ease'

	]

);

$Core->selector('.gui.awake-api-encompass > .container'

	, [

		'z-index'=>'1'

		,'top && left '=>'0px'

		,'width && height'=>'100%'

		// ,'background-color'=>'red'

		,'transition'=>'all 0.3s ease'

	]

);

$Core->selector('.gui.awake-api-encompass > .container > .content.fx'

	, [

		'transition'=>'all 0.5s ease'

	]

);

$Core->selector('.gui.awake-api-encompass > .container > .content'

	, [

		'background-color'=>'' . $Core->styleProperty('background-color') . ''

	]

);

$Core->selector('.gui.awake-api-encompass > .container > .content.auto-content'

	, [

		'padding'=>'10px 15px'

	]

);


/* Depth // DEBUT ------------- */

	$Core->selector('[ggn-awake-depth~="gray"] > *:not([ggn-awake-item]):not([ggn-awake-no-depth])'

		, [

			'filter'=>'grayscale(1) !important'

		]

	);


if(!$_DPO_DEVICE->get('edge')){

	$Core->selector('[ggn-awake-depth~="blur"] > *:not([ggn-awake-item]):not([ggn-awake-no-depth])'

		, [

			'filter'=>'blur(5px) !important'

		]

	);

	$Core->selector('[ggn-awake-depth~="gray-blur"] > *:not([ggn-awake-item]):not([ggn-awake-no-depth])'

		, [

			'filter'=>'blur(5px) grayscale(1) !important'

		]

	);

}


	$Core->selector('[ggn-awake-depth-self~="transparent"].gui.awake-api-encompass > .light'

		, [

			'background-color'=>'transparent !important'

		]

	);

	$Core->selector('[ggn-awake-depth-self~="black-bg"].gui.awake-api-encompass > .light'

		, [

			'background-color'=>'#000 !important'

		]

	);

	$Core->selector('[ggn-awake-depth-self~="no-content"].gui.awake-api-encompass > .container > .content'

		, [

			'background-color'=>'transparent'

			,'box-shadow'=>'0px 0px 0px transparent !important'

		]

	);

/* Depth // FIN ------------- */







/*
	Awake // FIN -------------------
*/








/*
	Couleur arrière plan et texte en fonction de la palette // DEBUT -------------------
*/

	/* Couleurs des Textes */



	$Core->selector('.color-text', ['color'=>$Core->styleProperty('font-color') . ' !important']);

		$Core->selector('.color-text-l', ['color'=>$Core->LDColor($Core->styleProperty('font-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-text-d', ['color'=>$Core->LDColor($Core->styleProperty('font-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);



	$Core->selector('.color-dtext', ['color'=>$Core->styleProperty('dark-font-color') . ' !important']);

		$Core->selector('.color-dtext-l', ['color'=>$Core->LDColor($Core->styleProperty('dark-font-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-dtext-d', ['color'=>$Core->LDColor($Core->styleProperty('dark-font-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);



	$Core->selector('.color-text-hover', ['color'=>$Core->styleProperty('font-color:hover') . ' !important']);

		$Core->selector('.color-text-hover-l', ['color'=>$Core->LDColor($Core->styleProperty('font-color:hover'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-text-hover-d', ['color'=>$Core->LDColor($Core->styleProperty('font-color:hover'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);



	$Core->selector('.color-dark', ['color'=>$Core->styleProperty('palette-dark-color') . ' !important']);

		$Core->selector('.color-dark-l', ['color'=>$Core->LDColor($Core->styleProperty('palette-dark-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-dark-d', ['color'=>$Core->LDColor($Core->styleProperty('palette-dark-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);
	

	$Core->selector('.color-light', ['color'=>$Core->styleProperty('palette-light-color') . ' !important']);

		$Core->selector('.color-light-l', ['color'=>$Core->LDColor($Core->styleProperty('palette-light-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-light-d', ['color'=>$Core->LDColor($Core->styleProperty('palette-light-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	
	$Core->selector('.color-primary', ['color'=>$Core->styleProperty('palette-primary-color') . ' !important']);

		$Core->selector('.color-primary-l', ['color'=>$Core->LDColor($Core->styleProperty('palette-primary-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-primary-d', ['color'=>$Core->LDColor($Core->styleProperty('palette-primary-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

	
	$Core->selector('.color-secondary', ['color'=>$Core->styleProperty('palette-secondary-color') . ' !important']);

		$Core->selector('.color-secondary-l', ['color'=>$Core->LDColor($Core->styleProperty('palette-secondary-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-secondary-d', ['color'=>$Core->LDColor($Core->styleProperty('palette-secondary-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

	
	$Core->selector('.color-tertiary', ['color'=>$Core->styleProperty('palette-tertiary-color') . ' !important']);

		$Core->selector('.color-tertiary-l', ['color'=>$Core->LDColor($Core->styleProperty('palette-tertiary-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-tertiary-d', ['color'=>$Core->LDColor($Core->styleProperty('palette-tertiary-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

	
	$Core->selector('.color-quaternary', ['color'=>$Core->styleProperty('palette-quaternary-color') . ' !important']);

		$Core->selector('.color-quaternary-l', ['color'=>$Core->LDColor($Core->styleProperty('palette-quaternary-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-quaternary-d', ['color'=>$Core->LDColor($Core->styleProperty('palette-quaternary-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);



	$Core->selector('.color-notice', ['color'=>$Core->styleProperty('notice-color') . ' !important']);

		$Core->selector('.color-notice-l', ['color'=>$Core->LDColor($Core->styleProperty('notice-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-notice-d', ['color'=>$Core->LDColor($Core->styleProperty('notice-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	$Core->selector('.color-error', ['color'=>$Core->styleProperty('notice-error-color') . ' !important']);

		$Core->selector('.color-error-l', ['color'=>$Core->LDColor($Core->styleProperty('notice-error-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-error-d', ['color'=>$Core->LDColor($Core->styleProperty('notice-error-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-error-p', ['color'=>$Core->LDColor($Core->styleProperty('notice-error-background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	$Core->selector('.color-warning', ['color'=>$Core->styleProperty('notice-warning-color') . ' !important']);

		$Core->selector('.color-warning-l', ['color'=>$Core->LDColor($Core->styleProperty('notice-warning-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-warning-d', ['color'=>$Core->LDColor($Core->styleProperty('notice-warning-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-warning-p', ['color'=>$Core->LDColor($Core->styleProperty('notice-warning-background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	$Core->selector('.color-success', ['color'=>$Core->styleProperty('notice-success-color') . ' !important']);

		$Core->selector('.color-success-l', ['color'=>$Core->LDColor($Core->styleProperty('notice-success-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-success-d', ['color'=>$Core->LDColor($Core->styleProperty('notice-success-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-success-p', ['color'=>$Core->LDColor($Core->styleProperty('notice-success-background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	$Core->selector('.color-wait', ['color'=>$Core->styleProperty('notice-wait-color') . ' !important']);

		$Core->selector('.color-wait-l', ['color'=>$Core->LDColor($Core->styleProperty('notice-wait-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-wait-d', ['color'=>$Core->LDColor($Core->styleProperty('notice-wait-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.color-wait-p', ['color'=>$Core->LDColor($Core->styleProperty('notice-wait-background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);



	/* Couleurs de l'arriere plan */

	$Core->selector('.bg-text-color', ['background-color'=>$Core->styleProperty('font-color') . ' !important']);

		$Core->selector('.bg-text-color-l', ['background-color'=>$Core->LDColor($Core->styleProperty('font-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-text-color-d', ['background-color'=>$Core->LDColor($Core->styleProperty('font-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);



	$Core->selector('.bg-text-color-hover', ['background-color'=>$Core->styleProperty('font-color:hover') . ' !important']);

		$Core->selector('.bg-text-color-hover-l', ['background-color'=>$Core->LDColor($Core->styleProperty('font-color:hover'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-text-color-hover-d', ['background-color'=>$Core->LDColor($Core->styleProperty('font-color:hover'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);



	$Core->selector('.bg-ncolor', ['background-color'=>$Core->styleProperty('background-color') . ' !important']);

		$Core->selector('.bg-ncolor-l', ['background-color'=>$Core->LDColor($Core->styleProperty('background-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-ncolor-d', ['background-color'=>$Core->LDColor($Core->styleProperty('background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	$Core->selector('.bg-dcolor', ['background-color'=>$Core->styleProperty('dark-background-color') . ' !important']);

		$Core->selector('.bg-dcolor-l', ['background-color'=>$Core->LDColor($Core->styleProperty('dark-background-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-dcolor-d', ['background-color'=>$Core->LDColor($Core->styleProperty('dark-background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

	

	$Core->selector('.bg-dark', ['background-color'=>$Core->styleProperty('palette-dark-color') . ' !important']);

		$Core->selector('.bg-dark-l', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-dark-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-dark-d', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-dark-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	$Core->selector('.bg-light', ['background-color'=>$Core->styleProperty('palette-light-color') . ' !important']);

		$Core->selector('.bg-light-l', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-light-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-light-d', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-light-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

	
	$Core->selector('.bg-primary', ['background-color'=>$Core->styleProperty('palette-primary-color') . ' !important']);

		$Core->selector('.bg-primary-l', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-primary-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-primary-d', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-primary-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

	
	$Core->selector('.bg-secondary', ['background-color'=>$Core->styleProperty('palette-secondary-color') . ' !important']);

		$Core->selector('.bg-secondary-l', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-secondary-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-secondary-d', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-secondary-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

	
	$Core->selector('.bg-tertiary', ['background-color'=>$Core->styleProperty('palette-tertiary-color') . ' !important']);

		$Core->selector('.bg-tertiary-l', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-tertiary-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-tertiary-d', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-tertiary-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

	
	$Core->selector('.bg-quaternary', ['background-color'=>$Core->styleProperty('palette-quaternary-color') . ' !important']);

		$Core->selector('.bg-quaternary-l', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-quaternary-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-quaternary-d', ['background-color'=>$Core->LDColor($Core->styleProperty('palette-quaternary-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);



	$Core->selector('.bg-notice', ['background-color'=>$Core->styleProperty('notice-background-color') . ' !important']);

		$Core->selector('.bg-notice-l', ['background-color'=>$Core->LDColor($Core->styleProperty('notice-background-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-notice-d', ['background-color'=>$Core->LDColor($Core->styleProperty('notice-background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	$Core->selector('.bg-error', ['background-color'=>$Core->styleProperty('notice-error-background-color') . ' !important']);

		$Core->selector('.bg-error-l', ['background-color'=>$Core->LDColor($Core->styleProperty('notice-error-background-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-error-d', ['background-color'=>$Core->LDColor($Core->styleProperty('notice-error-background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	$Core->selector('.bg-warning', ['background-color'=>$Core->styleProperty('notice-warning-background-color') . ' !important']);

		$Core->selector('.bg-warning-l', ['background-color'=>$Core->LDColor($Core->styleProperty('notice-warning-background-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-warning-d', ['background-color'=>$Core->LDColor($Core->styleProperty('notice-warning-background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	$Core->selector('.bg-success', ['background-color'=>$Core->styleProperty('notice-success-background-color') . ' !important']);

		$Core->selector('.bg-success-l', ['background-color'=>$Core->LDColor($Core->styleProperty('notice-success-background-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-success-d', ['background-color'=>$Core->LDColor($Core->styleProperty('notice-success-background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);


	$Core->selector('.bg-wait', ['background-color'=>$Core->styleProperty('notice-wait-background-color') . ' !important']);

		$Core->selector('.bg-wait-l', ['background-color'=>$Core->LDColor($Core->styleProperty('notice-wait-background-color'),$GUI['STANDARD-COLOR-VARIANT']) . ' !important']);

		$Core->selector('.bg-wait-d', ['background-color'=>$Core->LDColor($Core->styleProperty('notice-wait-background-color'),-$GUI['STANDARD-COLOR-VARIANT']) . ' !important']); 

/*
	Couleur arrière plan et texte en fonction de la palette // FIN -------------------
*/








/*
	Taille des Text // DEBUT -------------------------
*/

	for ($tkxz=10; $tkxz <= 52; $tkxz+=2) {

		$Core->selector('*.text-x' . $tkxz , ['font-size'=>$tkxz . 'px']); 
	}

	for ($tkxz=0; $tkxz <= 100; $tkxz++) {

		$Core->selector('*.text-x' . $tkxz .'-vw' , ['font-size'=>$tkxz . 'vw']);

		$Core->selector('*.text-x' . $tkxz .'-vh' , ['font-size'=>$tkxz . 'vh']);

		$Core->selector('*.text-x' . $tkxz .'-em' , ['font-size'=>$tkxz . 'em']);

		$Core->selector('*.text-x' . $tkxz .'-p' , ['font-size'=>$tkxz . '%']);
	}

/*
	Taille des Text // FIN -------------------------
*/








/*
	Espacement Intérieur : Padding // DEBUT -------------------------
*/

	for ($pdnngx=0; $pdnngx <= 64; $pdnngx+=4) {

		$Core->selector('*.padding-x' . $pdnngx , ['padding'=>$pdnngx . 'px']); 

		$Core->selector('*.padding-tb-x' . $pdnngx , ['padding-top && padding-bottom'=>$pdnngx . 'px']); 

		$Core->selector('*.padding-lr-x' . $pdnngx , ['padding-left && padding-right'=>$pdnngx . 'px']); 

		$Core->selector('*.padding-t-x' . $pdnngx , ['padding-top'=>$pdnngx . 'px']); 

		$Core->selector('*.padding-b-x' . $pdnngx , ['padding-bottom'=>$pdnngx . 'px']); 

		$Core->selector('*.padding-l-x' . $pdnngx , ['padding-left'=>$pdnngx . 'px']); 

		$Core->selector('*.padding-r-x' . $pdnngx , ['padding-right'=>$pdnngx . 'px']); 

	}

/*
	Espacement Intérieur : Padding // FIN -------------------------
*/








/*
	Espacement Extérieur : Margin // DEBUT -------------------------
*/

	for ($mrgnx=0; $mrgnx <= 64; $mrgnx+=4) {

		$Core->selector('*.margin-x' . $mrgnx , ['margin'=>$mrgnx . 'px']); 

		$Core->selector('*.margin-tb-x' . $mrgnx , ['margin-top && margin-bottom'=>$mrgnx . 'px']); 

		$Core->selector('*.margin-lr-x' . $mrgnx , ['margin-left && margin-right'=>$mrgnx . 'px']); 

		$Core->selector('*.margin-t-x' . $mrgnx , ['margin-top'=>$mrgnx . 'px']); 

		$Core->selector('*.margin-b-x' . $mrgnx , ['margin-bottom'=>$mrgnx . 'px']); 

		$Core->selector('*.margin-l-x' . $mrgnx , ['margin-left'=>$mrgnx . 'px']); 

		$Core->selector('*.margin-r-x' . $mrgnx , ['margin-right'=>$mrgnx . 'px']); 

	}

/*
	Espacement Extérieur : Margin // FIN -------------------------
*/








/*
	Box : STYLE // DEBUT -------------------------
*/



$Core->selector('.gui-transition', ['transition'=>'all 300ms ease']);

$Core->selector('.box-rounded,.box-rounded-min', ['border-radius'=>'3px']);

$Core->selector('.box-rounded-smaller', ['border-radius'=>'5px']);

$Core->selector('.box-rounded-normal', ['border-radius'=>'7px']);

$Core->selector('.box-rounded-semi-biggest', ['border-radius'=>'10px']);

$Core->selector('.box-rounded-biggest', ['border-radius'=>'15px']);


$Core->selector('.box-circle', ['border-radius'=>'360px']);


$Core->selector('.box-shadow-light', ['box-shadow'=>'0px 5px 7px rgba(' . $Core->styleProperty('palette-light-color-rgb') . ',.64)']);

$Core->selector('.box-shadow-dark', ['box-shadow'=>'0px 5px 7px rgba(' . $Core->styleProperty('palette-dark-color-rgb') . ',.32)']);

$Core->selector('.box-shadow-white', ['box-shadow'=>'0px 5px 7px rgba(255,255,255,.50)']);

$Core->selector('.box-shadow-black', ['box-shadow'=>'0px 5px 7px rgba(0,0,0,.50)']);



/* 
	Rotation
*/
$Core->selector('.box-rotate-0', ['transform'=>'rotate(0deg)']);

$Core->selector('.box-rotate-90', ['transform'=>'rotate(90deg)']);

$Core->selector('.box-rotate-180', ['transform'=>'rotate(180deg)']);

$Core->selector('.box-rotate-270', ['transform'=>'rotate(270deg)']);

$Core->selector('.box-rotate-360', ['transform'=>'rotate(360deg)']);

/*
	Box : STYLE // FIN -------------------------
*/






/*
	Box : Check // DEBUT -------------------------
*/

$Core->selector('.box-check'

	, [

		'transition'=>'all 0.3s ease'

	]

);



$Core->selector(

		'.box-check:hover'

		.',.box-check.checked'

	, [

		'background-color'=>$Core->styleProperty('palette-primary-color') . ' !important'

	]

);



$Core->selector(

		'.box-check:hover'

		.',.box-check:hover *'

		.',.box-check.checked'

		.',.box-check.checked *'

	, [

		'color'=>$Core->styleProperty('background-color') . ' !important'

	]

);



$Core->selector(

		'.box-check.checked:hover'

		.',.box-check.checked:hover *'

	, [

		'background-color'=>($Core->styleProperty('palette-secondary-color')) . ' !important'

		// ,'color'=>($Core->styleProperty('palette-secondary-color')) . ' !important'

	]

);

/*
	Box : Check // FIN -------------------------
*/


	





?>