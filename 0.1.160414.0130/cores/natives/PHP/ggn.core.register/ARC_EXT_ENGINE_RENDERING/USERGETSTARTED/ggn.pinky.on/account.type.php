<?php


/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;


	/* 
		Bloc // DEBUT -------------------------- 
	*/

		$Bloc = (new Theme\tag(['class'=>'title enable col-16 gui flex column']));



		if(is_string($OnValue)){

			$OnValue = strtolower($OnValue);





			/*
				 Utilisateur // DEBUT /////////////////////////////////////////////////////////////////////////////////////
			*/
			if($OnValue == 'user'){


				/* 
					Titre // DEBUT -------------------
				*/
					$Bloc->tag->Head = (new Theme\Tag(['class'=>'part col-16 gui flex wrap column  center']))

						->text('<div class="s-col-0 xh5 color-primary no-pddng">Créez un nouveau blog</div>')

						->text('<div class="s-col-0 h2 color-primary no-pddng">Sélectionner un type de blog</div>')

					;

				/* 
					Titre // FIN -------------------
				*/

					

				/* 
					Contenu // DEBUT -------------------
				*/
					$Bloc->tag->Content = (new Theme\Tag(['class'=>'part col-16 gui flex wrap center']))

						// ->text('<div class="s-col-10 h1 color-primary no-pddng gui flex mi-flex-center s-flex-center">A</div>')

					;




						$Bloc->tag->Content->tag->Shop = (new Theme\Tag([

								'class'=>'part gui flex column center x192 box-rounded-biggest margin-r-x8 cursor-pointer box-check'

								// ,'id'=>'user-box-check'

								,'tag'=>'a'

								,'href'=>'?on=account.type:user'

							]))

							->text('<div class="xh5 padding-t-x20"><span class="gui iconx color-primary">shopping_cart</span></div>')

							->text('<div class="h5 padding-lr-x20 color-primary">Boutique</div>')

							->text('<div class="text-x12 padding-lr-x20 padding-b-x20">')

								->text('Vêtements, chaussures, accessoires de beautés...')

							->text('</div>')

						;





						$Bloc->tag->Content->tag->Sewing = (new Theme\Tag([

								'class'=>'part gui flex column center x192 box-rounded-biggest margin-r-x8 cursor-pointer box-check'

								// ,'id'=>'user-box-check'

								,'tag'=>'a'

								,'href'=>'?on=account.type:user'

							]))

							->text('<div class="xh5 padding-t-x20"><span class="gui iconx color-primary">content_cut</span></div>')

							->text('<div class="h5 padding-lr-x20 color-primary">Couture</div>')

							->text('<div class="text-x12 padding-lr-x20 padding-b-x20">')

								->text('Homme, Dame et enfant...')

							->text('</div>')

						;






						$Bloc->tag->Content->tag->Esthetique = (new Theme\Tag([

								'class'=>'part gui flex column center x192 box-rounded-biggest margin-r-x8 cursor-pointer box-check'

								// ,'id'=>'user-box-check'

								,'tag'=>'a'

								,'href'=>'?on=account.type:user'

							]))

							->text('<div class="xh5 padding-t-x20"><span class="gui iconx color-primary">face</span></div>')

							->text('<div class="h5 padding-lr-x20 color-primary">Esthétique</div>')

							->text('<div class="text-x12 padding-lr-x20 padding-b-x20">')

								->text('Spa, pédicure, manicure, soins de visage...')

							->text('</div>')

						;






						$Bloc->tag->Content->tag->Casting = (new Theme\Tag([

								'class'=>'part gui flex column center x192 box-rounded-biggest margin-r-x8 cursor-pointer box-check'

								// ,'id'=>'user-box-check'

								,'tag'=>'a'

								,'href'=>'?on=account.type:user'

							]))

							->text('<div class="xh5 padding-t-x20"><span class="gui iconx color-primary">star_border</span></div>')

							->text('<div class="h5 padding-lr-x20 padding-b-x20 color-primary">Casting</div>')

							->text('<div class="text-x12 padding-lr-x20 padding-b-x20">')

								->text('Acteur, mannequin...')

							->text('</div>')

						;




				/* 
					Contenu // FIN -------------------
				*/

			}

			/*

				Utilisateur // FIN /////////////////////////////////////////////////////////////////////////////////////
				
			*/




		}
		

		$container->tag->Page->tag->Bloc = $Bloc;
	/* 
		Bloc // FIN -------------------------- 
	*/

