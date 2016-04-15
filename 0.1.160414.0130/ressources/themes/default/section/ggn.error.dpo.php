<?php
	
	namespace GGN\DPO;
	
	$_this = $this;

	$return = [

		
		'template' => function($code = 'undefined', $title='undefined', $about = 'undefined', $ecode = '') use($_this){

			$brick = new Theme\Tag(['class'=>'gui flex column center wrap error-section-box']);


						
				$down = new Theme\Tag(['class'=>'down gui flex center column']);


					$down->tag->Code = new Theme\Tag(['class'=>'xh1']);

					$down->tag->Code->text($code);


					$down->tag->Title = new Theme\Tag(['class'=>'title']);

					$down->tag->Title->tag->Content = new Theme\Content($title);


					$down->tag->About = new Theme\Tag(['class'=>'about']);

					$down->tag->About->tag->Content = new Theme\Content($about);


					$down->tag->Buttons = (new Theme\Tag(['class'=>'buttons']))

					->text('<button class="active" onclick="history.go(-1);"> <span class="gui icon arrow-left"></span>&nbsp;&nbsp;&nbsp;Retour </button>')

					->text('<button onclick="location.href=\'' . HTTP_HOST . '\';"> <span class="gui icon home"></span>&nbsp;&nbsp;&nbsp;Allez à l\'accueil </button>')

					;


					$down->tag->Copy = (new Theme\Tag(['class'=>'copyright gui flex center column']))

						// ->text('<img src="'.HTTP_HOST.'ggn.pinky/logo-stylivoir-d-xxl.png?mode=-gd&width=172&height=25&resize=&resizeby=-height&rogner=0">')

						->text('<div>' . $_this->manifest->theme['copyright'] . '</div>')

						->text('<div>' . \Gougnon::activeLinkFromString($_this->manifest->theme['powered']) . '</div>')

					;



				$brick->tag->DOWN = $down;

			return $brick;

		}


	];



?>