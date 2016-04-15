<?php
	
	namespace GGN\DPO;
	

	$return = [


		'template' => function($form = [], $title = false, $inputs = false){

			$form = (is_array($form)) ? $form: [];

			$form['tag'] = 'form';

			$form['class'] = 'gui form box ' . ((isset($form['class']) && is_string($form['class'])) ? $form['class']: '');



			/* Brique */
			$brick = new Theme\Tag($form);


			
			/* Titre du box */
			if(is_string($title)){

				$brick->tag->title = new Theme\Tag(['class'=>'title']);

				$brick->tag->title->text($title);

			}


			/* Contenu */
			if(is_array($inputs)){

				$brick->tag->container = new Theme\Tag(['class'=>'container']);

				// $brick->tag->container->tag->notice = new Theme\Tag(['class'=>'notification']);

				$brick->tag->container->tag->fields = new Theme\Tag(['class'=>'fields']);
				
				foreach ($inputs as $key => $element) {

					$field = new Theme\Tag(['class'=>'field']);


					if(isset($element['free.content']) && is_string($element['free.content'])){

						$field->text($element['free.content']);

					}

					$brick->tag->container->tag->fields->tag->{$key} = $field;

					if(isset($element['label']) && is_string($element['label']) ){
						$label = new Theme\Tag(['tag'=>'label','class'=>'pre']);
						$label->text($element['label']);
						$brick->tag->container->tag->fields->tag->{$key}->tag->label = $label;
					}

					if(isset($element['input']) && is_array($element['input'])){
						$element['input']['tag'] = 'input';
						$iLabel = false;

						if(isset($element['input']['label']) ){
							$iLabel = (isset($element['input']['label'])) ? $element['input']['label']: false;
							unset($element['input']['label']);
						}

						$input = new Theme\Tag($element['input']);
						$brick->tag->container->tag->fields->tag->{$key}->tag->input = $input;


						if(is_string($iLabel)){

							$brick->tag->container->tag->fields->tag->{$key}->text('<label class="sub">' . $iLabel . '</label>');
							
						}

					}


				}

			}



			return $brick;

		}


	];



?>