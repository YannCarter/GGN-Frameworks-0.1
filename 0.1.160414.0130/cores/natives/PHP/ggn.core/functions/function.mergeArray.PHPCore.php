<?php
	
	$o = $args[0];
	$e = $args[1];
	$mode = (isset($args[2]))?$args[2]: false;
	
	if($mode===true){foreach($e as $k => $v){ $o[$k] = $v; }}
	else{for($x=0; $x<count($e); $x++){ array_push($o, $e[$x]); }}
	
	return $o;
	
?>