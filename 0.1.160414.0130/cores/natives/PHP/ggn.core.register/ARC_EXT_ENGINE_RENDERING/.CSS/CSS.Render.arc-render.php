<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CSS Render
======================================================

*/

	/*
		GGN/Caches // DEBUT ----------------------------
	*/

		
		
		
	
	/* Chargement du Noyau */
	$Core = _native::CSSCore('ggn.core');




	new GGN\Using('Caches');


	$Cache = new GGN\Caches\Passive([
	
		'dir'=>'ggn.css.file'
	
		,'type'=>'-text'
	
		,'name'=>Gougnon::pageUrlSelf()
	
		, 'update'=>self::_REQUEST('update', false)
	
	]);





	/* 
		Palette definie par le client
	*/
	$palette = self::_REQUEST('palette', false);
	



	/* 
		Style du Fichier
	*/
	$style = self::_REQUEST('style', $Core::TONE . ':' . $Core::STYLE);

		$exSty = explode(':', $style);


		$hasTone = count($exSty) == 2;
		
		$exTon = ($hasTone===TRUE) ? $exSty[0] : $Core::TONE;
		
		$exStyle = ($hasTone===TRUE) ? $exSty[1] : $exSty[0];
	








	/* Ajout du STYLE au "HASH" */
	$Cache->addHash( $Core->getStylePath($exStyle) );





	/* Ajout du TON au "HASH" */
	$Cache->addHash( $Core->getTonPath($exTon) );





	/* Ajout du 'HASH' */
	$Cache->addHash($this->file);




	/* Montage && verification du 'HASH' */
	$Cache->Hash();




	/* Chargement du cache */
	if($Cache->HashChanged==false){

		echo($Cache->Load());

	}




	/* Construction du contenu du cache */
	if($Cache->HashChanged==true){

		


		/* 
			Paramètres 
		*/


		/*
			Definition de la palette de couleur si demandé
		*/
		$Core->ToPalette($palette);


		/* Chargement du Style */
		$Core->Style($style);



		/* Registre GGN */
		$Core->Register = $this;

		
		
		/* Chargement du fichier */
		include $this->file;

		

		/* Construction du code */
		$Data = $Core->Build(true);







		$Cache->Create($Data);


		echo($Data);



	}




	
