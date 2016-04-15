<?php
	
	$return = false;


	if(isset($args)){

		/* Variables */
		$value = (isset($args[0]))?$args[0]:false;
		$name = (isset($args[1]))?$args[1]:false;
		$path = (isset($args[2]))?$args[2]:'';
		

		/* Si name est du type STRING */
		if(is_string($name) && $value!==false){

			/* Fichier */
			$file = self::getDataFilePath($name, $path);

			if(is_file($file)){
				$reader = self::load($name, $path, true);
				$data = (isset($reader['data']))?$reader['data']:false;
				$option = (isset($reader['option']))?$reader['option']:false;
				$gc = $option['column'];
				$output = '';


				if(is_array($data) && is_array($option)){

					$n0 = $gc[0];
					$r0 = (isset($data[$n0]))?$data[$n0]:$data;
					$row = count($r0);

					$option['row'] = $row+1;

					/* Ouverture */
					$output .= self::unitHeader();
						$output .= '$' . self::DVAR . '=[];';
						$output .= '$' . self::DVAR . '["data"]=[];';
						$output .= '$' . self::DVAR . '["option"]=\''.self::inputEncoder($option).'\';';


						/* Ajout en debut de ligne */




						/* Ajout du reste des lignes */


							/* Table avec structure */
							if($gc!=false&&is_array($value)){
								$len = count($data);

								/* Creation des Champs */
								foreach ($gc as $k0 => $v) {
									$output .= '$' . self::DVAR . '["data"]["'.$v.'"]=[];';
								}


								/* Remplissage des champs */
								if($len>0){
									$c = $row;
									for($x=0; $x<$c; $x++){
										$line = [];
										foreach ($data as $k => $v){
											$line[] = $v[$x]; 
										}

										$output .= self::inputLine($line, $gc);
									}


								}
									

								// exit;
							}
							/* Table avec structure - fin */


							/* Table sans structure */
							if($gc==false){

								// /* Ajout de chaine de caractères */
								// if(is_string($data)){
								// 	$output .= self::inputLine($data);
								// }

								/* Ajout de donnée a partir d'un array */
								if(is_array($data)){
									foreach ($data as $key => $v) {
										$output .= self::inputLine($v);
									}
								}

							}
							/* Table sans structure - fin */


					/* Ajout en fin de ligne */
					$output .= self::inputLine($value, $gc);
					
					/* Fermeture */
					$output .= self::unitFooter();





					/* Avant Generation */
					$error = false;


					if($gc!=false && !is_array($value)){
						$error = true;
					}

					if($gc!=false && is_array($value)){
						$lln = count($gc);
						$vln = count($value);

						if($lln!=$vln){
							$error = true;
						}
					}

					/* Impossible de continuer la reecriture du fichier */
					if($error===true){
						$return = null;
					}

					/* Reecriture du fichier */
					if($error===false){
						$return = Gougnon::createFile($file, $output);
					}





				}

			}



		}


	}



?>