<?php
/*
	License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU
======================================================
	FICHIER 'cores/settings.root.php'
======================================================

*/

	
	
/* Paramètre dossiers */

define('__MAIN__', dirname(dirname(__FILE__)) . '/');

define('__APPLICATIONS__', __MAIN__ . 'applications/');



define('__CACHES__', __MAIN__ . 'caches/');

	define('__CACHES_ACTIVE__', __CACHES__ . '~active.caches/');

	define('__CACHES_PASSIVE__', __CACHES__ . '~passive.caches/');



define('__CORES__', __MAIN__ . 'cores/');

	define('__CORES_SYSTEM__', __CORES__ . 'system/');

		define('__CORES_SYSTEM_GGN__', __CORES_SYSTEM__ . 'ggn/');



		define('__CORES_SYSTEM_COM__', __CORES_SYSTEM__ . 'com/');

			define('__CORES_SYSTEM_COM_SERVICES__', __CORES_SYSTEM_COM__ . 'services/');

			define('__CORES_SYSTEM_COM_TUNNELS__', __CORES_SYSTEM_COM__ . 'tunnels/');

			define('__CORES_SYSTEM_COM_VENDOR__', __CORES_SYSTEM_COM__ . 'vendor/');

			define('__CORES_SYSTEM_COM_LOG__', __CORES_SYSTEM_COM__ . 'log/');
			
			define('__CORES_SYSTEM_COM_BEHAVIORS__', __CORES_SYSTEM_COM__ . 'behaviors/');



		// define('__CORES_SYSTEM_JOINS__', __CORES_SYSTEM__ . 'joins/');

		define('__CORES_SYSTEM_STORAGES__', __CORES_SYSTEM__ . 'storages/');

		define('__CORES_SYSTEM_SETTINGS__', __CORES_SYSTEM__ . 'settings/');

		define('__CORES_SYSTEM_SECURES__', __CORES_SYSTEM__ . 'secures/');

		define('__CORES_SYSTEM_SESSIONS__', __CORES_SYSTEM__ . 'sessions/');

		define('__CORES_SYSTEM_INTERFACES__', __CORES_SYSTEM__ . 'interfaces/');

		// define('__CORES_SYSTEM_SDGUI__', __CORES_SYSTEM__ . 'SDxGUI/');

		define('__CORES_SYSTEM_90__', __CORES_SYSTEM__ . 'x90/');

		define('__CORES_SYSTEM_SFL__', __CORES_SYSTEM__ . 'xSFL/');



	define('__CORES_NATIVES__', __CORES__ . 'natives/');

	define('__CORES_NATIVE_PHP__', __CORES_NATIVES__ . 'PHP/');

	define('__CORES_NATIVE_JS__', __CORES_NATIVES__ . 'JS/');

	define('__CORES_NATIVE_CSS__', __CORES_NATIVES__ . 'CSS/');

	define('__CORES_NATIVE_HTML__', __CORES_NATIVES__ . 'HTML/');



define('__RESSOURCES__', __MAIN__ . 'ressources/');



	define('__FONTS__', __RESSOURCES__ . 'fonts/');

		define('__TTF_FONTS__', __FONTS__ . 'TTF/');

		define('__EOT_FONTS__', __FONTS__ . 'EOT/');

		define('__WOFF_FONTS__', __FONTS__ . 'WOFF/');



	define('__SOUNDS_FILE__', __RESSOURCES__ . 'sounds/');

	define('__JAVASCRIPTS__', __RESSOURCES__ . 'javascripts/');

	define('__SVG__', __RESSOURCES__ . 'svg/');

	define('__IMAGES__', __RESSOURCES__ . 'images/');

		define('__CAPTCHA__', __IMAGES__ . 'captcha/');



	define('__LANGS__', __RESSOURCES__ . 'langs/');

	define('__THEMES__', __RESSOURCES__ . 'themes/');

	define('__CSS__', __RESSOURCES__ . 'css/');

	define('__SHOCKWAVES_X__', __RESSOURCES__ . 'shockwaves-x/');

	define('__VIDEOS__', __RESSOURCES__ . 'videos/');

	define('__SAMPLE_FILES__', __RESSOURCES__ . 'filesSampled/');

		define('__EMPTY_FILE__', __SAMPLE_FILES__ . 'empty.sample');




define('__USERS__', __MAIN__ . 'users/');

define('__PLUGINS__', __MAIN__ . 'plugins/');

define('__HTML__', __MAIN__ . 'html/');






/* URL des dossiers */
$GGN_GET_HOST = function(){
	$u = $_SERVER['HTTP_HOST'];
	$r = rtrim(ltrim($_SERVER['DOCUMENT_ROOT']));
	$rs = substr($r, -1, strlen($r) );
	$rf = $r . (($rs=='/')?'':'/');
	$mn = str_replace('\\', '/', __MAIN__);
	$rt = str_replace($rf, '', $mn);
	$u .= '/';
	return $u . $rt;
};

define('HTTP_PORT', '80');

define('HOST', $GGN_GET_HOST());




define('HTTP_HOST', 'http://' . HOST);

define('HTTP_MAIN', HTTP_HOST);

define('HTTP_APPLICATIONS', HTTP_MAIN);

define('HTTP_CACHES', HTTP_MAIN . 'caches/');








?>