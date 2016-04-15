<?php

	
	/* PARAMETRES */
	require $Core::commonFile('.settings');


	/* Paramètre commun */
	include dirname(__FILE__) . '/common.php';





$Core->selector('body'
	, [
		'letter-spacing'=>'-0.03em'
	]
);


	// $Core->selector('body,.gui.sheet', ['background-color'=>$Core->styleProperty('dark-background-color:hover')] );



	$Core->selector('.page-container-glob'
		, [

			'background-color'=> $Core->styleProperty('dark-background-color:hover')

		]
	);

	// $Core->selector('.page-container-glob.open'
	// 	, [

	// 		'margin-left'=>'33%'

	// 		,'width'=>'33%'

	// 	]
	// );








/* Photo */
$Core->selector('.thumb-photo'
	, [

		'background-color'=>$Core->styleProperty('palette-light-color')

		,'color'=>$Core->styleProperty('palette-primary-color')

	]
);

$Core->selector('.thumb-photo > *:not(.no-opacity)'
	, [

		'opacity'=>'0.0'

		,'transition'=>'opacity, 0.3s ease-in'

	]
);


$Core->selector('.thumb-photo:hover > *:not(.no-opacity)'
	, [

		'opacity'=>'1'

	]
);


$Core->selector('.thumb-photo:hover > .info-bubble'
	, [

		'left'=>'0px'

		,'bottom'=>'-48px'

	]
);






// $Core->selector('.thumb-gradient-bar' 
// 	, [

// 		'background'=>$Core->backgroundGradientValue('transparent, ' . $Core->styleProperty('palette-dark-color')) 

// 	]
// );




// $Core->selector('.thumb-gradient-bar' 
// 	, [

// 		'background'=>$Core->backgroundGradientValue('transparent, ' . $Core->styleProperty('palette-primary-color')) 

// 	]
// );





