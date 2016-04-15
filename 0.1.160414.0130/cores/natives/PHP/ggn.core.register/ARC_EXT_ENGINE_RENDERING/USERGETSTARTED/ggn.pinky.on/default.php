<?php


/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;


	$tpl->head->title = 'Prise en main';

// var_dump('here');exit;


	$MyAccountType = $STYLIVOIR->getUserAccountType($this->USER['UKEY']);

	$forceOp = false;



	if($MyAccountType->row > 0){
		
		$AccountType = $MyAccountType->data[0]->_DATA;

		$type = $STYLIVOIR->getAccountType($AccountType);

		if(is_array($type) && isset($type['slug'])){

			header('location:UserGetStarted?on=' . $type['slug']);exit;

		}

		else{

			$forceOp = true;

		}

	}



	if($MyAccountType->row <= 0 || $forceOp === true){


		/* 
			Bloc // DEBUT -------------------------- 
		*/

			$Bloc = (new Theme\tag(['class'=>'title enable col-16 gui flex column']));


			/* 
				Titre // DEBUT -------------------
			*/
				$Bloc->tag->Head = (new Theme\Tag(['class'=>'part col-16 gui flex wrap column center padding-tb-x32']))

					->text('<div class="s-col-16 xh5 color-primary no-pddng">Séléction le type de compte</div>')

					->text('<div class="s-col-16 h2 color-primary no-pddng">Qui vous sied</div>')

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



				foreach (array_reverse($STYLIVOIR->AccountType) as $key => $type) {

					$Bloc->tag->Content->tag->{'item_' . $type['slug']} = (new Theme\Tag([

						'class'=>'part gui flex column x256 box-rounded-biggest margin-x8 cursor-pointer box-check'

						,'tag'=>'a'

						,'href'=>'UserGetStarted?on=' . $type['slug']

					]))

						->text('<div class="xh3 align-center padding-t-x20"><span class="gui iconx color-primary">' . $type['iconx'] . '</span></div>')

						->text('<div class="h4 padding-lr-x20 color-primary">' . ucfirst($type['name']) . '</div>')

						->text('<div class="text-x12 padding-lr-x20 padding-b-x20">')

							->text($type['about'] )

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



	}




