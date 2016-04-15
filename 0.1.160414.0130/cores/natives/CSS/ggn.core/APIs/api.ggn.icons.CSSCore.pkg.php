/* Fichier : Gougnon.CSS.framework.cssg, Nom : Gougnon CSS Framework, version 0.0.1.151031.0232, site: http://gougnon.com , License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU */
<?php

/* PARAMETRES */
require self::commonFile('.settings');




/* Font Icons : Themify */
$FontDir = 'x-icons/';

$Core->Code('@font-face {');
	$Core->Code('font-family: "themify";');
	$Core->Code("src: url('".HTTP_HOST.$FontDir."index.eot.font?-fvbane');");
    $Core->Code("src: url('".HTTP_HOST.$FontDir."index.eot.font?#iefix-fvbane') format('embedded-opentype'),");
         $Core->Code("url('".HTTP_HOST.$FontDir."index.woff.font?-fvbane') format('woff'),");
         $Core->Code("url('".HTTP_HOST.$FontDir."index.ttf.font?-fvbane') format('truetype'),");
        $Core->Code(" url('".HTTP_HOST.$FontDir."index.svg.font?-fvbane#themify') format('svg');");
    $Core->Code("font-weight: normal;");
    $Core->Code("font-style: normal;");
$Core->Code('}');




// /* Font Icons : Iconic */
// $FontDir = 'x-icons/';

// $Core->Code('@font-face {');
// 	$Core->Code('font-family: "Iconic";');
// 	$Core->Code("src: url('".HTTP_HOST.$FontDir."index.eot.font');");
//     $Core->Code("src: url('".HTTP_HOST.$FontDir."index.eot.font?#iconic-sm') format('embedded-opentype'),");
//          $Core->Code("url('".HTTP_HOST.$FontDir."index.woff.font') format('woff'),");
//          $Core->Code("url('".HTTP_HOST.$FontDir."index.ttf.font') format('truetype'),");
//         $Core->Code(" url('".HTTP_HOST.$FontDir."index.svg.font#Iconic') format('svg');");
//     $Core->Code("font-weight: normal;");
//     $Core->Code("font-style: normal;");
// $Core->Code('}');





/* Style */

/* Dimension */
$Core->selector('.gui.icon'
	,[
		'text-align'=>'center'
		,'transition'=>'color,font-size, 0.3s ease-out'
	]
);

$Core->selector('.gui.icon.auto-size', ['font-size'=>'85%']);
$Core->selector('.gui.icon.half-size', ['font-size'=>'50%']);
$Core->selector('.gui.icon.min-size', ['font-size'=>'16px']);
$Core->selector('.gui.icon.n-size', ['font-size'=>'25px']);
$Core->selector('.gui.icon.max-size', ['font-size'=>'32px']);

$Core->selector('.gui.icon.max-size', ['font-size'=>'32px']);



/* Couleur */
$Core->selector('.gui.icon.normal'.',.gui.icon.static-normal'.',.gui.icon.color:hover', ['fill && color'=> $Core->styleProperty('font-color') ] );
$Core->selector('.gui.icon.normal:hover'.',.gui.icon.color'.',.gui.icon.static-color', ['fill && color'=>$Core->styleProperty('palette-primary-color') ] );
$Core->selector('.gui.icon.dark'.',.gui.icon.static-dark'.',.gui.icon.light:hover', ['fill && color'=>$GUI['DARK_TONE'] ] );
$Core->selector('.gui.icon.light'.',.gui.icon.static-light'. ',.gui.icon.dark:hover', ['fill && color'=>$GUI['LIGHT_TONE'] ] );
$Core->selector('.gui.icon.pattern'.',.gui.icon.static-pattern'. ',.gui.icon.dark-pattern:hover', ['fill && color'=>$Core->styleProperty('background-color') ] );
$Core->selector('.gui.icon.dark-pattern'.',.gui.icon.static-dark-pattern'. ',.gui.icon.pattern:hover', ['fill && color'=>$Core->styleProperty('dark-background-color') ] );








/*
	Pour ICON Applications
*/
// foreach (explode(' ', $GUI['gui.icon.list']) as $icon) {
// 	$s=$GUI['gui.icon.size'];
// 	$size = '&width='.$s.'&height='.$s.'';

// 	$Core->selector(
// 		'.gui.icon.'.$icon.'.normal'
// 		.',.gui.icon.'.$icon.'.static-normal'
// 		.',.gui.icon.'.$icon.'.color:hover'
// 		, [
// 			'background-image'=>'url(' . $GAppsPath . $icon . '.png'.$GUI['IMAGE_FILTER_TEXT_COLOR_TONE'].$size.')'
// 			,'fill'=>$Core->styleProperty('font-color')
// 		]
// 	);

// 	$Core->selector(
// 			'.gui.icon.'.$icon.'.normal:hover'
// 			.',.gui.icon.'.$icon.'.color'
// 			.',.gui.icon.'.$icon.'.static-color'
// 		, [
// 			'background-image'=>'url(' . $GAppsPath . $icon . '.png'.$GUI['IMAGE_FILTER_TEXT_HOVER_TONE'].$size.')'
// 			,'fill'=>$Core->styleProperty('palette-primary-color')
// 		]
// 	);

