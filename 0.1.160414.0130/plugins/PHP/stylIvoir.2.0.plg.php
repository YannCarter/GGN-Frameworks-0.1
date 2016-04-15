<?php

// global $_Gougnon, $database;




if(!class_exists('StylIvoir')){


class StylIvoir{



	CONST NAME = 'StylIvoir Controller';

	CONST VERSION = '2.0';

	CONST REEL_VERSION = '160218.0830';




	/*
		Tables
	*/
	CONST TBL_PREFIX = 'styliv_';




	/*
		Blogs
	*/
	CONST BTYPE_PREFIX = 'stylivoir/blog/';



	/*
		Paramètres depuis le constreur
	*/
	var $ARGS=[];





	/*
		Option : Critères de Recherche par type de Blogs
	*/
	var $BlogCriterions = [


		/* Boutiques */
		
		'boutiques' => [
		
			'accessoires de beauté//checkbox'
		
			,'bijouterie / joaillerie//checkbox'

			,'chaussures dame//checkbox'

			,'chaussures enfant//checkbox'

			,'chaussures homme//checkbox'

			,'cosmétique//checkbox'

			,'lunetterie//checkbox'

			,'parfumerie//checkbox'

			,'vêtements dame//checkbox'

			,'vêtements enfant//checkbox'

			,'vêtements homme//checkbox'
		
		]






		/* Coutures */
		
		,'coutures' => [
		
			'dame//checkbox'

			,'enfant//checkbox'

			,'homme//checkbox'
		
		]






		/* Esthétique */
		
		,'esthetiques' => [
		
			'coiffure' => 'coiffure//checkbox'

			,'fitnessSpa' => 'fitness / spa//checkbox'
			
			,'cure' => 'manicure / pédicure//checkbox'
			
			,'maquillage' => 'maquillage//checkbox'
			
			,'massage' => 'massage//checkbox'
			
			,'bodyCare' => 'soins du corps et visage//checkbox'
		
		]





		/* Casting */
		
		,'castings' => [
		

			'teint'=>[
		
				'noir'
		
				,'blanc'
		
				,'clair'
		
				,'métis'
		
				,'européen'
		
				,'asiatique'
		
				,'arabe'
		
				,'albinos'
		
				,'rouquin'
		

			]
		
		
			,'piercing'=>[
		
				'sourcil'
		
				,'nez'
		
				,'lèvre'
		
				,'langue'
		
				,'menton'
		
				,'nombril'
		
				,'joue'
		
			]
		

			,'tatouage'=>[
		
				'cou'
		
				,'torse'
		
				,'bras'
		
				,'dos'
		
				,'jambe'
		
			]
		
		
			,'taille' => 'cm//number'

			,'poids' => 'kg//number'
		
		]


	];





	var $AccountType = [

		0=>[

			'slug'=>'subscriber.choose.prefs'

			,'name'=>'abonnés'

			,'icon'=>'thumb_up'

			,'about'=>'dédié aux personne qui recherche des produits ou des services...'

		]



		,1=>[

			'slug'=>'user.create.blog'

			,'name'=>'utilisateur'

			,'icon'=>'person'

			,'about'=>'dédié aux boutiques, salons de couture, salons d\'ethétique, acteurs, mannequin...'

			,'child'=>[

				0=>[

					'slug'=>'user.create.blog.shop'

					,'name'=>'boutique'

					,'key'=>'boutiques'

					,'icon'=>'shopping_cart'

					,'about'=>'vêtements, chaussures, accessoires de beautés...'

				]

				,1=>[

					'slug'=>'user.create.blog.sewing'

					,'name'=>'couture'

					,'key'=>'coutures'

					,'icon'=>'content_cut'

					,'about'=>'homme, dame et enfant...'

				]

				,2=>[

					'slug'=>'user.create.blog.aesthetic'

					,'name'=>'Esthétique'

					,'key'=>'esthetiques'

					,'icon'=>'face'

					,'about'=>'spa, pédicure, manicure, soins de visage...'

				]

				,3=>[

					'slug'=>'user.create.blog.casting'

					,'name'=>'Casting'

					,'key'=>'castings'

					,'icon'=>'star_border'

					,'about'=>'Acteur, mannequin...'

				]

			]


		]

	];






	
	public function __construct(){

		global $database;


		$this->ARGS = func_get_args();


		$this->Tables = new \_nativeCustomObject();

		$this->Tables->UserAccountType = self::TBL_PREFIX . 'user_account_type';

		$this->Tables->UserCriterions = self::TBL_PREFIX . 'user_criterions';
		
	}




	/*

		Type de compte // DEBUT -----------------------
		
	*/

		public function chooseNewAccountType(){

			global $database;

			header('location:' . HTTP_HOST . 'userGetStarted?choose.new');

			exit;

		}





		public function denyOtherAccountType($t = false, $allow){

			global $database;


			if(is_string($t) || is_numeric($t)){

				
				$type = $this->getAccountType($t);

				if(is_array($type)){

					if($t==$allow){

						return true;
						
					}

				}

			}

			header('location:' . HTTP_HOST . 'accountTypeDenied.html?allow=' . $allow);

			exit;

		}





		public function isChildOfAccountType($t, $child = false){

			global $database;

			$t*=1;


			if(is_numeric($t)){


					
				if($t===0){

					return true;

				}


				if($t===1){

					$arr = explode(' ', 'boutiques coutures esthetiques castings');

					if(in_array( $child, $arr )){

						foreach ($arr as $key => $value) {

							if(trim(strtolower($child)) == trim(strtolower($value))){

								return $key;break;

							}
							
						}

					}

					else{

						return false;

					}

				}


			}

			return false;

		}





		public function getAccountType($t = false){

			global $database;


			if(is_string($t) || is_numeric($t)){

				
				$type = isset($this->AccountType[$t]) ? $this->AccountType[$t] : false;

				if(is_array($type)){

					return $type;

				}


			}

			return false;

		}







		public function getUserAccountType($ukey = false){

			global $database;


			if(is_string($ukey)){

				return self::SelectFromTable($this->Tables->UserAccountType, "WHERE UKEY='" . $ukey . "' AND AVAILABLE='1'");

			}

			return false;

		}






		public function setUserAccountType($ukey = false, $type = false){

			global $database;


			if(is_string($ukey) && is_numeric($type)){

				return self::InsertIntoTable($this->Tables->UserAccountType, " VALUES(NULL, '" . $ukey . "', '" . $type . "', '" . time() . "', '1') ");

			}

			return false;

		}

	/*

		Type de compte // FIN -----------------------
		
	*/
	







	/*

		Blog Utilisateurs // DEBUT -----------------------
		
	*/
	


		

		public function BlogIconByType($t){

			$ic = 'user';

			if(is_string($t)){

				$xt = explode('/', $t);

				$rxt = array_reverse($xt);


				switch (strtolower($rxt[0])) {

					case 'boutiques': $ic = 'shopping-cart';break;

					case 'coutures': $ic = 'cut';break;

					case 'esthetiques': $ic = 'hand-open';break;

					case 'casting': $ic = 'star';break;

				}


			}

			return $ic;

		}



		

		public function BlogTypeN($t){

			$ic = '';

			if(is_string($t)){

				$xt = explode('/', $t);

				$rxt = array_reverse($xt);

				$ic = $rxt[0];

			}

			return $ic;

		}




		public function UserBlogBySlug($slug = false, $available = '1'){

			if(is_string($slug)){

				return self::SelectFromTable('NATIVE_USERS_BLOGS', "WHERE SLUG='" . $slug . "' AND AVAILABLE='" . $available . "'");

			}

			return false;

		}




		public function GetBlogs($query = ""){

			if(is_string($query)){

				return self::SelectFromTable('NATIVE_USERS_BLOGS', $query);

			}

			return false;

		}




		public function GetUser($query = ''){

			if(is_string($query)){

				return self::SelectFromTable('NATIVE_USERS', $query);

			}

			return false;

		}




		public function UserBlog($ukey = false, $available = '1'){

			if(is_string($ukey)){

				return self::SelectFromTable('NATIVE_USERS_BLOGS', "WHERE UKEY='" . $ukey . "' AND AVAILABLE='" . $available . "'");

			}

			return false;

		}




		public function CreateUserBlog($UKEY = false, $title = false, $about = '', $slug = false, $bType = false, $country = '', $city = ''){

			// global $database;


			if(is_string($UKEY) && is_string($title) && is_string($bType) && is_string($slug) ){

				$get = $this->UserBlogBySlug($slug);

				if($get->row <= 0){

					$BID = \_nativeCrypt::RKCRandm(\_nativeCrypt::PALETTE_iALPHA, 3) . \_nativeCrypt::RKCRandm(\_nativeCrypt::PALETTE_NUMERIC, 7) . time(); 

					self::InsertIntoTable('NATIVE_USERS_BLOGS', " VALUES(NULL, '".$BID."', '".$UKEY."', '".addslashes(utf8_encode($title))."', '".addslashes(utf8_encode($about))."', '".$slug."', '".self::BTYPE_PREFIX . $bType."', '".$country."', '".$city."', '".time()."', '1') ");

						return true;

				}

				else{

					return null;

				}

			}

			return false;

		}




	/*

		Blog Utilisateurs // FIN -----------------------
		
	*/
	












	/*

		Critères Utilisateurs // DEBUT -----------------------
		
	*/


		public function addUserCriterions($BID = false, $name = false, $value = ''){

			global $database;


			if(is_string($BID) && is_string($name)){

				self::InsertIntoTable('NATIVE_USERS_BLOGS_CRITERIONS', " VALUES(NULL, '".$BID."', '".$name."', '".addslashes(utf8_decode($value))."', '1') ");

			}

			return false;

		}


	
	/*

		Critères Utilisateurs // FIN -----------------------
		
	*/
	









	/*

		Critères de recherche // DEBUT -----------------------
		
	*/


	public function getCriterionsToDPO($Node = false, $BlogType = false, $select = false, $showLD = false){


		$Criterions = isset($this->BlogCriterions[$BlogType]) ? $this->BlogCriterions[$BlogType] : false;


		if(!is_object($Node) || !is_array($Criterions)){

			return false;

		}


		foreach($Criterions as $crk => $Criterion) { 

			$id = 'blog-type-criterion-' . $BlogType . '-' . $crk;

			$Op = (new \GGN\DPO\Theme\Tag([
				'class'=>'list-item col-16'
			]));


			if(is_string($Criterion)){

				$ex = explode('//', $Criterion);

				$label = $ex[0];

				$type = isset($ex[1]) ? $ex[1] : 'text';

				$lind = '';

				$clz = $type == 'number' ? 'col-3' : '';


					$llbl = '<label for="' . $id . '" class=" s-col-7 mi-col-7">' . ucfirst($label) . '</label>';

					$linp = '<input checkbox-scope="Citerion" type="' . $type . '" class="' . $clz . ' " name="' . $crk . '" value="' . $label . '" id="' . $id . '" ';


					if($type == 'number' || $type == 'radio' || $type == 'checkbox'){

						if($type == 'number' && $showLD==false){

							$lind = '/ De&nbsp;&nbsp;<input type="number" name="' . $crk . '-nbr-from" class="col-3" >&nbsp;&nbsp;à&nbsp;&nbsp;';
							
						}
					
						$Op->text( ((!is_numeric($crk) && $BlogType=='castings') ? ucfirst($crk) .'&nbsp;&nbsp;&nbsp;' : '') . $lind . ' ' . $linp . '>&nbsp;&nbsp;&nbsp;' . $llbl); // $showLD===true

					}

					else{
					
						$Op->text($llbl . '&nbsp;&nbsp;&nbsp;' . $linp . ' >');

					}


				;

			}


			if(is_array($Criterion)){


				$Op->text('<h4 class="h1 color-primary">' . ucfirst($crk) . '</h4>');

				foreach ($Criterion as $mck => $cprt) {

					$id = 'blog-type-criterion-' . $BlogType . '-' . $crk . '-' . $mck;

					
					$Op
						->text('<div class="col-16 gui flex row">')

						->text('<input checkbox-scope="Citerion" type="' . ($crk=="teint" && $showLD==true ? 'radio': 'checkbox') . '" name="' . $crk . '[]" value="' . $mck . '" id="' . $id . '">&nbsp;&nbsp;')

						->text('<label for="' . $id . '" >' . $cprt . '</label>')

						->text('</div>')

					;

				}


			}

			$Node->tag->{'Option-' . $crk} = $Op;
			

		}


		return $Node;


	}
	

		
	/*

		Critères de recherche // FIN -----------------------
		
	*/
		








	/*

		SQL // DEBUT -----------------------
		
	*/
	
	static public function SelectFromTable($tbl = false, $q = false, $dlt = false){

		global $database;


		if(is_string($tbl) && is_string($q)){

			$query = $database->SelectFromTable($tbl, $q, $dlt);

			if(is_object($query)){

				$query->results($database::RESULTS_METHOD_LINE_OBJECT);

				return $query;

			}

			else{

				\_native::wCnsl('<h1>StylIvoir SQL Error Manager</h1> Erreur Requette');

			}

		}

		else{

			\_native::wCnsl('<h1>StylIvoir SQL Error Manager</h1> Aucune table définie');

		}


	}

	static public function InsertIntoTable($tbl = false, $q = false){

		global $database;


		if(is_string($tbl) && is_string($q)){

			return $database->InsertIntoTable($tbl, $q, false);

		}

		else{

			return false;

		}


	}

	/*

		SQL // FIN -----------------------
		
	*/
	







}






}


?>