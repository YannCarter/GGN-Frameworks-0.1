<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CSS Framework Render
======================================================

	update(160205.0926)

*/




	/*
		GGN/Caches // DEBUT ----------------------------
	*/


	new GGN\Using('Caches');


	$Cache = new GGN\Caches\Passive([
	
		'dir'=>'ggn.css.framework'
	
		,'type'=>'-text'
	
		,'name'=>Gougnon::pageUrlSelf()
	
		, 'update'=>self::_REQUEST('update', false)
	
	]);






	
	/* 
		Chargement du Noyau 
	*/
	
	$Core = _native::CSSCore('ggn.core');





	/* 
		Style de l'instance
	*/
	// define('DEFAULT_STYLE', self::_REQUEST('style'));


	/* 
		Style du Framework
	*/
	$style = self::_REQUEST('style', $Core::TONE . ':' . $Core::STYLE);

		$exSty = explode(':', $style);

		$hasTone = count($exSty) == 2;
		$exTon = ($hasTone===TRUE) ? $exSty[0] : $Core::TONE;
		$exStyle = ($hasTone===TRUE) ? $exSty[1] : $exSty[0];
	


	/* 
		Version du Framework
	*/
	$version = self::_REQUEST('version', $Core::DEFEULT_FRAMEWORK);
	

	/* 
		API a charger
	*/
	$api = self::_REQUEST('api');

	$APIs = false;

	

	/* 
		Instruction pour activation desactivation de la responsivité
	*/
	$responsivity = self::_REQUEST('responsivity');


	/* 
		Palette definie par le client
	*/
	$palette = self::_REQUEST('palette', false);


	





	/* Ajout de la version du framework au "HASH" */
	$Cache->addHash( $Core->getFrameworkPath($version) );





	/* Ajout du STYLE au "HASH" */
	$Cache->addHash( $Core->getStylePath($exStyle) );





	/* Ajout du TON au "HASH" */
	$Cache->addHash( $Core->getTonPath($exTon) );





	/* Verification des packages */
	if(is_string($api)){


		/* API demandé */
		$APIs = explode(',', $api);


		/* Ajout des packages au "HASH" */
		foreach ($APIs as $key => $pkg) {
			
			$Cache->addHash( $Core->getPackagePath($pkg) );

		}


	}






	/* Montage && verification du 'HASH' */
	$Cache->Hash();







	/* Chargement du cache */
	if($Cache->HashChanged==false){

		echo($Cache->Load());

	}


	/* Construction du contenu du cache */
	if($Cache->HashChanged==true){




		/*
			Definition de la palette de couleur si demandé
		*/
			$Core->ToPalette($palette);



		/* 
			Construction -----------------------------------
		*/


		/* 
			Chargement du Style
		*/

			
			$Core->Style($style);
			
			



		

		/* 
			Chargement de la version du framework
		*/
		if($version!==FALSE){

			if($Core->framework($version)===FALSE){

				header(_native::HTTP_HEADER_404);

				_native::write('/* GGN.CSS Framework : version introuvable */');

				exit;

			}

		}
		

		/* 
			Chargement du framework par defaut
		*/
		if($version===FALSE){$Core->loadDefaultFramework();}

			

		/* 
			Chargement des APIs
		*/
		if(is_array($APIs)){
			
			/* 
				Appel des API
			*/
			foreach ($APIs as $key => $data) {

				$Core->loadPackages($data, ['responsivity'=>$responsivity]);

			}
			

		}
			
		
		


		

		/* Construction du code */
		$Data = $Core->Build(true);





		$Cache->Create($Data);


		echo($Data);

	}





?>