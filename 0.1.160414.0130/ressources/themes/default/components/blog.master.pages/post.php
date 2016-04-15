<?php


namespace GGN\DPO;






/* 
	Post-Master : Edition de post // DEBUT -------------------------- 
*/


if($this->isMyBlog){


	$EditPost = (new Theme\Tag([

		'class'=>'blog-bloc blog-edition-post margin-tb-x16 gui flex column start'

	]));


		$EditPost->tag->Title = (new Theme\Tag([
	
			'class'=>'title text-left text-x18 padding-lr-x16 padding-tb-x16'
	
		]))

			->text('<span class="gui icon pencil margin-r-x16"></span>Redigez une nouvelle Actualité')

		;


		$EditPost->tag->Form = (new Theme\Tag([
	
			'tag'=>'form'

			,'id'=>'blog-edit-post-form'
	
		]))

		;
		

		$EditPost->tag->Form->tag->Content = (new Theme\Tag([
	
			'id'=>'blog-edit-post-box'

			,'class'=>'blog-edit-post padding-x16'
	
		]))

			->text('<textarea name="post-content" class="editor padding-x0 col-16 x128-h-min x480-h-max disable-scrollbar text-x14" ggn-handler-keyup="Gabarit.Form.TextArea.Flexible" ggn-handler-focus="Gabarit.Input.Focus" gabarit-focus="#blog-edit-post-box" placeholder="Commencer la rédaction..."></textarea>')

		;
		

		$EditPost->tag->Form->tag->Content->tag->Buttons = (new Theme\Tag([
			
			'class'=>'gui flex center'
	
		]));


			$EditPost->tag->Form->tag->Content->tag->Buttons->tag->PostAttchm = (new Theme\Tag([
				
				'class'=>'gui flex start row wrap align-left'
		
			]))

				->text('<a href="javascript:void(0);" onclick="return false;" class="gui box-circle x32 margin-lr-x4 margin-t-x40 gui flex center button cursor-pointer padding-x0 " id="blog-post-attch-photo"><span class="gui icon image x16"></span></a>')

				->text('<a href="javascript:void(0);" onclick="return false;" class="gui box-circle x32 margin-lr-x4 margin-t-x40 gui flex center button cursor-pointer padding-x0 " id="blog-post-attch-video"><span class="gui icon video-clapper x16"></span></a>')

			;


			$EditPost->tag->Form->tag->Content->tag->Buttons->tag->Actions = (new Theme\Tag([
				
				'class'=>'gui flex end row wrap align-right'
		
			]))

				->text('<a href="javascript:void(0);" onclick="return false;" class="gui box-circle x32 margin-lr-x4 margin-t-x24 gui flex center button error cursor-pointer padding-x0 " id="blog-post-attch-video"><span class="gui icon close x16"></span></a>')

				->text('<a href="javascript:void(0);" onclick="return false;" class="gui box-circle x64 margin-x4 gui flex center button active cursor-pointer padding-x0" id="blog-post-submit align-right"><span class="gui icon check x32"></span></a>')


			;




	$container->tag->nCo->tag->lPage->tag->EditPost = $EditPost;


}

/* 
	Post-Master : Edition de post // FIN -------------------------- 
*/









/* 
	Post : Banniere Publicitaire // DEBUT -------------------------- 
*/

	$Ads01 = (new Theme\Tag([

		'class'=>'blog-bloc margin-tb-x24 x112-h bg-color gui flex center'

	]))

		->text('<div class="h2 color-dark-l opacity-x40"> Bannère sponsor </div>')

	;

	
	$container->tag->nCo->tag->lPage->tag->Ads01 = $Ads01;

/* 
	Post : Banniere Publicitaire // FIN -------------------------- 
*/










/* 
	Post : Galerie Photo // DEBUT -------------------------- 
*/

	$Gallery01 = (new Theme\Tag([

		'class'=>'blog-bloc post-gallery margin-tb-x24 pos-relative _w10 gui flex column start x480-h-min vh8' 
	]));


		$Gallery01->tag->Screen = (new Theme\Tag([
	
			'class'=>' _w10 _h10 screen pos-relative gui flex column center disable-scrollbar col-0'
	
		]));

	


		// $Gallery01->tag->Article = (new Theme\Tag([
	
		// 	'class'=>'article padding-x16 text-left x128-h-max'
	
		// ]))

		// 	->text('<div class="h2">Titre de l\'article</div>')

		// 	->text('<div class="text-x14">Contenu du text</div>')

		// ;



		$Gallery01->tag->Screen->tag->Thumbs = (new Theme\Tag([
	
			'class'=>'thumbs _w10 _h10 gui flex center row no-wrap pos-absolute disable-scrollbar'
	
		]));


			for ($bgpx=0; $bgpx < 3; $bgpx++) { 

				$item = (new Theme\Tag([
			
					'class'=>'item _13 h-inherit box-skew disable-scrollbar mi-col-16 li-col-16 s-col-8 ' . ($bgpx>=1 ? ' mi-disable li-disable ': '') . ($bgpx>=2 ? ' li-disable s-disable ' : '')
			
				]))

					->text('<div style="background-image:url(./images/minia-1.jpg?mode=-gd&width=960&height=768&resize=&resizeby=1&rogner=1&quality=-medium);" class="image col-16 _h10 box-no-skew"></div>')

				;

				$Gallery01->tag->Screen->tag->Thumbs->tag->{'item_' . $bgpx} = $item;

			}



		$Gallery01->tag->Screen->tag->Over = (new Theme\Tag([
	
			'class'=>'over gui flex column center disable-scrollbar pos-relative'
	
		]))

			->text('<a href="" onclick="return false;" class="color-light gui icon eye xh2"></a>')

			->text('<a href="" onclick="return false;" class="color-light h2">Visionner<br>l\'album photo</a>')

		;


		$Gallery01->tag->Screen->tag->Infos = (new Theme\Tag([
	
			'class'=>'infos gui flex wrap row pos-absolute _w10 padding-t-x32'
	
		]));


			$Gallery01->tag->Screen->tag->Infos->tag->Title = (new Theme\Tag([
		
				'class'=>'gui flex col-8 mi-flex-center li-flex-center mi-col-16 li-col-16 padding-tb-x12 padding-lr-x24' // 
		
			]))

				->text('<div class="gui icon gallery x32 "></div>')

				->text('<div class="text-left padding-l-x16">')

					->text('<div class="text-x24 text-ellepsis">Titre de l\'album</div>')

					->text('<div class="text-x12 text-ellepsis">Publier le 27 janvier, 15h53 à Abidjan</div>')

				->text('</div>')

			;


			$Gallery01->tag->Screen->tag->Infos->tag->Stat = (new Theme\Tag([
		
				'class'=>'gui flex row end mi-flex-center li-flex-center col-0 mi-col-16 li-col-16 padding-tb-x24 padding-lr-x24'
		
			]))

				->text('<div class="padding-lr-x16 text-x20"> 300<span class="opacity-x50">k</span> <div class="gui icon comments x16 "></div></div>')

				->text('<div class="padding-lr-x16 text-x20"> 15<span class="opacity-x50">k</span> <div class="gui icon eye x16 "></div></div>')

				->text('<div class="padding-lr-x16 text-x20"> 14<span class="opacity-x50">k</span> <div class="gui icon heart x16 "></div></div>')

				->text('<div class="gui icon more-alt x32 "></div>')


			;





	$container->tag->nCo->tag->lPage->tag->Gallery01 = $Gallery01;

