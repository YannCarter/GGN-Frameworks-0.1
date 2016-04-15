<?php 
	
namespace GGN\Plugin\HTML\Model;



	if(!class_exists('GGN\Plugin\HTML\Model\Invoke')){

		Class Invoke{


			/* Insformation relative a la classe */
			Const NAME = 'GGN HTML Model'; 		
			
			Const VERSION = '0.1'; 		
			
			Const UPDATE = '151113.1050'; 



			/* Extension des model */
			Const ModelExt = '.tpl.php';



			/* Constructeur de la classe */
			public function __construct($args){

				$this->args = func_get_args();

				/* Extraction des clés du 1er paramètre de la classe si celui ci est un 'ARRAY' */
				if(isset($this->args[0]) && is_array($this->args[0])){

					foreach ($this->args[0] as $name => $value) {

						$this->{$name} = $value;

					}

				}

			}


			/* Dossier contenant cette classe */
			static public function dir(){

				return dirname(__FILE__) . '/Models/';

			}


		} // class Invoke

	} // if : Invoke





	if(!class_exists('GGN\Plugin\HTML\Model\Brick')){

		Class Brick{


			var $return = false;

			var $html = '';
			var $js = '';



			/* Chargement d'une brique */
			public function __construct($file, $args = []){

				$a = func_get_args();
				
				$f = Invoke::dir() . $file . Invoke::ModelExt;


				/* Recharhe du fichuier sur la serveur */
				if(is_file($f)){

					if(isset($args) && is_array($args)){extract($args);}

					$_this = $this;

					$html = function($s='') use ($_this){$_this->html($s);};

					$js = function($s='') use ($_this){$_this->js($s);};

					include $f;

					$return = true;

				}

				/* Impossible de retrouver le fichier sur le serveur*/
				else{

					$return = false;

				}


				$this->file = $f;

				$this->return = $return;

			}



			/* Contenu Dynamique */
			public function html($string = ''){$this->html .= '' . $string;}
			public function js($string = ''){$this->js .= '' . $string;}





		} // class Brick

	} // if : Brick
	

 ?>