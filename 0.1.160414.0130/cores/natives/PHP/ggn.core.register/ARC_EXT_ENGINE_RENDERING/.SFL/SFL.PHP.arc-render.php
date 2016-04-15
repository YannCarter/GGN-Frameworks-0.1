<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS SFL
	PAGE cores/_natives/PHP/Register.core.g/ARC_ENGINE_RENDING/.SFL/default.arc-render
======================================================

	Moteur de rendu IHTML
	
*/

Require dirname(__FILE__) . '/SFL.PHP.arc-class.php';
	
	
	



	$SFL = new SFL($this->file);


	$SFL->regedit=$this;
	$SFL->Render();


	
?>