// 	$Core->selector(
// 			'.gui.icon.'.$icon.'.dark' 
// 			.',.gui.icon.'.$icon.'.static-dark' 
// 			.',.gui.icon.'.$icon.'.light:hover'
// 		, [
// 			'background-image'=>'url(' . $GAppsPath . $icon . '.png'.$GUI['IMAGE_FILTER_DARK_TONE'].$size.')'
// 			,'fill'=>$GUI['DARK_TONE_RGB']
// 		]
// 	);
	
// 	$Core->selector(
// 		'.gui.icon.'.$icon.'.light'
// 		.',.gui.icon.'.$icon.'.static-light'
// 		. ',.gui.icon.'.$icon.'.dark:hover'
// 		, [
// 			'background-image'=>'url(' . $GAppsPath . $icon . '.png'.$GUI['IMAGE_FILTER_LIGHT_TONE'].$size.')'
// 			,'fill'=>$GUI['LIGHT_TONE_RGB']
// 		]
// 	);
	
// 	$Core->selector(
// 		'.gui.icon.'.$icon.'.pattern' 
// 		.',.gui.icon.'.$icon.'.static-pattern' 
// 		. ',.gui.icon.'.$icon.'.dark-pattern:hover'
// 		, [
// 			'background-image'=>'url(' . $GAppsPath . $icon . '.png'.$GUI['IMAGE_FILTER_NORMAL_PATTERN_TONE'].$size.')'
// 			,'fill'=>$Core->styleProperty('background-color')
// 		]
// 	);
	
// 	$Core->selector(
// 		'.gui.icon.'.$icon.'.dark-pattern'
// 		.',.gui.icon.'.$icon.'.static-dark-pattern'
// 		. ',.gui.icon.'.$icon.'.pattern:hover'
// 		, [
// 			'background-image'=>'url(' . $GAppsPath . $icon . '.png'.$GUI['IMAGE_FILTER_DARK_PATTERN_TONE'].$size.')'
// 			,'fill'=>$Core->styleProperty('dark-background-color')
// 		]
// 	);
	
// }





$Core->selector('.gui.icon.text-replace'
	,[
		'font-size'=> '0'
		,'line-height'=> '0'
	]
);





$Core->selector('.gui.icon.text-replace:before'
	,[
		'width'=> '1em'
		,'text-align'=> 'center'
	]
);





$Core->selector('[class*=" icon "]'
	,[
		'font-family'=> '"themify"'
		// 'font-family'=> '"x-icons"'
		,'display'=>'inline-block'
		,'speak'=>'none'
		,'line-height'=>'1'
		,'vertical-align'=>'baseline'
		,'font-weight'=>'normal'
		,'font-style'=>'normal'
		// ,'font-variant'=>'normal'
		// ,'text-transform'=>'none'
		,'-webkit-font-smoothing'=> 'antialiased'
		,'-moz-osx-font-smoothing'=> 'grayscale'
	]
);


