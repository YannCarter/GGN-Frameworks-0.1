<?php


/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;








/* DPO */

new Using('DPO\Page');

new Using('DPO\Procedure');

new Using('DPO\Theme');

// new Using('GeoLocation/Country/CI');





/* 
	Noyau CSS // DEBUT ------------------
*/

	$CSSCore = \_native::CSSCore('ggn.core');


/* 
	Noyau CSS // FIN ------------------
*/





/* 
	Class 'STYLIVOIR' // DEBUT ------------------
*/

\Gougnon::loadPlugins('PHP/stylIvoir.2.0');


	$STYLIVOIR = new \StylIvoir('Subscribe.Now');


	// $Cities = (new \GGN\GeoLocation\Country\CI\Load())->Cities;


	// $_Criterions = $STYLIVOIR->BlogCriterions;



/* 
	Class 'STYLIVOIR' // FIN ------------------
*/









/* 
	Activation 
*/

if(\_native::varn('SUBSCRIBEPAGE_ACTIVE')!=='1'){

	\_native::wCnsl('Cette page a été désactivé par le gestionnaire');

}






/* 
	Initialisation du Theme 
*/

$tpl = new Theme\Preset(\_native::varn('SUBSCRIBEPAGE_THEME'));


$tpl->Register = $this;


$tpl->title = \_native::varn('SUBSCRIBEPAGE_TITLE');



/* 
	Style de la page
*/

$tpl->style = \_native::varn('SUBSCRIBEPAGE_STYLE');



/* 
	Noyau CSS
*/

$CSSCore->Style($tpl->style);

$tpl->CSSCore = $CSSCore;





/* 
	Fichier Hote 
*/

$tpl->host = 'subscribe';



/*
	Composant : "normal.header" // ENTETE
*/
$tpl->component('normal.header');




/*
	CSS
*/

$tpl->head->cssPackages([

	'ggn.awake.confirm'

]);




/*
	Script
*/

$tpl->head->jsPackages([

	'ggn.connect.subscribe'

	,'ggn.awake.confirm'

]);









