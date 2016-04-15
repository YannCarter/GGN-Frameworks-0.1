<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS IHTML
	PAGE cores/_natives/PHP/Register.core.g/ARC_ENGINE_RENDING/ACTIVEUSERSESSION/G.Active.User.Session.arc-render
======================================================

	Moteur de rendu IHTML
	
*/


Gougnon::loadPlugins('PHP/ggn.connect.0.1');
	



$connect = new \GGNConnect([

	/*
		Nom d'utilisateur ou email
	*/
	'username'=> isset($_POST['username'])?$_POST['username']:false
	

	/*
		Mot de passe
	*/
	, 'password'=> isset($_POST['password'])?$_POST['password']:false
	

	/*
		Se souvenir de ce utilisateur pour prolongé la durée de la session
	*/
	, 'remember'=> isset($_POST['remember'])?$_POST['remember']:false
	

	/*
		Application associé à la session
	*/
	, 'app'=> isset($_POST['app'])?$_POST['app']:false
	

	/*
		Origne de la connexion
	*/
	, 'origin'=>isset($_POST['origin'])?$_POST['origin']:'ggn.connect'


]);


/*
	Tentative de connexion : Validation des variable requires
*/
if($connect->attempt()===true){

	/*
		Authentification
	*/
	if($connect->login()){
		return $connect->responses('login.success');
	}

	/*
		Echec de l'authentification
	*/
	else{
		return $connect->responses('login.failed');
	}


}


/*
	Echec de la tentative de connexion
*/
else{
	return $connect->responses('attempt.failed');
}



	
?>