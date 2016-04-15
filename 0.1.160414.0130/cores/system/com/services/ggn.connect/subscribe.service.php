<?php
/*
	Copyright GOBOU Y. Yannick
	
*/



/*
	Plugin : Captcha
*/
if(!class_exists('GCAPTCHA')){

	\Gougnon::loadPlugins('PHP/GCaptcha.0.1');

}







$username = Register::_POST('username');

$password = Register::_POST('password');

$password2 = Register::_POST('password2');

$email = Register::_POST('email');

$captcha = Register::_POST('captcha');

$cgu = Register::_POST('cgu');






/* Captcha */
$vcaptcha = new GCAPTCHA('ggn.users.subscribe');





if(!preg_match(\_native::PATTERN_USERNAME, $username)){

	$this->Response('username.failed');

	return false;

}


else if(\Gougnon::isEmpty($username)){

	$this->Response('username.empty');

	return false;

}



else if(\Gougnon::isEmpty($password)){

	$this->Response('pwd.empty');

	return false;

}


else if($password!=$password2){

	$this->Response('pwd.confirm.failed');

	return false;

}


else if(!preg_match(\_native::PATTERN_EMAIL, $email)){

	$this->Response('pwd.confirm.failed');

	return false;

}



else if(!preg_match(\_native::PATTERN_EMAIL, $email)){

	$this->Response('email.failed');

	return false;

}



else if(\Gougnon::isEmpty($email)){

	$this->Response('email.empty');

	return false;

}



else if(!$vcaptcha->Validate($captcha)){

	$this->Response('captcha.failed');

	return false;

}




else{

	$lSubscribe = new \GGN\Using('Connect/Subscribe');


	$connect = \GGN\Connect\Subscribe\Invoke::Main([

		/*
			Nom d'utilisateur ou email
		*/
		'username'=> $username
		

		/*
			Mot de passe
		*/
		, 'password'=> $password
		


		/*
			Email
		*/
		, 'email'=> $email
		

		/*
			Classe 'com.service'
		*/
		, 'com.service'=>$this


	]);





	/*
		Tentative d'inscription : Validation des variables requires
	*/
	if($connect->attempt()===true){

		$connect->responses('subscribe.success');

	}


	/*
		Echec de la tentative d'inscription
	*/
	else{

		$connect->responses('attempt.failed');

	}




	


}



	