/* Font */
$Core->selector('.text-thin'
	, [

		'font-family'=>$Core->styleProperty('headling-fontLight-family')

	]
);









	$Core->selector('a'.',a:hover', ['text-decoration'=>'none'] );

	$Core->selector('.page-space-top', ['height'=>'85px'] );

	$Core->selector('.page-space-top-mini', ['height'=>'48px'] );




	/* 
		Progresse bar : Entete
	*/

	$Core->selector('#header-progress-bar'

		, [

			'position'=>'fixed !important'

			,'background-color'=>$Core->styleProperty('palette-primary-color')

			,'z-index'=>'9'

		]

	);

	$Core->selector('#header-progress-bar > .track'

		, [

			'width'=>'0%'

			,'height'=>'inherit'

			// ,'background-color'=>$Core->styleProperty('palette-secondary-color')

			,'background'=>$Core->backgroundGradientValue('to right, transparent, ' . $Core->LDColor($Core->styleProperty('palette-secondary-color'), 32) ) 
			// ,'background'=>$Core->backgroundGradientValue('to right, transparent, rgba(255,255,255,.4)' ) 
			// ,'background'=>$Core->backgroundGradientValue('to right, transparent, ' . $Core->styleProperty('palette-secondary-color')) 

		]

	);




	/* 
		Gabarit : NavBar
	*/
	$Core->selector('.gui.layout.gabarit.navbar, .page-search-bar'
		, [
			'background-color'=>'transparent'
			// 'background-color'=>$Core->styleProperty('palette-primary-color')
		]
	);

	$Core->selector('.gui.layout.gabarit.navbar > .logo'
		, [
			'padding-right && padding-left'=>'10px'
			,'padding-top'=>'5px'
		]
	);

	// $Core->selector('.gui.layout.gabarit.navbar > .logo img.logo'
	// 	, [
	// 		'width && height'=>'auto'
	// 	]
	// );



	$Core->selector('.under-header'
		, [
			'top'=>'48px'
			,'left'=>'0px'
			,'z-index'=>'5'
			,'background-color'=>$Core->styleProperty('palette-secondary-color')
		]
	);

		$Core->selector('.under-header .choose-option'
			, [
				'padding'=>'10px'
			]
		);



	/* 
		Page Lateral : Gauche
	*/

	$Core->selector('#page-side-left'
		, [
			'z-index'=>'15'
			,'opacity'=>'0.0'
		]
	);

	$Core->selector(
			'#page-side-left'
			.',#fake-page-side-left'
		, [
			'top'=>'0px'
			,'left'=>'-500vw'
			// ,'width'=>'20vw'
			,'height'=>'100vh'
			// ,'padding-top'=>'48px'
			,'transition'=>'opacity, 0.3s ease-in'
			,'background-color'=>$Core->styleProperty('background-color')
		]
	);

	$Core->selector(
			'#page-side-left.open'
			.',#fake-page-side-left.open'
		, [
			'left'=>'0px'
			,'opacity'=>'1'
			,'box-shadow'=>'10px 0px 10px 0px rgba(0,0,0,.07)'
		]
	);

	$Core->selector('#fake-page-side-left'
		, [
			'background-color'=>'transparent !important'
		]
	);

	$Core->selector('#fake-page-side-left.close'
		, [
			'width'=>'0px'
		]
	);

	$Core->selector('#fake-page-side-left.open'
		, [
			// 'width'=>'initial'
		]
	);


	$Core->selector('.no-pddng', ['padding'=>'0px'] );

	$Core->selector('.pddng', ['padding'=>'0px 15px'] );

	$Core->selector('.tpddng', ['padding'=>'15px'] );

	$Core->selector('.lpddng', ['padding'=>'5px'] );

	$Core->selector('.xpddng', ['padding'=>'32px'] );

	$Core->selector('.t-pddng', ['padding-top'=>'15px'] );

	$Core->selector('.pddng ~ .tpddng', ['padding-bottom'=>'0px'] );


		// $Core->selector('.side-user-profil'
		// 	, [
		// 	]
		// );

		$Core->selector('.side-user-profil > .photo'
			, [
				'background-color'=>$Core->styleProperty('palette-primary-color')
			]
		);

			$Core->selector('.side-user-profil > .photo > .tools'
				, [
					'left && bottom'=>'0px'
					,'opacity'=>'0'
					,'width'=>'100%'
					,'background-color'=>'rgba(' . $Core->styleProperty('palette-dark-color-rgb') . ',.2)'
					,'transition'=>'opacity 0.3s ease-in'
				]
			);

			$Core->selector('.side-user-profil > .photo:hover > .tools', ['opacity'=>'1'] );


			$Core->selector('.side-user-profil > .photo > .tools > .item'
				, [
					// ,'margin'=>'10px 7px'
					'padding'=>'7px 12px'
					,'color'=>$Core->styleProperty('palette-light-color')
					,'transition'=>'background-color 0.3s ease-in'
				]
			);



			$Core->selector(
					'.side-user-profil > .photo:hover > .tools > .item:hover'
					. ',.side-user-profil > .photo:hover > .tools > .item:nth-child(2n)'
				, [
					'background-color'=>'rgba(' . $Core->styleProperty('palette-dark-color-rgb') . ',.2)'
				]
			);

			$Core->selector('.side-user-profil > .photo:hover > .tools > .item:hover'
				, [
					'background-color'=>'rgba(' . $Core->styleProperty('palette-dark-color-rgb') . ',.5)'
				]
			);


			$Core->selector('.side-user-profil > .photo:hover > .tools > .item > .icon', ['margin'=>'5px 10px 5px 5px'] );

			$Core->selector('.side-user-profil > .photo > .tools > .item > .info'
				, [
					'display'=>'none'
					,'padding'=>'5px 12px'
					,'font-size'=>'13px'
					,'color'=>$Core->styleProperty('palette-light-color')
				]
			);

			$Core->selector('.side-user-profil > .photo > .tools > .item:hover > .info'
				, [
					'display'=>'block'
				]
			);

		$Core->selector('.side-user-profil > .name'
			, [
				'font-size'=>'32px'
				,'font-family'=>$Core->styleProperty('headling-fontLight-family')
			]
		);



		$Core->selector('#page-side-left .details'
			, [
				// 'font-size'=>'32px'
				// ,'font-family'=>$Core->styleProperty('headling-fontLight-family')
			]
		);










