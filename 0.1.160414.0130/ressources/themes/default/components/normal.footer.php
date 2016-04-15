<?php

/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;




	/* 
		Pied de page // Debut -------------------------- 
	*/

		$Footer = new Theme\Tag([
			'id'=>'footer'
			,'class'=>'gui flex row wrap _w10 pos-relative page-footer'
		]);




		$Footer->tag->Logo = new Theme\tag([
			'class'=>'logo mi-col-16 li-col-16 s-col-16 m-col-2 gui flex row wrap mi-flex-center li-flex-center s-flex-center m-flex-end'
		]);

			$Footer->tag->Logo->tag->img = new Theme\tag([
				'tag'=>'img'
				, 'src'=>$this->_url . 'logo-stylivoir-d-xxl.png?mode=-gd&width=172&height=25&resize=&resizeby=-height&rogner=0'
			]);

		



		$Footer->tag->Infos = new Theme\tag([
			'class'=>'infos gui flex column wrap col-0'
		]);

			$Footer->tag->Infos->tag->Menu = (new Theme\tag([
				'class'=>'menu gui flex row wrap mi-flex-center s-flex-center m-flex-start'
			]))

				->text('<a href="' . HTTP_HOST . 'abouts.html">A propos</a>')

				->text('<a href="' . HTTP_HOST . 'presses.html">Presse</a>')

				->text('<a href="' . HTTP_HOST . 'copyrights.html">Droit d’Auteur</a>')

				->text('<a href="' . HTTP_HOST . 'reports.html">Signaler</a>')

				->text('<a href="' . HTTP_HOST . 'legals.html">Mentions Légales</a>')

				->text('<a href="' . HTTP_HOST . 'cug.html">Condition d’utilisation</a>')

				->text('<a href="' . HTTP_HOST . 'helps">Aides</a>')

				->text('<a href="' . HTTP_HOST . 'contacts.html">Contacts</a>')

			;


			$Footer->tag->Infos->tag->Copyright = (new Theme\tag([
				'class'=>'copyright gui flex row mi-flex-center s-flex-center m-flex-start'
			]))

				->text('Copyright 2016 <a href="http://coquillagescom.net/#expertics" target="_blank">Expertic’s</a>')

			;


	/* 
		Pied de page // Fin -------------------------- 
	*/




/* Conteneur de la page : fin */




/*

	Acces Normal // DEBUT ///////////////////////

*/
if(!UsesAjax()){




	/*
		Fusion
	*/

	$FooterMerger = @isset($this->body->sheet->tag->Content->tag->Container->tag->Container) ? $this->body->sheet->tag->Content->tag->Container->tag->Container : $this->body->sheet;

	$FooterMerger->tag->Footer = $Footer;


	/* 
		La page 
	 */

	$NoRendering = isset($NoRendering) ? $NoRendering : false;


	if($NoRendering===false){

		$page = new Page\Init($this);

		/* Moteur de rendu */

		$page->engine()->schema( (new Page\RenderingScheme())->html5 )->start();

	}


}


/*

	Acces Normal // FIN ///////////////////////

*/




/*

	Acces via "X-Requested-Width" // DEBUT ///////////////////////

*/


if(UsesAjax()){



	$this->body->AjaxContainer->tag->Footer = $Footer;




	$page = new Page\Init($this);

	/* 
		Moteur de rendu
	*/

	$page->engine()->start(false, 'body');

}

/*

	Acces via "X-Requested-Width" // FIN ///////////////////////

*/

