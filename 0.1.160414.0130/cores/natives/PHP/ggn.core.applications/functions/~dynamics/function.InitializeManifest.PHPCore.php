<?php
	


	$return = false;

	
	if(is_object($context) && is_string($context->Path)){

		$context->ManifestFile = $context->Path . 'assembly.php';

		if($context->InternalApp===TRUE){
			if(is_file($context->ManifestFile)){
				$Manifest = new _nativeCustomObject();
				include $context->ManifestFile;
				$context->Manifest = $Manifest;
			}
			else{
				_native::wCnsl('<h1>Impossible de monter l\'application</h1> <b>Ex000010:AFNF</b> / Le <b>fichier assemblage</b> est introuvable');
			}

		}

	}


?>