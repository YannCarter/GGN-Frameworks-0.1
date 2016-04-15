<?php


/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;





/* Activation */
if(\_native::varn('HOMEPAGE_ACTIVE') == 0){

	$this->eventOn('ERROR.404', 'NR0');

	$this->close();

}



/* DPO */

new Using('DPO\Page');

new Using('DPO\Procedure');

new Using('DPO\Theme');




/* Plugins */

new \GGN\Using('Plugins');

new \GGN\Plugin\HTML('Models');





/* 
	Encodage des charatères 
*/
Theme\Content::entities('html.entities/decode');






/* 
	Initialisation du Theme 
*/
$tpl = new Theme\Preset(\_native::varn('HOMEPAGE_THEME'));


$tpl->Register = $this;



/* 
	Titre de la page
 */
$tpl->name = 'Gougnon Home Page API';

$tpl->version = '0.1';

$tpl->update = date('ymd.hi');

$tpl->host = __FILE__;

$tpl->style = \_native::varn('HOMEPAGE_STYLE');










/* 
	Système de cache 
*/
// $cache = new Cache($tpl);




// 	/* 
// 		Si le cache existe 
// 	*/
// 	if($cache->exists === true){


// 		$cache->load();

// 	}


// 	/* 
// 		Si le cache n'existe pas :  création de la page  
// 	*/
// 	else{


		/* 
			Le Doctype de la page
		 */
		$tpl->doctype('html');



		/* 
			Paramètres de la page
		 */
		$tpl->settings = new Theme\Settings();
		
		$tpl->settings->add('context.menu', true)->add('responsive', true);



		/* 
			Création de l'entete de la page
		 */
		$tpl->head = new Theme\Head();



		/* 
			Titre de la page
		 */
		/* Debut de la sequence 'Head' */
		$tpl->head->title(\_native::varn('HOMEPAGE_TITLE'))

			/* 
				Favicone 
			*/
			->shortcut(\HTTP_HOST . 'favicon.png')


			/* 
				Balise Meta dans le 'head'
			*/
			->meta('charset', 'utf-8')

			->meta('http-equiv', 'pragma', 'cache')

			->meta('name', 'mobile-web-app-capable', 'yes')

			->meta('name', 'viewport', 'width=device-width,initial-scale=1')


			/* 
				Framework CSS
			*/

			/* Packges de la page */
			->cssPackages([

				'font.roboto.thin'

				,'font.roboto.black'

				,'font.roboto.condensed.regular'

			])


			/* Packges du manifest */
			->cssPackages($tpl->manifest->package->css->list)


			/* Packges du manifest du thème */
			->cssPackages(isset($tpl->manifest->package->css->home->list) && is_object($tpl->manifest->package->css->home->list) ? $tpl->manifest->package->css->home->list: false)


			/* Style Générale du theme */
			->link($tpl->manifest->links->list)


			/* Style du home du theme */
			->link(isset($tpl->manifest->links->home->list) && is_object($tpl->manifest->links->home->list) ? $tpl->manifest->links->home->list: '')



			/* Style du theme */
			->css($tpl->manifest->css->list)



			/* Code du Style du home du theme */
			->css(isset($tpl->manifest->css->home->list) && is_object($tpl->manifest->css->home->list) ? $tpl->manifest->css->home->list: '')


			/* 
				Code CSS
			*/
			->style(

				[

					'html,body,.gui.sheet'=>[

						'width'=>'100%'

						, 'height'=>'100%'

					]

				]
				
			)



			/* Code Général du Style du theme */
			->style($tpl->manifest->style->list)



			/* Code du Style du home du theme */
			->style(isset($tpl->manifest->style->home->list) && is_object($tpl->manifest->style->home->list) ? $tpl->manifest->style->home->list: '')






			/* 
				Framework JS
			*/
			->jsPackages([])


			/* Packges du manifest */
			->jsPackages($tpl->manifest->package->js->list)


			/* Packges du manifest du thème */
			->jsPackages(isset($tpl->manifest->package->js->home->list) && is_object($tpl->manifest->package->js->home->list) ? $tpl->manifest->package->js->home->list: '')
			

			/* 
				Fichier JS
			*/
			// ->script()


			/* 
				Script Générale du theme 
			*/
			->script($tpl->manifest->scripts->list)


			/* 
				Script du home du theme
			*/
			->script(isset($tpl->manifest->scripts->home->list) && is_object($tpl->manifest->scripts->home->list) ? $tpl->manifest->scripts->home->list: '')


			/* 
				Code JS
			*/
			// ->js()



			/* 
				Code JS Général du home du theme
			*/
			->js($tpl->manifest->js->list)



			/* 
				Code JS du home du theme
			*/
			->js(isset($tpl->manifest->js->home->list) && is_object($tpl->manifest->js->home->list) ? $tpl->manifest->js->home->list: '')





		/* Fermeture de la sequence 'Head' */
		;





		/*
			Feuille
		*/

		$tpl->body = new Theme\Body();

		$tpl->body->sheet = new Theme\Tag(['id'=>'ggn-sheet', 'class'=>'gui sheet' ]);

		$tpl->body->sheet->text(\Gougnon::fullSpace('<center><h1>Page d\'accueil</h1></center>'));








		/* 
			La page 
		 */
		$page = new Page\Init($tpl);


		/* Moteur de rendu */
		$page->engine()->schema( (new Page\RenderingScheme())->html5 )->start();
		// $page->engine()->schema( (new Page\RenderingScheme())->html5 )->start(true);




	// 	/* Création du cache */
	// 	$cache->create($page->code);




	// 	/* Chargement du cache */
	// 	$cache->load();


// }

