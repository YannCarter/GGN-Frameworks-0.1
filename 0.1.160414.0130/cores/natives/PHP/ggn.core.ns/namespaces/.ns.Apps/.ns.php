<?php

	/**
	 * GGN Apps Invoke
	 *
	 * @version 0.1 
	 * @update 150814.1321
	 * @Require Gougnon Framework
	*/



/*
	Nom de l'espace
*/
namespace GGN\Apps;
	

	

	/* Environnement des dossiers */
	new \GGN\Using('Dir');
	

	/* Environnement des fichiers */
	new \GGN\Using('File');




	/* Using */
	if(!class_exists('\GGN\Apps\Using')){
		Class Using{
			public function __construct($ns){ $this->object = clone new \GGN\Using($ns); }
		} 
	}








	if(!class_exists('\GGN\Apps\Invoke')){

		/*
			Invoke
		*/
		Class Invoke{



		} // Class Invoke


	} // if class_exists 'Invoke'









	if(!class_exists('\GGN\Apps\Behavior')){

		/*
			Behavior
		*/
		Class Behavior extends Invoke{


			Const SecExt = '.behavior';

			Const CMD_DATA_INIT = '{"Status":true,"Users":[]}';





			/* Déclaration */
			public function __construct($key = false){

				$App = new \GAPPS($key);

				if(is_object($App->Infos)){

					$this->App = $App;
					
				}

			}


			/* Dossier */
			static public function Path($key = ''){

				return __CORES_SYSTEM_COM_BEHAVIORS__ . (is_string($key) && !\Gougnon::isEmpty($key) ? $key . '/': '');

			}



			/* Ajouter une Section */
			public function _Section($section = false, $behavior = false){

				if(is_object($this->App->Infos) && is_string($section)){

					$k = $this->App->Infos->Key;

					$d = self::Path($k) . $section . '/';

					if(!is_dir($d)){

						$create = new \GGN\Dir\Create($d);

					}

					return $d;

				}

			}





			/* Gestion des Branches */
			public function BrancheFile($section = false, $branche = false){

				if(is_object($this->App->Infos) && is_string($section)){

					$k = $this->App->Infos->Key;

					return self::Path($k) . $section . '/' . $branche . self::SecExt;

				}

				else{

					return false;

				}

			}




			/* Obtenir une branche */
			public function GetBranche($section, $branche, $dataInit){

				$bran = $this->BrancheFile($section, $branche);

				$Vef = !is_file($bran);

				$d=[];

				$create = true;

				/* Creation du fichier s'il n'existe pas */
				if($Vef){

					$create = $this->createBranche($section, $branche, $dataInit);

				}

				/* Si le fichier existe */
				if($create==true){

					$d = $this->LoadBranche($section, $bran);

				}


				return $d;

			}



			public function UpdateBranche($user, $section, $branche, $value, $dataInit){

				$cmds = $this->GetBranche($section, $branche, $dataInit);

				$r = false;


				/* Pour un seul utilisateur */
				if(is_string($user) && is_array($cmds) && isset($cmds['Users']) && is_array($cmds['Users'])){	

					$r = true;

					$cmds['Status'] = null;

					$cmds['Users'][$user] = $value;

				}


				/* Pour un ensemble d'utilisateurs */
				if(is_array($user)){
					
					if(is_array($cmds) && isset($cmds['Users']) && is_array($cmds['Users'])){

						$r = true;

						$cmds['Status'] = null;

						foreach ($user as $uv) {

							$cmds['Users'][$uv] = $value;
							
						}

					}

				}


				/* Pour tous les utilisateurs */
				if(is_bool($user) && $user===false && is_array($cmds) ){	

					$r = true;

					$cmds['Status'] = $value;

					$cmds['Users'] = [];

				}




				/* Creation de la branche */
				$create = $this->createBranche($section, $branche, json_encode($cmds, \GStorages::JSON_OPT()));



				return $cmds;

			}




			/* Charger une branche */
			public function LoadBranche($section = false, $branche = false){

				$f = $this->BrancheFile($section, $branche);

				if(is_string($branche) && is_file($branche)){

					$c = file_get_contents($branche);

					try{

						return json_decode($c, \GStorages::JSON_OPT());
					}
					catch(Exception $e){

						return false;

					}


				}

				else{

					return false;
					
				}


			}


			public function createBranche($section = false, $branche = false, $content = ''){

				$file = $this->BrancheFile($section, $branche);

				return new \GGN\File\Create($file, $content);

			}





			/* Gestion des commandes */
			public function GetCommand($branche){

				return $this->GetBranche('commands', $branche, self::CMD_DATA_INIT);

			}





			public function SetCommand($user, $branche, $value){

				return $this->UpdateBranche($user, 'commands', $branche, $value, self::CMD_DATA_INIT);

			}






		} // Class Behavior


	} // if class_exists 'Behavior'









	if(!class_exists('\GGN\Apps\Controller')){

		/*
			Controller
		*/
		Class Controller extends Invoke{


			var $App;

			/* Déclaration */
			public function __construct($key = false){

				$App = new \GAPPS($key);

				if(isset($App->Infos) && is_object($App->Infos)){

					$this->App = $App;

					$this->Key = $App->Infos->Key;
					
				}

			}


			/* Mettre l'application en Pause */
			public function isApp(){

				return isset($this->App->Infos) && is_object($this->App->Infos);

			}


			/* Mettre l'application en Pause */
			public function Pause($user = false){

				$r=false;

				if($this->isApp()){

					$be = new Behavior($this->Key);

					$r = $be->SetCommand($user, 'Play', false);

				}

				return $r;

			}



			/* Mettre l'application en Play */
			public function Play($user = false){

				$r=false;

				if($this->isApp()){

					$be = new Behavior($this->Key);

					$r = $be->SetCommand($user, 'Play', true);

				}

				return $r;

			}



			/* Mettre l'application en Play */
			public function GetPlay(){

				$r=false;

				if($this->isApp()){

					$be = new Behavior($this->Key);

					$r = $be->GetCommand('Play');

				}

				return $r;

			}




		} // Class Controller


	} // if class_exists 'Controller'









	if(!class_exists('\GGN\Apps\Size')){

		/*
			Size
		*/
		Class Size extends Invoke{

			var $Path = [];
			
			var $Value = 0;
			
			var $Res = 0;

			var $ResPaths = [

				'images' => __IMAGES__
				
				,'fonts' => __FONTS__
				
				,'sound' => __SOUNDS_FILE__
				
				,'js' => __JAVASCRIPTS__
				
				,'svg' => __SVG__
				
				,'captcha' => __CAPTCHA__
				
				,'lang' => __LANGS__
				
				,'theme' => __THEMES__
				
				,'css' => __CSS__
				
				,'swf' => __SHOCKWAVES_X__
				
				,'videos' => __VIDEOS__

			];

			public function __construct($app = false){

				if(is_object($app) && isset($app->Infos)){
					$nfo = $app->Infos;

					$this->ResPaths['html.plugin'] = (__PLUGINS__ . 'HTML/');
					$this->ResPaths['php.plugin'] = (__PLUGINS__ . 'PHP/');


					/* Cacul des ressources */
					$res = 0;
					$resPath = substr($nfo->ResURL, strlen(HTTP_HOST));;
						foreach ($this->ResPaths as $key => $path) {
							$p = $path . $resPath;
							if(is_dir($p)){
								$val = (new \GGN\Dir\Size($p, true))->Value;
								$this->Path[$key] = $val;
								$res += $val;
							}
						}
					$this->Res = $res;

					/* Calcul de l'espace utilisé pour l'application */
					$appPath = \Gougnon::getPathFromProtocol($nfo->Path);
					$Op = (new \GGN\Dir\Size($appPath, true))->Value;
					$this->Path['app'] = $Op;


					/* Calcul de l'espace utilisé pour l'application par le Fournisseur */
					$vPath=\GAPPS::IN_COM_DIR($app->Key);
					$vOp = (new \GGN\Dir\Size($vPath, true))->Value;
					$this->Path['vendor'] = $vOp;


					/* Journal des activités */
					$clf = $app->COMLogFile();
					if(is_file($clf)){
						$fzclf = filesize($clf);
						$this->Path['com.log'] = $fzclf;
						$this->Value += $fzclf;
					}


					$this->Value += $res;
					$this->Value += $Op;
					$this->Value += $vOp;

				}

			}

		} // Class Size


	} // if class_exists 'Size'










				






