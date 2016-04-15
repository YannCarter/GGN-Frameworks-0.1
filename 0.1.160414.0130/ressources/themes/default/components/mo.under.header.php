<?php

/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;


if(!UsesAjax()){


	$_HostPage = (isset($this->host) && is_string($this->host)) ? $this->host: 'home'; 




	/* Sous l'Entete */

	$underHeader = new Theme\Tag([
	
		'id'=>'under-header'

		,'class'=>'gui pos-fixed under-header box-shadow-dark col-16'

	]);

	/* Sous menu */
	$underHeader->tag->SubMenu = new Theme\Tag(['class'=>' gui flex ' ]);

		$_SubMenuPage = new \GGN\Plugin\HTML\Model\Brick('Menu/Default'
			, [

				'uriBase'=>HTTP_HOST

				,'host'=>$_HostPage

				,'attributes' => []

				,'class' => 'category'

				,'flex' => 'row wrap'

				,'items'=>[

					'All'=>[
						'label'=>'Tous les blogs'
						, 'link'=>'blogs'
						, 'title'=>'Parcourir'
						, 'target'=>'_self'
						, 'class'=>'gui mi-col-16 li-col-16 '
						, 'click'=>'return false;'

						, 'hattrib'=>[
							'ggn-handler-click'=>'Gabarit.Ajax'
							, 'ajax-href'=>'blogs'
						]
						
						, 'attrib'=>[
							'ggn-handler-click'=>'Gabarit.Ajax'
							, 'ajax-href'=>'blogs'
						]

					]

					,'SHOP'=>[
						'label'=>'Boutique'
						, 'link'=>'boutiques'
						, 'title'=>'Parcourir les boutiques'
						, 'target'=>'_self'
						, 'class'=>'gui mi-col-16 li-col-16 '
						, 'click'=>'return false;'

						, 'hattrib'=>[
							'ggn-handler-click'=>'Gabarit.Ajax'
							, 'ajax-href'=>'boutiques'
						]
						
						, 'attrib'=>[
							'ggn-handler-click'=>'Gabarit.Ajax'
							, 'ajax-href'=>'boutiques'
						]

					]

					,'COUTURE'=>[
						'label'=>'Couture'
						, 'link'=>'coutures'
						, 'title'=>'Parcourir les salons de couture'
						, 'target'=>'_self'
						, 'class'=>'gui mi-col-16 li-col-16 '
						, 'click'=>'return false;'

						, 'hattrib'=>[
							'ggn-handler-click'=>'Gabarit.Ajax'
							, 'ajax-href'=>'coutures'
						]
						
						, 'attrib'=>[
							'ggn-handler-click'=>'Gabarit.Ajax'
							, 'ajax-href'=>'coutures'
						]

					]

					,'ESTHETIQUES'=>[
						'label'=>'Esthétique'
						, 'link'=>'esthetiques'
						, 'title'=>'Parcourir les salons d\'esthétique'
						, 'target'=>'_self'
						, 'class'=>'gui mi-col-16 li-col-16 '
						, 'click'=>'return false;'

						, 'hattrib'=>[
							'ggn-handler-click'=>'Gabarit.Ajax'
							, 'ajax-href'=>'esthetiques'
						]
						
						, 'attrib'=>[
							'ggn-handler-click'=>'Gabarit.Ajax'
							, 'ajax-href'=>'esthetiques'
						]

					]

					,'CASTING'=>[
						'label'=>'Casting'
						, 'link'=>'castings'
						, 'title'=>'Parcourir les utilisateurs Casting'
						, 'target'=>'_self'
						, 'class'=>'gui mi-col-16 li-col-16 '
						, 'click'=>'return false;'

						, 'hattrib'=>[
							'ggn-handler-click'=>'Gabarit.Ajax'
							, 'ajax-href'=>'castings'
						]
						
						, 'attrib'=>[
							'ggn-handler-click'=>'Gabarit.Ajax'
							, 'ajax-href'=>'castings'
						]

					]


				]

			]
		);

		$underHeader->tag->SubMenu->text('<div class="gui align-center mi-disable li-disable s-disable " id="page-menu-categories"><div class="indexer indexer-top-dark on-open cursor-pointer"></div>' . $_SubMenuPage->html . "</div>");

		$underHeader->tag->SubMenu->text('<a href="" onclick="return false;" class="gui align-center disable mi-enable li-enable s-enable choose-option" ggn-handler-click="Gabarit.Toggle" gabarit-toggle="#page-menu-categories" toggle-from="close" toggle-to="open" toggle-out-timeout="300" >Choisissez votre categorie</a>');








	$this->body->sheet->tag->Content->tag->underHeader = $underHeader;
	
}


// if(UsesAjax()){

// 	$this->body->AjaxContainer->tag->underHeader = $underHeader;
	
// }


