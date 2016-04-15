<?php

/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;





$LatestBlogs = new Theme\Tag([
	
	'id'=>'page-latest'
	
	,'class'=>'gui x256-h bg-dark page-banner _w10 gui flex start disable-scrollbar'

]);

	$LatestBlogs->tag->Info = new Theme\Tag(['class'=>'list-items gui mi-col-16 li-col-16 s-col-11 m-col-10 l-col-8 col-6 box-skew pos-relative bg-dark']);


		$LatestBlogs->tag->Info->tag->Title = (new Theme\Tag(['class'=>'title xh6 color-light box-no-skew']))

			->text('Dynamisez votre activité!');


		$LatestBlogs->tag->Info->tag->Content = (new Theme\Tag(['class'=>'items box-no-skew']));

			$LatestBlogs->tag->Info->tag->Content->tag->Message = (new Theme\Tag(['class'=>'item']))
				
				->text('<div class="title color-light h6"><span class="gui icon plus x16 static-light"></span> Créez vos blogs</div>')
				
				->text('<div class="about color-light">Inscrivez-vous et créez des blogs qui reflette vos activités.</div>')

				->text('<div class="color-light t-pddng"><button class="active">Commencer maintenant</button></div>')

			;



	$LatestBlogs->tag->List = new Theme\Tag(['class'=>'latest-blogs gui col-0 flex start mi-disable li-disable ']);

	$LatestBlogs->tag->List->tag->Items = new Theme\Tag(['class'=>'items gui flex row']);

	for ($lbx=0; $lbx < 3; $lbx++) { 

		$itm = (new Theme\Tag(['class'=>'gui box-skew item x256-w ']));

		$itm->tag->Photo = (new Theme\Tag([

			'class'=>'photo box-no-skew gui'

			,'style'=>[
				'background-image'=>'url('.HTTP_HOST.'images/minia-1.jpg?mode=-gd&width=512&height=512&resize=&resizeby=-height&rogner=1&quality=-high)'
			]

		]))
		
			->text('photo');

		$LatestBlogs->tag->List->tag->Items->tag->{'item_' . $lbx} = $itm;

	}



/*
	Fusion
*/

if(!UsesAjax()){

	$this->body->sheet->tag->Content->tag->Container->tag->Container->tag->LatestBlogs = $LatestBlogs;
	
}


if(UsesAjax()){

	$this->body->AjaxContainer->tag->LatestBlogs = $LatestBlogs;
	
}
