<?php


/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;
	


	$tpl->head->title = 'Créez un nouveau blog';


	$_THIS_ACCOUNT_TYPE = 1;





	/* 

		Application du type // DEBUT ------

	*/

		$MyAccountType = $STYLIVOIR->getUserAccountType($this->USER['UKEY']);

		$AccountType = false;



		if($MyAccountType->row <= 0){

			$SetMyAccountType = $STYLIVOIR->setUserAccountType($this->USER['UKEY'], $_THIS_ACCOUNT_TYPE);

			$AccountType = $_THIS_ACCOUNT_TYPE;

		}

		if($MyAccountType->row === 1){

			$AccountType = $MyAccountType->data[0]->_DATA;

			$STYLIVOIR->denyOtherAccountType($AccountType, $_THIS_ACCOUNT_TYPE);

		}



	$_AccountType = $STYLIVOIR->getAccountType($AccountType);



	// var_dump($AccountType);
	// var_dump($_AccountType);
	// exit;


	/* 

		Application du type // FIN ------

	*/
		




	/* 
		Bloc // DEBUT -------------------------- 
	*/

		$Bloc = (new Theme\tag(['class'=>'title enable col-16 gui flex column']));



			/* 
				Titre // DEBUT -------------------
			*/
				$Bloc->tag->Head = (new Theme\Tag(['class'=>'part col-16 gui flex wrap column center padding-tb-x32']))

					->text('<div class="s-col-16 xh5 color-primary no-pddng">Créez un nouveau blog</div>')

					->text('<div class="s-col-16 h2 color-primary no-pddng">Sélectionner un type de blog</div>')

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



				if(is_array($_AccountType) && isset($_AccountType['child'])){

					foreach ($_AccountType['child'] as $key => $type) {

						$Bloc->tag->Content->tag->{'item_' . $type['slug']} = (new Theme\Tag([

							'class'=>'part gui flex column center x256 box-rounded-biggest margin-x8 cursor-pointer box-check'

							,'tag'=>'a'

							,'href'=>'UserGetStarted?on=' . $type['slug']

						]))

							->text('<div class="xh3 align-center padding-t-x20"><span class="gui iconx icon color-primary">' . $type['icon'] . '</span></div>')

							->text('<div class="h4 padding-lr-x20 color-primary">' . ucfirst($type['name']) . '</div>')

							->text('<div class="text-x12 padding-lr-x20 padding-b-x20">')

								->text($type['about'] )

							->text('</div>')

						;

						
					}


				}








				if(!is_array($_AccountType) || !isset($_AccountType['child'])){
						
						$Bloc->tag->Content->tag->Info = (new Theme\Tag([

							'class'=>'part gui flex column center x256 box-rounded-biggest margin-r-x8 cursor-pointer box-check'

							,'tag'=>'a'

							// ,'href'=>'UserGetStarted?on='

						]))

							->text('<div class="xh3 align-center padding-t-x20"><span class="gui iconx icon color-primary">close</span></div>')

							->text('<div class="h4 padding-lr-x20 color-primary">Erreur</div>')

							->text('<div class="text-x12 padding-lr-x20 padding-b-x20">')

								->text('Impossible de retrouver les details concernant ce type de compte')

							->text('</div>')

						;

				}




			/* 
				Contenu // FIN -------------------
			*/





		$container->tag->Page->tag->Bloc = $Bloc;
	/* 
		Bloc // FIN -------------------------- 
	*/

