<?php
	global $GLANG;






	/* Taritement */
	$_REG_MODE = (isset($args[1]))?$args[1]:false;

	$_REG_MIME = (isset($args[2]))?$args[2]:false;

	$_REG_TYPE = (isset($args[3]))?$args[3]:false;





	/*

		Historiques du Registre // DEBUT /////////////////

	*/


		$GRegisterHistory = new RegisterHistories();

		$GRegisterHistory->Record( $_REG_TYPE, $_REG_MIME, $_REG_MODE, $this->USER );


	/*

		Historiques du Registre // FIN /////////////////

	*/
		


?>