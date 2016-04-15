<?php

	global $_DPO_DEVICE, $_Gougnon;



/* 
	Fonctions // DEBUT ----------------------------------------
*/

	if(isset($GUI) || is_array($GUI)){


		/*
			Propriété : Display // DEBUT ----------------------------------
		*/

			$GUI['Property.Display.ForEach'] = function($prefix, $subfix = '', $important = true) use($Core){

				foreach (explode(' ', 'block flex inline inline-block inline-flex inline-table list-item run-in table table-caption table-column-group table-header-group table-footer-group table-row-group table-cell table-column table-row initial inherit') as $disp) {

					$Core->selector($prefix . $disp . $subfix, ['display'=> $disp . ' ' . ($important===true ? ' !important': '')] );

				}

			};

		/*
			Propriété : Display // FIN ----------------------------------
		*/
			





		/*
			Prédéfinie : Display // DEBUT ----------------------------------
		*/

			// $GUI['Preset.Notice.Error'] = [];

		/*
			Prédéfinie : Display // FIN ----------------------------------
		*/
			




	}


/* 
	Fonctions // FIN ----------------------------------------
*/





?>