$Core->selector('.gui.icon.volume:before', ['content'=> '"\\e601"'] );
$Core->selector('.gui.icon.user:before', ['content'=> '"\\e602"'] );
$Core->selector('.gui.icon.unlock:before', ['content'=> '"\\e603"'] );
$Core->selector('.gui.icon.unlink:before', ['content'=> '"\\e604"'] );
$Core->selector('.gui.icon.trash:before', ['content'=> '"\\e605"'] );
$Core->selector('.gui.icon.thought:before', ['content'=> '"\\e606"'] );
$Core->selector('.gui.icon.target:before', ['content'=> '"\\e607"'] );
$Core->selector('.gui.icon.tag:before', ['content'=> '"\\e608"'] );
$Core->selector('.gui.icon.tablet:before', ['content'=> '"\\e609"'] );
$Core->selector('.gui.icon.star:before', ['content'=> '"\\e60a"'] );
$Core->selector('.gui.icon.spray:before', ['content'=> '"\\e60b"'] );
$Core->selector('.gui.icon.signal:before', ['content'=> '"\\e60c"'] );
$Core->selector('.gui.icon.shopping-cart:before', ['content'=> '"\\e60d"'] );
$Core->selector('.gui.icon.shopping-cart-full:before', ['content'=> '"\\e60e"'] );
$Core->selector('.gui.icon.settings:before', ['content'=> '"\\e60f"'] );
$Core->selector('.gui.icon.search:before', ['content'=> '"\\e610"'] );
$Core->selector('.gui.icon.zoom-in:before', ['content'=> '"\\e611"'] );
$Core->selector('.gui.icon.zoom-out:before', ['content'=> '"\\e612"'] );
$Core->selector('.gui.icon.cut:before', ['content'=> '"\\e613"'] );
$Core->selector('.gui.icon.ruler:before', ['content'=> '"\\e614"'] );
$Core->selector('.gui.icon.ruler-pencil:before', ['content'=> '"\\e615"'] );
$Core->selector('.gui.icon.ruler-alt:before', ['content'=> '"\\e616"'] );
$Core->selector('.gui.icon.bookmark:before', ['content'=> '"\\e617"'] );
$Core->selector('.gui.icon.bookmark-alt:before', ['content'=> '"\\e618"'] );
$Core->selector('.gui.icon.reload:before', ['content'=> '"\\e619"'] );
$Core->selector('.gui.icon.plus:before', ['content'=> '"\\e61a"'] );
$Core->selector('.gui.icon.pin:before', ['content'=> '"\\e61b"'] );
$Core->selector('.gui.icon.pencil:before', ['content'=> '"\\e61c"'] );
$Core->selector('.gui.icon.pencil-alt:before', ['content'=> '"\\e61d"'] );
$Core->selector('.gui.icon.paint-roller:before', ['content'=> '"\\e61e"'] );
$Core->selector('.gui.icon.paint-bucket:before', ['content'=> '"\\e61f"'] );
$Core->selector('.gui.icon.na:before', ['content'=> '"\\e620"'] );
$Core->selector('.gui.icon.mobile:before', ['content'=> '"\\e621"'] );
$Core->selector('.gui.icon.minus:before', ['content'=> '"\\e622"'] );
$Core->selector('.gui.icon.medall:before', ['content'=> '"\\e623"'] );
$Core->selector('.gui.icon.medall-alt:before', ['content'=> '"\\e624"'] );
$Core->selector('.gui.icon.marker:before', ['content'=> '"\\e625"'] );
$Core->selector('.gui.icon.marker-alt:before', ['content'=> '"\\e626"'] );
$Core->selector('.gui.icon.arrow-up:before', ['content'=> '"\\e627"'] );
$Core->selector('.gui.icon.arrow-right:before', ['content'=> '"\\e628"'] );
$Core->selector('.gui.icon.arrow-left:before', ['content'=> '"\\e629"'] );
$Core->selector('.gui.icon.arrow-down:before', ['content'=> '"\\e62a"'] );
$Core->selector('.gui.icon.lock:before', ['content'=> '"\\e62b"'] );
$Core->selector('.gui.icon.location-arrow:before', ['content'=> '"\\e62c"'] );
$Core->selector('.gui.icon.link:before', ['content'=> '"\\e62d"'] );
$Core->selector('.gui.icon.layout:before', ['content'=> '"\\e62e"'] );
$Core->selector('.gui.icon.layers:before', ['content'=> '"\\e62f"'] );
$Core->selector('.gui.icon.layers-alt:before', ['content'=> '"\\e630"'] );
$Core->selector('.gui.icon.key:before', ['content'=> '"\\e631"'] );
$Core->selector('.gui.icon.import:before', ['content'=> '"\\e632"'] );
$Core->selector('.gui.icon.image:before', ['content'=> '"\\e633"'] );
$Core->selector('.gui.icon.heart:before', ['content'=> '"\\e634"'] );
$Core->selector('.gui.icon.heart-broken:before', ['content'=> '"\\e635"'] );
$Core->selector('.gui.icon.hand-stop:before', ['content'=> '"\\e636"'] );
$Core->selector('.gui.icon.hand-open:before', ['content'=> '"\\e637"'] );
$Core->selector('.gui.icon.hand-drag:before', ['content'=> '"\\e638"'] );
$Core->selector('.gui.icon.folder:before', ['content'=> '"\\e639"'] );
$Core->selector('.gui.icon.flag:before', ['content'=> '"\\e63a"'] );
$Core->selector('.gui.icon.flag-alt:before', ['content'=> '"\\e63b"'] );
$Core->selector('.gui.icon.flag-alt-2:before', ['content'=> '"\\e63c"'] );
$Core->selector('.gui.icon.eye:before', ['content'=> '"\\e63d"'] );
$Core->selector('.gui.icon.export:before', ['content'=> '"\\e63e"'] );
$Core->selector('.gui.icon.exchange-vertical:before', ['content'=> '"\\e63f"'] );
$Core->selector('.gui.icon.desktop:before', ['content'=> '"\\e640"'] );
$Core->selector('.gui.icon.cup:before', ['content'=> '"\\e641"'] );
$Core->selector('.gui.icon.crown:before', ['content'=> '"\\e642"'] );
$Core->selector('.gui.icon.comments:before', ['content'=> '"\\e643"'] );
$Core->selector('.gui.icon.comment:before', ['content'=> '"\\e644"'] );
$Core->selector('.gui.icon.comment-alt:before', ['content'=> '"\\e645"'] );
$Core->selector('.gui.icon.close:before', ['content'=> '"\\e646"'] );
$Core->selector('.gui.icon.clip:before', ['content'=> '"\\e647"'] );
$Core->selector('.gui.icon.angle-up:before', ['content'=> '"\\e648"'] );
$Core->selector('.gui.icon.angle-right:before', ['content'=> '"\\e649"'] );
$Core->selector('.gui.icon.angle-left:before', ['content'=> '"\\e64a"'] );
$Core->selector('.gui.icon.angle-down:before', ['content'=> '"\\e64b"'] );
$Core->selector('.gui.icon.check:before', ['content'=> '"\\e64c"'] );
$Core->selector('.gui.icon.check-box:before', ['content'=> '"\\e64d"'] );
$Core->selector('.gui.icon.camera:before', ['content'=> '"\\e64e"'] );
$Core->selector('.gui.icon.announcement:before', ['content'=> '"\\e64f"'] );
$Core->selector('.gui.icon.brush:before', ['content'=> '"\\e650"'] );
$Core->selector('.gui.icon.briefcase:before', ['content'=> '"\\e651"'] );
$Core->selector('.gui.icon.bolt:before', ['content'=> '"\\e652"'] );
$Core->selector('.gui.icon.bolt-alt:before', ['content'=> '"\\e653"'] );
$Core->selector('.gui.icon.blackboard:before', ['content'=> '"\\e654"'] );
$Core->selector('.gui.icon.bag:before', ['content'=> '"\\e655"'] );
$Core->selector('.gui.icon.move:before', ['content'=> '"\\e656"'] );
$Core->selector('.gui.icon.arrows-vertical:before', ['content'=> '"\\e657"'] );
$Core->selector('.gui.icon.arrows-horizontal:before', ['content'=> '"\\e658"'] );
$Core->selector('.gui.icon.fullscreen:before', ['content'=> '"\\e659"'] );
$Core->selector('.gui.icon.arrow-top-right:before', ['content'=> '"\\e65a"'] );
$Core->selector('.gui.icon.arrow-top-left:before', ['content'=> '"\\e65b"'] );
$Core->selector('.gui.icon.arrow-circle-up:before', ['content'=> '"\\e65c"'] );
$Core->selector('.gui.icon.arrow-circle-right:before', ['content'=> '"\\e65d"'] );
$Core->selector('.gui.icon.arrow-circle-left:before', ['content'=> '"\\e65e"'] );
$Core->selector('.gui.icon.arrow-circle-down:before', ['content'=> '"\\e65f"'] );
$Core->selector('.gui.icon.angle-double-up:before', ['content'=> '"\\e660"'] );
$Core->selector('.gui.icon.angle-double-right:before', ['content'=> '"\\e661"'] );
$Core->selector('.gui.icon.angle-double-left:before', ['content'=> '"\\e662"'] );
$Core->selector('.gui.icon.angle-double-down:before', ['content'=> '"\\e663"'] );
$Core->selector('.gui.icon.zip:before', ['content'=> '"\\e664"'] );
$Core->selector('.gui.icon.world:before', ['content'=> '"\\e665"'] );
$Core->selector('.gui.icon.wheelchair:before', ['content'=> '"\\e666"'] );
$Core->selector('.gui.icon.view-list:before', ['content'=> '"\\e667"'] );
$Core->selector('.gui.icon.view-list-alt:before', ['content'=> '"\\e668"'] );
$Core->selector('.gui.icon.view-grid:before', ['content'=> '"\\e669"'] );
$Core->selector('.gui.icon.uppercase:before', ['content'=> '"\\e66a"'] );
$Core->selector('.gui.icon.upload:before', ['content'=> '"\\e66b"'] );
$Core->selector('.gui.icon.underline:before', ['content'=> '"\\e66c"'] );
$Core->selector('.gui.icon.truck:before', ['content'=> '"\\e66d"'] );
$Core->selector('.gui.icon.timer:before', ['content'=> '"\\e66e"'] );
$Core->selector('.gui.icon.ticket:before', ['content'=> '"\\e66f"'] );
$Core->selector('.gui.icon.thumb-up:before', ['content'=> '"\\e670"'] );
$Core->selector('.gui.icon.thumb-down:before', ['content'=> '"\\e671"'] );
$Core->selector('.gui.icon.text:before', ['content'=> '"\\e672"'] );
$Core->selector('.gui.icon.stats-up:before', ['content'=> '"\\e673"'] );
$Core->selector('.gui.icon.stats-down:before', ['content'=> '"\\e674"'] );
$Core->selector('.gui.icon.split-v:before', ['content'=> '"\\e675"'] );
$Core->selector('.gui.icon.split-h:before', ['content'=> '"\\e676"'] );
$Core->selector('.gui.icon.smallcap:before', ['content'=> '"\\e677"'] );
$Core->selector('.gui.icon.shine:before', ['content'=> '"\\e678"'] );
$Core->selector('.gui.icon.shift-right:before', ['content'=> '"\\e679"'] );
$Core->selector('.gui.icon.shift-left:before', ['content'=> '"\\e67a"'] );
$Core->selector('.gui.icon.shield:before', ['content'=> '"\\e67b"'] );
$Core->selector('.gui.icon.notepad:before', ['content'=> '"\\e67c"'] );
$Core->selector('.gui.icon.server:before', ['content'=> '"\\e67d"'] );
$Core->selector('.gui.icon.quote-right:before', ['content'=> '"\\e67e"'] );
$Core->selector('.gui.icon.quote-left:before', ['content'=> '"\\e67f"'] );
$Core->selector('.gui.icon.pulse:before', ['content'=> '"\\e680"'] );
$Core->selector('.gui.icon.printer:before', ['content'=> '"\\e681"'] );
$Core->selector('.gui.icon.power-off:before', ['content'=> '"\\e682"'] );
$Core->selector('.gui.icon.plug:before', ['content'=> '"\\e683"'] );
$Core->selector('.gui.icon.pie-chart:before', ['content'=> '"\\e684"'] );
$Core->selector('.gui.icon.paragraph:before', ['content'=> '"\\e685"'] );
$Core->selector('.gui.icon.panel:before', ['content'=> '"\\e686"'] );
$Core->selector('.gui.icon.package:before', ['content'=> '"\\e687"'] );
$Core->selector('.gui.icon.music:before', ['content'=> '"\\e688"'] );
$Core->selector('.gui.icon.music-alt:before', ['content'=> '"\\e689"'] );
$Core->selector('.gui.icon.mouse:before', ['content'=> '"\\e68a"'] );
$Core->selector('.gui.icon.mouse-alt:before', ['content'=> '"\\e68b"'] );
$Core->selector('.gui.icon.money:before', ['content'=> '"\\e68c"'] );
$Core->selector('.gui.icon.microphone:before', ['content'=> '"\\e68d"'] );
$Core->selector('.gui.icon.menu:before', ['content'=> '"\\e68e"'] );
$Core->selector('.gui.icon.menu-alt:before', ['content'=> '"\\e68f"'] );
$Core->selector('.gui.icon.map:before', ['content'=> '"\\e690"'] );
$Core->selector('.gui.icon.map-alt:before', ['content'=> '"\\e691"'] );
$Core->selector('.gui.icon.loop:before', ['content'=> '"\\e692"'] );
$Core->selector('.gui.icon.location-pin:before', ['content'=> '"\\e693"'] );
$Core->selector('.gui.icon.list:before', ['content'=> '"\\e694"'] );
$Core->selector('.gui.icon.light-bulb:before', ['content'=> '"\\e695"'] );
$Core->selector('.gui.icon.Italic:before', ['content'=> '"\\e696"'] );
$Core->selector('.gui.icon.info:before', ['content'=> '"\\e697"'] );
$Core->selector('.gui.icon.infinite:before', ['content'=> '"\\e698"'] );
$Core->selector('.gui.icon.id-badge:before', ['content'=> '"\\e699"'] );
$Core->selector('.gui.icon.hummer:before', ['content'=> '"\\e69a"'] );
$Core->selector('.gui.icon.home:before', ['content'=> '"\\e69b"'] );
$Core->selector('.gui.icon.help:before', ['content'=> '"\\e69c"'] );
$Core->selector('.gui.icon.headphone:before', ['content'=> '"\\e69d"'] );
$Core->selector('.gui.icon.harddrives:before', ['content'=> '"\\e69e"'] );
$Core->selector('.gui.icon.harddrive:before', ['content'=> '"\\e69f"'] );
$Core->selector('.gui.icon.gift:before', ['content'=> '"\\e6a0"'] );
$Core->selector('.gui.icon.game:before', ['content'=> '"\\e6a1"'] );
$Core->selector('.gui.icon.filter:before', ['content'=> '"\\e6a2"'] );
$Core->selector('.gui.icon.files:before', ['content'=> '"\\e6a3"'] );
$Core->selector('.gui.icon.file:before', ['content'=> '"\\e6a4"'] );
$Core->selector('.gui.icon.eraser:before', ['content'=> '"\\e6a5"'] );
$Core->selector('.gui.icon.envelope:before', ['content'=> '"\\e6a6"'] );
$Core->selector('.gui.icon.download:before', ['content'=> '"\\e6a7"'] );
$Core->selector('.gui.icon.direction:before', ['content'=> '"\\e6a8"'] );
$Core->selector('.gui.icon.direction-alt:before', ['content'=> '"\\e6a9"'] );
$Core->selector('.gui.icon.dashboard:before', ['content'=> '"\\e6aa"'] );
$Core->selector('.gui.icon.control-stop:before', ['content'=> '"\\e6ab"'] );
$Core->selector('.gui.icon.control-shuffle:before', ['content'=> '"\\e6ac"'] );
$Core->selector('.gui.icon.control-play:before', ['content'=> '"\\e6ad"'] );
$Core->selector('.gui.icon.control-pause:before', ['content'=> '"\\e6ae"'] );
$Core->selector('.gui.icon.control-forward:before', ['content'=> '"\\e6af"'] );
$Core->selector('.gui.icon.control-backward:before', ['content'=> '"\\e6b0"'] );
$Core->selector('.gui.icon.cloud:before', ['content'=> '"\\e6b1"'] );
$Core->selector('.gui.icon.cloud-up:before', ['content'=> '"\\e6b2"'] );
$Core->selector('.gui.icon.cloud-down:before', ['content'=> '"\\e6b3"'] );
$Core->selector('.gui.icon.clipboard:before', ['content'=> '"\\e6b4"'] );
$Core->selector('.gui.icon.car:before', ['content'=> '"\\e6b5"'] );
$Core->selector('.gui.icon.calendar:before', ['content'=> '"\\e6b6"'] );
$Core->selector('.gui.icon.book:before', ['content'=> '"\\e6b7"'] );
$Core->selector('.gui.icon.bell:before', ['content'=> '"\\e6b8"'] );
$Core->selector('.gui.icon.basketball:before', ['content'=> '"\\e6b9"'] );
$Core->selector('.gui.icon.bar-chart:before', ['content'=> '"\\e6ba"'] );
$Core->selector('.gui.icon.bar-chart-alt:before', ['content'=> '"\\e6bb"'] );
$Core->selector('.gui.icon.back-right:before', ['content'=> '"\\e6bc"'] );
$Core->selector('.gui.icon.back-left:before', ['content'=> '"\\e6bd"'] );
$Core->selector('.gui.icon.arrows-corner:before', ['content'=> '"\\e6be"'] );
$Core->selector('.gui.icon.archive:before', ['content'=> '"\\e6bf"'] );
$Core->selector('.gui.icon.anchor:before', ['content'=> '"\\e6c0"'] );
$Core->selector('.gui.icon.i-align-right:before', ['content'=> '"\\e6c1"'] );
$Core->selector('.gui.icon.i-align-left:before', ['content'=> '"\\e6c2"'] );
$Core->selector('.gui.icon.i-align-justify:before', ['content'=> '"\\e6c3"'] );
$Core->selector('.gui.icon.i-align-center:before', ['content'=> '"\\e6c4"'] );
$Core->selector('.gui.icon.alert:before', ['content'=> '"\\e6c5"'] );
$Core->selector('.gui.icon.alarm-clock:before', ['content'=> '"\\e6c6"'] );
$Core->selector('.gui.icon.agenda:before', ['content'=> '"\\e6c7"'] );
$Core->selector('.gui.icon.write:before', ['content'=> '"\\e6c8"'] );
$Core->selector('.gui.icon.window:before', ['content'=> '"\\e6c9"'] );
$Core->selector('.gui.icon.widgetized:before', ['content'=> '"\\e6ca"'] );
$Core->selector('.gui.icon.widget:before', ['content'=> '"\\e6cb"'] );
$Core->selector('.gui.icon.widget-alt:before', ['content'=> '"\\e6cc"'] );
$Core->selector('.gui.icon.wallet:before', ['content'=> '"\\e6cd"'] );
$Core->selector('.gui.icon.video-clapper:before', ['content'=> '"\\e6ce"'] );
$Core->selector('.gui.icon.video-camera:before', ['content'=> '"\\e6cf"'] );
$Core->selector('.gui.icon.vector:before', ['content'=> '"\\e6d0"'] );
$Core->selector('.gui.icon.themify-logo:before', ['content'=> '"\\e6d1"'] );
$Core->selector('.gui.icon.themify-favicon:before', ['content'=> '"\\e6d2"'] );
$Core->selector('.gui.icon.themify-favicon-alt:before', ['content'=> '"\\e6d3"'] );
$Core->selector('.gui.icon.support:before', ['content'=> '"\\e6d4"'] );
$Core->selector('.gui.icon.stamp:before', ['content'=> '"\\e6d5"'] );
$Core->selector('.gui.icon.split-v-alt:before', ['content'=> '"\\e6d6"'] );
$Core->selector('.gui.icon.slice:before', ['content'=> '"\\e6d7"'] );
$Core->selector('.gui.icon.shortcode:before', ['content'=> '"\\e6d8"'] );
$Core->selector('.gui.icon.shift-right-alt:before', ['content'=> '"\\e6d9"'] );
$Core->selector('.gui.icon.shift-left-alt:before', ['content'=> '"\\e6da"'] );
$Core->selector('.gui.icon.ruler-alt-2:before', ['content'=> '"\\e6db"'] );
$Core->selector('.gui.icon.receipt:before', ['content'=> '"\\e6dc"'] );
$Core->selector('.gui.icon.pin2:before', ['content'=> '"\\e6dd"'] );
$Core->selector('.gui.icon.pin-alt:before', ['content'=> '"\\e6de"'] );
$Core->selector('.gui.icon.pencil-alt2:before', ['content'=> '"\\e6df"'] );
$Core->selector('.gui.icon.palette:before', ['content'=> '"\\e6e0"'] );
$Core->selector('.gui.icon.more:before', ['content'=> '"\\e6e1"'] );
$Core->selector('.gui.icon.more-alt:before', ['content'=> '"\\e6e2"'] );
$Core->selector('.gui.icon.microphone-alt:before', ['content'=> '"\\e6e3"'] );
$Core->selector('.gui.icon.magnet:before', ['content'=> '"\\e6e4"'] );
$Core->selector('.gui.icon.line-double:before', ['content'=> '"\\e6e5"'] );
$Core->selector('.gui.icon.line-dotted:before', ['content'=> '"\\e6e6"'] );
$Core->selector('.gui.icon.line-dashed:before', ['content'=> '"\\e6e7"'] );
$Core->selector('.gui.icon.layout-width-full:before', ['content'=> '"\\e6e8"'] );
$Core->selector('.gui.icon.layout-width-default:before', ['content'=> '"\\e6e9"'] );
$Core->selector('.gui.icon.layout-width-default-alt:before', ['content'=> '"\\e6ea"'] );
$Core->selector('.gui.icon.layout-tab:before', ['content'=> '"\\e6eb"'] );
$Core->selector('.gui.icon.layout-tab-window:before', ['content'=> '"\\e6ec"'] );
$Core->selector('.gui.icon.layout-tab-v:before', ['content'=> '"\\e6ed"'] );
$Core->selector('.gui.icon.layout-tab-min:before', ['content'=> '"\\e6ee"'] );
$Core->selector('.gui.icon.layout-slider:before', ['content'=> '"\\e6ef"'] );
$Core->selector('.gui.icon.layout-slider-alt:before', ['content'=> '"\\e6f0"'] );
$Core->selector('.gui.icon.layout-sidebar-right:before', ['content'=> '"\\e6f1"'] );
$Core->selector('.gui.icon.layout-sidebar-none:before', ['content'=> '"\\e6f2"'] );
$Core->selector('.gui.icon.layout-sidebar-left:before', ['content'=> '"\\e6f3"'] );
$Core->selector('.gui.icon.layout-placeholder:before', ['content'=> '"\\e6f4"'] );
$Core->selector('.gui.icon.layout-menu:before', ['content'=> '"\\e6f5"'] );
$Core->selector('.gui.icon.layout-menu-v:before', ['content'=> '"\\e6f6"'] );
$Core->selector('.gui.icon.layout-menu-separated:before', ['content'=> '"\\e6f7"'] );
$Core->selector('.gui.icon.layout-menu-full:before', ['content'=> '"\\e6f8"'] );
$Core->selector('.gui.icon.layout-media-right-alt:before', ['content'=> '"\\e6f9"'] );
$Core->selector('.gui.icon.layout-media-right:before', ['content'=> '"\\e6fa"'] );
$Core->selector('.gui.icon.layout-media-overlay:before', ['content'=> '"\\e6fb"'] );
$Core->selector('.gui.icon.layout-media-overlay-alt:before', ['content'=> '"\\e6fc"'] );
$Core->selector('.gui.icon.layout-media-overlay-alt-2:before', ['content'=> '"\\e6fd"'] );
$Core->selector('.gui.icon.layout-media-left-alt:before', ['content'=> '"\\e6fe"'] );
$Core->selector('.gui.icon.layout-media-left:before', ['content'=> '"\\e6ff"'] );
$Core->selector('.gui.icon.layout-media-center-alt:before', ['content'=> '"\\e700"'] );
$Core->selector('.gui.icon.layout-media-center:before', ['content'=> '"\\e701"'] );
$Core->selector('.gui.icon.layout-list-thumb:before', ['content'=> '"\\e702"'] );
$Core->selector('.gui.icon.layout-list-thumb-alt:before', ['content'=> '"\\e703"'] );
$Core->selector('.gui.icon.layout-list-post:before', ['content'=> '"\\e704"'] );
$Core->selector('.gui.icon.layout-list-large-image:before', ['content'=> '"\\e705"'] );
$Core->selector('.gui.icon.layout-line-solid:before', ['content'=> '"\\e706"'] );
$Core->selector('.gui.icon.layout-grid4:before', ['content'=> '"\\e707"'] );
$Core->selector('.gui.icon.layout-grid3:before', ['content'=> '"\\e708"'] );
$Core->selector('.gui.icon.layout-grid2:before', ['content'=> '"\\e709"'] );
$Core->selector('.gui.icon.layout-grid2-thumb:before', ['content'=> '"\\e70a"'] );
$Core->selector('.gui.icon.layout-cta-right:before', ['content'=> '"\\e70b"'] );
$Core->selector('.gui.icon.layout-cta-left:before', ['content'=> '"\\e70c"'] );
$Core->selector('.gui.icon.layout-cta-center:before', ['content'=> '"\\e70d"'] );
$Core->selector('.gui.icon.layout-cta-btn-right:before', ['content'=> '"\\e70e"'] );
$Core->selector('.gui.icon.layout-cta-btn-left:before', ['content'=> '"\\e70f"'] );
$Core->selector('.gui.icon.layout-column4:before', ['content'=> '"\\e710"'] );
$Core->selector('.gui.icon.layout-column3:before', ['content'=> '"\\e711"'] );
$Core->selector('.gui.icon.layout-column2:before', ['content'=> '"\\e712"'] );
$Core->selector('.gui.icon.layout-accordion-separated:before', ['content'=> '"\\e713"'] );
$Core->selector('.gui.icon.layout-accordion-merged:before', ['content'=> '"\\e714"'] );
$Core->selector('.gui.icon.layout-accordion-list:before', ['content'=> '"\\e715"'] );
$Core->selector('.gui.icon.ink-pen:before', ['content'=> '"\\e716"'] );
$Core->selector('.gui.icon.info-alt:before', ['content'=> '"\\e717"'] );
$Core->selector('.gui.icon.help-alt:before', ['content'=> '"\\e718"'] );
$Core->selector('.gui.icon.headphone-alt:before', ['content'=> '"\\e719"'] );
$Core->selector('.gui.icon.hand-point-up:before', ['content'=> '"\\e71a"'] );
$Core->selector('.gui.icon.hand-point-right:before', ['content'=> '"\\e71b"'] );
$Core->selector('.gui.icon.hand-point-left:before', ['content'=> '"\\e71c"'] );
$Core->selector('.gui.icon.hand-point-down:before', ['content'=> '"\\e71d"'] );
$Core->selector('.gui.icon.gallery:before', ['content'=> '"\\e71e"'] );
$Core->selector('.gui.icon.face-smile:before', ['content'=> '"\\e71f"'] );
$Core->selector('.gui.icon.face-sad:before', ['content'=> '"\\e720"'] );
$Core->selector('.gui.icon.credit-card:before', ['content'=> '"\\e721"'] );
$Core->selector('.gui.icon.control-skip-forward:before', ['content'=> '"\\e722"'] );
$Core->selector('.gui.icon.control-skip-backward:before', ['content'=> '"\\e723"'] );
$Core->selector('.gui.icon.control-record:before', ['content'=> '"\\e724"'] );
$Core->selector('.gui.icon.control-eject:before', ['content'=> '"\\e725"'] );
$Core->selector('.gui.icon.comments-smiley:before', ['content'=> '"\\e726"'] );
$Core->selector('.gui.icon.brush-alt:before', ['content'=> '"\\e727"'] );
$Core->selector('.gui.icon.youtube:before', ['content'=> '"\\e728"'] );
$Core->selector('.gui.icon.vimeo:before', ['content'=> '"\\e729"'] );
$Core->selector('.gui.icon.twitter:before', ['content'=> '"\\e72a"'] );
$Core->selector('.gui.icon.time:before', ['content'=> '"\\e72b"'] );
$Core->selector('.gui.icon.tumblr:before', ['content'=> '"\\e72c"'] );
$Core->selector('.gui.icon.skype:before', ['content'=> '"\\e72d"'] );
$Core->selector('.gui.icon.share:before', ['content'=> '"\\e72e"'] );
$Core->selector('.gui.icon.share-alt:before', ['content'=> '"\\e72f"'] );
$Core->selector('.gui.icon.rocket:before', ['content'=> '"\\e730"'] );
$Core->selector('.gui.icon.pinterest:before', ['content'=> '"\\e731"'] );
$Core->selector('.gui.icon.new-window:before', ['content'=> '"\\e732"'] );
$Core->selector('.gui.icon.microsoft:before', ['content'=> '"\\e733"'] );
$Core->selector('.gui.icon.list-ol:before', ['content'=> '"\\e734"'] );
$Core->selector('.gui.icon.linkedin:before', ['content'=> '"\\e735"'] );
$Core->selector('.gui.icon.layout-sidebar-2:before', ['content'=> '"\\e736"'] );
$Core->selector('.gui.icon.layout-grid4-alt:before', ['content'=> '"\\e737"'] );
$Core->selector('.gui.icon.layout-grid3-alt:before', ['content'=> '"\\e738"'] );
$Core->selector('.gui.icon.layout-grid2-alt:before', ['content'=> '"\\e739"'] );
$Core->selector('.gui.icon.layout-column4-alt:before', ['content'=> '"\\e73a"'] );
$Core->selector('.gui.icon.layout-column3-alt:before', ['content'=> '"\\e73b"'] );
$Core->selector('.gui.icon.layout-column2-alt:before', ['content'=> '"\\e73c"'] );
$Core->selector('.gui.icon.instagram:before', ['content'=> '"\\e73d"'] );
$Core->selector('.gui.icon.google:before', ['content'=> '"\\e73e"'] );
$Core->selector('.gui.icon.github:before', ['content'=> '"\\e73f"'] );
$Core->selector('.gui.icon.flickr:before', ['content'=> '"\\e740"'] );
$Core->selector('.gui.icon.facebook:before', ['content'=> '"\\e741"'] );
$Core->selector('.gui.icon.dropbox:before', ['content'=> '"\\e742"'] );
$Core->selector('.gui.icon.dribbble:before', ['content'=> '"\\e743"'] );
$Core->selector('.gui.icon.apple:before', ['content'=> '"\\e744"'] );
$Core->selector('.gui.icon.android:before', ['content'=> '"\\e745"'] );
$Core->selector('.gui.icon.save:before', ['content'=> '"\\e746"'] );
$Core->selector('.gui.icon.save-alt:before', ['content'=> '"\\e747"'] );
$Core->selector('.gui.icon.yahoo:before', ['content'=> '"\\e748"'] );
$Core->selector('.gui.icon.wordpress:before', ['content'=> '"\\e749"'] );
$Core->selector('.gui.icon.vimeo-alt:before', ['content'=> '"\\e74a"'] );
$Core->selector('.gui.icon.twitter-alt:before', ['content'=> '"\\e74b"'] );
$Core->selector('.gui.icon.tumblr-alt:before', ['content'=> '"\\e74c"'] );
$Core->selector('.gui.icon.trello:before', ['content'=> '"\\e74d"'] );
$Core->selector('.gui.icon.stack-overflow:before', ['content'=> '"\\e74e"'] );
$Core->selector('.gui.icon.soundcloud:before', ['content'=> '"\\e74f"'] );
$Core->selector('.gui.icon.sharethis:before', ['content'=> '"\\e750"'] );
$Core->selector('.gui.icon.sharethis-alt:before', ['content'=> '"\\e751"'] );
$Core->selector('.gui.icon.reddit:before', ['content'=> '"\\e752"'] );
$Core->selector('.gui.icon.pinterest-alt:before', ['content'=> '"\\e753"'] );
$Core->selector('.gui.icon.microsoft-alt:before', ['content'=> '"\\e754"'] );
$Core->selector('.gui.icon.linux:before', ['content'=> '"\\e755"'] );
$Core->selector('.gui.icon.jsfiddle:before', ['content'=> '"\\e756"'] );
$Core->selector('.gui.icon.joomla:before', ['content'=> '"\\e757"'] );
$Core->selector('.gui.icon.html5:before', ['content'=> '"\\e758"'] );
$Core->selector('.gui.icon.flickr-alt:before', ['content'=> '"\\e759"'] );
$Core->selector('.gui.icon.email:before', ['content'=> '"\\e75a"'] );
$Core->selector('.gui.icon.drupal:before', ['content'=> '"\\e75b"'] );
$Core->selector('.gui.icon.dropbox-alt:before', ['content'=> '"\\e75c"'] );
$Core->selector('.gui.icon.css3:before', ['content'=> '"\\e75d"'] );
$Core->selector('.gui.icon.rss:before', ['content'=> '"\\e75e"'] );
$Core->selector('.gui.icon.rss-alt:before', ['content'=> '"\\e75f"'] );



