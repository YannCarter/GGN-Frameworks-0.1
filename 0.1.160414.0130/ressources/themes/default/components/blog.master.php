<?php

/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;


	if(!isset($this->Register->Blog) || !is_object($this->Register->Blog)){

		\_native::wCnsl('<h1 class="xh1">Blog introuvable</h1>');

	}








	/*
		Redirection vers la page par defaut // DEBUT --------------------
	*/

		if(\Gougnon::isEmpty($this->CurrentPage)){

			header('location:' . HTTP_HOST . $this->Blog->SLUG . '/post');

			exit;

		}

	/*
		Redirection vers la page par defaut // FIN --------------------
	*/
		







	/*
		Chemin de la page en cours // DEBUT --------------------
	*/

		$PagePath = dirname(__FILE__) . '/blog.master.pages/' . $this->CurrentPage . '.php';

		$ErrorPagePath = dirname(__FILE__) . '/blog.master.pages/error.php';

		$PagePath = is_file($PagePath) ? $PagePath : $ErrorPagePath;
	
	/*
		Chemin de la page en cours // FIN --------------------
	*/
	









	/*
		Composant : "normal.header" // ENTETE
	*/

	$_HostPage = (isset($this->host) && is_string($this->host)) ? $this->host: ''; 

	$this->component('normal.header');



	/*
		CSS
	*/

		$this->body->js('(function(sc){');

			$this->body->js('G.foreach(sc.split(" "), function(css){');

				$this->body->js('var c="' . $this->_url . '";');

				$this->body->js('c += css;');

				$this->body->js('GStyle.load(c);');

			$this->body->js('},false,false,".");');

		$this->body->js('})("blog.normal.css?style=' . $this->style . '&update=latest");');

	// $this->body->css($this->_url . 'blog.normal.css?style=' . $this->style ) ;




	/*
		Script
	*/

		// $this->body->js('(function(sc){');

		// 	$this->body->js('G.foreach(sc.split(" "), function(js){');

		// 		$this->body->js('var j="' . $this->_url . '";');

		// 		$this->body->js('j += js;');

		// 		$this->body->js('GScript.load(j);');

		// 	$this->body->js('},false,false,".");');

		// $this->body->js('})("normal.actions.js");');





	/*

		Cacher "Under Header"

	*/
		$this->body->js('(function(uh){');

			$this->body->js('if(isObj(uh)){');

				$this->body->js('uh.hide(false);');

			$this->body->js('}');

		$this->body->js('})(G("#under-header"));');







	/*
		Scroll automatique vers le haut
	*/
	if(UsesAjax()){

		$this->body->js('(function(gab){');

			$this->body->js('if(isObj(gab["Scroll"])){');

				$this->body->js('var el=G("#blog-page-master-top"),coor = GScreen(el).coordinate();');

				$this->body->js('G.Gabarit.Scroll.Slide(coor.y-48, G.Gabarit.UI.Y);');

			$this->body->js('}');

		$this->body->js('})(GGabarit);');

	}




	/* Conteneur de la page : debut */

		/*
			Fusion avec le noeud principal
		*/

		if(!UsesAjax()){

			$container = $this->body->sheet->tag->Content->tag->Container->tag->Container;
			
		}


		if(UsesAjax()){

			$container = $this->body->AjaxContainer;
				
		}








		/* 
			Espacement en Haut // Debut -------------------------- 
		*/

			$container->tag->Spacer = new Theme\Tag(['class'=>'page-space-top-mini']);


		/* 
			Espacement en Haut // Fin -------------------------- 
		*/










		/* 
			Page // DEBUT -------------------------- 
		*/

			$container->tag->nCo = (new Theme\Tag([

				'tag'=>'center'	

				,'class'=>'gui _w10'

			]));


			/* 
				Cover // DEBUT -------------------------- 
			*/
			
				$container->tag->nCo->tag->Cover = (new Theme\Tag([

					'class'=>'gui blog-cover x480-h bg-primary gui flex center pos-relative'

					, 'id'=>'blog-cover-master'

				]))

					->text('<div class="text-x7-vw text-thin color-primary-d">bienvenue :-)</div> ')
				;

			/* 
				Cover // FIN -------------------------- 
			*/



			/* 
				Blog-Page // DEBUT -------------------------- 
			*/
			
				$container->tag->nCo->tag->lPage = (new Theme\Tag([
			
					'class'=>'blog-page gui box-shadow-dark col-12 mi-col-15 li-col-15 s-col-15 m-col-15  pos-relative'

					, 'id'=>'blog-page-master'
			
				]));


				/* 
					Infos // DEBUT -------------------------- 
				*/

					$InfosBlog = (new Theme\Tag([
				
						'id'=>'blog-page-master-top'

						,'class'=>'blog-bloc blog-info-self margin-tb-x0 gui flex row wrap start'
				
					]));


						$InfosBlog->tag->Photo = (new Theme\Tag([
					
							'class'=>'thumb-photo x176 mi-col-16 li-col-16 gui flex column end pos-relative'
					
						]))

							->text('<div class="textph _w10 _h10 xh5 gui flex center no-opacity">' . ucwords(\Gougnon::getFirstLetters($this->Register->Blog->TITLE,2)) . '</div>')
						
						;


						if($this->isMyBlog){

							$InfosBlog->tag->Photo

								->text('<div class="indexer-top-color margin-l-x16 pos-absolute"></div>')

								->text('<div class="info-bubble pos-absolute _w10 bg-primary gui flex row color-light"><span class="gui icon camera margin-lr-x16 margin-tb-x16 text-x18"></span><div class="text-x12 text-left padding-tb-x16 ">Modifier la photo</div></div>')

							;

						}



						$InfosBlog->tag->Details = (new Theme\Tag([
					
							'class'=>'details col-0 mi-col-16 li-col-16 text-left padding-lr-x16 padding-b-x16 padding-t-x0 '
					
						]))

							->text('<div class="xh6 gui flex row wrap mi-flex-center li-flex-center text-spacing-ml">'.ucwords($this->Register->Blog->TITLE).'</div>')

							->text('<div class="text-x14 gui flex row wrap mi-flex-center li-flex-center">de&nbsp;<a href="flyleaf/' . $this->Register->BlogUser->USERNAME . '">'.ucwords($this->Register->BlogUser->USERNAME).'</a></div>')

						;


							$InfosBlogTools = (new Theme\Tag([
						
								'class'=>'tools col-16 gui flex row wrap start padding-lr-0'
						
							]));


								$InfosBlogTools->tag->Numero = (new Theme\Tag([
							
									'class'=>'numeros gui flex row wrap row col-8 mi-col-16 margin-t-x16'
							
								]))

									->text('<div class="col-16 gui flex row wrap mi-flex-center "><span class="gui icon mobile static-color"></span>&nbsp;&nbsp;(+255) 22 42 00 04</div>')

									->text('<div class="col-16 gui flex row wrap mi-flex-center "><span class="gui icon email static-color"></span>&nbsp;&nbsp;infos@coquillagescom.net</div>')

								;



								$InfosBlogTools->tag->ToolApp = (new Theme\Tag([
							
									'class'=>'tde gui flex row-rev wrap mi-flex-center mi-col-16 col-8 '
							
								]))

								;

								if(!$this->isMyBlog){

									$InfosBlogTools->tag->ToolApp

										->text('<div class="gui box-circle x64 margin-x4 gui flex center button active cursor-pointer padding-x0" handler-click="Messenger.Composer" composer-type=":float" composer-to="' . $this->Blog->BID . '" composer-recipient="' . addslashes($this->Blog->TITLE) . '"><span class="gui icon email x32" handler-click="Messenger.Composer" composer-type=":float" composer-to="' . $this->Blog->BID . '" composer-recipient="' . addslashes($this->Blog->TITLE) . '"></span></div>')

									;

								}

								$InfosBlogTools->tag->ToolApp

									->text('<div class="gui flex row"><div class="gui margin-lr-x4 margin-t-x28 cursor-default text-x18 color-primary">14k</div><div class="gui box-circle x32 margin-lr-x4 margin-t-x24 gui flex center button cursor-pointer padding-x0 "><span class="gui icon heart x16"></span></div></div>')

									->text('<div class="gui flex row"><div class="gui margin-lr-x4 margin-t-x28 cursor-default text-x18 ">15k</div><div class="gui box-circle x32 margin-lr-x4 margin-t-x24 gui flex center cursor-default padding-x0 "><span class="gui icon eye x16"></span></div></div>')

								;


							$InfosBlog->tag->Details->tag->tools = $InfosBlogTools;






					$container->tag->nCo->tag->lPage->tag->InfosBlog = $InfosBlog;

				/* 
					Infos // FIN -------------------------- 
				*/
				







				/* 
					Menu // DEBUT -------------------------- 
				*/

					$MenuBlog = (new Theme\Tag([
				
						'class'=>'blog-self-menu gui flex row center'
				
					]));


						$_MenuPage = new \GGN\Plugin\HTML\Model\Brick('Menu/Default'
							, [

								'uriBase'=> $this->Blog->SLUG . '/'

								,'host'=> $_HostPage

								,'attributes' => []

								,'class' => 'blog-menu'

								,'flex' => 'row'

								,'items'=>[

									'Post'=>[
										'label'=>'<span class="gui icon layout-list-post" ggn-handler-click="Gabarit.Ajax" ajax-href="'.$this->Blog->SLUG.'/post" ></span><span class="margin-l-x16 enable mi-disable li-disable" ggn-handler-click="Gabarit.Ajax" ajax-href="'.$this->Blog->SLUG.'/post" >Actualités</span>'
										, 'link'=>'post'
										, 'title'=>'Actualités'
										, 'target'=>'_self'
										, 'class'=>'gui flex row center mi-flex-center li-flex-center'
										, 'click'=>'return false;'

										, 'hattrib'=>[
											'ggn-handler-click'=>'Gabarit.Ajax'
											, 'ajax-href'=>$this->Blog->SLUG . '/post'
										]
										
										, 'attrib'=>[
											'ggn-handler-click'=>'Gabarit.Ajax'
											, 'ajax-href'=>$this->Blog->SLUG . '/post'
										]

									]

									,'Gallery'=>[
										'label'=>'<span class="gui icon gallery" ggn-handler-click="Gabarit.Ajax" ajax-href="'.$this->Blog->SLUG.'/gallery" ></span><span class="margin-l-x16 enable mi-disable li-disable" ggn-handler-click="Gabarit.Ajax" ajax-href="'.$this->Blog->SLUG.'/gallery" >Photos</span>'
										, 'link'=>'gallery'
										, 'title'=>'Gallerie Photos'
										, 'target'=>'_self'
										, 'class'=>'gui flex row center mi-flex-center li-flex-center'
										, 'click'=>'return false;'

										, 'hattrib'=>[
											'ggn-handler-click'=>'Gabarit.Ajax'
											, 'ajax-href'=>''.$this->Blog->SLUG.'/gallery'
										]
										
										, 'attrib'=>[
											'ggn-handler-click'=>'Gabarit.Ajax'
											, 'ajax-href'=>''.$this->Blog->SLUG.'/gallery'
										]

									]

									,'Videos'=>[
										'label'=>'<span class="gui icon video-clapper" ggn-handler-click="Gabarit.Ajax" ajax-href="'.$this->Blog->SLUG.'/videos" ></span><span class="margin-l-x16 enable mi-disable li-disable" ggn-handler-click="Gabarit.Ajax" ajax-href="'.$this->Blog->SLUG.'/videos" >Videos</span>'
										, 'link'=>'videos'
										, 'title'=>'Gallerie Vidéos'
										, 'target'=>'_self'
										, 'class'=>'gui flex row center mi-flex-center li-flex-center'
										, 'click'=>'return false;'

										, 'hattrib'=>[
											'ggn-handler-click'=>'Gabarit.Ajax'
											, 'ajax-href'=>''.$this->Blog->SLUG.'/videos'
										]
										
										, 'attrib'=>[
											'ggn-handler-click'=>'Gabarit.Ajax'
											, 'ajax-href'=>''.$this->Blog->SLUG.'/videos'
										]

									]

									,'About'=>[
										'label'=>'<span class="gui icon info-alt" ggn-handler-click="Gabarit.Ajax" ajax-href="'.$this->Blog->SLUG.'/about" ></span><span class="margin-l-x16 enable mi-disable li-disable" ggn-handler-click="Gabarit.Ajax" ajax-href="'.$this->Blog->SLUG.'/about" >À propos de nous</span>'
										, 'link'=>'about'
										, 'title'=>'Présentation'
										, 'target'=>'_self'
										, 'class'=>'gui flex row center mi-flex-center li-flex-center'
										, 'click'=>'return false;'

										, 'hattrib'=>[
											'ggn-handler-click'=>'Gabarit.Ajax'
											, 'ajax-href'=>''.$this->Blog->SLUG.'/about'
										]
										
										, 'attrib'=>[
											'ggn-handler-click'=>'Gabarit.Ajax'
											, 'ajax-href'=>''.$this->Blog->SLUG.'/about'
										]

									]

									,'More'=>[
										'label'=>'<span class="gui icon more-alt" ggn-handler-click="Gabarit.Ajax" ajax-href="'.$this->Blog->SLUG.'/modules" ></span><span class="margin-l-x16 enable mi-disable li-disable" ggn-handler-click="Gabarit.Ajax" ajax-href="'.$this->Blog->SLUG.'/modules" >Plus</span>'
										, 'link'=>'modules'
										, 'title'=>'Voir tout'
										, 'target'=>'_self'
										, 'class'=>'gui flex row center mi-flex-center li-flex-center'
										, 'click'=>'return false;'

										, 'hattrib'=>[
											'ggn-handler-click'=>'Gabarit.Ajax'
											, 'ajax-href'=>''.$this->Blog->SLUG.'/modules'
										]
										
										, 'attrib'=>[
											'ggn-handler-click'=>'Gabarit.Ajax'
											, 'ajax-href'=>''.$this->Blog->SLUG.'/modules'
										]

									]

								]

							]
						);


						$MenuBlog->text('<div class="bg-primary">' . $_MenuPage->html . '</div>');
						

					$container->tag->nCo->tag->lPage->tag->MenuBlog = $MenuBlog;

				/* 
					Menu // FIN -------------------------- 
				*/
				



				/* 
					Page en cours // DEBUT -------------------------- 
				*/

					include $PagePath;

				/* 
					Page en cours // FIN -------------------------- 
				*/
				







			/* 
				Blog-Page // FIN -------------------------- 
			*/



















		/* 
			Page // FIN -------------------------- 
		*/










		/* 
			Bloac // DEBUT -------------------------- 
		*/

			


		/* 
			Bloac // FIN -------------------------- 
		*/






			







	/*
		Composant : "normal.footer" // PIED DE PAGE
	*/
	$this->component('normal.footer');

