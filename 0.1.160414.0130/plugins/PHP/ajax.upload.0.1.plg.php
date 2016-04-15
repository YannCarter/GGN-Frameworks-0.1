<?php
/*
	License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU
======================================================
	FICHIER 'AjaxUpload.plg' VERSION '2.0'
======================================================

*/

if(!class_exists('_native')){exit('Class "Native" introuvable');}

if(!class_exists('AjaxUpload')){



/* CONSTANTES */
define('AJAXUPLOAD_BASE64', 'ContentType::Base.64:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 5));

define('AJAXUPLOAD_IMAGE_ORIGIN', 'Mime.Type::Image.Origin:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 5));

define('AJAXUPLOAD_IMAGE_JPG', 'Mime.Type::Image.JPG:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 4));

define('AJAXUPLOAD_IMAGE_PNG', 'Mime.Type::Image.PNG:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 4));

define('AJAXUPLOAD_IMAGE_GIF', 'Mime.Type::Image.GIF:' . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC, 4));




class AjaxUpload{


	CONST B64 = ';base64,';
	
	CONST Rep64 = '+';

	

	public $fileType = false;
	
	public $B64ConverterResponse = false;


	public function __construct(){

		$this->arguments = func_get_args();
		
		$this->fileData = (isset($this->arguments[0]))?$this->arguments[0]: false;

		$this->ContentType = (isset($this->arguments[1]))?($this->arguments[1]): false;

		$this->moveDir = (isset($this->arguments[2]))?$this->arguments[2]: false;
		
		$this->baseName = 'ggn_rsrc_' . date('YmdHis') . _nativeCrypt::RKCRandm(_nativeCrypt::PALETTE_NUMERIC .' '. _nativeCrypt::PALETTE_ALPHA , 25) . '';

		$this->Init();

	}

	



	protected function fixBeforeB64(){

		if($this->ContentType==AJAXUPLOAD_BASE64){

			$this->dataFixed = str_replace(' ', self::Rep64, urldecode($this->dataOrign));

		}
		
	}
	



	protected function Init(){

		$f = $this->fileData;

		if(!is_array($f)){return 'data.failed';}

		if(!isset($f['filename'])){return 'filename.origin.failed';}

		if(!isset($f['data'])){return 'data.origin.failed';}

		if(!isset($f['size'])){return 'size.origin.failed';}



		$this->basenameOrign = (isset($f['filename']))?$f['filename']:false;

		$this->dataOrign = (isset($f['data']))?$f['data']:false;

		$this->size = (isset($f['size']))?$f['size']:false;

		$this->fixBeforeB64();

		$dexp = explode(self::B64, $this->dataFixed);

		$tdexp = explode(':', $dexp[0]);

		$this->Mime = isset($tdexp[1]) ? $tdexp[1] : false;

		$this->data64 = (isset($dexp[1])) ? $dexp[1] : false;

		$this->dexp = $dexp;

	}
	



	protected function B64Converter($fileData){


		$this->data = base64_decode($this->dexp[1]);

		@$this->image = imagecreatefromstring($this->data);

		if(!$this->image){return 'image.data.failed';}


		$this->setBaseName();

		return true;
	}
	
	

	protected function convertToJPG(){

		$this->fileType = '.jpg';

		if($this->ContentType==AJAXUPLOAD_BASE64){

			$this->B64ConverterResponse=$this->B64Converter($this->fileData);

			return true;

		}

		return false;
	}



	protected function convertToPNG(){

		$this->fileType = '.png';

		if($this->ContentType==AJAXUPLOAD_BASE64){

			$this->B64ConverterResponse=$this->B64Converter($this->fileData);

			return true;

		}

		return false;
	}



	protected function convertToGIF(){

		$this->fileType = '.gif';

		if($this->ContentType==AJAXUPLOAD_BASE64){

			$this->B64ConverterResponse=$this->B64Converter($this->fileData);

			return true;

		}

		return false;
	}



	public function convertTo(){

		$args = func_get_args();

		$to = (isset($args[0])) ? $args[0] : AJAXUPLOAD_IMAGE_JPG;


		if($to==AJAXUPLOAD_IMAGE_JPG){return $this->convertToJPG();}
		
		if($to==AJAXUPLOAD_IMAGE_PNG){return $this->convertToPNG();}
		
		if($to==AJAXUPLOAD_IMAGE_GIF){return $this->convertToGIF();}
		
		if($to==AJAXUPLOAD_IMAGE_ORIGIN){
			
			$ex = explode('/', $this->Mime);

			$ty = isset($ex[1]) ? $ex[1] : false ;

			if(is_string($ty)){

				if($ty == 'jpg' || $ty == 'jpeg'){return $this->convertToJPG();}

				if($ty == 'png'){return $this->convertToPNG();}

				if($ty == 'gif'){return $this->convertToGIF();}

			}

		
		}


		return false;

	}



	public function isValid(){
		
		if($this->ContentType==AJAXUPLOAD_BASE64){

			if(is_array($this->fileData)){

				$exp0 = explode(';', $this->fileData['data']);
				$dat = explode(':', $exp0[0]);

				if(!isset($dat[1])){return false;}
				else{
					$m=explode('/',$dat[1]);
					$mm = strtoupper($m[0]);
					if($mm=='IMAGE'){return true;}
					else{return false;}
				}

			}

			else{

				return false;

			}

		}


		return false;
	}





	
	public function setBaseName(){
		$args = func_get_args();
		$baseName = (isset($args[0]))?$args[0]:$this->baseName;
		$this->baseName = $baseName . $this->fileType;
		return $this->baseName;
	}





	
	public function moveTo(){
		$args = func_get_args();
		$this->moveDir = (isset($args[0]))?$args[0]:((isset($this->moveDir))?$this->moveDir: false);
		if(!isset($this->moveDir)){return false;}
		if(!is_dir($this->moveDir)){Gougnon::createFolders($this->moveDir);}
		$this->fileName = $this->moveDir . $this->baseName;
		

		if($this->ContentType==AJAXUPLOAD_BASE64){
			Gougnon::createFile($this->fileName, $this->data);
		}
		if($this->ContentType!=AJAXUPLOAD_BASE64){

		}

		return $this->fileName;
	}



	
}




}



?>