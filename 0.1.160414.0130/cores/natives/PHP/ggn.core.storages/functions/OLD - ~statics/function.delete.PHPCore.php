<?php
	
	$return = false;


	if(isset($args)){
		$errorDetector = false;

		/* Variables */
		// $value = (isset($args[0]))?$args[0]:false;
		$where = (isset($args[0]))?$args[0]:false;
		$name = (isset($args[1]))?$args[1]:false;
		$path = (isset($args[2]))?$args[2]:'';
		

		/* Si name est du type STRING */
		if(is_string($name) && $where!==false){

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
					if($gc!=false&&is_array($where)){
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
								$del = false;

								/* Traitement de "WHERE" */
								foreach ($data as $k => $v){
									$vv = $v[$x];

									/* Verification par champs */
									foreach ($where as $n => $ndn) {

										if(isset($data[$n])){

											if($n==$k){
												$nn = $data[$n][$x];

												if($nn==$ndn){
													$del = $x;
												}

											}

										} else{$errorDetector = true; }


									}


									$line[] = $vv;
								}
								

								if($del===false){
									$output .= self::inputLine($line, $gc);
								}


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
								if($key!=$where){$output .= self::inputLine($v); }
								else{}
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


					/* Reecriture du fichier */
					if($error===false){
						$return = Gougnon::createFile($file, $output);
					}
				}



			}


		}


	}



?>