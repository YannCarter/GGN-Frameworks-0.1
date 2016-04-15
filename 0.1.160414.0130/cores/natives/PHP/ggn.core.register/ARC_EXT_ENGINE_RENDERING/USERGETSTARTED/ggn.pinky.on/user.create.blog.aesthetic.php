<?php


/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;
	


	$_THIS_ACCOUNT_TYPE = 1;

	$_THIS_BLOG_TYPE = 2;





	/* 

		Application du type // DEBUT ------

	*/

		$MyAccountType = $STYLIVOIR->getUserAccountType($this->USER['UKEY']);

		$AccountType = false;



		if($MyAccountType->row <= 0){

			$STYLIVOIR->chooseNewAccountType();

		}

		if($MyAccountType->row === 1){

			$AccountType = $MyAccountType->data[0]->_DATA;

			$STYLIVOIR->denyOtherAccountType($AccountType, $_THIS_ACCOUNT_TYPE);

		}



		$_AccountType = $STYLIVOIR->getAccountType($AccountType);


	/* 

		Application du type // FIN ------

	*/



	/* 

		Villes // DEBUT ------

	*/

		new Using('GeoLocation/Country/CI');

		$Cities = (new \GGN\GeoLocation\Country\CI\Load())->Cities;



			$tpl->body->Select = (new Theme\Tag([

				'tag'=>'datalist'

				,'id'=>'blog-type-city-explicit'

			]));


		foreach($Cities as $ck => $City) { 
			
			$Op = (new Theme\Tag([

				'tag'=>'option'

				,'value'=>($ck)

			]))->text( ucwords($City) );

			$tpl->body->Select->tag->{'Option-' . $ck} = $Op;

		}


	/* 

		Villes // FIN ------

	*/





	/* 
		Bloc // DEBUT -------------------------- 
	*/

		$Bloc = (new Theme\tag(['class'=>' enable col-16 gui flex column']));






			if(!is_array($_AccountType) || !isset($_AccountType['child'][$_THIS_BLOG_TYPE])){


				$tpl->head->title = 'Type de blog introuvable';


				
				$Bloc->tag->Content->tag->Info = (new Theme\Tag([

					'class'=>'part gui flex column center x256 box-rounded-biggest margin-r-x8 cursor-pointer box-check'

					,'tag'=>'a'

					,'href'=>'UserGetStarted?on=' . $type['slug']

				]))

					->text('<div class="xh3 align-center padding-t-x20"><span class="gui icon  color-primary">close</span></div>')

					->text('<div class="h4 padding-lr-x20 color-primary">Erreur</div>')

					->text('<div class="text-x12 padding-lr-x20 padding-b-x20">')

						->text('Impossible de retrouver les details concernant ce type de compte')

					->text('</div>')

				;

			}



			if(is_array($_AccountType) && isset($_AccountType['child'][$_THIS_BLOG_TYPE]) && is_array($_AccountType['child'][$_THIS_BLOG_TYPE])){


				$_BlogType = $_AccountType['child'][$_THIS_BLOG_TYPE];

				


				$tpl->head->title = 'Créez un nouveau salon d\'esthétique';

				$tpl->head->script(HTTP_HOST . 'ggn.pinky/user.create.blog.js');

				$tpl->head->js('(function(){');

					$tpl->head->js('UserCreateBlog.GetFreeSlugFromInput(G("#blog-slug-input"), G("#blog-slug-wait") );');

				$tpl->head->js('})();');




				/* 
					Titre // DEBUT -------------------
				*/
					$Bloc->tag->Head = (new Theme\Tag(['class'=>'part col-16 gui flex wrap column center padding-tb-x32']))

						->text('<div class="s-col-16 xh5 color-primary no-pddng">' . $tpl->head->title . '</div>')

						->text('<div class="s-col-16 h2 color-primary no-pddng">Remplissez le formulaire suivant</div>')

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




					/* 
						Contenu // DEBUT -------------------
					*/
						$Form = (new Theme\Tag([
							'tag'=>'form'

							, 'class'=>'form part col-16 gui flex wrap'

							, 'method'=>'post'

							, 'action'=>'UserGetStarted?on=user.create.blog.save'

							, 'onsubmit'=>'return false;'

							, 'id'=>'ggn-create-blog-form'

						]));


							$Form->tag->Bloc = (new Theme\Tag([

								'class'=>'form-bloc col-16 gui pos-relative disable-scrollbar flex center column'	

								, 'id'=>'ggn-create-blog-box'

								, 'style'=>[

									'padding-bottom'=>'10px'

								]
								
							]));

							$Form->tag->Bloc->tag->Fields = (new Theme\Tag([

								'class'=>'col-8 mi-col-16 li-col-16 s-col-15 m-col-12'	

							]))

								/* Nom */
								->text('<div class="field-input xl styled gui box-rounded gui flex row center box-shadow-dark" id="create-blog-blog-title-field"><span class="gui iconx icon" title="Minimum : 3  Maximun : 32">'.$_BlogType['icon'].'</span><input type="text" name="blog-title" placeholder="Nom du salon d\'esthétique" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#create-blog-blog-title-field,#create-blog-blog-title-info" focus-class="focus,enable" required pattern=".{3,32}"></div>')

								->text('<div class="gui box info text-x12 padding-x12 box-rounded disable" id="create-blog-blog-title-info">Minimum : 3, Maximun : 32 Caratères</div>')


								/* URL */
								->text('<div class="field-input xl styled gui box-rounded gui flex row center box-shadow-dark" id="create-blog-slug-field"><span class="gui iconx icon " title="Minimum : 8  Maximun : 32">http</span><span class="label mi-disable li-disable padding-r-x0" title="Minimum : 5  Maximun : 32">www.stylivoir.com/</span><input type="text" class="padding-l-x0" name="slug" placeholder="Adresse_de_la_esthétique" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#create-blog-slug-field,#create-blog-slug-info" focus-class="focus,enable" required pattern=".{8,32}" id="blog-slug-input"><span class="gui iconx icon color-error" id="blog-slug-wait">block</span></div>')

								->text('<div class="gui box info text-x12 padding-x12 box-rounded disable" id="create-blog-slug-info">Adresse web de votre salon d\'esthétique (www.stylivoir.com/<b class="color-primary">nomDuBlog</b>), Minimum : 8, Maximun : 32 Caratères</div>')


								/* Description */
								->text('<div class="field-input xl styled gui box-rounded gui flex row center box-shadow-dark" id="create-blog-about-field"><span class="gui iconx icon">mode_edit</span><textarea name="about" placeholder="Description du salon d\'esthétique" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#create-blog-about-field,#create-blog-about-info"  focus-class="focus,enable" ></textarea></div>') // required pattern=".{100}"

								->text('<div class="gui box info text-x12 padding-x12 box-rounded disable" id="create-blog-about-info">Ce champs n\'est pas obligatoire</div>')


								/* Ville */
								->text('<div class="field-input xl styled gui box-rounded gui flex row center box-shadow-dark" id="create-blog-city-field"><span class="gui iconx icon" >location_on</span><input type="text" name="city" placeholder="Ville" list="blog-type-city-explicit" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#create-blog-city-field,#create-blog-city-info" focus-class="focus,enable" required ></div>')

								->text('<input type="hidden" name="country" value="CI" >')

								->text('<div class="gui box info text-x12 padding-x12 box-rounded disable" id="create-blog-city-info">Votre ville</div>')


								/* Type de blog */
								->text('<input type="hidden" name="bType" value="'.$_BlogType['key'].'">')



								/* Crtière de Recherche */
								->text('<div class="label align-left padding-x16 text-x18">Details de l\'activité</div>')

								->text('<div class="field-input xl styled gui box-rounded gui flex column padding-tb-x12 padding-lr-x16 center box-shadow-dark" id="create-blog-criterions-field">')


								;

								// var_dump($_BlogType);exit;

								$STYLIVOIR->getCriterionsToDPO($Form->tag->Bloc->tag->Fields, 'esthetiques');



							$Form->tag->Bloc->tag->Fields
								
								->text('<input type="button" class="button col-16" ggn-handler-click="Gabarit.Form.CheckBox" checkbox-set-scope="Citerion" checkbox-on="Tout Délectionner" checkbox-off="Tout Sélectionner" value="Tout Sélectionner">')

								->text('</div>')


								/* Autre */
								->text('<div class="field-input xl styled gui box-rounded gui flex row center box-shadow-dark" id="create-blog-other-detail-field"><span class="gui iconx icon" >add</span><input type="text" name="keywords" placeholder="Autres détails sur l\'activité" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#create-blog-other-detail-field,#create-blog-other-detail-info" focus-class="focus,enable" ></div>')

								->text('<div class="gui box info text-x12 padding-x12 box-rounded disable" id="create-blog-other-detail-info">Séparer les éléments par une ","</div>')


								/* CGU */
								->text('<div class="gui flex center text-x14 x64-h"><input type="checkbox" name="cgu" value="accept" required >&nbsp;&nbsp;&nbsp;J\'accepte les&nbsp; <a href="' . HTTP_HOST . 'cug.html">Conditions Générales d\'Utilisation d\'un blog</a></div>')


								/* Bouton de soumission */
								->text('<div class="gui flex center x48-h"><input class="col-5 text-x18" type="button" value="Retour" onclick="location.href=\'UserGetStarted?on=user.create.blog\'" >&nbsp;&nbsp;<input class="col-0 text-x18 active" type="submit" value="Créer" ></div>')

							;


						$Bloc->tag->Content->tag->Form = $Form;

					/* 
						Contenu // FIN -------------------
					*/



				/* 
					Contenu // FIN -------------------
				*/


			}




		$container->tag->Page->tag->Bloc = $Bloc;
	/* 
		Bloc // FIN -------------------------- 
	*/

