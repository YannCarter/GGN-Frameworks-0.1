<?php
	
	return ((!class_exists('GSystem')))?_native::PHPCore('ggn.core.system'):new GSystem();
?>