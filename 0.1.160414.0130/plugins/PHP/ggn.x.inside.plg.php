<?php 
	
namespace GGN\Plugin\PHP\xInside;



	if(!class_exists('GGN\Plugin\PHP\xInside\Invoke')){

		Class Invoke{


			/* Insformation relative a la classe */
			Const NAME = 'GGN PHP x.Inside Data'; 		
			
			Const VERSION = '0.1'; 		
			
			Const UPDATE = '151113.1050'; 



			/* Constructeur de la classe */
			public function __construct($args = []){

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

				return dirname(__FILE__) . '/';

			}


		} // class Invoke

	} // if : Invoke





	if(!class_exists('GGN\Plugin\PHP\xInside\Data')){

		Class Data{


			Const Prefix = 'ggn_x_inside_';



			var $tbl = [
				'Departement'=>'departement'
			];





			/* Chargement d'une brique */
			public function __construct($args = []){

				$this->args = func_get_args();
				
			}





			/* Mise en place d'une table */
			public function table($name = false){

				/* Verification de la table indiquée */
				if(is_string($name) && isset($this->tbl[$name]) &&  is_string($this->tbl[$name])){

					return self::Prefix . $this->tbl[$name];

				}

				/* Si la table indiquée n'existe pas */
				else{

					return false;
				
				}
				
			}



			/* Chargement d'une brique */
			public function Departments($query = ''){

				global $database;

				$q = $database->SelectFromTable($this->table('Departement'), $query);


				/* Verification de la requette SQL */
				if(is_object($q) && method_exists($q, 'results')){

					$q->results($database::RESULTS_METHOD_LINE_OBJECT);

					return $q;

				}

				/* En cas d'echec */
				else{

					return false;

				}
				
			}





		} // class Data

	} // if : Data
	

 ?>