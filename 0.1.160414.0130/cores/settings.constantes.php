<?php
/*
	License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU
======================================================
	FICHIER 'cores/settings.constantes.php'
======================================================

*/


/* Constantes */
define('_LANG_', _native::lang());

define('__IP__', (($_SERVER['REMOTE_ADDR']=='::1')? '127.0.0.1': ((isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : ((isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['
	HTTP_CLIENT_IP'] : $_SERVER['REMOTE_ADDR']) ) ) )); 

define('__CLIENT_IP__', __IP__);

define('__CLIENT_HOST__', gethostbyaddr(__IP__) );

define('__HTTP_REFERER__', ((isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']: FALSE));











/* Dossier de stockage "Core.Native" */
define('GSTORAGE_CORE', 'ggn.core');


/* Dossier de stockage des données relative à la base de donnée */
define('GSTORAGE_DATABASE', GSTORAGE_CORE . '/database');
define('GSTORAGE_DATABASE_TABLES', GSTORAGE_DATABASE . '/tables');


/* Dossier de stockage des variables "Invoke.Variables" */
define('GSTORAGE_VARIABLE_INVOKE', GSTORAGE_CORE . '/variables');
define('GSTORAGE_VARIABLE_INVOKE_NATIVES', GSTORAGE_VARIABLE_INVOKE . '/natives');


/* Dossier de stockage des sessions */
define('GSTORAGE_SESSIONS', GSTORAGE_CORE . '/sessions');


/* Dossier de stockage des historiques */
define('GSTORAGE_HISTORIC', GSTORAGE_CORE . '/historic');

// /* Dossier de stockage des comportements */
// define('GSTORAGE_COM_BEHAVIORS', GSTORAGE_CORE . '/com.behaviors');
// define('GSTORAGE_COM_BEHAVIORS_APPS', GSTORAGE_COM_BEHAVIORS . '/apps');
// define('GSTORAGE_COM_BEHAVIORS_PAGES', GSTORAGE_COM_BEHAVIORS . '/pages');





/* URLs du GGNStore */
define('GGN_STORE_HTTP_HOST', 'http://store.gougnon.com:1962/');


/* URLs du Service Login de GGNStore */
define('GGN_STORE_LOGIN_SERVICE', GGN_STORE_HTTP_HOST . 'GGNStoreUsersLoginService');



/* GGN Registre */
define('GGN_REGISTER_MODE_FREE', 'GGN.REGISTER.FREE.MODE:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 4) );

/* Dossier de stockage du registre */
define('GSTORAGE_REGISTER', GSTORAGE_CORE . '/register');
define('GSTORAGE_REGISTER_FREE_MODE', GSTORAGE_REGISTER . '/free.mode');










/* Page d'erreur */
define('HTTP_ERROR_301', 'HTTP_ERROR_301:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 7) );

define('HTTP_ERROR_302', 'HTTP_ERROR_302:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 7) );

define('HTTP_ERROR_403', 'HTTP_ERROR_403:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 7) );

define('HTTP_ERROR_404', 'HTTP_ERROR_404:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 7) );

define('HTTP_ERROR_500', 'HTTP_ERROR_500:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 7) );

define('HTTP_ERROR_502', 'HTTP_ERROR_502:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 7) );


?>