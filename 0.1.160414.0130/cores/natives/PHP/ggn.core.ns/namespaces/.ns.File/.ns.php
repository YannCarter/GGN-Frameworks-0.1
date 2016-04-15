<?php

	/**
	 * GGN File Invoke
	 *
	 * @version 0.1 
	 * @update 150814.1321
	 * @Require Gougnon Framework
	*/



/*
	Nom de l'espace
*/
namespace GGN\File;
	
	





	/* Using */
	if(!class_exists('\GGN\File\Using')){
		Class Using{
			public function __construct($ns){ $this->object = clone new \GGN\Using($ns); }
		} 
	}








	if(!class_exists('\GGN\File\Invoke')){

		/*
			Invoke
		*/
		Class Invoke{



		} // Class Invoke


	} // if class_exists 'Invoke'









	if(!class_exists('\GGN\File\Create')){

		/*
			Create
		*/
		Class Create extends Invoke{

			public function __construct($file = false, $content = false){

				$dir = dirname($file);

				if(!is_dir($dir)){

					\Gougnon::createFolders($dir);

				}

				$this->return = \Gougnon::createFile($file, $content);

			}

		} // Class Create


	} // if class_exists 'Create'










	if(!class_exists('\GGN\File\Update')){

		/*
			Update
		*/
		Class Update extends Invoke{

			public function __construct($file = false, $content = false){

				if(is_file($file)){

					$c = file_get_contents($file);
					
					$this->return = \Gougnon::createFile($file, $c . $content);

				}
				
				else{

					$this->return = false;

				}

			}

		} // Class Update


	} // if class_exists 'Update'
















				








?>