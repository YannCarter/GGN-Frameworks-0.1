<?php

	/**
	 * GGN Caches Invoke
	 *
	 * @version 0.1 
	 * @update 160205.1940
	 * @Require Gougnon Framework
	*/



/*
	Nom de l'espace
*/
namespace GGN\Caches;
	
	





	/* Using */
	// if(!class_exists('\GGN\Caches\Using')){
	// 	Class Using{
	// 		public function __construct($ns){ $this->object = clone new \GGN\Using($ns); }
	// 	} 
	// }








	if(!class_exists('\GGN\Caches\Invoke')){

		/*
			Invoke
		*/
		Class Invoke{


			/*
				Extension du fichiers cache
			*/
			const EXT = '.ggn-cache';



			/*
				Nom du cache
			*/
			var $Name;


			/*
				Chemin du fichier sur le serveur 
					ou 
				Contenu à metre en cache
			*/
			var $Data;


			/*
				Atouts
			*/
			var $Assets;


			/*
				Fichier Cache
			*/
			var $Cache;



			/*
				'HASH' des fichiers
			*/
			var $__HASH = ['File'=>[], 'Hash'=>[]];



			/*
				Si le "hash" a changé
			*/
			var $HashChanged = false;




			// public function __construct($dir = '' ,$path = false, $name = false, $update = false)

			public function __construct(array $settings = []){

				extract($settings);


				$Assets = new \_nativeCustomObject();

				foreach ($settings as $var => $value) {

					$Assets->{ucfirst($var)} = $value;
					
				}

				// $Assets->Type = $type;

				// $Assets->Dir = $dir;

				// $Assets->Name = $name;

				// $Assets->Data = $path;

				// $Assets->Update = $update;

				// $Assets->Hash = $this->GetHash($Assets->Data, $Assets->Type);



				$this->Name = '$' 
					
					. \_nativeCrypt::_sha256($Assets->Name, 1) 
					
					. ';update=' . (is_string($Assets->Update)? $Assets->Update: '')

					. ';browser=' . CLIENT_BROWSER

					. ';ip=' . __IP__
					
					. ';ship' 
					
					. self::EXT

				;


				$this->Assets = $Assets;

			}




			public function GetHash($f = false, $type = '-text'){


				$d = ($type=='-file') ? (is_file($f) ? file_get_contents($f) : '') : $f;

				$h = \_nativeCrypt::_sha256($d, 1);


				return $h;

			}






			public function Create($data = false){

				$f = $this->Cache;

				$data = (is_string($data)) ? $data : $this->Assets->Data;

				$d = dirname($f);


				if(!is_dir($d)){

					\Gougnon::createFolders($d);

				}



				$to = new \_nativeCustomObject();

				$to->Hash = implode(',', $this->__HASH['Hash']);
				
				$to->Files = implode(',', $this->__HASH['File']);
				
				$to->Data = $data;


				if($this->Assets->Type == '-file'){

					$to->Data = file_get_contents($data);

				}


				return \Gougnon::createFile($f, json_encode($to, \GStorages::JSON_OPT()) ); 

			}







			public function Load(){


				$f = $this->Cache;

				$data = false;

				if(is_file($f)){

					$this->Data = json_decode(file_get_contents($f), \GStorages::JSON_OPT());

					$data = isset($this->Data['Data']) ? $this->Data['Data'] : false;

				}


				return $data;

			}






		} // Class Invoke


	} // if class_exists 'Invoke'









	if(!class_exists('\GGN\Caches\Tmp')){

		/*
			Tmp
		*/
		Class Tmp extends Invoke{

			Const Path = 'cache://';


			static public function Data($path = false, $exec = false, $ins = false){

				if(is_string($path)){

					$file = \Gougnon::getPathFromProtocol( self::Path . 'tmp.browser=' . CLIENT_BROWSER . ';ip=' . __IP__ . ';channel=' . \_nativeCrypt::_sha256($path, 1) . self::EXT);


					if(is_callable($exec)){

						$exec($file);

					}


					$is = is_file($file);


					if($is===true){

						$r = file_get_contents($file);

						@unlink($file);

					}

					if($is===false){


						if($ins===true){

							$r = $file;

							\Gougnon::createFile($file);

						}

						else{

							$r = null;

						}

					}

					return $r;

				}


				return false;

			}



		} // Class Tmp


	} // if class_exists 'Tmp'









	if(!class_exists('\GGN\Caches\Passive')){

		/*
			Passive
		*/
		Class Passive extends Invoke{

			Const Path = 'cache-passive://';


			public function addHash($file = false){

				if(is_string($file) ){

					array_push($this->__HASH['File'], $file);

					array_push($this->__HASH['Hash'], $this->GetHash($file, '-file') );
				}

				return $this;

			}




			public function Hash(){


				$this->Cache = \Gougnon::getPathFromProtocol(self::Path . $this->Assets->Dir . '/' . $this->Name);

				$this->Load();

				// $this->HashCache = $this->GetHash($this->Cache, '-file');

				$this->CacheExists = is_file($this->Cache);

				$files = explode(',', $this->Data['Files']);
				
				$hash = explode(',', $this->Data['Hash']);



				if(isset($files) && isset($hash) ){



					$_files = $this->__HASH['File'];

					$_hash = $this->__HASH['Hash'];



					$nfiles = count($files);

					$nhash = count($hash);



					$_nfiles = count($_files);

					$_nhash = count($_hash);




					if(($nfiles==$nhash) && ($_nfiles==$_nhash) && ($nfiles==$_nfiles)){


						foreach ($files as $k => $file) {
							
							if(($file == $_files[$k]) && ($hash[$k] == $_hash[$k]) ){  /* Verification des fichiers : && is_file($file) && is_file($_files[$k]) */

							}

							else{

								$this->HashChanged = true;

								break;

							}

						}

					}

					/* Hash a changé */
					else{

						$this->HashChanged = true;

					}

				}



				else{

					/* Aucun fichier temporaire */
					if($this->CacheExists===false){

						$this->HashChanged = true;

					}

				}


				// if($this->CacheExists === true){

				// 	if($this->Assets->Hash != $this->HashCache){

				// 		$this->HashChanged = true;

				// 	}

				// }


				// if($this->CacheExists == false){

				// 	$this->HashChanged = true;

				// }

				return $this->HashChanged;

			}



		} // Class Passive


	} // if class_exists 'Passive'





				






