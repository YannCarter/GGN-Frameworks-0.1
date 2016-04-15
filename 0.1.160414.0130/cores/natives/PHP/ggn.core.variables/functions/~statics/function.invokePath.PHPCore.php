<?php
	
	$return = false;


	if(isset($args)){
		$path = (isset($args[0]))?$args[0]:self::getVarsPath();
		$path = (is_string($path))?$path:self::getVarsPath();

		$return = GStorages::loadPath($path);

	}



?>