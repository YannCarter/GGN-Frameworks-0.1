<?php

	
	/* PARAMETRES */
	require $Core::commonFile('.settings');


	/* Paramètre commun */
	include dirname(__FILE__) . '/common.php';






/*
	Cover // DEBUT ----------------
*/

// $Core->selector('.blog-cover'
// 	, [
// 		''=>''
// 	]
// );

/*
	Cover // FIN ----------------
*/
	





/*
	Page // DEBUT ----------------
*/

$Core->selector('.blog-bloc'
	, [

		'background-color'=> $Core->styleProperty('background-color')

		,'box-shadow'=> '0px 0px 7px rgba(' . $Core->styleProperty('palette-dark-color-rgb') . ',.32)'

	]
);

$Core->selector('.page-container-glob'
	, [

		'background-color'=> $Core->LDColor($Core->styleProperty('dark-background-color:hover'), -10)

	]
);

$Core->selector('.blog-page'
	, [

		'margin-top'=>'-96px'

		,'background-color'=>$Core->styleProperty('dark-background-color:hover')

		,'transition'=>'width, 0.3s ease-in'

	]
);



$Core->selector('.blog-self-info'
	, [

		'transition'=>'width, 0.3s ease-in'

	]
);





	/* Menu // DEBUT */

		$Core->selector('.gui.gabarit.blog-menu > .items .item'
			, [

				'padding'=>'10px 16px'

				,'border-right'=>'1px solid rgba(0,0,0,.2)'

			]
		);

		$Core->selector('.gui.gabarit.blog-menu > .items .item:last-child'
			, [

				'border-right'=>'0px solid'

			]
		);

	/* Menu // FIN */






	/* Edition d'actualité // DEBUT */

		// $Core->selector('.blog-edit-post'
		// 	, [

		// 	]
		// );

		// $Core->selector('.blog-edit-post-box'
		// 	, [

		// 	]
		// );

		$Core->selector('.blog-edit-post'
			, [

				'background-color'=>$Core->styleProperty('dark-background-color:hover')

				,'transition'=>'background-color 0.3s ease-in'

			]
		);

		$Core->selector('.blog-edit-post.focus'
			, [

				'background-color'=>'rgba(0,0,0,.13)'

				,'border'=>'1px solid #' . $Core->styleProperty('palette-primary-color')

			]
		);

		$Core->selector('.blog-edit-post > .editor'
			, [

				'background-color'=>'transparent'

				,'border-width'=>'0px'

				,'resize'=>'none'

			]
		);

	/* Edition d'actualité // FIN */






	/* Post : Galerie Photo // DEBUT */

		$Core->selector(
				'[class^="post-"] > .screen'
				. ', [class*=" post-"] > .screen'
			, [

				'background-color'=>'#010101'

				// ,'transition'=>'background-color 0.3s ease-out'

			]

		);

		$Core->selector(

				'[class^="post-"] .over'

				.', [class*=" post-"] .over'


			, [

				'background-color'=>'rgba(0,0,0,.4)'

				,'color'=>'#fff'

				,'width && height'=>'inherit'

				,'opacity'=>'0.0'

				,'transition'=>'opacity 0.3s ease-in'

			]

		);

		$Core->selector(

				'[class^="post-"]:hover .over'

				.', [class*=" post-"]:hover .over'

			, [

				'opacity'=>'1'

				// ,'width && height'=>'100%'

				// ,'border-radius'=>'0%'

			]

		);

		$Core->selector(

				'[class^="post-"] .infos'

				.',[class*=" post-"] .infos'

			, [

				'bottom && left'=>'0px'

				,'background'=>$Core->backgroundGradientValue('transparent 10%, #000 ') 

				,'color'=>'#fff'

			]
		);

		$Core->selector(

				'[class^="post-"]:hover .infos'

				.',[class*=" post-"]:hover .infos'

			, [

				'background'=>$Core->backgroundGradientValue('transparent 10%, ' . $Core->styleProperty('palette-primary-color') . ' ') 

			]
		);


		$Core->selector(

				'[class^="post-"] .thumbs'

				.',[class*=" post-"] .thumbs'

			, [

				'top && left'=>'0px'

				,'background-repeat'=>'no-repeat'

				,'background-position'=>'center top'

				,'background-size'=>'100%'

			]
		);

		$Core->selector('.post-gallery .thumbs > .item' 
			, [

				'border-right'=>'2px solid rgba(' . $Core->styleProperty('palette-light-color-rgb') . ',.3)'

				// ,'background-color'=>'black'

			]
		);

		$Core->selector('.post-gallery .thumbs > .item:last-child' 
			, [

				'border-right'=>'0px solid '
				
			]
		);

		$Core->selector('.post-gallery .thumbs > .item > .image' 
			, [

				'width'=>'208%'

				,'margin-left'=>'-25%'

				// ,'background-color'=>'#999'

				,'background-repeat'=>'no-repeat'

				,'background-position'=>'left top'

				,'background-size'=>'100%'

			]
		);

	/* Post : Galerie Photo // FIN */


/*
	Page // FIN ----------------
*/
	

