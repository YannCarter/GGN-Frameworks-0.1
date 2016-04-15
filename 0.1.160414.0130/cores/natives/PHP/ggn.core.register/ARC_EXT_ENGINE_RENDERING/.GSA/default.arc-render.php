<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS IHTML
	PAGE cores/_natives/PHP/Register.core.g/ARC_ENGINE_RENDING/.APP/default.arc-render
======================================================

	Moteur de rendu IHTML
	
*/

Require dirname(__FILE__) . '/default.arc-class.php';
	
	
	



	$GAPPS = new GAPPS_PHP($this->file
		, $this->_REQUEST('gappopenmode')
		, $this->_REQUEST('gappopenargs')
		, $this->_REQUEST('gappmain')
	);



	$GAPPS->Render();


	
?>