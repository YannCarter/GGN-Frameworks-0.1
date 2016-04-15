<?php
	

global $_Gougnon;


Register::requireARCRenderClass('COM/com.mod');








$COM = new GCOMCore(GCOMCore::getCOMFromURL());
$COM->Register = $this;
$COM->Type = 'com:application';


if($COM->initialize()===false){
	_native::wCnsl('Echec lors de l\'instialisation');
}

	
	

	echo '<pre>';
		print_r($COM->application);
	echo '</pre>';








	
?>