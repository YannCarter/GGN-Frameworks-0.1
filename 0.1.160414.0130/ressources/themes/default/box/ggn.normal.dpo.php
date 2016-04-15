<?php
	
	namespace GGN\DPO;
	

	$return = [

		
		'template' => function($title = 'undefined', $content = 'undefined'){

			$brick = new Theme\Tag(['class'=>'gui box']);

			$brick->tag->title = new Theme\Tag(['class'=>'title']);
			
			$brick->tag->title->text($title);

			$brick->tag->container = new Theme\Tag(['class'=>'content']);
			
			$brick->tag->container->content($content);

			return $brick;

		}


	];



?>