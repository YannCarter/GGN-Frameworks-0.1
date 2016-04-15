<?php


/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;





/* 
	Activation 
*/

if(\_native::varn('USERGETSTARTEDPAGE_ACTIVE')!=='1'){

	\_native::wCnsl('Cette page a été désactivé par le gestionnaire');

}




if(!is_array($this->USER)){

	\Gougnon::goToLogin();

}




/* DPO */

new Using('DPO\Page');

new Using('DPO\Procedure');

new Using('DPO\Theme');

// new Using('GeoLocation/Country/CI');





/* 
	Noyau CSS // DEBUT ------------------
*/

	$CSSCore = \_native::CSSCore('ggn.core');


/* 
	Noyau CSS // FIN ------------------
*/





/* 
	Class 'STYLIVOIR' // DEBUT ------------------
*/

\Gougnon::loadPlugins('PHP/stylIvoir.2.0');


	$STYLIVOIR = new \StylIvoir('Subscribe.Now');


	// $Cities = (new \GGN\GeoLocation\Country\CI\Load())->Cities;


	// $_Criterions = $STYLIVOIR->BlogCriterions;


	$_On = \Register::_REQUEST('on', false);

	$ExOn = explode(':', $_On);

	$On = $ExOn[0];

	$OnValue = isset($ExOn[1]) ? $ExOn[1] : false;

	$Dir = dirname(__FILE__) . '/ggn.pinky.on/';




/* 
	Class 'STYLIVOIR' // FIN ------------------
*/













/* 
	Initialisation du Theme 
*/

$tpl = new Theme\Preset(\_native::varn('USERGETSTARTEDPAGE_THEME'));


$tpl->Register = $this;


$tpl->title = \_native::varn('USERGETSTARTEDPAGE_TITLE');



/* 
	Style de la page
*/

$tpl->style = \_native::varn('USERGETSTARTEDPAGE_STYLE');



/* 
	Noyau CSS
*/






/* 
	Fichier Hote 
*/

$tpl->host = 'home';



/*
	Composant : "normal.header" // ENTETE
*/
$tpl->component('normal.header');




	/*

		Cacher "Under Header"

	*/
		$tpl->body->js('(function(uh){');

			$tpl->body->js('if(isObj(uh)){');

				$tpl->body->js('uh.hide(false);');

			$tpl->body->js('}');

		$tpl->body->js('})(G("#under-header"));');





/*
	CSS
*/

// $tpl->head->cssPackages([

// ]);




/*
	Script
*/

// $tpl->head->jsPackages([

// ]);






/* Conteneur de la page : debut */

	/*
		Fusion avec le noeud principal
	*/

	if(!UsesAjax()){

		$container = $tpl->body->sheet->tag->Content->tag->Container->tag->Container;
		
	}


	if(UsesAjax()){

		$container = $tpl->body->AjaxContainer;
		
	}









	/* 
		Espacement en Haut // Debut -------------------------- 
	*/

		$container->tag->Spacer = new Theme\Tag(['class'=>'page-space-top']);


	/* 
		Espacement en Haut // Fin -------------------------- 
	*/










	/* 
		Page // DEBUT -------------------------- 
	*/

		$container->tag->Page = new Theme\Tag([
			'class'=>'gui flex row wrap start bloc-page _w10'	
		]);

	/* 
		Page // FIN -------------------------- 
	*/










	/* 
		Bloac // DEBUT -------------------------- 
	*/


		if(is_string($On)){

			$OnFle = $Dir . $On . '.php';

			if(is_file($OnFle)){

				include $OnFle;

			}

			else{

				include $Dir . 'default.php';

			}

		}

	/* 
		Bloac // FIN -------------------------- 
	*/






		







/*
	Composant : "normal.footer" // PIED DE PAGE
*/
$tpl->component('normal.footer');

