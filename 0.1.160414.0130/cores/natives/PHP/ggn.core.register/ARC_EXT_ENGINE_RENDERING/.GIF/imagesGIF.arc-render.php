<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS imagesGIF
	PAGE cores/_natives/PHP/Register.core.g/ARC_ENGINE_RENDING/.GIF/imagesGIF.arc-render.php
======================================================

	Moteur de rendu d'images GIF
	
*/




	/*
		CLASS 'imagesGIF'
	*/

	if(!class_exists('GImages')){
		Gougnon::loadPlugins('PHP/GImages.0.1');
	}




	new GGN\Using('Caches');



	$mode = strtolower(self::_GET('mode', '-default'));





	/* 
		Paramètres pour l'image 
	*/
	
	$resizer = (isset($_GET['resize']))?TRUE:FALSE;
	
	$width = (isset($_GET['width']))?$_GET['width']:FALSE;
	
	$height = (isset($_GET['height']))?$_GET['height']:FALSE;
	
	$resizeby = (isset($_GET['resizeby']))?$_GET['resizeby']:FALSE;
	
	$resizeby = ($resizeby=='0'||$resizeby=='-width')?false:true;

	$rogner = (isset($_GET['rogner']))?$_GET['rogner']:FALSE;
	
	$rogner = ($rogner=='0')?false:true;




	/* 
		Déclaration
	*/
	
	$this->Render = new GImages(
	
		$this->file
	
		, $width
	
		, $height
	
		, (isset($_GET['source']))?$_GET['source']: 'text.plain'
	
		, $mode
	
		, (isset($_GET['quality']))?$_GET['quality']: '-medium'
	
		, (isset($_GET['filter']))?$_GET['filter']:FALSE 
	
	);
	
		




	/*
		Affiche l'image si aucun n'est defini
	*/
	if($mode=='-default'){

		$this->Render->open(null);

	}

	if($mode=='-gd'){

		/* 
			Paramètres pour le cache
		*/
		
		// $Data = file_get_contents($this->file);

		$UpdateVersion = self::_GET('update', false); //date('Ymd.His')

		$CacheName = Gougnon::pageUrlSelf();



		/* 
			Donnné générée
		*/

			$Render = $this->Render;


		/*
			GGN/Caches // DEBUT ----------------------------
		*/


		$Cache = new GGN\Caches\Passive([
		
			'dir'=>'ggn.images.gif'
		
			,'type'=>'-text'
		
			,'name'=>$CacheName
		
			, 'update'=>$UpdateVersion
		
		]);





		/* Ajout du 'HASH' */
		$Cache->addHash($this->file);




		/* Montage && verification du 'HASH' */
		$Cache->Hash();




		/* Chargement du cache */
		if($Cache->HashChanged==false){

			echo base64_decode($Cache->Load());

		}




		/* Construction du contenu du cache */
		if($Cache->HashChanged==true){


			$Data = GGN\Caches\Tmp::Data($CacheName, function($path) use ($Render, $resizer, $resizeby, $rogner){

				$Render->open($path);
				
			});


			$Cache->Create( base64_encode($Data) );


			echo($Data);


		}





	}






	

?>