/* Conteneur de la page : debut */

	/*
		Fusion avec le noeud principal
	*/

	if(!UsesAjax()){

		$container = $tpl->body->sheet->tag->Content->tag->Container->tag->Container;
		
	}


	if(UsesAjax()){

		$container = $tpl->body->AjaxContainer;
		
	}









	/* 
		Espacement en Haut // Debut -------------------------- 
	*/

		$container->tag->Spacer = new Theme\Tag(['class'=>'page-space-top']);


	/* 
		Espacement en Haut // Fin -------------------------- 
	*/










	/* 
		Page // DEBUT -------------------------- 
	*/

		$container->tag->Page = new Theme\Tag([
			'class'=>'gui flex row wrap start bloc-page _w10'	
		]);



		if(is_array($this->USER)){


			/* 
				Bloc // DEBUT -------------------------- 
			*/

				$Bloc = (new Theme\tag(['class'=>'title enable col-16 gui flex column']));


				/* 
					Titre // DEBUT -------------------
				*/
					$Bloc->tag->Head = (new Theme\Tag(['class'=>'part col-16 gui flex wrap column  center']))

						->text('<div class="s-col-0 xh5 color-primary no-pddng">Déconnectez-vous</div>')

						->text('<div class="s-col-0 text-x18 color-primary no-pddng">Vous devez êtes déconnecté pour effectuer une nouvelle inscription</div>')

						->text('<div class="s-col-0 h2 color-primary padding-x32"><button onclick="history.go(-1)"><span class="gui iconx">arrow_back</span>&nbsp;&nbsp;&nbsp;Retour</button>&nbsp;<button onclick="location.href=\'logout?complete&next='.\urlencode(\Gougnon::currentURL()).'\'" class="active">Déconnexion&nbsp;&nbsp;&nbsp;<span class="gui iconx">arrow_forward</span></button></div>')

					;

				/* 
					Titre // FIN -------------------
				*/

				$container->tag->Page->tag->Bloc = $Bloc;

			/* 
				Bloc // FIN -------------------------- 
			*/

		}



		if(!is_array($this->USER)){

			$tpl->head->script($tpl->_url . 'subscribe.manager.js');

			/* 
				Barre laterale Gauche // DEBUT -------------------------- 
			*/

				$PLeft = (new Theme\tag(['class'=>' enable col-0 mi-col-16 li-col-16 gui flex column  flex-order-1 mi-flex-order-2 li-flex-order-2 padding-x16 ']));


				/* 
					Titre // DEBUT -------------------
				*/
					$PLeft->tag->Head = (new Theme\Tag(['class'=>'part col-16 gui flex wrap']))

						->text('<div class="s-col-16 xh5 color-primary no-pddng gui flex  mi-flex-center s-flex-center">Pourquoi créer un compte</div>')

					;

				/* 
					Titre // FIN -------------------
				*/

					

				/* 
					Contenu // DEBUT -------------------
				*/
					$PLeft->tag->Content = (new Theme\Tag(['class'=>'part col-16 gui flex wrap']))

						->text('<div class="s-col-16 h1 color-primary no-pddng gui flex  mi-flex-center s-flex-center">A</div>')

					;

				/* 
					Contenu // FIN -------------------
				*/


				

				$container->tag->Page->tag->PLeft = $PLeft;
			/* 
				Barre laterale Gauche // FIN -------------------------- 
			*/







			/* 
				Barre laterale Droite // DEBUT -------------------------- 
			*/

				$PRight = (new Theme\tag(['class'=>' col-4 mi-col-16 li-col-16 s-col-7 m-col-6 l-col-5 gui flex column flex-order-2 mi-flex-order-1 li-flex-order-1 ']));


				/* 
					Contenu // DEBUT -------------------
				*/
					$Form = (new Theme\Tag([
						'tag'=>'form'

						, 'class'=>'form part col-16 gui flex wrap'

						, 'method'=>'post'

						, 'action'=>'?and.now'

						, 'onsubmit'=>'return false;'

						, 'id'=>'ggn-subscribe-form'

						, 'captcha-bg-color'=>$CSSCore->styleProperty('palette-primary-color')

						, 'captcha-text-color'=>$CSSCore->styleProperty('palette-light-color')

						, 'captcha-name'=>'ggn.users.subscribe'

					]));


						$Form->tag->Bloc = (new Theme\Tag([

							'class'=>'form-bloc col-16 gui pos-relative disable-scrollbar padding-x16'	

							, 'id'=>'ggn-subscribe-box'
							
						]));

						$Form->tag->Bloc->tag->Title = (new Theme\Tag([

							'class'=>'title h3 x96-h gui flex center'	

						]))

							->text('Inscrivez-vous')

						;

						$Form->tag->Bloc->tag->Fields = (new Theme\Tag([

							'class'=>'form-fields col-16'	

						]))

							/* Nom utilisateur */
							->text('<div class="field-input styled xl gui box-rounded gui flex row center box-shadow-dark" id="subscribe-username-field"><span class="gui iconx iconx " title="Minimum : 5 \nMaximun : 32">person</span><input type="username" name="username" placeholder="Nomd\'utilisateur" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#subscribe-username-field,#subscribe-username-info" focus-class="focus,enable" required pattern=".{5,32}"></div>')

							->text('<div class="gui box info text-x12 padding-x12 box-rounded disable" id="subscribe-username-info"><span class="iconx">info</span>&nbsp;&nbsp;&nbsp;Minimum : 5, Maximun : 32 Caratères, evitez les symboles à par "." et "-"</div>')


							/* Mot de passe */
							->text('<div class="field-input styled xl gui box-rounded gui flex row center box-shadow-dark" id="subscribe-password-field"><span class="gui iconx iconx " title="Minimum : 6 \nMaximun : 32">vpn_key</span><input type="password" name="password" placeholder="Mot de passe" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#subscribe-password-field,#subscribe-password-info" focus-class="focus,enable" required pattern=".{6,32}" ></div>')

							->text('<div class="gui box info text-x12 padding-x12 box-rounded disable" id="subscribe-password-info"><span class="iconx">info</span>&nbsp;&nbsp;&nbsp;Minimum : 6, Maximun : 32 Caratères</div>')


							/* Confirmer Mot de passe */
							->text('<div class="field-input styled xl gui box-rounded gui flex row center box-shadow-dark" id="subscribe-confirm-password-field"><span class="gui iconx iconx">vpn_key</span><input type="password" name="password2" placeholder="Confirmer Mot de passe" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#subscribe-confirm-password-field,#subscribe-confirm-password-info" focus-class="focus,enable" required ></div>')

							->text('<div class="gui box info text-x12 padding-x12 box-rounded disable" id="subscribe-confirm-password-info"><span class="iconx">info</span>&nbsp;&nbsp;&nbsp;Entrez le même mot de passe que celui plus haut</div>')


							/* Email */
							->text('<div class="field-input styled xl gui box-rounded gui flex row center box-shadow-dark" id="subscribe-email-field"><span class="gui iconx iconx">email</span><input type="email" name="email" placeholder="email@exemple.com" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#subscribe-email-field,#subscribe-email-info" focus-class="focus,enable" required ></div>')

							->text('<div class="gui box info text-x12 padding-x12 box-rounded disable" id="subscribe-email-info"><span class="iconx">info</span>&nbsp;&nbsp;&nbsp;Entrez une adresse mail valide</div>')



							/* Image Captcha */
							/* 
								' . HTTP_HOST . 'captcha?name=user.subscribe&textcolor='.urlencode($CSSCore->styleProperty('palette-light-color')).'&bgcolor='.urlencode($CSSCore->styleProperty('palette-primary-color')).'
							*/
							->text('<div class="gui flex center _w10 bg-primary box-rounded" ><img class="disable" id="ggn-subscribe-captcha"></div>')


							/* Champs d'Entré Captcha */
							->text('<div class="field-input styled xl gui box-rounded gui flex row center box-shadow-dark" id="subscribe-captcha-field"><span class="gui iconx iconx">verified_user</span><span class="gui iconx iconx cursor-pointer color" id="ggn-subscribe-captcha-ctrl">sync</span><input type="captcha" name="captcha" placeholder="Entrer le code de sécurité ci-dessus" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#subscribe-captcha-field,#subscribe-captcha-info" focus-class="focus,enable" required autocomplete="off"></div>')

							->text('<div class="gui box info text-x12 padding-x12 box-rounded disable" id="subscribe-captcha-info"><span class="iconx">info</span>&nbsp;&nbsp;&nbsp;Entrez le code du captcha plus haut</div>')



							/* CGU */
							->text('<div class="gui flex center text-x16 x64-h"><input type="checkbox" name="cgu" value="accept" required >&nbsp;&nbsp;&nbsp;J\'accepte les&nbsp; <a href="cug.html">Conditions Générales d\'Utilisation</a></div>')


							/* Bouton de soumission */
							->text('<div class="gui flex center x48-h"><input class="col-5 text-x18" type="button" value="Se connecter" onclick="location.href=\'login?new\'" >&nbsp;&nbsp;<input class="col-0 text-x18 active" type="submit" value="Continuer" ></div>')

						;


					$PRight->tag->Form = $Form;

				/* 
					Contenu // FIN -------------------
				*/


				

				$container->tag->Page->tag->PRight = $PRight;
			/* 
				Barre laterale Droite // FIN -------------------------- 
			*/


		}





	/* 
		Page // FIN -------------------------- 
	*/






		







/*
	Composant : "normal.footer" // PIED DE PAGE
*/
$tpl->component('normal.footer');

