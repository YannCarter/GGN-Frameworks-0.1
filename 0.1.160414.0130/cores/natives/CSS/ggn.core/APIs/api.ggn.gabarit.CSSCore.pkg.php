/* Fichier : Gougnon.CSS.Gabarit.cssg, Nom : Gougnon CSS Gabarit, version 0.0.1.150303.1434, site: http://gougnon.com , License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU */
<?php




/* PARAMETRES */
require self::commonFile('.settings');





/* 
	De Base DEBUT ======================================
*/

$Core->selector('a:focus'
	
	, [
	
		// 'outline'=> '0px solid rgba(' . $Core->styleProperty('palette-tertiary-color-rgb') . ',.55)'
	
		// ,'background-clip'=>'content-box'
	
	]

);




/* 
	De Base FIN ======================================
*/





/* 
	Paragraphe DEBUT ======================================
*/

$Core->selector('p'

	, [

		'font-size'=> '13px'
		,'padding'=> '10px 15px'

	]

);


/* 
	Paragraphe FIN ======================================
*/





/* 
	Barre de Navigation DEBUT ======================================
*/

$Core->selector('.gui.gabarit.navbar'

	, [

		'background-color'=> $Core->styleProperty('palette-secondary-color')

		,'z-index'=> '100'

		,'transition'=> 'background-color 0.3s ease-out'

	]

);


/* 
	Barre de Navigation FIN ======================================
*/





/* 
	Menu DEBUT ======================================
*/

/* Item */
$Core->selector('.gui.gabarit.menu, .gui.gabarit.menu > .items'
	, [
		'height'=> '100%'
	]
);

$Core->selector('.gui.gabarit.menu > .items a', ['text-decoration'=> 'none','height'=> '100%']);

$Core->selector('.gui.gabarit.menu > .items .item'

	, [

		'background-color'=> 'transparent'

		,'height'=> '100%'

		,'transition'=> 'background-color 0.3s ease-out'

	]

);

$Core->selector('.gui.gabarit.menu > .items div.item > *', ['margin'=> 'auto'] );

$Core->selector(
		'.gui.gabarit.menu > .items .item:hover'
		.',.gui.gabarit.menu > .items .item.active'

	, [

		'background-color'=> 'rgba(' . $Core->styleProperty('dark-background-color-rgb') .',.2)'

	]

);


/* Label */
$Core->selector('.gui.gabarit.menu > .items .item > .label'

	, [

		'color'=> $Core->styleProperty('font-color')

		,'font-size'=> '14px'

	]

);


$Core->selector(
		'.gui.gabarit.menu > .items .item:hover > .label'
		.',.gui.gabarit.menu > .items .item.active > .label'

	, [

		'filter'=> 'blur(0px)'

		,'animation'=> 'ggnBlurMotionOut 0.5s ease-out'

	]

);




/* Avec Sous menu */
$Core->selector('.gui.gabarit.menu > .items .item.with-sub-item > .sub-item'
	, [
		'width && height'=>'0px'
		,'overflow'=>'hidden'
		,'margin-top'=>'20%'
		,'transition'=>'width,margin-top, 0.3s ease-out'
	]
);

$Core->selector('.gui.gabarit.menu > .items .item.with-sub-item:hover > .sub-item'
	, [
		'width && height'=>'auto'
		,'overflow'=>'none'
		,'margin-top'=>'0px'
		,'animation'=>'ggnBlurMotionOut 0.3s ease-out'
	]
);

$Core->selector('.gui.gabarit.menu > .items .item.with-sub-item .sub-item > a', [
	'color'=> $Core->styleProperty('font-color')
]);

$Core->selector('.gui.gabarit.menu > .items .item.with-sub-item .sub-item'
	, [
		'background-color'=> $Core->styleProperty('palette-secondary-color')
	]
);


$Core->selector('.gui.gabarit.menu > .items .item.with-sub-item .sub-item > .item'
	, [
		'padding'=>'10px 15px'
	]
);



/* 
	Menu FIN ======================================
*/










/* 
	Item DEBUT ======================================
*/

/* Item  */
$Core->selector('.gui.items'
	, [
	]
);

$Core->selector('.gui.items > .items'
	, [
		'padding'=> '0px'
	]
);

$Core->selector('.gui.items > .items > .item'
	, [
		// 'padding'=> '5px'
	]
);


/* Item : Vertical  */
$Core->selector('.gui.items.column'
	, [
		// ''=>''
	]
);

$Core->selector('.gui.items.column'
	, [
		'flex-direction'=> 'column'
	]
);

$Core->selector('.gui.items.column > .item'
	, [
		'padding'=> '7px 12px'
	]
);




/* Item : Horizontal  */
$Core->selector('.gui.items.row'
	, [
		// ''=>''
	]
);

$Core->selector('.gui.items.row'
	, [
		'flex-direction'=> 'row'
	]
);

$Core->selector('.gui.items.row > .item.text'
	, [
		'padding'=> '7px 12px'
	]
);





/* Item : Grille  */
$Core->selector('.gui.items.grid'
	, [
		'flex-wrap'=>'wrap'
	]
);

$Core->selector('.gui.items.grid .item'
	, [
		'flex-direction'=>'column'
		,'margin-bottom && margin-top'=>'25px'
	]
);


$Core->selector('.gui.items.grid .item > .env'
	, [
		// 'background-color'=>$Core->styleProperty('background-color')
		'padding-bottom' => '10px'
	]
);


$Core->selector('.gui.items.grid .item > *'
	, [
		'margin-left && margin-right'=>'1px'
	]
);


$Core->selector('.gui.items.grid .item .photo'
	, [
		'background-color'=>$Core->styleProperty('palette-dark-color')
	]
);



$Core->selector(
		'.gui.items.grid .item .title'
		.',.gui.items.grid .item .about'
		.',.gui.items.grid .item .type'
	, [
		'margin-right && margin-left'=>'15px'
	]
);



$Core->selector('.gui.items.grid .item .type'
	, [
		'font-size'=>'13px'
	]
);


/* 
	Item FIN =================================================== 
*/





?>