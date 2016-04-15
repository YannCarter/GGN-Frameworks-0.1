<?php
/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;



new Using('DPO\Page');

new Using('DPO\Procedure');

new Using('DPO\Theme');









/*
	Paramètres, vérification et Classes
*/


/* Existence des variables Native  */
$GLOGIN_NATIVE_VARS = 'USERS_SESSION_LOCATION ACTIVESESSION_MODE USERS_SESSION_MANAGER_PLUGIN_NAME';

\_native::keyExists(explode(' ',$GLOGIN_NATIVE_VARS));



/* Noyau des utilisateurs  */
if(!class_exists('\GUSERS')){
	
	\_native::PHPCore('ggn.core.users');

}



/* Noyau des applications  */
if(!class_exists('\GAPPS')){

	\_native::PHPCore('ggn.core.applications');

}




/* Chargement de l'ARC-Classe de rendu  */
if(!class_exists('GLogin')){

	$this->requireARCRenderClass('LOGIN/default');

}




/* Existance d'utilisateur connecté */


/*
	Utilisateur depuis le registre
*/
$User = $this->USER;



/*
	Désactiver la fonction de application
*/
$NoApp = $this->_GET('no-app', 0);$NoApp*=1;

	$NoApp = ($NoApp===1)?true:false;


/*
	Clé de l'application
*/
$AppKey =  $this->_GET('app', \_native::varn('APP_KEY_DEFAULT'));


/*
	Message à retourner
*/
$Message = $this->_GET('message', false);


/*
	Basculer vers
*/
$Toggle = $this->_GET('toggle', false);







/* 
	Application a partir de la clé de l'application
*/
$App = new \GAPPS($AppKey);




/* 
	Existence de l'application 
*/
$_AppExists = isset($App->Infos) && is_object($App->Infos);





/* 
	Si un message n'est pas detecté 
	Redirection du client vers l'application si aucun message n'est détecté.
*/
if(!is_string($Message)){


	/* Redirection vers l'interface utilisateur */
	if(is_array($User) && $AppKey===false){
		

		/* Application indexé */
		if($_AppExists==TRUE){
		
			header('location:'. \_native::setvar($App->Infos->URL) . '');exit;
		
		}
		

		/* Application par defaut */
		else{
		
			$App = new \GAPPS(\_native::varn('APP_KEY_DEFAULT'));
		
			$_AppExists = isset($App->Infos) && is_object($App->Infos);
		

		
			if($_AppExists==TRUE){
		
				header('location:'. \_native::setvar($App->Infos->URL) . '');exit;
		
			}
		
			else{
		
				\_native::wCnsl('<h1>Erreur Application d\'Emulation</h1>L\'application par defaut est introuvable');
		
			}

		}
		
	}




	/* Session de l'application */
	if(is_string($AppKey)){

		// $__SESSIONLOCATION=strtolower(\_native::varn('USERS_SESSION_LOCATION'));
		
		$AppUser = \GSystem::requires('users.login.app/secures',$AppKey);

	}



}






/* ARC-Class 'GLogin' */
$Login = new \GLogin(
	
	(isset($_GET['next']))?$_GET['next']:false
	
	,(isset($_GET['previous']))?$_GET['previous']:false
	
	,($_AppExists==true) ? $AppKey : \_native::varn('APP_KEY_DEFAULT')
	
	,\_native::varn('ACTIVESESSION_MODE')

	,$User
	
	);


$Login->noApp = $NoApp;







/* 
	Label champ input : fonction du mode 
*/
$Login->labels();









/* Si un message est detecté */
if(is_string($Message)){
	
	$msg = strtolower(trim($Message));
	
	$msgex = explode(':', $msg);
	
	$msgtyp = (isset($msgex[0]))?$msgex[0]:false;
	
	$msgcod = (isset($msgex[1]))?$msgex[1]:false;
	


	$Login->MessageType = $msgtyp;
	
	$Login->MessageCode = $msgcod;



	$Login->MessageTitle = 'Erreur';

	$Login->Message = 'Erreur d\'origine inconnu observée lors de l\'ouverture de la page ';


	/* type d'erreur */
	if($msgtyp=='error' || $msgtyp=='warning' || $msgtyp=='failed'){

		if($msgcod=='right.require'){
		
			$Login->Message = 'Vous n\'avez pas les droits requires pour utiliser cette application';
		
		}
		
		if($msgcod=='session.failed'){
		
			$Login->Message = 'Vous devez êtres connecté pour acceder à cette application';
		
		}
		
		if($msgcod=='session.app.failed'){
		
			$Login->Message = 'La session de l\'application a expirée';
		
		}
		
		if($msgcod=='right.require' || $msgcod=='right.enough'){
		
			$Login->Message = 'Vous n\'avez pas le niveau d\'accès pour utiliser cette applicaion ';
		
		}

	}

	if($msgtyp=='warning'){
	
		$Login->MessageType = 'warning';

		$Login->MessageTitle = 'Attention';
	
	}
	
	if($msgtyp=='failed'){

		$Login->MessageTitle = 'Échec';
	
	}
	

}





