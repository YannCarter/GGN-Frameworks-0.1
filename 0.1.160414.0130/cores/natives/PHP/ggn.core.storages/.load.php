<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	FICHIER cores/_natives/PHP/ggn.core.storages/.load.php
======================================================

*/


	if(!class_exists('GStorages')){
		require dirname(__FILE__) . '/.class.php';
	}
	
	$core = new GStorages();
	
?>