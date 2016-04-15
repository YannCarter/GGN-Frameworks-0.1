<?php 

	
	$r=[];

	$array = $args[0];

	$new = [];

	foreach ($array as $key => $value) {

		if(!in_array($value, $new)){

			array_push($new, $value);

		}
		
	}
		
	return $new;

?>