/* Mode du message : Vérification si oui ou non un message a été détecté */
$Login->MessageMode = ($Message===false)?false:true;


/* Destruction de la session si le mo du message est 'TRUE' */
if($Login->MessageMode===TRUE){$Login->destroySession();}




if(is_string($Message)){
	
	/* Injection de l'application dans l'ARC-Class 'GLogin' */	
	$Login->APP = $App;


	/* Si une application a été détecté */
	if(is_object($App->Infos)){
	
		$Login->appTitle = $App->Infos->Name;

		$Login->appURL = $App->Infos->URL;

	}


	/* injection des variables dans le theme  */
	// $Login->_theme->NoApp=$Login->noApp;

	// $Login->_theme->App=$App;

	// $Login->_theme->AppUser=$AppUser;

	// $Login->_theme->_USER_APP_SESSION=(isset($_USER_APP_SESSION)) ? $_USER_APP_SESSION: false;


}





/* Détection du toggle d'usage */
$Login->Toggle = false;

if($Toggle!==false){

	if($Toggle=='reset:password'||$Toggle=='reset:password:factory'){
	
		$Login->Toggle = $Toggle;
	
	}

	if($Toggle=='user:interface'){
	
		$Login->Toggle = false;
	
	}

}



if(isset($App->Infos) && is_object($App->Infos)){

	$Login->appTitle = $App->Infos->Name;
	$Login->appURL = $App->Infos->URL;

}




if(\_native::varn('LOGIN_USE_REDIR') === true || !isset($App->Infos)){

	$Login->appTitle = \_native::varn('LOGIN_REDIR_NAME');
	$Login->appURL = \_native::setvar(\_native::varn('LOGIN_REDIR_URL'));

}















/* 
	Initialisation du Theme 
*/
$tpl = new Theme\Preset(\_native::varn('LOGIN_THEME'));




/* 
	Titre de la page
 */
$tpl->name = 'Gougnon Connect LogIn';

$tpl->version = '0.1';

$tpl->update = date('ymd.hi');
// $tpl->update = '150923.2200';

$tpl->host = __FILE__;

$tpl->style = \_native::varn('LOGIN_STYLE');








/*
	Switch : Gestionnaire du contenu - DEBUT
*/


$PageContent = '';

$PageJSFile = false;

$PageJSCode = false;

$redirRequest = implode('&', $Login->getBrowserRequest());