/* 
	Pied de page // DEBUT ----------------
*/

	$Core->selector('.page-footer'
		, [
			'background-color'=>$Core->styleProperty('background-color')
			// ,'bottom && left'=>'0px'
			,'box-shadow'=>'0px 0px 10px ' . $Core->styleProperty('shadow-color')
		]
	);

	$Core->selector('.page-footer > .logo > img'
		, [
			'margin'=>'30px 15px 30px'
		]
	);

	$Core->selector('.page-footer > .infos'
		, [
			'padding'=>'20px 15px'
			,'font-size'=>'13px'
		]
	);

	$Core->selector('.page-footer a'
		, [
			'color'=>$Core->styleProperty('font-color')
			,'padding-left && padding-right'=>'5px'
			,'transition'=>'color 0.3s ease-in'
		]
	);

	$Core->selector('.page-footer a:hover'
		, [
			'color'=>$Core->styleProperty('font-color:hover')
		]
	);

	$Core->selector('.page-footer > .copyright'
		, [
			'padding'=>'10px 15px'
		]
	);

	$Core->selector('.page-footer > .copyright a'
		, [
			'font-family'=>$Core->styleProperty('headling-fontBold-family')
		]
	);



/* 
	Pied de page // FIN ----------------
*/










/* 
	Bloc-Page // DEBUT ----------------
*/

	$Core->selector('.bloc-page'
		, [
			// 'margin'=>'20px 0px'
			// ,'background-color'=>'red'
		]
	);

		$Core->selector('.bloc-page > .title'
			, [
				'padding'=>'15px 32px'
			]
		);

			$Core->selector('.bloc-page > .title > .part', ['margin'=>'20px 0px'] );
			
			$Core->selector('.bloc-page > .title > .part:first-child', ['margin-top'=>'0px'] );
			
			$Core->selector('.bloc-page > .title > .part:last-child', ['margin-bottom'=>'0px'] );



	// $Core->selector('.bloc-page > .content'
	// 	, [
	// 	]
	// );

	$Core->selector('.bloc-page > .content.majest'
		, [
			'padding'=>'32px 48px'
		]
	);

/* 
	Bloc-Page // FIN ----------------
*/










/* 
	Bloc // DEBUT ----------------
*/

	$Core->selector('.bloc'
		, [
			'margin-top'=>'32px'
		]
	);

	$Core->selector('.bloc:first-child'
		, [
			'margin-top'=>'10px'
		]
	);

	$Core->selector('.bloc > .title'
		, [
			'font-size'=>'17px'
		]
	);

	$Core->selector('.bloc > .title .icon'
		, [
			'margin-right'=>'7px'
		]
	);

	$Core->selector('.bloc > .items'
		, [
			'padding-left'=>'32px'
			,'padding-top'=>'5px'
		]
	);

	$Core->selector('.bloc > .items.exstatic > a', ['color'=>$Core->styleProperty('font-color') ] );

	$Core->selector('.bloc > .items.exstatic > a:hover', ['color'=>$Core->styleProperty('font-color:hover') ] );


	$Core->selector('.bloc > .items.active'
		, [
			'color'=>$Core->styleProperty('palette-primary-color')
		]
	);

	$Core->selector('.bloc > .items > .item'
		, [
			'padding && margin'=>'0px !important'
			,'padding-top && padding'=>'2px !important'
		]
	);

	$Core->selector('.bloc > .items .separator'
		, [
			'border-top'=>'1px solid rgba(' . $Core->styleProperty('palette-dark-color-rgb') . ',.1)'
			,'margin-top && margin-bottom'=>'7px'
		]
	);

