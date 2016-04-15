<?php


/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;


global $_DPO_DEVICE;





$_HostPage = (isset($this->host) && is_string($this->host)) ? $this->host: 'home'; 





/* 
	Class 'STYLIVOIR' // DEBUT ------------------
*/

\Gougnon::loadPlugins('PHP/stylIvoir.2.0');


	$STYLIVOIR = new \StylIvoir('Component.Header');


/* 
	Class 'STYLIVOIR' // FIN ------------------
*/






/* Plugins */

new \GGN\Using('Plugins');

new \GGN\Plugin\HTML('Models');





/* 
	Encodage des charatères 
*/
Theme\Content::entities('html.entities/decode');






$SideLeftBarCol = ' col-3 mi-col-16 li-col-16 s-col-7 m-col-5 ';









/* 
	Titre de la page
 */
$this->name = 'Gougnon Home Page API';

$this->version = '0.1';

$this->update = date('ymd.hi');







/*

	Acces via "X-Requested-Width" // DEBUT ///////////////////////

*/

if(UsesAjax()){



	/* Corps de la page */
	$this->body = new Theme\Body();

	$this->body->AjaxContainer = new Theme\Tag();


}

/*

	Acces via "X-Requested-Width" // FIN ///////////////////////

*/
	





/*

	Acces Normal // DEBUT ///////////////////////

*/
if(!UsesAjax()){


	$this->component('tag.head');



	/* Corps de la page */
	$this->body = new Theme\Body([

		'class'=>'disable-x-scrollbar' . ($_DPO_DEVICE->current=='-c'? '': 'scroll-on-mobile')

	]);



		$this->body->sheet = new Theme\Tag([
			'class'=>'gui sheet'
			// ,'ggn-scrollbar'=>'true'
			// ,'scrollbar-wheel-delta'=>'50'
			// ,'scrollbar-axe'=>'y'
		]);

		$this->body->sheet->tag->Content = new Theme\Tag([
			'class'=>'gui _w10'
			,'scrollbar-content'=>'true'
		]);
		


			/* Entete : debut */
			$header = new Theme\Tag([
				'class'=>'gui layout gabarit navbar flex row wrap '
			]);


				/* Logo */
				$header->tag->logo = new Theme\Tag(['class'=>'logo gui flex center' ]);

					$header->tag->logo->text('<a href="' . HTTP_HOST . '" class="mi-disable li-disable s-disable" title="Stylivoir.com"><img class="logo" src="' . $this->_url . 'logo-stylivoir-xxl.png?mode=-gd&width=172&height=25&resize=&resizeby=-height&rogner=0"></a>');

					$header->tag->logo->text('<a href="' . HTTP_HOST . '" class="disable mi-enable li-enable s-enable" title="Stylivoir.com"><img class="logo" src="' . $this->_url . 'logo-stylivoir-xc.png?mode=-gd&width=32&height=32&resize=&resizeby=-height&rogner=0"></a>');


				/* Menu */
				$header->tag->menu = new Theme\Tag(['class'=>'menu-nav gui x48-h ' ]);

					$_MenuPage = new \GGN\Plugin\HTML\Model\Brick('Menu/Default'
						, [

							'uriBase'=>HTTP_HOST

							,'host'=>$_HostPage

							,'attributes' => []

							,'class' => 'principal'

							,'flex' => 'row'

							,'items'=>[

								'SideMenu'=>[
									'label'=>'<span class="gui icon menu" ggn-handler-click="Gabarit.Toggle" gabarit-toggle="#page-side-left,#fake-page-side-left" id="page-side-left-pad" ></span>'
									, 'link'=>false
									, 'title'=>'Menu latéral'
									, 'target'=>'_self'
									, 'click'=>'return false;'

									, 'hattrib'=>[
										'ggn-handler-click'=>'Gabarit.Toggle'
										,'gabarit-toggle'=>'#page-side-left,#fake-page-side-left'
										// ,'toggle-out-timeout'=>'300'
									]
									
									, 'attrib'=>[
										'ggn-handler-click'=>'Gabarit.Toggle'
										,'gabarit-toggle'=>'#page-side-left,#fake-page-side-left'
										// ,'toggle-out-timeout'=>'300'
									]

								]

								,'Home'=>[
									'label'=>'<span class="gui icon home" ggn-handler-click="Gabarit.Ajax" ajax-href="home" ></span>'
									, 'link'=>'home'
									, 'title'=>'Allez à l\'accueil'
									, 'click'=>'return false;'
									
									, 'hattrib'=>[
										'ggn-handler-click'=>'Gabarit.Ajax'
										, 'ajax-href'=>'home'
									]
									
									, 'attrib'=>[
										'ggn-handler-click'=>'Gabarit.Ajax'
										, 'ajax-href'=>'home'
									]

								]

								,'SearchBar'=>[
									'label'=>'<span class="gui icon search" ggn-handler-click="Gabarit.Toggle" gabarit-toggle="#page-search-bar" ></span>'
									, 'link'=>'search'
									, 'title'=>'Lancer une recherche'
									, 'class'=>'mi-enable-flex li-enable-flex s-enable-flex disable'
									, 'target'=>'_self'
									, 'click'=>'return false;'

									, 'hattrib'=>[
										'ggn-handler-click'=>'Gabarit.Toggle'
										,'gabarit-toggle'=>'#page-search-bar'
									]
									
									, 'attrib'=>[
										'ggn-handler-click'=>'Gabarit.Toggle'
										,'gabarit-toggle'=>'#page-search-bar'
									]

								]


							]

						]
					);

					$header->tag->menu->tag->content = new Theme\Content( $_MenuPage->html );







				/* Moteur de recherche */
				$header->tag->SearchBar = new Theme\Tag(['id'=>'page-search-bar','class'=>'page-search-bar gui flex mi-col-16 li-col-16 s-col-16 col-0 mi-disable li-disable s-disable']);


					$header->tag->SearchBar->tag->Form = new Theme\Tag([
						'tag'=>'form'
						, 'action'=>'#'
						, 'method'=>'GET'
						, 'onsubmit'=>"GToast({title : 'Le moteur de recherche est cours de chargement...', text : 'Si ce mode persiste, veuillez actualiser votre page!'}).bubble();return false;"
						, 'class'=>'gui flex _w10'
						, 'id'=>'page-search-bar-form'
					]);

						$header->tag->SearchBar->tag->Form->tag->Input = new Theme\Tag(['class'=>'gui field-input flex center row _w10']);



							$header->tag->SearchBar->tag->Form->tag->Input->text('<span class="gui icon search static-light"></span>');

							$header->tag->SearchBar->tag->Form->tag->Input->text('<input type="search" class="query gui col-0" placeholder="Recherche" value="" name="query" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#page-search-bar" >');

							$header->tag->SearchBar->tag->Form->tag->Input->text('<span class="f-btn gui icon arrow-right x12 static-light cursor-pointer" onclick="GToast(\'Le moteur de recherche est indisponible...\').bubble();"></span>');

							$header->tag->SearchBar->tag->Form->tag->Input->text('<span class="h-btn gui icon close x12 static-light cursor-pointer" ggn-handler-click="Gabarit.Toggle" gabarit-toggle="#page-search-bar"></span>');






				/* Menu Latteral : Droit */
				$header->tag->Side = new Theme\Tag([

					'class'=>'menu-side-right align-right flex row mi-disable li-disable'

					,'id' => 'page-menu-side-right'

				]);





				/*
					Menu Utilisateur Si Connecté // DEBUT ----------------------------
				*/
				if(is_array($this->Register->USER)){

					$_UserMenuSide = new \GGN\Plugin\HTML\Model\Brick('Menu/Default'
						, [

							'uriBase'=>HTTP_HOST

							,'host'=>$_HostPage

							,'attributes' => []

							,'class' => 'menuside'

							,'flex' => 'row'

							,'items'=>[

								'Notification'=>[
									'label'=>'<div class="disable" id="notifications-notifier">0</div><span class="gui icon flag-alt x16"></span> <span class="on-open">Notifications</span>'
									, 'link'=>'notifications'
									, 'title'=>'Notification'
									, 'target'=>'_self'
									, 'click'=>'alert(\'show notification\');return false;'
									, 'class'=>' mi-flex-order-2 li-flex-order-2 gui flex center'

								]

								,'Messages'=>[
									'label'=>'<div class="disable" id="messages-notifier">0</div><span class="gui icon email"></span> <span class="on-open">Messages</span>'
									, 'link'=>'messages'
									, 'title'=>'Messages'
									, 'target'=>'_self'
									, 'click'=>'alert(\'show message\');return false;'
									, 'class'=>' mi-flex-order-2 li-flex-order-2 gui flex center'

								]

								,'Settings'=>[
									'label'=>'<span class="gui icon settings"></span> <span class="on-open">Paramètres</span>'
									, 'link'=>'settings'
									, 'title'=>'Paramètres'
									, 'target'=>'_self'
									, 'click'=>'alert(\'show settings\');return false;'
									, 'class'=>' mi-flex-order-3 li-flex-order-3 gui flex center'
								]

								,'Panel'=>[
									'label'=>'<span class="gui icon panel"></span> <span class="on-open">Panel</span>'
									, 'link'=>'panel'
									, 'title'=>'Panel'
									, 'target'=>'_self'
									, 'click'=>'alert(\'show panel\');return false;'
									, 'class'=>' mi-flex-order-4 li-flex-order-4 gui flex center'
								]

								,'UserTools'=>[
									'label'=>''
									, 'link'=>'accounts'
									, 'title'=>'Moi'
									, 'class'=>'gui text-left header-user-photo gui x96-w x48-h mi-flex-order-1 li-flex-order-1 gui flex center'
									, 'target'=>'_self'
									, 'click'=>'alert(\'show Accounts tools\');return false;'
								]

								,'LogOut'=>[
									'label'=>'<span class="gui icon power-off"></span> <span class="on-open">Déconnexion</span>'
									, 'link'=>'logout?complete'
									, 'title'=>'Déconnexion'
									, 'target'=>'_self'
									, 'class'=>' mi-flex-order-5 li-flex-order-5 gui flex center'
								]


							]

						]
					);

				
					
					$header->tag->Side->text('<div class="indexer indexer-top-dark on-open cursor-pointer"></div>' . $_UserMenuSide->html);

				}

				/*
					Menu Utilisateur Si Connecté // FIN ----------------------------
				*/





				/*
					Se Connecter et S'inscrire // DEBUT ----------------------------
				*/
				if(!is_array($this->Register->USER)){

					$_UserMenuSide = new \GGN\Plugin\HTML\Model\Brick('Menu/Default'
						, [

							'uriBase'=>HTTP_HOST

							,'host'=>$_HostPage

							,'attributes' => []

							,'class' => 'menuside'

							,'flex' => 'row'

							,'items'=>[

								'LogIn'=>[
									'label'=>'<span class="gui icon user x16"></span>&nbsp;&nbsp;Se connecter'
									, 'link'=>'login?next=' . urlencode( \Gougnon::currentURL() )
									, 'title'=>'Se connecter'
									, 'target'=>'_self'
									// , 'class'=>''
								]

								,'Subscribe'=>[
									'label'=>'<span class="gui icon plus x16"></span>&nbsp;&nbsp;Créer un compte'
									, 'link'=>'subscribe'
									, 'title'=>'Créer un nouveau compte'
									, 'target'=>'_self'
								]


							]

						]
					);

				
					
					$header->tag->Side->text('<div class="indexer indexer-top-dark on-open cursor-pointer"></div>' . $_UserMenuSide->html);

				}

				/*
					Se Connecter et S'inscrire // FIN ----------------------------
				*/






				/* 
					Bouton PAD affichier ou cacher le menu lateral droit 
				*/
				$header->tag->SidePad = (new Theme\Tag([

					'tag'=>'a'
					
					,'class'=>'mi-enable-flex li-enable-flex disable menu-side-right-pad center gui x64-w x48-h flex center'
					
					, 'title'=>'Toutes les options'
					
					, 'href'=>'#'

					, 'onclick'=>'return false;'

					, 'target'=>'_self'

					,'ggn-handler-click'=>'Gabarit.Toggle'
					
					,'gabarit-toggle'=>'#page-menu-side-right'

					,'toggle-out-timeout'=>'300'


				]))->text('<span class="gui icon more-alt box-rotate-90 x16 static-light" ggn-handler-click="Gabarit.Toggle" gabarit-toggle="#page-menu-side-right" toggle-out-timeout="300" ></span>');




			// $this->body->sheet->tag->header = $header;
			$this->body->sheet->tag->Content->tag->header = $header;
			/* Entete : fin */






			/* 
				Menu Latéral : Gauche :: DEBUT --------------------------------- 
			*/
				
				$SideLeft = new Theme\Tag([

					'id'=>'page-side-left'

					,'class'=>'gui pos-fixed '.$SideLeftBarCol.' flex column start' // box-shadow-dark

				]);


					$SideLeft->tag->Cache = new Theme\Tag(['class'=>'cache gui x48-h bg-primary']);




					/* 
						Si Utilisateur PAS - Connecté // DEBUT -----------
					*/

					if(!is_array($this->Register->USER)){

						$SideLeft->tag->Login = new Theme\Tag(['class'=>'gui _w10 _h10 flex center column']);

						$SideLeft->tag->Login->tag->Message = (new Theme\Tag([
							'class'=>'text-x18 text-center padding-x32'
						]))

							->text('Pour consulter cette partie, vous devez êtres connecté')

						;

						$SideLeft->tag->Login->tag->Button = (new Theme\Tag([
					
							'tag'=>'a'
					
							,'class'=>'button active'
					
							,'href'=> "login?home"
					
						]))

							->text('Connectez-vous')

						;

					}

					/* 
						Si Utilisateur PAS - Connecté // FIN -----------
					*/




					/* 
						Si Utilisateur Connecté // DEBUT -----------
					*/

					if(is_array($this->Register->USER)){


					/* 
						Utilisateurs // DEBUT --------------------------
					*/
					$SideLeft->tag->User = new Theme\Tag(['class'=>'side-user-profil gui _w10']);




						/* 
							Photo
						*/
						$SideLeft->tag->User->tag->Photo = (new Theme\Tag(['class'=>'photo gui x128-h _w10 flex center pos-relative']))

							->text('<span class="gui icon user x64 static-light"></span>');

							/* 
								Outils 
							*/
							$SideLeft->tag->User->tag->Photo->tag->Tools = new Theme\Tag(['class'=>'tools gui pos-absolute flex start']);

								/* Supprimer */
								$SideLeft->tag->User->tag->Photo->tag->Tools->tag->Del = (new Theme\Tag([

									'tag'=>'a'

									,'href'=>'account/settings/profil/photo/delete'
								
									, 'title'=>'Supprimer la photo de profil'

									, 'onclick'=>'return false;'

									, 'class'=>'delete item gui flex center pos-relative'

								]))

									->text('<span class="gui icon close x12 static-light"></span></span>');


								/* Changer */
								$SideLeft->tag->User->tag->Photo->tag->Tools->tag->Change = (new Theme\Tag([
								
									'tag'=>'a'

									,'href'=>'settings/account/profil/photo/change'
								
									, 'title'=>'Changer la photo de profil'

									, 'onclick'=>'return false;'

									, 'class'=>'change item gui flex center pos-relative'
								
								]))

									->text('<span class="gui icon camera x12 static-light"></span> <span class="">Modifier la photo</span>');


								/* Affiche */
								$SideLeft->tag->User->tag->Photo->tag->Tools->tag->Overview = (new Theme\Tag([
								
									'tag'=>'a'

									,'href'=>'settings/account/profil/photo/overview'
								
									, 'title'=>'Afficher'

									, 'onclick'=>'return false;'

									, 'class'=>'change item gui flex center pos-relative'
								
								]))

									->text('<span class="gui icon zoom-in x12 static-light"></span> ');




						/* 
							Nom Utilisateur
						*/
						$SideLeft->tag->User->tag->Name = (new Theme\Tag(['class'=>'name gui _w10 flex start tpddng']))

							->text( ucwords($this->Register->USER['USERNAME']));




					/* 
						Utilisateurs // FIN --------------------------
					*/





					/* 
						Details  // DEBUT --------------------------
					*/
						$SLDetails = new Theme\Tag([
					
							'class'=>'details gui col-0 _w10 scroll-on-mobile'
					
							,'ggn-scrollbar'=>'true'
					
							,'scrollbar-axe'=>'y'
					
							,'scrollbar-wheel-delta'=>'50'
					
						]);



							$SLDetails->tag->Container = (new Theme\Tag([
								'scrollbar-content'=>'true'
							]));


								$MyBlog = $STYLIVOIR->UserBlog($this->Register->USER['UKEY']);



								$SiwtchBlog = (new Theme\Tag(['class'=>'bloc']));

									$SiwtchBlog->tag->Titre = (new Theme\Tag(['class'=>'title pddng']))

										->text('<span class="gui icon pencil-alt"></span> Gerer mes blogs')

									;
									


									/* 
										Tous mes blogs // DEBUT ------------
									*/


										if($MyBlog->row <= 0){

											$SiwtchBlog->tag->No = (new Theme\Tag(['class'=>'gui flex start column padding-x16 ']));

											$SiwtchBlog->tag->No->text('<div class="gui box warning box-rounded padding-x8"><span class="gui icon na"></span>&nbsp;&nbsp;Vous ne possédez aucun blog!</div>');

											$SiwtchBlog->tag->No->text('<div class="margin-t-x16"><a class="button active" href="UserGetStarted?create.blog">Créer un nouveau blog</a></div>');


										}





										if($MyBlog->row > 0){

											$SiwtchBlog->tag->Items = (new Theme\Tag(['class'=>'items pddng gui flex column']));

											foreach ($MyBlog->data as $bky => $blog) {

												$i = (new Theme\Tag([

													'class'=>'item'

													,'tag'=>'a'

													,'href'=>$blog->SLUG

												]));

												
												$i->tag->icon = (new Theme\Tag([

													'class'=>'gui icon ' . $STYLIVOIR->BlogIconByType($blog->BLOGTYPE) . ' x14 color-primary'

												]));


												$i->tag->a = (new Theme\Tag([

													'tag'=>'span'

												]))

													->text('&nbsp;&nbsp;&nbsp;' . $blog->TITLE )

												;

												$SiwtchBlog->tag->Items->tag->{'item_' . $bky} = $i;

											}

											$SiwtchBlog->tag->Items->text('<div class="margin-t-x16"><a class="button active" href="UserGetStarted?create.blog">Créer un nouveau blog</a></div>');

										}
										



									/* 
										Tous mes blogs // FIN ------------
									*/

								$SLDetails->tag->Container->tag->SiwtchBlog = $SiwtchBlog;








								$BlogCat = (new Theme\Tag(['class'=>'bloc']));

									$BlogCat->tag->Titre = (new Theme\Tag(['class'=>'title pddng']))

										->text('<span class="gui icon rss"></span> Blogs');
									
									$BlogCat->tag->Items = (new Theme\Tag(['class'=>'items exstatic pddng gui flex column text-x14']));

										
										$BlogCat->tag->Items->text('<a href="blogs" class="item">Tous les blogs</a>');

										$BlogCat->tag->Items->text('<a href="boutiques" class="item">Boutiques</a>');

										$BlogCat->tag->Items->text('<a href="coutures" class="item">Coutures</a>');

										$BlogCat->tag->Items->text('<a href="esthetiques" class="item">Esthétiques</a>');

										$BlogCat->tag->Items->text('<a href="castings" class="item">Castings</a>');


								$SLDetails->tag->Container->tag->BlogCat = $BlogCat;








								$SocialNetWork = (new Theme\Tag(['class'=>'bloc']));

									$SocialNetWork->tag->Titre = (new Theme\Tag(['class'=>'title pddng']))

										->text('<span class="gui icon reload"></span> Synchronisation');
									
									$SocialNetWork->tag->Items = (new Theme\Tag(['class'=>'items exstatic pddng gui flex column text-x14']));

										
										$SocialNetWork->tag->Items->text('<a href="account/sync/youtube" class="item">Youtube</a>');

										$SocialNetWork->tag->Items->text('<a href="account/sync/facebook" class="item">Facebook</a>');

										$SocialNetWork->tag->Items->text('<a href="account/sync/twitter" class="item">Twitter</a>');


								$SLDetails->tag->Container->tag->SocialNetWork = $SocialNetWork;










								$Tools = (new Theme\Tag(['class'=>'bloc padding-b-x32']));

									$Tools->tag->Titre = (new Theme\Tag(['class'=>'title pddng']))

										->text('<span class="gui icon settings "></span> Paramètres');
									
									$Tools->tag->Items = (new Theme\Tag(['class'=>'items exstatic pddng gui flex column text-x14']));


										$Tools->tag->Items->text('<a href="account/settings" class="item">Compte</a>');
										
										$Tools->tag->Items->text('<a href="settings/security" class="item">Sécurité</a>');


										$Tools->tag->Items->text('<div class="separator"></div>');


										$Tools->tag->Items->text('<a href="settings/privacy" class="item">Confidentialité</a>');

										$Tools->tag->Items->text('<a href="settings/post" class="item">Publications</a>');

										$Tools->tag->Items->text('<a href="settings/blocking" class="item">Blocage</a>');


										$Tools->tag->Items->text('<div class="separator"></div>');


										$Tools->tag->Items->text('<a href="settings/notifications" class="item">Notifications</a>');

										$Tools->tag->Items->text('<a href="settings/mobile" class="item">Mobile</a>');

										$Tools->tag->Items->text('<a href="settings/followers" class="item">Abonné(e)s</a>');


										$Tools->tag->Items->text('<div class="separator"></div>');


										$Tools->tag->Items->text('<a href="settings/applications"class="item">Applications</a>');

										$Tools->tag->Items->text('<a href="settings/ads" class="item">Publicités</a>');

										$Tools->tag->Items->text('<a href="settings/payments" class="item">Paiements</a>');

										$Tools->tag->Items->text('<a href="settings/helps" class="item">Aide et Assistance</a>');

										// $Tools->tag->Items->text('<div class="item">&nbsp;</div>');




								$SLDetails->tag->Container->tag->Tools = $Tools;






						$SideLeft->tag->Details = $SLDetails;

					/* 
						Details // FIN --------------------------
					*/


					}

					/* 
						Si Utilisateur Connecté // FIN -----------
					*/



				$this->body->sheet->tag->Content->tag->SideLeft = $SideLeft;


				// $this->body->js('G("#page-side-left").addClass("open");');

			/* 
				Menu Latéral : Gauche :: FIN --------------------------------- 
			*/
			



			$this->body->sheet->tag->Content->tag->ProgressBar = (new Theme\Tag([

				'id'=>'header-progress-bar'

				,'class'=>'x48-h col-16'

			]))

				->text('<div class="track"></div>');

			;






			/*
				Composant : "mo.under.header" // EN DESSOUS DE L'ENTETE
			*/
			$this->component('mo.under.header');






			/*
				Conteneur de la page
			*/

			$this->body->sheet->tag->Content->tag->Container = new Theme\Tag([

				'class'=>'page-container-glob gui flex row start col-16'

				,'id'=>'page-container-glob'

			]);

			

			$this->body->sheet->tag->Content->tag->Container->tag->fakeLeftBar = (new Theme\Tag([

				'class'=>'close '.$SideLeftBarCol.' pos-static-i vh10'

				,'id'=>'fake-page-side-left'

			]));


			$this->body->sheet->tag->Content->tag->Container->tag->Container = new Theme\Tag([

				'class'=>'col-0'

				,'id'=>'page-container-now'

			]);




	
}


/*

	Acces Normal // FIN ///////////////////////

*/






/*

	Affichage de "Under Header"

*/
	$this->body->js('(function(uh){');

		$this->body->js('if(isObj(uh)){');

			$this->body->js('uh.show(false);');

		$this->body->js('}');

	$this->body->js('})(G("#under-header"));');






/*

	Paramètres "Gabarit Ajax"

*/
	$this->body->js('(function(){');

		$this->body->js('var jx = G.Gabarit.Ajax;');

		$this->body->js('jx.Target = "#page-container-now";');

		$this->body->js('jx.ActiveHistory = true;');

		$this->body->js('jx.Capture = true;');

		$this->body->js('jx.DefaultTitle = "'.( isset($this->head->title) ? addslashes($this->head->title) : (isset($this->title) ? $this->title : \_native::varn('SITENAME')) ).'";');

	$this->body->js('})();');

