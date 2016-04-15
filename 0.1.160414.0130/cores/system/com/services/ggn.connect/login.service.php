<?php
/*
	Copyright GOBOU Y. Yannick
	
*/


$lLogin = new \GGN\Using('Connect/Login');
	



$connect = \GGN\Connect\Login\Invoke::Main([

	/*
		Nom d'utilisateur ou email
	*/
	'username'=> Register::_POST('username')
	

	/*
		Mot de passe
	*/
	, 'password'=> Register::_POST('password')
	

	/*
		Se souvenir de ce utilisateur pour prolongé la durée de la session
	*/
	, 'remember'=> Register::_POST('remember')
	

	/*
		Mode de connexion (email/Nom d'utilisateur)
	*/
	, 'mode'=> strtolower(_native::varn('ACTIVESESSION_MODE'))
	

	/*
		Application associé à la session
	*/
	, 'app'=> Register::_POST('app', false)
	

	/*
		Origne de la connexion
	*/
	, 'origin'=> Register::_POST('origin', 'ggn.connect')


	/*
		Classe 'com.service'
	*/
	, 'com.service'=>$this


]);





/*
	Tentative de connexion : Validation des variables requires
*/
if($connect->attempt()===true){

	$connect->responses('login.success');

}


/*
	Echec de la tentative de connexion
*/
else{

	$connect->responses('attempt.failed');

}




	
?>