switch (strtolower($Login->Toggle)) {



	/* Bascule : Demande de changement de mot de passe */
	case 'reset:password:factory':

		$PageTitle = 'Reinitialisation du mot de passe';

			$ref = $this->_GET('reference', false);
			$app = $this->_GET('app', false);
			$tmp = $this->_GET('tmp', false);
			$email = $this->_GET('email', false);


		/* 
			Verification des paramètres invalides
		*/
		if(
			$ref===false || \Gougnon::isEmpty($ref)
			||$app===false || \Gougnon::isEmpty($app)
			||$tmp===false || \Gougnon::isEmpty($tmp)
			||$email===false || \Gougnon::isEmpty($email)
		){

			$PageContent = [

				'Echec reinitialisation du mot de passe'

				, [
				
					new Theme\Content('Paramètres incomplets')
				
					, ('<br><br>')

					, new Theme\Content('<button class="active" onclick="location.href = (\''.HTTP_HOST.'login?new\');">Se connecter</button>')

					, new Theme\Content('<button onclick="location.href = (\''.HTTP_HOST.'login?toggle=reset:password\');">Nouvelle demande</button>')

				]

			];

		}

		/* 
			Verification des paramètres valides
		*/
		else{



			/*
				GGN Connect : Reinitialisation du mot de passe de l'utilisateur
			*/
			$connect = \GGN\Connect\Login\ResetPasswordFactory::Main([

				/* email de l'utilisateur */
				'email'=> $email

				/* Valeur de la requete */
				, 'codex'=>$tmp

			]);




			/* Validation de requete */
			$available = $connect->availableRequest();




			/* Verification de la validation de la requete */

			if($available!==true){

				if(isset($connect->_response) && is_array($connect->_response) && isset($connect->_response['because'])){

					$html = '';

					foreach ($connect->_response['because'] as $ck => $code) {

						switch(strtolower($code)){

							case 'attempt.email.undefined':
								$html .= 'Votre adresse IP ne correspond pas à celle de la requete.';
							break;
							
							case 'attempt.codex.undefined':
								$html .= 'Requete introuvable.';
							break;
							
							case 'attempt.email.not.found':
								$html .= 'Email introuvable.';
							break;

							case 'attempt.data.missing':
								$html .= 'Paramètre manquant dans la session.';
							break;

							case 'attempt.data.format.failed':
								$html .= 'Le format des données dans la session n\'est pas valide.';
							break;

							case 'attempt.access.failed':
								$html .= 'La clé d\'accès proposé n\'est pas valide.';
							break;

							case 'attempt.request.not.found':
								$html .= 'Requete introuvable, verifiez vous etes l\'auteur de la demande de reinitialisation de mot de passe.';
							break;

							case 'attempt.email.failed':
								$html .= 'Email invalide.';
							break;

							case 'attempt.codex.failed':
								$html .= 'Clé invalide.';
							break;

							case 'attempt.ip.failed':
								$html .= 'Vous n\etes pas l\'auteur de cette demande de reinitialisation de mon passe.';
							break;

						}

					}


				}

				else{
					$html .= '<div class="field text"><a href="?canal=reset:password&'.$redirRequest.'" >Erreur subvenue lors du traitement des données</a></div>';
				}


				$PageContent = [

					'Echec lors de la reinitialisation du mot de passe'

					, [
					
						new Theme\Content($html)
					
						, ('<br><br>')

						, new Theme\Content('<button class="active" onclick="location.href = (\''.HTTP_HOST.'login?new\');">Se connecter</button>')

						, new Theme\Content('<button onclick="location.href = (\''.HTTP_HOST.'login?toggle=reset:password\');">Nouvelle demande</button>')

					]

				];


			}


			else{


				$PageContent = [

					'Reinitialisation du mot de passe'

					, [
						new Theme\Brick('Form.Box', [
						
							'arguments' => [
								
								[
									'action'=>'#'
									
									,'method'=>'POST'
									
									,'onsubmit'=>"return (function(f){return false;})(this);"

									,'id'=>'ggn-connect-reset-password-factory-form'

									,'name'=>'ggnConnectResetPasswordFactoryForm'
								]
								
								, false
								
								, [

									/* Infos */
									['label'=>'Veuillez indiquer votre adresse e-mail pour recevoir votre nouveau mot de passe']
									

									/* Mot de passe */
									,['input'=>['type'=>'password', 'name'=>'reset_password', 'class'=>'password', 'placeholder'=>'Mot de passe' ]]


									/* Confirmer Mot de passe */
									,['input'=>['type'=>'password', 'name'=>'reset_password_confirm', 'class'=>'password', 'placeholder'=>'Confirmer Mot de passe' ]]


									/* Bouton de traitement */
									,['input'=>['id'=>'login-reset-password-submit-box', 'type'=>'submit', 'class'=>'active', 'value'=>'Reinitialiser']]

									/* Chargement */
									,['label'=>'<div style="display:none;" id="login-reset-password-wait-box"><div class="gui loading circle x16 text-color-hover"></div></div>']

									/* Mot de passe oublié */
									,['label'=>'<a href="?toggle=user:interface&'.$redirRequest.'">Retournez à la page de connexion</a>']
									

									/* Clé Application */
									,['free.content'=>
										'<input type="hidden" name="email" value="'.$email.'" />'
										. '<input type="hidden" name="ref" value="'.$ref.'" />'
										. '<input type="hidden" name="tmp" value="'.$tmp.'" />'
										. '<input type="hidden" name="app" value="'.$AppKey.'"/>'
									]

									
								]
							]

						])
					]


				];


			

				$PageJSFile = $tpl->_url . 'connect.reset.password.factory.js';


				$PageJSCode = 

					$Login->resetPasswordFactoryJSInit()

					. 'GLoginResetPasswordFactorySuite(window["LoginResetPasswordFactory"]||false);'

				;

			}



		}

	break;
	







	/* Bascule : Demande de changement de mot de passe */
	case 'reset:password':

		$PageTitle = 'Changement de mot de passe';

		$PageContent = [

			'Demande de changement de mot de passe'

			, [
				new Theme\Brick('Form.Box', [
				
					'arguments' => [
						
						[
							'action'=>'#'
							
							,'method'=>'POST'
							
							,'onsubmit'=>"return (function(f){return false;})(this);"

							,'id'=>'ggn-connect-reset-password-form'

							,'name'=>'ggnConnectResetPasswordForm'
						]
						
						, false
						
						, [

							/* Infos */
							['label'=>'Veuillez indiquer votre adresse e-mail pour recevoir votre nouveau mot de passe']
							

							/* Email */
							,['input'=>['type'=>'text', 'name'=>'email', 'class'=>'email', 'placeholder'=>'email@exemple.com', 'autocomplete'=>'off' ]]


							/* Bouton de traitement */
							,['input'=>['id'=>'login-reset-password-submit-box', 'type'=>'submit', 'class'=>'active', 'value'=>'Envoyer la demande']]

							/* Chargement */
							,['label'=>'<div style="display:none;" id="login-reset-password-wait-box"><div class="gui loading circle x16 text-color-hover"></div></div>']

							/* Mot de passe oublié */
							,['label'=>'<a href="?toggle=user:interface&'.$redirRequest.'">Retournez à la page de connexion</a>']
							

							/* Clé Application */
							// ,['input'=>['type'=>'hidden', 'name'=>'app', 'value'=>$AppKey ]]

							
						]
					]

				])
			]


		];



		$PageJSFile = $tpl->_url . 'connect.reset.password.js';


		$PageJSCode = 

			$Login->resetPasswordJSInit()

			. 'GLoginResetPasswordSuite(window["LoginResetPassword"]||false);'

		;


	break;
	




	/* Aucune Bascule definie */
	default:
		
		/* Mode de message */
		if($Login->MessageMode==true){

			$PageTitle = $Login->MessageTitle . ' - Connexion';

			$PageContent = [
				
				$Login->MessageTitle
				
				,[
				
					new Theme\Content($Login->Message)

					, ('<br><br>')

					, new Theme\Content('<button onclick="location.href = (\''.HTTP_HOST.'login?new\');">Se connecter</button>')
				
				]

			];


		}

		else{

			$PageTitle = \_native::varn('LOGIN_TITLE');

			$PageContent = [

				'Se connecter'

				, [
					new Theme\Brick('Form.Box', [
					
						'arguments' => [
							
							[
								'action'=>'#'
								
								,'method'=>'POST'
								
								,'onsubmit'=>"return (function(f){return false;})(this);"

								,'id'=>'ggn-connect-login-form'

								,'name'=>'ggnConnectLoginForm'
							]
							
							, false
							
							, [

								/* Nom d'utilisateur */
								(is_array($User))

								? ['label'=>'<span class="lowc">//</span> <span class="grand">' . ucfirst($User['USERNAME']) . '</span>'
									, 'input'=>['type'=>'hidden', 'name'=>'username', 'value'=> $User['USERNAME']]
								]

								: ['input'=>['type'=>'text', 'name'=>'username', 'class'=>'username', 'placeholder'=> $Login->label->iUsername]]
								

								/* Mot de passe */
								,['input'=>['type'=>'password', 'name'=>'password', 'class'=>'password', 'placeholder'=>'Mot de passe']]


								/* Se souvenir */
								,['input'=>['type'=>'checkbox', 'name'=>'remember', 'class'=>'remember', 'label'=>'Se souvenir de moi']]


								/* Bouton de traitement */
								,[
									'input'=>['id'=>'login-submit-box', 'type'=>'submit', 'class'=>'active', 'value'=>'Se connecter']
									
									,'free.content'=>'<input id="login-go-home" type="button" value="Accueil" onclick="location.href=\''.HTTP_HOST.'home\'">&nbsp;<input id="login-subscribe" type="button" value="S\'inscrire" onclick="location.href=\''.HTTP_HOST.'subscribe\'">&nbsp;<div style="display:none;" id="login-wait-box"><div class="gui  loading circle x16 text-color-hover margin-t-x32 padding-lr-x4"></div></div>&nbsp;'
								]

								/* Bouton de traitement */
								// ,[
								// ]

								/* Chargement */
								,['label'=>'']

								/* Se connecter avec un autre compte */
								,['label'=>(is_array($User))? '<a href="'.HTTP_HOST.'logout">Se connecter avec un autre compte</a>': false]



								/* Mot de passe oublié */
								,['label'=>'<a href="?toggle=reset:password&'.$redirRequest.'">Mot de passe oublié ?</a>']



								/* contenu libre */
								,['free.content'=>$Login->formData()]

								
							]
						]

					])
				]

			];



			$PageJSFile = $tpl->_url . 'connect.login.js';


			$PageJSCode = 

				$Login->JSInit()

				. 'GLoginSuite(window["Login"]||false);'

			;

		}

	break;
}





