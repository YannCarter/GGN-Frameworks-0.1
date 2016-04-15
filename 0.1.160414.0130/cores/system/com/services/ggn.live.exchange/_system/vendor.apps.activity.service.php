<?php
/*
	Copyright GOBOU Y. Yannick
	
*/



	/* Class GAPPS */

	if(!class_exists('\GAPPS')){

		\_native::PHPCore('ggn.core.applications');

	}





	/* Environnement */

	new GGN\Using('Dir');

	new GGN\Using('File');
	
	new GGN\Using('Apps');
	







	/* Reponse de la COM */

	$this->Response(true);





	/* Utilisateur connecté */

	$Connect = $this->node('Connect');

	$Connect->Is = isset($this->Register) && isset($this->Register->USER) && is_array($this->Register->USER);






	/* Details */

	$Dir = dirname(__FILE__) . '/';

	$AppsDir = $Dir . 'vendor.apps/';


	$appKey = Register::_POST('appKey', '');

	$appWorker = $AppsDir . $appKey . '/activity.php';

	$hasRun = is_file($appWorker);







	/* Mise à jour de la session */
	$ConnectApp = \GSystem::requires('users.login.app/secures', $appKey);

	$Connect->App = is_array($ConnectApp);

	$Connect->USession = \GSystem::requires('users.login.refresh/sessions');

	$Connect->UASession = \GSystem::requires('users.login.app.refresh/sessions', $appKey);








	/* Appliquer des commandes  DEBUT ============================================== */


		/* Paramètres */

		$_CMD = Register::_POST('command', false);


		/* Verificaiton */

		if(is_string($_CMD)){

			$cmds = $this->node('command');

			$C4U = Register::_POST('C4U', false);

			$cmd = explode(':', $_CMD);

			switch ($cmd[0]) {


				/* Pause l'application pour tous les utlisateurs */

				case 'play':

					$k=(isset($cmd[1])) ? $cmd[1] : false;

					if(is_string($k)){

						$Ctrl = new GGN\Apps\Controller($k);

						$cmds->Play = $Ctrl->Play($C4U);

					}

				break;
				

				/* Pause l'application pour tous les utlisateurs */

				case 'pause':

					$k=(isset($cmd[1])) ? $cmd[1] : false;

					if(is_string($k)){

						$Ctrl = new GGN\Apps\Controller($k);

						$cmds->Play = $Ctrl->Pause($C4U);

					}

				break;
				
				default:
				break;

			}
			
		}


	/* Appliquer des commandes  FIN ============================================== */









	/* Controller d'application : Début */

		$Controller = new GGN\Apps\Controller($appKey);

		$NController = $this->node('Controller');

	/* Controller d'application : Fin */



	/* Verification de l'instance de Jeu  DEBUT ============================================== */

		if(!\Gougnon::isEmpty($appKey) && is_object($Controller)){

			$NController->Play = $Controller->GetPlay();

		}

	/* Verification de l'instance de Jeu  FIN ============================================== */











	/* Traitement personnalisé de l'application  DEBUT ============================================== */

		if(!$hasRun){

			$d = dirname($appWorker);

			if(!is_dir($d)){

				new GGN\Dir\Create($d);

			}
			
		}


		if($hasRun){

			include $appWorker;

		}

	/* Traitement personnalisé de l'application  FIN ============================================== */






// if(isset($this->Register) && is_array($this->Register->USER)){
// }













	
?>