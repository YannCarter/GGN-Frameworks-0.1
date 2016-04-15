<?php

	/**
	 * GGN DPO Theme
	 *
	 * @version 0.1
	 * @update 150911.0854
	*/




/*
	Nom de l'espace
*/
namespace GGN\DPO\Theme;
	

	const TPL_INSTANCE_ = 'tpl;instance;';

	const TPL_INSTANCE_PRESET_ = 'tpl;instance;preset';

	const TPL_INSTANCE_CUSTOM_ = 'tpl;instance;custom';

	const TPL_INSTANCE_SETTINGS_ = 'tpl;instance;setting.object;';

	const TPL_INSTANCE_HEAD_ = 'tpl;instance;head.tag;';

	const TPL_INSTANCE_BODY_ = 'tpl;instance;body.tag;';

	const TPL_INSTANCE_CNT_ = 'tpl;instance;content.text;';

	const TPL_INSTANCE_BRICK_ = 'tpl;instance;brick.tpl;';

	const TPL_INSTANCE_TAG_ = 'tpl;instance;tag.html;';


	use \GGN\DPO\Page;
	

	const CDxM_ = Page\CDxM_;

	const CDxS_ = Page\CDxS_;

	const CDxP_ = Page\CDxP_;

	const CDxH_ = Page\CDxH_;

	const CDxB_ = Page\CDxB_;

	const CDxTPL_ = Page\CDxTPL_;




	if(!class_exists('\GGN\DPO\Theme\Invoke')){
			
		Class Invoke extends \GGN\DPO\Invoke{
				
			const NAME = 'Gougnon DPO Theme';
			
			const VERSION = '0.1';
			
			const UPDATE = '150911.0854';


			/* Identité */
			public $_Tx;
			

		} // Class 'Invoke'


	} // If class exists 'Invoke'






	if(!class_exists('\GGN\DPO\Theme\HTMLTags')){
			
		Class HTMLTags extends \GGN\DPO\Invoke{
				
			const NAME = 'Gougnon DPO Propriétés de balise';
			
			const VERSION = '0.1';
			
			const UPDATE = '160211.1030';



			
			/* Ajouter un attribut */
			public function attrib($name = false, $value = false){

				if(is_string($name)){
					
					$this->attributes[strtolower($name)] = $value;

				}

				return $this;
			}

			
			/* Ajouter une classe CSS */
			public function addClass($classname = false){

				if(is_string($classname)){
					
					if(!isset($this->attributes['class'])){
						$this->attrib('class', $classname);
					}

					else{
						$this->attributes['class'] .= ' ' . $classname;
					}

				}

				return $this;
			}

			
			/* Remplacer une classe CSS */
			public function replaceClass($classname = false, $newClassname = false){

				if(is_string($classname) && is_string($newClassname)){
					
					if(!isset($this->attributes['class'])){
						$this->attrib('class', $classname);
					}

					else{
						$exp = explode($this->attributes['class'], ' ');
						$cn = [];

						foreach ($exp as $value) {

							if(strtolower($value) == strtolower($classname)){
								array_push($cn, $newClassname);
							}
							else{
								array_push($cn, $value);
							}
						}

						$this->attributes['class'] = implode(' ', $cn);

					}

				}

				return $this;
			}

			
			/* Remplacer une classe CSS */
			public function removeClass($classname = false){

				if(is_string($classname)){

					$this->replaceClass($classname, '');

				}

				return $this;
			}

			

		} // Class 'HTMLTags'


	} // If class exists 'HTMLTags'






	if(!class_exists('\GGN\DPO\Theme\Create')){
			
		Class Create{
				
			const NAME = 'Gougnon DPO Theme : Creation';
			
			const VERSION = '0.1';
			
			const UPDATE = '150918.0229';




			/* Doctype */
			public $defaultDoctype = 'html';



			public function __construct($type = false, $instance = false, $config = false){

				switch ($type) {

					case Brick::CREATE:

						$this->_brick($instance, $config);

					break;
					
				}

			}


			protected function _brick($instance = false, $config = false){

				extract($config);

				if(is_object($instance) && isset($name) && isset($template)){

					$instance->_BRICKS_->{$name} = $config;

				}



			}




		} // Class 'Create'


	} // If class exists 'Create'








	if(!class_exists('\GGN\DPO\Theme\Instance')){
			
		Class Instance{
				
			const NAME = 'Gougnon DPO Theme : Instance';
			
			const VERSION = '0.1';
			
			const UPDATE = '150918.0229';



			/* Paramètres */
			public $name = false;

			public $version = false;

			public $update = false;

			public $useCache = false;

			public $host = false;




			/* Variable du Manifest */
			public $manifest;




			/* Doctype */
			public $defaultDoctype = 'html';

			public function doctype($string = false){

				$this->{'doctype'} = (is_string($string)) ? $string : $this->defaultDoctype;

			}




			/* Doctype */
			public $html = [];

			public function html($name, $string = false){

				$this->{'html'}[$name] = $string;

			}


			/* Manifest */
			public function manifestTact(){

				$this->manifest->node = function($settings = []){

					$o = new \_nativeCustomObject();

					$o->k = 0;
					$o->list = new \_nativeCustomObject();
					$o->add = function($data = false) use ($o){
						$o->list->{$o->k} = $data;
						$o->k++;

						return $o;
					};

					return $o;

				};


				$this->manifest->links = $this->manifest->node();

				$this->manifest->css = $this->manifest->node();

				$this->manifest->style = $this->manifest->node();
				
				$this->manifest->css = $this->manifest->node();

				$this->manifest->scripts = $this->manifest->node();

				$this->manifest->js = $this->manifest->node();

				$this->manifest->package = $this->manifest->node();

				$this->manifest->package->css = $this->manifest->node();

				$this->manifest->package->js = $this->manifest->node();

			}



			// /* Ajouter un tag link */
			// public $pln = 0;

			// public function link($data = false){

			// 	$this->manifest->links->{$this->pln} = $data;

			// 	$this->pln++;

			// 	return $this;

			// }



			// /* Ajouter un tag scripts */
			// public $psr = 0;

			// public function script($data = false){

			// 	$this->manifest->scripts->{$this->psr} = $data;

			// 	$this->psr++;

			// 	return $this;
				
			// }




			//  Ajouter un package CSS pour le framework d'usage 
			// public $pcss = 0;

			// public function cssPackage($data = false){

			// 	$this->manifest->packages->css->{$this->pcss} = $data;

			// 	$this->pcss++;

			// 	return $this;
				
			// }




			// /* Ajouter un package JS pour le framework d'usage */
			// public $pjs = 0;

			// public function jsPackage($data = false){

			// 	$this->manifest->packages->js->{$this->pjs} = $data;

			// 	$this->pjs++;

			// 	return $this;
				
			// }



		} // Class 'Instance'


	} // If class exists 'Instance'








	if(!class_exists('\GGN\DPO\Theme\Preset')){
			
		Class Preset extends Instance{
				
			const NAME = 'Gougnon DPO Theme : Prédéfinie';
			
			const VERSION = '0.1';
			
			const UPDATE = '150911.0859';


			/* Chemin du dossier du theme */
			protected $_path;



			/* Nom du thème */
			public $themeName;




			/* Declaration */
			public function __construct(){

				$this->arguments = func_get_args();

				$this->_Tx = [TPL_INSTANCE_PRESET_, CDxTPL_, $this->arguments, 'preset.class'];


				if(is_string($this->arguments[0])){

					$this->themeName = $this->arguments[0];

					$this->_path = $this->themeName;

					$this->_path .= (substr(ltrim(rtrim($this->_path)), -1) == '/') ? '': '/';

					$this->path = \Gougnon::getPathFromProtocol($this->_path);

					$sDriver = new \GGN\DPO\Driver;

					$this->sDriver = $sDriver;

					$this->_manifest = $this->path . $sDriver::__MANIFEST . $sDriver::__Ext;

					$this->manifest = new \_nativeCustomObject();

					$this->manifest();

					$this->_BRICKS_ =  new \_nativeCustomObject();

					$this->device = new \GGN\DPO\Device();


				}
				
			}




			/* Chargement du manifest */
			public function manifest(){

				$this->manifestTact();

				if(is_string($this->_manifest)){
				
					if(is_file($this->_manifest)){
						
						include $this->_manifest;
				
					}

					else{
				
						\_native::wCnsl('<h1>DPO</h1> Manifest introuvable pour < <b>' . $this->themeName . '</b> >');
				
					}
				
				}

				else{
				
					\_native::wCnsl('<h1>DPO</h1> Manifest mal configuré.');
				
				}

			}




			/* Chemin d'un composant du theme */
			public function Component($file, $callBack = false){

				$path = $this->path . 'components/';

				$f = $path . $file . '.php';

				if(is_file($f)){

					if(is_array($callBack)){

						extract($callBack);

					}

					include $f;
					
				}

				else{
					$component = $file;
					include $path . 'no-component.php';
				}

			}



			/* Chargement de la Brique */
			public function getBrickPath($name = false, $de){

				if(is_string($name)){
					$str = [];
					$exp = explode('/', $name);
					$row = count($exp)-1;
					$sD = $this->sDriver;

					for ($i=0; $i < $row; $i++) { 
						array_push($str, $exp[$i]);
					}

					array_push($str, $this->manifest->{$de}['prefixe'] . $exp[$row]);

					return implode('/', $str)  . $sD::_Ext . $sD::__Ext;

				}

				return false;
			}



			/* Chargement de la Brique */
			public function brick($name = false){


				if(is_string($name)){

					/* Type de thème */
					$de = ($this->device->current=='-c')?'computer':'mobile';
					$de = ( (isset($this->manifest->{$de})) && (isset($this->manifest->{$de}[$name]) ) ? $de : 'computer');


					/* Partie du thème */
					if(!isset($this->manifest->{$de}[$name])){ 
						// \_native::wCnsl('<h1>DPO</h1>Erreur : La brique du thème spécifiée est introuvable < "' . $name . '" >');
						return new \GGN\DPO\Error('theme:brick.not.found');
					}

					/* Driver */
					$sD = $this->sDriver;
					

					/* Fichier de la Brique */
					$file = $this->path . $this->getBrickPath($this->manifest->{$de}[$name], $de);
					$is = is_file($file);



					/* Tentative de chargement de la brique */
					if($is){

						$return = false;

						/* Inclusion de la brique */
						include $file;


						/* Brique conforme */
						if(is_array($return) && isset($return['template'])){

							$return['name'] = $name;

							return new Create(Brick::CREATE, $this, $return);

						}


						/* Brique non-conforme */
						else{

							// \_native::wCnsl('<h1>DPO</h1>Erreur : La brique < "' . $name . '" > est non-conforme ');
							return new \GGN\DPO\Error('theme:unavailable.statement');

						}


					}

					/* Echec */
					if(!$is){

						// \_native::wCnsl('<h1>DPO</h1>Erreur : Echec lors de la tentative du chargement de la brique < "' . $name . '" >');
						return new \GGN\DPO\Error('theme:loading.fail');

					}


				}

				/* Sinon */
				else{

					// \_native::wCnsl('<h1>DPO</h1>Erreur : Variable non conforme pour la brique < "' . $name . '" >');
					return new \GGN\DPO\Error('theme.unavailable.var');

				}


			}







		} // Class 'Preset'


	} // If class exists 'Preset'







	if(!class_exists('\GGN\DPO\Theme\Custom')){

			
		Class Custom extends Instance{
				
			const NAME = 'Gougnon DPO Theme : Personnaliser';
			
			const VERSION = '0.1';
			
			const UPDATE = '150911.0854';




			/* Déclaration */
			public function __construct(){

				$this->_Tx = [TPL_INSTANCE_CUSTOM_, CDxTPL_, func_get_args(), 'custom.class'];

				/* Briques */
				$this->_BRICKS_ = new \_nativeCustomObject();

			}





		} // Class 'Custom'


	} // If class exists 'Custom'






	if(!class_exists('\GGN\DPO\Theme\Brick')){
			
		Class Brick extends \GGN\DPO\Invoke{
				
			const NAME = 'Gougnon DPO Theme : Brique de thème';
			
				
			const VERSION = '0.1';				

			
			const UPDATE = '150911.0859';



			/* Fonctionnalités */
			const CREATE = 'asset;brick.tpl;';



			public function __construct($name = false, $asset = []){
				
				$this->_Tx = [TPL_INSTANCE_BRICK_, CDxM_];

				/* Configuration */
				if(is_string($name)){

					$this->asset = $asset;
					
					$this->asset['name'] = $name;

				}


			}


		} // Class 'Brick'


	} // If class exists 'Brick'








	if(!class_exists('\GGN\DPO\Theme\Settings')){

			
		Class Settings extends Invoke{
				
			const NAME = 'Gougnon DPO Theme : Paramètres';
			
			const VERSION = '0.1';
			
			const UPDATE = '150911.0854';




			/* Déclaration */
			public function __construct(){
				
				$this->_Tx = [TPL_INSTANCE_SETTINGS_, CDxS_, func_get_args()];
			
			}


			/* Doctype */
			public function add($name = false, $value = true){
				
				if(is_string($name)){
				
					$this->{$name} = $value;
				
				}
			
				return $this;
			}




		} // Class 'Settings'


	} // If class exists 'Settings'








	if(!class_exists('\GGN\DPO\Theme\Head')){

			
		Class Head extends Invoke{
				
			const NAME = 'Gougnon DPO Theme : Entete';
			
			const VERSION = '0.1';
			
			const UPDATE = '150911.0854';



			/* Balise 'head' */
			public $write = [];

			public $writing = [];


			/* Balise 'Meta' */
			public $meta = [];


			/* Balise 'Meta' */
			public $shortcut = [];


			/* Balise 'Link' */
			public $link = [];


			/* Balise 'Script' independant */
			public $script = [];


			/* Packages 'CSS' */
			public $cssPackage = [];


			/* Balise 'Style' */
			public $style = [];



			/* Packages 'JS' */
			public $jsPackage = [];


			/* Balise 'Script' pour code uniquement */
			public $js = [];




			/* Déclaration */
			public function __construct(){

				$this->_Tx = [TPL_INSTANCE_HEAD_, CDxH_, func_get_args()];
				
			}


			/* Titre de la page */
			public function title($string = false){
				$this->title = $string;
				return $this;
			}


			/* Meta de la page */
			public function meta(){
				array_push($this->meta, func_get_args());
				return $this;
			}

			/* Meta de la page */
			public function shortcut(){
				array_push($this->shortcut, func_get_args());
				return $this;
			}


			/* Link de la page */
			public function link(){
				foreach (func_get_args() as $value) {
					if(is_array($value) || is_string($value)){
						array_push($this->link, $value);
					}
					if(is_object($value)){
						foreach ($value as $d) {
							$this->{__FUNCTION__}($d);
						}
					}
				}
				return $this;
			}


			/* Ficher CSS externe */
			public function css(){
				foreach (func_get_args() as $value) {
					$this->link(['type'=>'text/css','rel'=>'styleSheet','href'=>$value]);
				}
				return $this;
			}


			/* Script dans le head */
			public function script(){
				foreach (func_get_args() as $value) {
					if(is_array($value) || is_string($value)){
						array_push($this->script, $value);
					}
					if(is_object($value)){
						foreach ($value as $d) {
							$this->{__FUNCTION__}($d);
						}
					}
				}
				return $this;
			}


			/* CSS Package de la page */
			public function cssPackages($data = false){

				if(is_array($data)){
					foreach ($data as $value) {
						array_push($this->cssPackage, $value);
					}
				}

				if(is_object($data)){
					foreach ($data as $value) {
						$this->{__FUNCTION__}($value);
					}
				}

				if(is_string($data)){
					array_push($this->cssPackage, $data);
				}
				return $this;
			}


			/* Style dans le head */
			public function style(){
				foreach (func_get_args() as $value) {
					if(is_array($value)){
						array_push($this->style, $value);
					}
				}
				return $this;
			}


			/* JS Package de la page */
			public function jsPackages($data = false){
				if(is_array($data)){
					foreach ($data as $value) {
						array_push($this->jsPackage, $value);
					}
				}

				if(is_object($data)){
					foreach ($data as $value) {
						$this->{__FUNCTION__}($value);
					}
				}

				if(is_string($data)){
					array_push($this->jsPackage, $data);
				}
				return $this;
			}


			/* Javascript dans le head */
			public function js(){
				foreach (func_get_args() as $value) {
					array_push($this->js, $value);
				}
				return $this;
			}


			/* Ecrire directement dans l'entete */
			public function write(){
				foreach (func_get_args() as $value) {
					array_push($this->write, $value);
				}
				return $this;
			}


			/* Ecriture directement généré dans l'entete */
			public function writing(){
				foreach (func_get_args() as $value) {
					array_push($this->writing, $value);
				}
				return $this;
			}




		} // Class 'Head'


	} // If class exists 'Head'








	if(!class_exists('\GGN\DPO\Theme\Body')){

			
		Class Body extends HTMLTags{
				
			const NAME = 'Gougnon DPO Theme : Corps';
			
			const VERSION = '0.1';
			
			const UPDATE = '160211.1039';



			/* Attributs */
			public $attributes = [];


			/* Balise 'body' */
			public $write = [];

			public $writing = [];


			/* Balise 'Script' independant */
			public $script = [];


			/* Balise 'Script' pour code uniquement */
			public $js = [];



			/* Déclaration */
			public function __construct($attributes = []){

				$this->_Tx = [TPL_INSTANCE_BODY_, CDxB_, func_get_args()];
				

				/* Insertion des attributes */
				foreach ($attributes as $name => $value) {

					$this->attrib($name, $value);

				}



			}



			/* Ecrire directement dans le Corps */
			public function write(){
				foreach (func_get_args() as $value) {
					array_push($this->write, $value);
				}
				return $this;
			}


			/* Ecriture directement généré dans le Corps */
			public function writing(){
				foreach (func_get_args() as $value) {
					array_push($this->writing, $value);
				}
				return $this;
			}


			/* Javascript dans le Corps */
			public function js(){
				foreach (func_get_args() as $value) {
					array_push($this->js, $value);
				}
				return $this;
			}


			/* Script dans le Corps */
			public function script(){
				foreach (func_get_args() as $value) {
					if(is_array($value) || is_string($value)){
						array_push($this->script, $value);
					}
				}
				return $this;
			}




		} // Class 'Body'


	} // If class exists 'Body'






	if(!class_exists('\GGN\DPO\Theme\Content')){
			
		Class Content extends Invoke{
				
			const NAME = 'Gougnon DPO Theme : Contenu Text';
			
			const VERSION = '0.1';
			
			const UPDATE = '150911.0859';


			/* Donnée du contenu */
			public $data = false;



			/* Declaration */
			public function __construct(){
				
				$this->_Tx = [TPL_INSTANCE_CNT_, CDxM_];

				foreach (func_get_args() as $key => $value) {

					if(is_string($value) || is_numeric($value)){
						$this->data = $this->_entities($value . '');
					}

					else{
						$this->data = $value;
					}

				}

			}




			/* Application de l'entité  */
			public function _entities($string = false, $entity = false, $arg = false){

				$entity = ($entity===false && defined('DPO_TPL_CONTENT_ENTITY_')) ? DPO_TPL_CONTENT_ENTITY_: $entity;

				$arg = ($arg===false && defined('DPO_TPL_CONTENT_ENTITY__')) ? DPO_TPL_CONTENT_ENTITY__: $arg;

				if(is_string($string)){

					switch ($entity) {

						case 'utf.8/encode': case 'utf.8': $string = utf8_encode($string); break;
						case 'utf.8/decode': $string = utf8_decode($string); break;
						case 'html.entities/encode': case 'html.entities': $string = htmlentities($string, $arg); break;
						case 'html.special.chars/encode': case 'html.special.chars': $string = htmlspecialchars($string, $arg); break;
						case 'html.entity/decode': $string = html_entity_decode($string, $arg); break;
						case 'html.special.chars/decode': $string = htmlspecialchars_decode($string, $arg); break;


					}

				}

				return $string;
				
			}



			/* Definition de l'entité */
			static public function entities($value = false, $arg = false){

				if(!defined('DPO_TPL_CONTENT_ENTITY_')){define('DPO_TPL_CONTENT_ENTITY_', $value); }

				if(!defined('DPO_TPL_CONTENT_ENTITY__')){define('DPO_TPL_CONTENT_ENTITY__', $arg); }

			}





		} // Class 'Content'


	} // If class exists 'Content'








	if(!class_exists('\GGN\DPO\Theme\Tag')){
			
		Class Tag extends HTMLTags{
				
			const NAME = 'Gougnon DPO Theme : Balise HTML';
			
			const VERSION = '0.1';
			
			const UPDATE = '150911.0859';



			/* Attributs */
			public $attributes = [];


			/* contenu */
			public $htmlLine = 0;


			/* Nom de la balise */
			public $_defaultTagName = 'div';


			/* Paramètre de la balise */
			public $asset;




			/* Declaration */
			public function __construct($attributes = []){
				
				$this->_Tx = [TPL_INSTANCE_TAG_, CDxM_];

				$this->tag = new \_nativeCustomObject();

				$this->asset = new \_nativeCustomObject();

				$this->tagName($this->_defaultTagName);

				/* Insertion des attributes */
				foreach ($attributes as $name => $value) {

					/* Si le paramètre indique le nom de la balise */
					if(strtolower($name) == 'tagname' || strtolower($name) == 'tag'){
						$this->tagName($value);
					}

					/* Sinon */
					else{
						$this->attrib($name, $value);
					}


				}


			}



			/* Gérer le nom de la balise */
			public function tagName($name = 'div'){

				if(isset($this->asset) && is_object($this->asset) && is_string($name)){
					
					$this->asset->tagName = $name;

				}

				return $this;
			}




			/* Contenu brute */
			public function write($string = false){

				if(isset($this->tag) && is_object($this->tag) ){
					
					$this->tag->{$this->htmlLine} = $string;

					$this->htmlLine++;

				}

				return $this;
			}




			/* Contenu singulier */
			public function text($string = false){

				if(isset($this->tag) && is_object($this->tag) ){
					
					$this->tag->{$this->htmlLine} = new Content($string);

					$this->htmlLine++;

				}

				return $this;
			}





			/* Reinitialiser le contenu */
			public function reset(){

				$this->tag = new \_nativeCustomObject();

				$this->htmlLine=0;

				return $this;
			}




			/* Contenu multiple */
			public function content($data = false){

				if(is_array($data) || is_object($data)){

					foreach ($data as $k => $d) {

						$this->text($d);

					}

				}

				return $this;
			}





		} // Class 'Tag'


	} // If class exists 'Tag'







?>