/*
	Switch : Gestionnaire du contenu - FIN
*/









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


		// var_dump($tpl->manifest->scripts->login->list);exit;

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
		$tpl->head->title($PageTitle)

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
				
				'ggn.connect.login'
				
				,'ggn.awake.confirm'
			
			])


			/* Packges du manifest */
			->cssPackages($tpl->manifest->package->css->list)


			/* Packges du manifest du thème */
			->cssPackages(isset($tpl->manifest->package->css->login->list) && is_object($tpl->manifest->package->css->login->list) ? $tpl->manifest->package->css->login->list: false)


			/* Style Générale du theme */
			->link($tpl->manifest->links->list)


			/* Style du login du theme */
			->link(isset($tpl->manifest->links->login->list) && is_object($tpl->manifest->links->login->list) ? $tpl->manifest->links->login->list: '')



			/* Style du theme */
			->css($tpl->manifest->css->list)



			/* Code du Style du login du theme */
			->css(isset($tpl->manifest->css->login->list) && is_object($tpl->manifest->css->login->list) ? $tpl->manifest->css->login->list: '')


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



			/* Code du Style du login du theme */
			->style(isset($tpl->manifest->style->login->list) && is_object($tpl->manifest->style->login->list) ? $tpl->manifest->style->login->list: '')






			/* 
				Framework JS
			*/
			->jsPackages([
				
				'ggn.connect.login'
				
				,'ggn.awake.confirm'

			])


			/* Packges du manifest */
			->jsPackages($tpl->manifest->package->js->list)


			/* Packges du manifest du thème */
			->jsPackages(isset($tpl->manifest->package->js->login->list) && is_object($tpl->manifest->package->js->login->list) ? $tpl->manifest->package->js->login->list: '')
			

			/* 
				Fichier JS
			*/
			->script($PageJSFile)


			/* 
				Script Générale du theme 
			*/
			->script($tpl->manifest->scripts->list)


			/* 
				Script du login du theme
			*/
			->script(isset($tpl->manifest->scripts->login->list) && is_object($tpl->manifest->scripts->login->list) ? $tpl->manifest->scripts->login->list: '')


			/* 
				Code JS
			*/
			->js($PageJSCode)



			/* 
				Code JS Général du login du theme
			*/
			->js($tpl->manifest->js->list)



			/* 
				Code JS du login du theme
			*/
			->js(isset($tpl->manifest->js->login->list) && is_object($tpl->manifest->js->login->list) ? $tpl->manifest->js->login->list: '')





		/* Fermeture de la sequence 'Head' */
		;





		/*
			Feuille
		*/

		$tpl->body = new Theme\Body();

		$tpl->body->sheet = new Theme\Tag(['id'=>'ggn-sheet', 'class'=>'gui sheet' ]);


			/* Calque */
			$tpl->body->sheet->tag->layer = new Theme\Tag(['class'=>'gui connect login' ]);


				/* Formulaire */
				$tpl->body->sheet->tag->layer->tag->box = new Theme\Brick('Box.Normal',[

					'attributes'=>['size'=>['320px','auto']]

					,'arguments'=> $PageContent


					,'error'=> function($code = false){
						
						return 'Impossible de charger cette brique';
					
					}

				]);






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







?>