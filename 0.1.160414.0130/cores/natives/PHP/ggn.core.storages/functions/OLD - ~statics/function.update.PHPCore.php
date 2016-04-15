<?php
	
	$return = false;


	if(isset($args)){
		$errorDetector = false;

		/* Variables */
		$value = (isset($args[0]))?$args[0]:false;
		$where = (isset($args[1]))?$args[1]:false;
		$name = (isset($args[2]))?$args[2]:false;
		$path = (isset($args[3]))?$args[3]:'';
		

		/* Si name est du type STRING */
		if(is_string($name) && $value!==false && $where!==false){

			/* Fichier */
			$file = self::getDataFilePath($name, $path);

			if(is_file($file)){
				$reader = self::load($name, $path, true);
				$data = (isset($reader['data']))?$reader['data']:false;
				$option = (isset($reader['option']))?$reader['option']:false;
				$gc = $option['column'];
				$output = '';
	
				$n0 = $gc[0];
				$r0 = (isset($data[$n0]))?$data[$n0]:$data;
				$row = count($r0);
	
				$option['row'] = $row;
	
				
	
				/* Ouverture */
				$output .= self::unitHeader();
					$output .= '$' . self::DVAR . '=[];';
					$output .= '$' . self::DVAR . '["data"]=[];';
					$output .= '$' . self::DVAR . '["option"]=\''.self::inputEncoder($option).'\';';
	

					/* Table avec structure */
					if($gc!=false&&is_array($value)&&is_array($where)){
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

								/* Traitement de "WHERE" */
								foreach ($data as $k => $v){
									$vv = $v[$x];

									if(isset($value[$k])){
										$newval = $value[$k];

										/* Verification par champs */
										foreach ($where as $n => $ndn) {

											if(isset($data[$n])){
												$nn = $data[$n][$x];

												if($nn==$ndn){
													$vv = $newval;
												}

											} else{$errorDetector = true; }


										}
									}

									$line[] = $vv;

								}

								$output .= self::inputLine($line, $gc);

							}


						}
							

						// exit;
					}
					/* Table avec structure - fin */


	
					/* Table sans structure */
					if($gc==false && is_numeric($where)){
	
						/* Ajout de donnée a partir d'un array */
						if(is_array($data)){
							foreach ($data as $key => $v) {
								if($key==$where){$vv = $value; }
								else{$vv = $v; }
								$output .= self::inputLine($vv);
							}
						}
	
					}
	
	
	
					
				/* Fermeture */
				$output .= self::unitFooter();
	
	
	
				
	
				if($errorDetector!==false){
					$return = null;
				}

				if($errorDetector===false){
					/* Avant Generation */
					$error = false;


					if($gc!=false && !is_array($value)){
						$error = true;
					}

					if($gc!=false && is_array($value)){
						$lln = count($gc);
						$vln = count($value);
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