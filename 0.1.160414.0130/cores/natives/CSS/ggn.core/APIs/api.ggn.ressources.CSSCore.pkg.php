/* Fichier : Gougnon.CSS.Awake.Confirm.cssg, Nom : Gougnon CSS Framework, version 0.0.1.150303.1434, site: http://gougnon.com , License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU */
<?php




/* PARAMETRES */
require self::commonFile('.settings');








/* UI */
$Core->selector('.ggn-rsrc-ui'

	, [
		
	]

);








/* Items des importations */
$Core->selector('.ggn-rsrc-ui .import-items'

	, [

		// ''=>''
		
	]

);

$Core->selector('.ggn-rsrc-ui .import-items > .item'

	, [

		// ''=>''
		
	]

);

$Core->selector('.ggn-rsrc-ui .import-items > .item > .thumb'

	, [

		'background-color'=> 'rgba(' . $Core->styleProperty('palette-dark-color-rgb') . ',.3)'

		,'background-repeat'=> 'no-repeat'

		,'background-position'=> 'center'

		,'background-size'=> '100%'
		
	]

);

$Core->selector('.ggn-rsrc-ui .import-items > .item > .progress > .bar'

	, [

		'background-color'=>'rgba(255,255,255,.3)'

		,'height'=>'7px'

		,'overflow'=>'hidden'
		
	]

);

$Core->selector('.ggn-rsrc-ui .import-items > .item > .progress > .bar > .track'

	, [

		'background-color'=>'#fff'
		
	]

);








/* Formulaire d'importation  */
$Core->selector('.ggn-rsrc-ui-import-form'

	, [

		// ''=>''
		
	]

);

$Core->selector('.ggn-rsrc-ui-import-form > .choose'

	, [

		'background-color'=>'rgba(0,0,0,.2)'
		
	]

);




/* Zone de treatement */
$Core->selector('.ggn-rsrc-ui > .uhead > .uh'

	, [

		'height'=>'0px'

	]

);

$Core->selector('.ggn-rsrc-ui > .uhead > .uh.open'

	, [

		'height'=>'256px'

	]

);




/* Outils */
$Core->selector('.ggn-rsrc-ui > .uhead > .tools a'

	, [

		'color'=>$Core->styleProperty('palette-light-color')

	]

);

// $Core->selector('.ggn-rsrc-ui > .uhead > .tools'

// 	, [

// 	]

// );

// $Core->selector('.ggn-rsrc-ui > .uhead > .tools > .tool.label'

// 	, [
// 	]

// );

$Core->selector('.ggn-rsrc-ui > .uhead > .tools > .tool'

	, [

		'padding'=>'9px 16px'

		,'border-radius'=>'0px'

		,'transition'=>'all 300ms ease'

	]

);

$Core->selector('.ggn-rsrc-ui > .uhead > .tools > .tool .icon:nth-child(0)'

	, [

		'padding-left'=>'8px'

	]

);

$Core->selector('.ggn-rsrc-ui > .uhead > .tools > .tool .icon:nth-child(1)'

	, [

		'padding-right'=>'8px'

	]

);

$Core->selector(

		'.ggn-rsrc-ui > .uhead > .tools > .tool:hover:not(.label)'

		.',.ggn-rsrc-ui > .uhead > .tools > .tool.active'

	, [

		'background-color'=>'rgba(0,0,0,.2)'

	]

);
