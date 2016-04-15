<?php
/*
	Copyright GOBOU Y. Yannick
	
*/

if(isset($this->Register->USER) && is_array($this->Register->USER)){


	/*
		
		Plugin d'upload Ajax (base64)

	*/
	if(!class_exists('AjaxUpload')){

		\Gougnon::loadPlugins('PHP/ajax.upload.0.1');

	}



	/* Noeud du Resultat */

	$imported = $this->node('imported');



	/* 
		Ressource dedié à l'utilisateur courant si 'true' 
		et au systeme si 'false' avec accès administrateur 
	*/
	$user = Register::_GET('user', false);




	/* 
		Confidentialité de la ressource uploadée
	*/
	$confidentiality = Register::_GET('confidentiality', false);




	/* 
		Type de ressource
	*/
	$type = Register::_GET('type', 'other-files');




	/* 
		Nom du Dossier dans le dossier des ressources
	*/
	$dirname = Register::_GET('dirname', '');

		$slshdn = substr($dirname, -1);

		$dirname .= ($slshdn!='/' && is_string($slshdn)) ? '/' : '';




	/* Requete Fichier envoyé */
	$file = Register::_POST('file', false);

	$filename = Register::_POST('filename', false);

	$size = Register::_POST('size', false);




	/* Dossier */
	$dir = ($user=='true') ? GUSERS::dataDir($this->Register->USER['USERNAME'], '%' . strtoupper($type) . '%') . $dirname : __RESSOURCES__ . $type;



	// $imported->dir = $dir;


	/* Requete de fichier valide */
	if(is_string($file)){


		/* Ajax Upload */
		$upload = new AjaxUpload(

			[

				'data' => $file

				,'filename' => $filename

				,'size' => $size

			]

			, AJAXUPLOAD_BASE64

		);




		/* Validation */
		if(!$upload->isValid()){

			$imported->response = 'data.not.available';

		}




		/* Conversion du fichier */
		$convert = $upload->convertTo(AJAXUPLOAD_IMAGE_ORIGIN);



		/* Deplacement du fichier vers '$dir' */
		$move = $upload->moveTo($dir);




		/* Etat de la conversion */
		if($convert==false){
		
			$imported->response = 'convert.failed';
		
		}
		
		if(is_string($convert)){
		
			$imported->convert = $convert;
		
		}
		


		/* Etat du déplacement */
		if($move==false){
		
			$imported->response = 'move.failed';
		
		}




		/* Deplacement vers '$dir' terminé */
		if(is_string($move)){

			/* Meta */
			@$info = getimagesize($filename);


			/* Reponse du serveur */
			$imported->response = 'import.success';

		}




		/* Reponse du serveur */
		$this->Response(true);


	}



	/* Requete invalide */
	else{

		/* Reponse du serveur */
		$this->Response(false);


	}


}


/* Besoin de connexion */
else{

	$this->Response('require.login');

}
