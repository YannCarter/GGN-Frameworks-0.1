<?php
	
	$return = false;


	if(isset($args)){

		/* Variables */
		$path = (isset($args[0]))?$args[0]:false;
		

		/* Si "path" est du type STRING */
		if(is_string($path)){

			/* Fichier */
			$p = self::getDataPath($path);
			$data = Gougnon::scanFolder($p);
			$out = [];

			foreach ($data as $key => $value) {
				$f = basename($value);
				// $file = self::EXTC . basename($value) . self::EXTS;
				$pfx = substr($f, 0, strlen(self::EXTC));
				$sfx = substr($f, -1*strlen(self::EXTS));

				if($pfx==self::EXTC && $sfx==self::EXTS){
					$fl = str_replace($pfx, '', $f);
					$fl = str_replace($sfx, '', $fl);

					$out[$fl] = self::load($fl, $path);
				}

			}


			$return = $out;

		}


	}



?>