/* 
	Post : Galerie Photo // FIN -------------------------- 
*/










/* 
	Post : Article // DEBUT -------------------------- 
*/

	$Article01 = (new Theme\Tag([

		'class'=>'blog-bloc post-gallery margin-tb-x24 pos-relative _w10 gui flex column start x480-h-min vh8' 
	]));


		$Article01->tag->Screen = (new Theme\Tag([
	
			'class'=>' _w10 _h10 screen pos-relative gui flex column center disable-scrollbar col-0'
	
		]));

	


		$Article01->tag->Article = (new Theme\Tag([
	
			'class'=>'article padding-x16 text-left'
	
		]));


			$Article01->tag->Article->tag->TitleBox = (new Theme\Tag([
		
				'class'=>'gui flex row end mi-flex-center li-flex-center col-0 mi-col-16 li-col-16 padding-lr-x24'
		
			]))

				->text('<div class="h2">Titre de l\'article</div>')

			;

			$Article01->tag->Article->tag->TitleBox->tag->Stat = (new Theme\Tag([
		
				'class'=>'gui flex row end mi-flex-center li-flex-center col-0 mi-col-16 li-col-16 padding-tb-x16 padding-lr-x24 color-primary'
		
			]))

				->text('<div class="padding-lr-x16 text-x20"> 300<span class="opacity-x50">k</span> <div class="gui icon comments x16 "></div></div>')

				->text('<div class="padding-lr-x16 text-x20"> 15<span class="opacity-x50">k</span> <div class="gui icon eye x16 "></div></div>')

				->text('<div class="padding-lr-x16 text-x20"> 14<span class="opacity-x50">k</span> <div class="gui icon heart x16 "></div></div>')

				->text('<div class="gui icon more-alt x32 "></div>')

			;


			$Article01->tag->Article->tag->ContenuBox = (new Theme\Tag([
		
				'class'=>'text-x16 padding-lr-x12'
		
			]))

				->text('Contenu du text')

			;





		$Article01->tag->Screen->tag->Thumbs = (new Theme\Tag([
	
			'class'=>'thumbs _w10 _h10 gui flex center row no-wrap pos-absolute disable-scrollbar'

			,'style'=>[
				'background-image'=>'url(./images/minia-1.jpg?mode=-gd&width=960&height=768&resize=&resizeby=1&rogner=1&quality=-medium)'
			]
	
		]))

		;



		$Article01->tag->Screen->tag->Over = (new Theme\Tag([
	
			'class'=>'over gui flex column center disable-scrollbar pos-relative'
	
		]))

			->text('<a href="" onclick="return false;" class="color-light gui icon eye xh2"></a>')

			->text('<a href="" onclick="return false;" class="color-light h2">Visionner<br>la photo</a>')

		;


		// $Article01->tag->Screen->tag->Infos = (new Theme\Tag([
	
		// 	'class'=>'infos gui flex wrap row pos-absolute _w10 padding-t-x32'
	
		// ]));


			// $Article01->tag->Screen->tag->Infos->tag->Title = (new Theme\Tag([
		
			// 	'class'=>'gui flex col-8 mi-flex-center li-flex-center mi-col-16 li-col-16 padding-tb-x12 padding-lr-x24' // 
		
			// ]))

			// 	->text('<div class="gui icon gallery x32 "></div>')

			// 	->text('<div class="text-left padding-l-x16">')

			// 		->text('<div class="text-x24 text-ellepsis">Titre de l\'album</div>')

			// 		->text('<div class="text-x12 text-ellepsis">Publier le 27 janvier, 15h53 à Abidjan</div>')

			// 	->text('</div>')

			// ;






	$container->tag->nCo->tag->lPage->tag->Article01 = $Article01;

/* 
	Post : Article // FIN -------------------------- 
*/




