<?php  
 	

 	// print_r($args);
 	// exit;

	$i = $args;  $in = count($args); 
	if(!file_exists($i[0])): self::createEmptyFile($i[0]); endif;
		
		if (is_writable($i[0])) {
				if (!$FileHandle = fopen($i[0], 'w+')) {
					 exit("Erreur Fatal: Impossible de creer le fichier < ".$i[0]." >.");
					return false;
				}
				if (fwrite($FileHandle, $i[1]) === FALSE) {
					return false;
				}
				fclose($FileHandle);

			} else {
				return null;
			}


	return true;

?>