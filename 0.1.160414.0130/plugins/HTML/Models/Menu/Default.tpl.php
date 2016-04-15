<?php 
/*
	
	Copyright GOBOU Yannick

	version : 0.1
	update : 160314.1149

*/


	


	/* URI de base du Menu */
	$uri = isset($uriBase) && is_string($uriBase) ? $uriBase: '';


	/* Page Hote du menu : Page courante */
	$host = isset($host) && is_string($host) ? $host: '';


	/* ID du box du Menu */
	$id = isset($id) && is_string($id) ? $id: '';


	/* Classe du box du Menu */
	$class = isset($class) && is_string($class) ? $class: '';


	/* Flexibilité du Menu */
	$flex = isset($flex) && is_string($flex) ? $flex: 'row';
	

	/* List des Attributes */
	$gattrib = [];
	$gattri = isset($attributes) && is_array($attributes) ? $attributes: [];


	/* List des Items */
	$items = isset($items) && is_array($items) ? $items: [];


	/* List des Sous menu */
	$subItems = isset($subItems) && is_array($subItems) ? $subItems: false;



	
	


	/*
		Attributs du box principal
	*/

	if($gattri){
		
		foreach ($gattri as $name => $value) {
		
			$nname=strtolower($name); 
		
			if($nname=='id'||$nname=='class'){continue;return false;} 
		
			$gattrib[count($gattrib)] = ' ' . $name . '="'.addslashes($value).'"'; 
		
		}

	}




	/*
		Fonctionnalités
	*/

	/* Vers une liste d'attributs */
	$toAttrib = function($attrib = false){

		if(!is_array($attrib)){return [];}

		else{

			$_attrib = [];

			foreach ($attrib as $n => $value) {
		
				$nn=strtolower($n); 
		
				if($nn=='id'||$nn=='class'||$nn=='title'||$nn=='target'){continue;return false;} 
		
				$_attrib[count($_attrib)] = ' ' . $n . '="'.addslashes($value).'"';
		
			}

			return $_attrib;

		}
	
	};



	/* Rendu d'un item */
	$rendering = function($item, $r, $k) use ($html, $js, $uri, $host, $subItems, $toAttrib){

		if(!is_array($item)){continue;}

			extract($item);


		/* Données de l'item */
		
		
		$hattrib = isset($hattrib) && is_array($hattrib) ? $hattrib : [];

		$attrib = isset($attrib) && is_array($attrib) ? $attrib : [];
		
		$link = isset($link) && is_string($link) ? $link : 'javascript://void(0);';
		
		$title = isset($title) && is_string($title) ? $title : '';

		$label = isset($label) && is_string($label) ? $label : '';

		$click = isset($click) && is_string($click) ? $click : '';
		
		$id = isset($id) && is_string($id) ? $id : '';
		
		$flex = isset($flex) && is_string($flex) ? $flex : 'column center';
		
		$class = isset($class) && is_string($class) ? $class : '';

		$p = preg_match(\_native::PATTERN_URL, $link);
		
		$u = (($p==true) ? '': $uri) . $link;


		$actived = (basename($host)==basename($link)) ? 'active ggn-gabarit-item-acived':'';


		/* Attributs */
		$_hattrib = $toAttrib($hattrib);

		$_attrib = $toAttrib($attrib);
		


		/* Sous menu exist */
		$hasNotSI = is_array($subItems);


		/* 
			Item : Code HTML
		*/
		if(!$hasNotSI){

			$html('<a '. (implode(' ', $_hattrib)) .' href="'.($u).'" class="item gui flex '.$flex.' '.$actived.' '.$class.'" title="'.$title.'" onclick="'.$click.'" ggn-gabarit-item="'.$k.'" id="' . $id . '">');

		}

		if($hasNotSI){

			$html('<div class="item gui flex with-sub-item '.$actived.' cursor-default '.$class.'" title="'.$title.'" onclick="'.$click.'" ggn-gabarit-item="'.$k.'" id="' . $id . '">');

		}





			$html('<div '. (implode(' ', $_attrib)) .' class="label isolation '.$class.'" title="'.$title.'">');

				$html($label);

			$html('</div>');



			if($hasNotSI){

				$html('<div class="sub-item">');

					foreach ($subItems as $sk => $subItem) {
					
						$html($r($subItem, $r));

					}

				$html('</div>');

			}




		if($hasNotSI){
			
			$html('</div>');

		}


		if(!$hasNotSI){
			
			$html('</a>');

		}


	};










	/*
		Box principal
	*/
		
	$html('<div '. (implode(' ', $gattrib)) .' class="gui layout gabarit menu '.$class.'" id="'.$id.'">');

		$html('<div class="gui flex '.$flex.' items" >');


			/*
				Items
			*/
				
			foreach ($items as $k => $item) {

				$rendering($item, $rendering, $k);

			}




		$html('</div>');
		

	$html('</div>');







?>