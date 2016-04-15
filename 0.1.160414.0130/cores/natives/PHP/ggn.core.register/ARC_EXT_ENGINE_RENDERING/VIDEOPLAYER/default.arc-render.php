<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS GVideoPlayer
	PAGE cores/_natives/PHP/Register.core.g/ARC_ENGINE_RENDING/VIDEOPLAYER/default.arc-render
======================================================
	
*/


global $_Gougnon;



/* Application */
if(_native::varn('VIDEOPLAYER_ACTIVE')!=='1'){
	_native::wCnsl('Cette page a été désactivé par le gestionnaire');
}



Require dirname(__FILE__) . '/default.arc-class.php';

	
$Player = new GVideoPlayer();






/* Ajout automatique des paramètres */
$Player->addParams($_REQUEST);





if($Player->Param['k']===false){

	_native::wCnsl('<h1>Vidéo indisponible</h1>Video non spécifié');
	
}


else{


	/* Relation avec la base de donnée */
	// include dirname(__FILE__) . '/default.bindec.php';





	$theme = (new dpo('html'))->load(_native::varn('VIDEOPLAYER_THEME'));

	$theme->Player = $Player;
	
	$theme->Register = $this;



	$theme->title = $Player->Video['title']; // _native::varn('VIDEOPLAYER_TITLE')
	$theme->packageStyle = _native::varn('VIDEOPLAYER_STYLE');

		/* Lecteur Youtube */	
		if($Player->Type=='yt'){

			
			$theme->doctype('html');
			$theme->html('lang', $theme->_lang);
			$theme->_shorcut();
			$theme->_meta();
			$theme->_title();

			$theme->css('html,body{width:100%;height:99.8%;overflow:hidden;}');

			$theme->_cssPackages();
			$theme->_css();

				$theme->body('<iframe width="100%" height="100%" src="http://www.youtube.com/embed/'.$Player->Video['key'].'?autoplay=1" frameborder="0" allowfullscreen></iframe>');

			$theme->_jsPackages();
			$theme->_javascript();

		}





		/* Lecteur normal */	
		else{
			$theme->brique('video.player');
		}



	$theme->generate();


}


	
?>