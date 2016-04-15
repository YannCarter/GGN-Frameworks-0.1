<?php
	
	$uri = $args[0];
	$exp = explode('://', $uri);
	$in = (isset($exp[0])) ? $exp[0] : false;
	$dir = (isset($exp[1])) ? $exp[1] : '';

	$out = false;
	

	if(is_string($in)){

		switch (strtolower($in)) {
			
			case 'http': $out = HTTP_HOST; break;
			
			case 'root': $out = __MAIN__; break;

			case 'app': $out = __APPLICATIONS__; break;

			case 'ggn-system': $out = __CORES_SYSTEM_GGN__; break;

			case 'com': $out = __CORES_SYSTEM_COM__; break;
			
			case 'system': $out = __CORES_SYSTEM__; break;

			case 'native': $out = __CORES_NATIVES__; break;

			case 'ressource': $out = __RESSOURCES__; break;

			case 'sound': $out = __SOUNDS_FILE__; break;

			case 'js': $out = __JAVASCRIPTS__; break;

			case 'css': $out = __CSS__; break;
			
			case 'theme': $out = __THEMES__; break;

			case 'cache': $out = __CACHES__; break;

			case 'cache-active': $out = __CACHES_ACTIVE__; break;

			case 'cache-passive': $out = __CACHES_PASSIVE__; break;
			
		}

	}

	return (is_string($out)) ? $out . $dir: false;
	
?>