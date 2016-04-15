<?php

	/**
	 * GGN DPO Invoke
	 *
	 * @version 0.1 
	 * @update 150814.1321
	 * @Require Gougnon Framework
	*/



/*
	Nom de l'espace
*/
namespace GGN\DPO;
	
	


	const ERROR_INSTANCE_ = 'dpo;inst;error;';






	/* Using */
	if(!class_exists('\GGN\DPO\Using')){
		Class Using{
			public function __construct($ns){ $this->object = clone new \GGN\Using($ns); }
		} 
	}



	/*
	
		Si "XML_HTTP_REQUEST" est utlisé pour acceder à la page

		NB : Ajax doit envoyer l'entête " X-Requested-Width "
		
	*/

	function UsesAjax () {return (isset($_SERVER['HTTP_X_REQUESTED_WIDTH'])) ? $_SERVER['HTTP_X_REQUESTED_WIDTH'] : FALSE;}





	if(!class_exists('\GGN\DPO\Invoke')){

		// const NS = "GGN\DPO";

		/*
			Invoke
		*/
		Class Invoke{



		} // Class Invoke


	} // if class_exists 'Invoke'









	if(!class_exists('\GGN\DPO\Cache')){
			
		Class Cache extends Invoke{
				
			const NAME = 'Gougnon DPO : Cache';
			
			const VERSION = '0.1';
			
			const UPDATE = '150920.2244';




			const EXT = '.ggn-cache';



			public $exists = false;



			/* Déclaration */
			public function __construct($tpl = false){


				/* Donnée */
				if(is_array($tpl) || is_object($tpl)){

					$this->asset = new \_nativeCustomObject();


					if(isset($tpl->useCache)){

						$tpl->useCache = true;

					}


					foreach ($tpl as $key => $value) {

						$this->asset->{$key} = $value;

					}


					/* URL actuelle */
					$this->asset->URI = \Gougnon::currentURL();


					/* initialisation */
					$this->init();

				}

				/* Erreur de variable */
				else{
					\_native::wCnsl('<h1>DPO Cache</h1> Object invalide');
				}
				

			}




			/* Chargement du cache */
			public function init(){

				$asset = $this->asset;

				$this->name = '~' 
					. \_nativeCrypt::_sha256($asset->URI,1) 
					. ';version=' . (isset($asset->version)? $asset->version: '') 
					. ';update=' . (isset($asset->update)? $asset->update: '') 
					. ';clip' 
					. self::EXT
				;


				$this->source = \Gougnon::getPathFromProtocol('cache-active://.dpo.page/' . $this->name);


				if(!is_dir(dirname($this->source))){

					\Gougnon::createFolders(dirname($this->source));

				}


				if(is_file($this->source)){

					$this->exists = true;

				}

			}





			/* Nommenclature */
			public function transcache($data){

				$asset = $this->asset;

				$d = new \_nativeCustomObject();

				/* Assignation */
				$d->URI = (isset($asset->URI)) ? $asset->URI: '';

				$d->version = (isset($asset->version)) ? $asset->version: '';

				$d->update = (isset($asset->update)) ? $asset->update: '';

				$d->host = (isset($asset->host)) ? $asset->host: '';

				$d->html = $data;

				$this->transcache = $d;

				$this->transcache->data = json_encode($d, \GStorages::JSON_OPT());

			}






			/* Chargement du cache */
			public function load(){

				if(is_file($this->source)){

					$transcache = json_decode(file_get_contents($this->source), \GStorages::JSON_OPT());


					/* Affichage du cache */
					if(isset($transcache['html'])){

						eval(' ?>' . $transcache['html'] . '<?php ');

					}

					/* Sinon */
					else{
						\_native::wCnsl('<h1>DPO Cache</h1> Erreur : Impossible de charger le cache en raison du manque du code html ');
					}


				}

				else{

					return false;

				}

			}





			/* Création du cache */
			public function create($data){


				if(is_string($data)){

					$this->transcache($data);

					if(\Gougnon::createFile($this->source, $this->transcache->data)){

						return true;

					}

					else{

						// return false;
						\_native::wCnsl('<h1>DPO Cache</h1> Impossible de créer le cache');

					}

				}

				else{

					\_native::wCnsl('<h1>DPO Cache</h1> Donnée invalide');

				}

			}




		} // Class 'Cache'


	} // If class exists 'Cache'









	if(!class_exists('\GGN\DPO\Error')){

		// const NS = "GGN\DPO";

		/*
			Error
		*/
		Class Error extends Invoke{
				
			const NAME = 'Gougnon DPO Error';
			
			const VERSION = '0.1';
			
			const UPDATE = '150920.2126';


			/* 
				Déclaration 
			*/
			public function __construct($data = false){

				$this->_Tx = [ERROR_INSTANCE_, false, func_get_args()];

				$this->code = $data;

			}


			/*
				Analyseur du code de l'erreur
			*/
			public function analyzer($code = false){

				switch (strtolower($code)) {

					case 'theme:brick.not.found':
						
					break;
					
					default: break;
				}

			}




		} // Class Error


	} // if class_exists 'Error'






				








?>