/* 
	Bloc // FIN ----------------
*/









	/* 
		Gabarit : Menu
	*/

$Core->selector(
		'.gui.gabarit.menu > .items .item:hover'
		.',.gui.gabarit.menu > .items .item.active'

	, [

		'background-color'=> '' . $Core->LDColor($Core->styleProperty('palette-secondary-color')) .''

	]

);


	/* 
		Menu : Principal
	*/
	$Core->selector(
			'.gui.gabarit.menu.principal > .items .item'
			. ',.gui.gabarit.menu.menuside > .items .item'
			. ',.gui.gabarit.menu.category > .items .item'
			. ',.under-header .choose-option'
		, [
			'padding-left && padding-right'=>'10px'
		]
	);

	$Core->selector(
			'.gui.gabarit.menu > .items .item > .label'
			. ',.under-header .choose-option'
		, [
			'color'=>$Core->styleProperty('palette-light-color')
		]
	);


	$Core->selector('.gui.gabarit.menu > .items .item .notifier'
		, [
			'color'=>$Core->styleProperty('palette-light-color')
			,'background-color'=>$Core->styleProperty('palette-dark-color')
			,'font-size'=>'12px'
			,'position'=>'relative'
			,'z-index'=>'2'
			,'padding'=>'3px'
			,'margin-right'=>'-7px'
			,'border-radius'=>'100%'
		]
	);



	/* 
		Menu : Lateral
	*/
	$Core->selector(
			'.menu-side-right-pad'
		, [
			'position'=>'absolute'
			,'top && right'=>'0px'
			,'margin-right'=>'0px'
		]
	);

	$Core->selector('.menu-side-right-pad'
		, [
			'transition'=>'transform 0.3s ease-in'
		]
	);

	$Core->selector('.menu-side-right-pad:hover'
		, [
			'transform'=>'rotate(360deg)'
		]
	);


	$Core->selector('.gui.gabarit.menu.menuside > .items .item'
		, [
			'height'=>'48px'
		]
	);


	$Core->selector('.gui.gabarit.menu.menuside > .items .item.pop-show'
		, [
			'background-color'=>$Core->styleProperty('palette-dark-color')
		]
	);

	$Core->selector('.gui.gabarit.menu.menuside > .items .item.pop-show .notifier'
		, [
			'background-color'=>$Core->styleProperty('palette-primary-color')
		]
	);

	$Core->selector('.gui.gabarit.menu.menuside > .items .item.header-user-photo'
		, [
			'padding'=>'0px 10px'
		]
	);





	$Core->selector('.header-user-photo'
		, [
			'background-color'=>'rgba(0,0,0,.2)'
		]
	);





	/* 
		UI : pop-box
	*/

	$Core->selector('.ui-pop-box'
		, [

			'top && right'=>'0px'

			,'z-index'=>'200'

			,'min-width'=>'320px'

			,'height'=>'100vh'

			,'opacity'=>'0.1'

			,'transition'=>'width,height, 0.3s ease-in-out'

		]
	);

	$Core->selector('.ui-pop-box.maximize'
		, [

			// 'max-height'=>'100vh'

		]
	);

	$Core->selector('.ui-pop-box > .container'
		, [

			'flex'=>'1'

		]
	);

	$Core->selector('.ui-pop-box > .head >.btn:hover'
		, [

			'color'=>$Core->styleProperty('palette-light-color')

			,'background-color'=>$Core->styleProperty('palette-primary-color')

		]
	);


	$Core->selector('.ui-pop-box > .container > .items.list'
		, [

		]
	);


		// $Core->selector('.ui-pop-box > .container > .items.list .item'
		// 	, [

		// 		'background-color'=>'rgba(0,0,0,.32)'

		// 	]
		// );

		$Core->selector('.ui-pop-box > .container > .items.list .item .details:hover'

			, [

				'color'=>$Core->styleProperty('palette-light-color')

				,'background-color'=>$Core->styleProperty('palette-primary-color')

			]
		);


		$Core->selector('.ui-pop-box > .container > .items.list .item .details.current'

			, [

				'background-color'=>$Core->LDColor($Core->styleProperty('palette-dark-color'), -$GUI['STANDARD-COLOR-VARIANT']) . ' !important'

			]
		);

		$Core->selector('.ui-pop-box > .container > .items.list .item .details.current *'

			, [

				'font-weight'=>'bold !important'

			]
		);








	/* 
		Menu : Categories
	*/
	// $Core->selector('#page-menu-categories'
	// 	, [
			
	// 	]
	// );

	$Core->selector('.gui.gabarit.menu.category > .items .item'
		, [
			'height'=>'38px'
			,'border-right'=>'1px solid ' . $Core->styleProperty('palette-primary-color')
		]
	);

	$Core->selector('.gui.gabarit.menu.category > .items .item:last-child'
		, [
			'border-right'=>'0px solid '
		]
	);

	$Core->selector('.gui.gabarit.menu.category > .items .item > .label'
		, [
			'font-size'=>'14px'
		]
	);





	/* 
		SliderShow : Panel > Item
	*/

	$Core->selector('.ggn-slidershow > .content > .panel > .item'
		, [
			// 'width && height'=>'inherit'
			'width'=>'100vw'
			,'height'=>'100vh'
		]
	);





	/* 
		Moteur de recherche // DEBUT -------------------------------------------
	*/

		$Core->selector('.page-search-bar'
			, [
				'background-color'=>'transparent'
				,'color'=>$Core->styleProperty('palette-light-color')
				,'transition'=>'background-color 0.3s ease-in'
			]
		);

		$Core->selector('.page-search-bar .field-input > .icon'
			, [
				'padding-left && padding-right'=>'20px'
			]
		);

		$Core->selector('.page-search-bar .field-input > input'
			, [
				'padding'=>'0px 0px 5px'
				,'color'=>$Core->styleProperty('palette-light-color')
				,'font-size'=>'17px'
			]
		);

		$Core->selector('#page-search-bar .field-input > .f-btn'
			, [
				'padding-right && padding-left'=>'10px'
				,'display'=>'none'
			]
		);

		$Core->selector('#page-search-bar .field-input > .h-btn'
			, [
				'padding-right'=>'15px'
				,'padding-left'=>'10px'
				,'display'=>'none'
			]
		);


		$Core->selector('.page-search-bar.focus'
			, [
				'background-color'=>'rgba(' . $Core->styleProperty('palette-dark-color-rgb') . ',.3)'
			]
		);

		$Core->selector('#page-search-bar.focus .field-input > .f-btn'
			, [
				'display'=>'block'
			]
		);

	/* 
		Moteur de recherche // FIN -------------------------------------------
	*/





	/* 
		Liste items // DEBUT -------------------------------------------
	*/

		$Core->selector('.list-items', ['z-index'=>'2','padding'=>'10px'] );

		// $Core->selector('.list-items > .title', ['padding-bottom'=>'20px'] );

		$Core->selector('.list-items > .items', ['padding'=>'15px'] );

	/* 
		Liste items // FIN -------------------------------------------
	*/



	/* 
		Transformation : Skew // DEBUT -------------------------------------------
	*/

		$Core->selector('.box-skew', ['transform'=>'skew(-16deg)'] );

		$Core->selector('.box-no-skew', ['transform'=>'skew(16deg)'] );

	/* 
		Transformation : Skew // FIN -------------------------------------------
	*/




	/* 
		Bannière // DEBUT -------------------------------------------
	*/

		// $Core->selector('.page-banner'
		// 	, [
		// 	]
		// );

		$Core->selector('.page-banner .latest-blogs'
			, [
				'background-color'=>'rgba(0,0,0,.3)'
				,'margin-left'=>'-50px'
				,'overflow'=>'hidden'
			]
		);

		$Core->selector('.page-banner .latest-blogs .items > .item'
			, [
				'background-color'=>'rgba(0,0,0,.75)'
				,'margin-left && margin-right'=>'5px'
				,'overflow'=>'hidden'
			]
		);


		$Core->selector('.page-banner .latest-blogs .items > .item .photo'
			, [
				'width && height'=>'400px'
				,'margin-left'=>'-20px'
				// ,'background-color'=>'red'
				,'background-repeat'=>'no-repeat'
				,'background-position'=>'center'
			]
		);

	/* 
		Bannière // FIN -------------------------------------------
	*/







	$Core->selector('[id*="page-menu-"]'
		, [
			'box-shadow'=>'0px 0px 0px transparent'
		]
	);


	$Core->selector('[id*="page-menu-"] .on-open'
		, [
			'display'=>'none'
		]
	);



	/* 
		Responsivité // DEBUT -------------------------------------------
	*/





		$Core->openMedia(' (max-width: ' . $Core::SCREEN_Li_MAX . ') ');



			$Core->selector('[id*="page-menu-"] .on-open'
				, [
					'display'=>'block'
				]
			);


		$Core->closeMedia();





		$Core->openMedia(' (max-width: ' . $Core::SCREEN_S_MIN . ') ');


			/* 
				Menu lateral : Gauche
			*/

			$Core->selector(
					'#page-side-left'
					.',#fake-page-side-left'
				, [
					'left'=>'-100vw'
				]
			);

			// $Core->selector(
			// 		'#page-side-left.open'
			// 		.',#fake-page-side-left.open'
			// 	, [
			// 		// 'width'=>'75vw !important'
			// 	]
			// );






			/* 
				MENU : TOUS
			*/

			$Core->selector('.gui.gabarit.menu > .items .item'
				, [
					'position'=>'relative'
				]
			);

			$Core->selector('.gui.gabarit.menu > .items .item .notifier'
				, [
					'color'=>$Core->styleProperty('palette-light-color')
					,'background-color'=>$Core->styleProperty('palette-primary-color')
					,'margin-left'=>'10px'
					// ,'border-radius'=>'0px'
					,'position'=>'absolute'
					,'right'=>'30px'
				]
			);



			$Core->selector('[id*="page-menu-"]'
				, [
					'transition'=>'transform,opacity, 0.3s ease-in'
				]
			);

			$Core->selector('[id*="page-menu-"].open'
				, [
					'box-shadow'=>'0px 0px 7px rgba(0,0,0,.5)'
					,'transform'=>'translateY(0%)'
					,'opacity'=>'1'
				]
			);

			$Core->selector('[id*="page-menu-"].close'
				, [
					'transform'=>'translateY(20%)'
					,'opacity'=>'0.1'
				]
			);



			/* 
				MENU : Categories
			*/

			$Core->selector('#page-menu-categories.open'
				, [

					'position'=>'absolute'
					,'left'=>'0px'
					,'top'=>'48px'
					,'margin-right'=>'0px'
					,'background-color'=>$Core->styleProperty('palette-dark-color')
					// ,'z-index'=>'100'
					,'display'=>'block !important'
					,'width'=>'100vw'
					,'animation'=>'ggnTranslateYIn 0.3s ease-in'
				]
			);



			/* 
				Menu lateral droit
			*/

			$Core->selector('#page-menu-side-right.open'
				, [

					'position'=>'absolute'
					,'right'=>'0px'
					,'top'=>'48px'
					,'margin-right'=>'0px'
					,'background-color'=>$Core->styleProperty('palette-dark-color')
					,'z-index'=>'100'
					,'display'=>'block !important'
					,'width'=>'190px'
					// ,'height'=>'100vh'
					,'margin-right'=>'-10px'
					,'animation'=>'ggnTranslateYIn 0.3s ease-in'
				]
			);


			$Core->selector('#page-menu-side-right.open [class*=" indexer-"]'
				, [

					'position'=>'absolute !important'
					,'right'=>'34px'
					,'top'=>'-12px'
				]
			);

			$Core->selector('#page-menu-side-right.open .gui.gabarit.menu.menuside > .items'
				, [
					'flex-direction'=>'column !important'
					// 'flex-direction'=>'column-reverse !important'
					,'flex-wrap'=>'wrap !important'
					// ,'align-items'=>'flex-start !important'
					// ,'justify-content'=>'flex-start !important'
				]
			);

			$Core->selector('#page-menu-side-right.open .gui.gabarit.menu.menuside > .items > .item'
				, [
					'width'=>'100%'
					,'position'=>'relative'
					,'margin && padding'=>'0px'
					// ,'margin-top'=>'2px'
					,'align-items'=>'center !important'
					,'justify-content'=>'center !important'
				]
			);

			$Core->selector('#page-menu-side-right.open .gui.gabarit.menu.menuside > .items > .item .label'
				, [
					'width'=>'100%'
					,'margin && padding'=>'0px'
					,'align-items'=>'flex-start !important'
					,'justify-content'=>'flex-start !important'
					,'text-align'=>'left'
				]
			);

			$Core->selector('#page-menu-side-right.open .gui.gabarit.menu.menuside > .items > .item:first-child'
				, [
					'margin-bottom'=>'auto'
				]
			);

			$Core->selector('#page-menu-side-right.open .gui.gabarit.menu.menuside > .items > .item  .icon'
				, [
					'margin'=>'auto 16px'
				]
			);

			$Core->selector('#page-menu-side-right.open .gui.gabarit.menu.menuside > .items > .item  .on-open'
				, [
					'display'=>'inline'
				]
			);


		$Core->closeMedia();








		$Core->openMedia(' (max-width: '.$Core::SCREEN_S_MAX.') ');

			/* 
				MENU : Categories
			*/

			$Core->selector('#page-menu-categories.open'
				, [

					'position'=>'absolute'
					,'left'=>'0px'
					,'top'=>'52px'
					,'background-color'=>$Core->styleProperty('palette-dark-color')
					,'z-index'=>'100'
					,'display'=>'block !important'
					,'width'=>'100vw'
					,'animation'=>'ggnTranslateYIn 0.3s ease-in'
				]
			);

			$Core->selector('#page-menu-categories.open [class*=" indexer-"]'
				, [

					'position'=>'absolute !important'
					,'left'=>'49%'
					,'top'=>'-12px'
				]
			);





			$Core->selector('.header-user-photo'
				, [
					// 'width'=>'100% !important'
				]
			);




			/* 
				Sous Entete
			*/
			$Core->selector('.gui.gabarit.menu.category > .items .item'
				, [
					'width'=>'100vw'
					,'height'=>'45px'
					,'text-align'=>'center'
					,'border-right'=>'0px solid '
				]
			);



			/* 
				Moteur de recherche 
			*/

				$Core->selector('#page-search-bar.open'
					, [
						'position'=>'absolute'
						,'display'=>'block !important'
						,'top && left'=>'0px'
						,'z-index'=>'100'
						,'width'=>'96vw'
						,'height'=>'32px'
						,'margin'=>'8px 2vw 5px'
						,'border-radius'=>'4px'
						,'background-color'=>'' . $Core->LDColor($Core->styleProperty('palette-primary-color'), -20) . ''
						// ,'background-color'=>$Core->styleProperty('palette-primary-color')
					]
				);

				$Core->selector('#page-search-bar.open.focus'
					, [
						'background-color'=>'' . $Core->LDColor($Core->styleProperty('palette-primary-color'), -40) . ''
						// 'background-color'=>'rgba(' . $Core->styleProperty('palette-light-color-rgb') . ',.85)'
					]
				);


				$Core->selector('#page-search-bar .field-input > .icon.h-btn', ['display'=>'block'] );



		$Core->closeMedia();

	/* 
		Responsivité // FIN -------------------------------------------
	*/













