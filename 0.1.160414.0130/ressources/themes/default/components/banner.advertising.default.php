<?php

/*
	Copyright GOBOU Y. Yannick
	
*/
	
namespace GGN\DPO;





$AdvertisingUpBanner = new Theme\Tag([
	
	'id'=>'page-latest'
	
	,'class'=>'gui vw10 x128-h bg-dark page-banner background-abs-center'

	,'style'=>[

		'background-image'=>'url('.HTTP_HOST . 'slidershow/abstr-01.jpg)'

	]

]);



/*
	Fusion
*/
	
$this->body->sheet->tag->Content->tag->Container->tag->AdvertisingUpBanner = $AdvertisingUpBanner;
