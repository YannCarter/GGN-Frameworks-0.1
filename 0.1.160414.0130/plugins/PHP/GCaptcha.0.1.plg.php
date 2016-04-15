<?php

global $_Gougnon;
// session_start();




if(!class_exists('GGNSession')){

	\Gougnon::loadPlugins('PHP/ggn.session.0.1');

}



if(!class_exists('GCaptcha')){

class GCaptcha{

	
	const NAME = 'Gougnon.Secure.Captcha.Image';
	const VERSION = '0.1.140624.1049';


	private $code=false;
	private $fname='Gougnon.Secure.Captcha.';
	private $UPLetter='w v 6 I';
	private $length=7;
	private $textures=[];


	var $name=false;
	var $arguments=[];
	var $session=false;
	var $duration=10;
	


	
	public function __construct(){
		$this->arguments = func_get_args(); 
		$this->name = (isset($this->arguments[0]))?(($this->arguments[0]!=false)?$this->arguments[0]:false):false;
			$this->name = (is_string($this->name))?$this->fname.$this->name: $this->fname.'Auto.'.date('Y.m.d');
		$this->textColor = (isset($this->arguments[1]))?(($this->arguments[1]!=false)?$this->arguments[1]:'#777'):'#777';
		$this->bgColor = (isset($this->arguments[2]))?(($this->arguments[2]!=false)?$this->arguments[2]:'#090909'):'#090909';

		$this->width = 256;
		$this->height = 64;

		$this->txc = Gougnon::HEXtoRGB($this->textColor);
		$this->bgc = Gougnon::HEXtoRGB($this->bgColor);

	}




	public function generateCode(){
		$this->code = _nativeCrypt::RKCRandm(str_replace(explode(' ',(($this->UPLetter) . ' ' . strtolower($this->UPLetter))),'A',_nativeCrypt::PALETTE_ALPHA . ' ' . _nativeCrypt::PALETTE_NUMERIC),$this->length);
		// $this->code = _nativeCrypt::RKCRandm(str_replace(explode(' ',(strtoupper($this->UPLetter) . ' ' . strtolower($this->UPLetter))),'A',_nativeCrypt::PALETTE_ALPHA . ' ' . _nativeCrypt::PALETTE_NUMERIC),$this->length) . (isset($_SESSION['Captcha'])?$_SESSION['Captcha']:'_');
	}




	protected function initTexture(){
		$m = $this->textures;
		$k = mt_rand(0,count($m)-1);
		$i = (isset($m[$k]))?$m[$k]:false;

		$this->texture = ($i!==false)?imagecreatefrompng(__CAPTCHA__.$i.'.png'): imagecreatetruecolor($this->width, $this->height);
	}

	public function addTexture($img){
		array_push($this->textures,$img);
	}




	public function engine(){
		
		$this->addTexture('captcha_0');
		$this->addTexture('captcha_1');
		$this->addTexture('captcha_2');
		$this->addTexture('captcha_3');
		
		$this->generateCode();

		$this->session = new GGNSession($this->name,GGNSession::ONLINE, 'Gougnon.Secure.Captcha.Image');
		$sess_exists = $this->session->exists();

		$this->session->set($this->code,$this->duration);
		$this->image();
	}




	public function image(){
		$this->initTexture();

		$txt = $this->code;
		$lim = strlen($txt);
		$this->space = 21;
		$this->textWidth = ($lim*$this->space);
		$this->fontSize = 15;
		$this->x = ($this->width-$this->textWidth)/2;
		$this->y = ($this->height-$this->fontSize)-10;
		
		$img = imagecreatetruecolor($this->width, $this->height);
		$sup = $this->texture;

		imagealphablending($sup, false);
		imagesavealpha($sup, true);

		$tc = imagecolorallocate($img, $this->txc[0], $this->txc[1], $this->txc[2]);
		$bg = imagecolorallocate($img, $this->bgc[0], $this->bgc[1], $this->bgc[2]);

		imagefilledrectangle($img, 0, 0, $this->width, $this->height, $bg);


		/* Code */
		$text = $txt;
		$font = __TTF_FONTS__ . 'horrendo.ttf';


			$x = $this->x;
			for($i=0; $i<$lim; $i++){
				$letter = substr($this->code,$i,1);
				imagettftext($img, 15, 0, $x, $this->y, $tc, $font, $letter);
				$x += $this->space;
			}


		/* Fusion */
		imagecopyresampled($img,$sup, 0, 0, 0, 0,$this->width,$this->height,$this->width,$this->height);


		/* Génération */
		imagepng($img);
		imagedestroy($img);


	}



	public function Validate($code){

		$session = new GGNSession($this->name, GGNSession::ONLINE, 'Gougnon.Secure.Captcha.Image');
		$exists = $session->exists();


		if(!is_array($exists)){
			return false;
		}

		$trueCode = $exists[0]['value'];

		if($code==$trueCode){
			return true;
		}

		return false;

	}



}



}





?>