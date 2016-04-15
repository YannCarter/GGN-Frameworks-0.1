<?php
/*
	License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU
======================================================
	FICHIER 'cores/settings.database.php'
======================================================

*/
	
if(!class_exists('_native')){

	exit('Classe Native introuvable');

}

if(!class_exists('_nativeDB')){

	_native::wCnsl('Classe "NativeDB" introuvable');

}

if(!isset($database)){

	_native::wCnsl('Variable "database" introuvable');

}



/* Type de connexion à la base de donnée (pdo, mysql, mysqli) */
	
	$database->mode('-pdo');
	
/*

Configuration de l'accès à la base de donnée

->log : 

	  Serveur

	, Nom_d_utilisateur

	, Mot_de_passe

	, Nom_de_la_base_de_donnee

	, prefixe_des_tables


*/	


	// if($_SERVER['HTTP_HOST']=='localhost'){

		$database->log('localhost', 'root', '', 'ggn_core', 'ggn_');

	// }

	

	// if($_SERVER['HTTP_HOST']!='localhost'){

	// 	$database->log('localhost', '', '', '', 'ggn_');

	// }

	

