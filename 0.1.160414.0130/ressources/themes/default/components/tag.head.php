<?php


/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;

	/* 
		Le Doctype de la page
	 */
	$this->doctype('html');



	/* 
		Paramètres de la page
	 */
	$this->settings = new Theme\Settings();
	
	$this->settings->add('context.menu', true)->add('responsive', true);



	/* 
		Création de l'entete de la page
	 */
	$this->head = new Theme\Head();



	/* 
		Titre de la page
	 */
	/* Debut de la sequence 'Head' */
	$this->head->title(isset($this->title) ? $this->title : \_native::varn('HOMEPAGE_TITLE'))

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

		->meta('name', 'theme', '#181818')


		/* 
			Framework CSS
		*/

		/* Packges de la page */
		->cssPackages([

			'ggn.scrollbar'

			,'ggn.slidershow'

			,'ggn.messenger.0.1'

		])


		/* Packges du manifest */
		->cssPackages($this->manifest->package->css->list)


		/* Packges du manifest du thème */
		->cssPackages(isset($this->manifest->package->css->home->list) && is_object($this->manifest->package->css->home->list) ? $this->manifest->package->css->home->list: false)


		/* Style Générale du theme */
		->link($this->manifest->links->list)


		/* Style du home du theme */
		->link(isset($this->manifest->links->home->list) && is_object($this->manifest->links->home->list) ? $this->manifest->links->home->list: '')



		/* Style du theme */
		->css($this->manifest->css->list)



		/* Code du Style du home du theme */
		->css(isset($this->manifest->css->home->list) && is_object($this->manifest->css->home->list) ? $this->manifest->css->home->list: '')


		/* 
			Code CSS
		*/
		->style(
			[
				'html,body,.gui.sheet'=>[
					'height'=>'100%'
				]
			]
		)



		/* Code Général du Style du theme */
		->style($this->manifest->style->list)



		/* Code du Style du home du theme */
		->style(isset($this->manifest->style->home->list) && is_object($this->manifest->style->home->list) ? $this->manifest->style->home->list: '')






		/* 
			Framework JS
		*/
		->jsPackages([

			'ggn.slidershow'

			,'ggn.scrollbar'

			,'ggn.messenger.0.1'

			,'ggn.key.shot'
			
		])


		/* Packges du manifest */
		->jsPackages($this->manifest->package->js->list)


		/* Packges du manifest du thème */
		->jsPackages(isset($this->manifest->package->js->home->list) && is_object($this->manifest->package->js->home->list) ? $this->manifest->package->js->home->list: '')
		

		/* 
			Fichier JS
		*/
		->script($this->_url . 'normal.actions.js')


		/* 
			Script Générale du theme 
		*/
		->script($this->manifest->scripts->list)


		/* 
			Script du home du theme
		*/
		->script(isset($this->manifest->scripts->home->list) && is_object($this->manifest->scripts->home->list) ? $this->manifest->scripts->home->list: '')


		/* 
			Code JS
		*/
		->js()



		/* 
			Code JS Général du home du theme
		*/
		->js($this->manifest->js->list)



		/* 
			Code JS du home du theme
		*/
		->js(isset($this->manifest->js->home->list) && is_object($this->manifest->js->home->list) ? $this->manifest->js->home->list: '')





		->write('<base href="'.HTTP_HOST.'" target="_self">')

	/* Fermeture de la sequence 'Head' */
	;


