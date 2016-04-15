<?php
/*
	License : CC-BY-SA-4.0: Attribution-ShareAlike 4.0 International, 2013 - 2016, Yannick GOBOU
======================================================
	FICHIER 'cores/native.database.php'
======================================================

*/

if(!class_exists('_native')){exit('Classe "Native" introuvable');}


class _nativeDB extends _native{
	
	CONST VERSION = '0.1';
	
	CONST UPDATE_VERSION = '160301.1145';


	CONST RESULTS_METHOD_COLUMN = 'database;method;column.;';
	
	CONST RESULTS_METHOD_COLUMN_OBJECT = 'database;method;column.object.;';

	CONST RESULTS_METHOD_LINE = 'database;method;line.;';
	
	CONST RESULTS_METHOD_LINE_OBJECT = 'database;method;line.object.;';


	
	/* Paramètres */
	protected $host = false;
	
	protected $username = false;
	
	protected $password = false;
	
	protected $prefixe = false;
	
	protected $name = false;
	

	public $connected = false;
	

	public $connexion = false;

	public $_mode = '-pdo';

	// public $tables = [];
	


	
	
	
	
	public function __construct(){
		global $GLANG;
		$this->arguments = func_get_args();
		$this->lang = $GLANG;
		}
	
	
	
	
	public function duplicate(){
		// $inst = new self();
		return self::cloneObject($this);
	}
	
	
	
	
	public function mode($mode){
		$this->_mode = strtoupper($mode);
		}
		
		
		
		
		
	public function log($host, $username, $password, $name, $prefixe){
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->name = $name;
		$this->prefixe = $prefixe;
		}
		
	
	
	
	
	
	/* Connexion */
	public function Connect(){
		if($this->host===false
			|| $this->username===false
			|| $this->password===false
			|| $this->name===false
			|| $this->prefixe===false
			){self::wCnsl($this->lang['DATABASE']['PARAM_NOT_FOUND']);}
		
		if($this->connected===false){
			$this->ConnectSwitch();
			}
		}
		
		
	protected function ConnectSwitch(){
		switch(strtoupper($this->_mode)){
			
			case '-PDO':
				try{
					@$this->connexion = new PDO('mysql:host='.$this->host.';dbname='.$this->name, $this->username, $this->password);
					$this->connected=true;
				}
				catch (Exception $e){self::wCnsl($this->lang['DATABASE']['ERROR_CONNECT']);}
			break;
				
			case '-MYSQL':
				try{
					@$this->connexion = mysql_connect($this->host, $this->username, $this->password) 
						or self::wCnsl($this->lang['DATABASE']['ERROR_CONNECT']);
					@mysql_select_db($this->name, @$this->connexion) 
						or self::wCnsl($this->lang['DATABASE']['ERROR_CONNECT']);
					$this->connected=true;
				}
				catch (Exception $e){self::wCnsl($this->lang['DATABASE']['ERROR_CONNECT']);}
			break;
				
			case '-MYSQLI':
				try{
					@$this->connexion = new mysqli($this->host, $this->username, $this->password, $this->name)
						or self::wCnsl($this->lang['DATABASE']['ERROR_CONNECT']);
					$this->connected=true;
				}
				catch (Exception $e){self::wCnsl($this->lang['DATABASE']['ERROR_CONNECT']);}
			break;
				
			}
			
		}
		
		
		
		
		
	/* Requettes */
	public function Query(){
		$args=func_get_args();
		$que = false;
		$query=(isset($args[0]))?$args[0]:"";

		// var_dump($query); exit;

		/*
			On se connecte à la base de donnée si ce n'est pas
		*/
		if(!is_object($this->connexion) || $this->connexion==false){$this->Connect();}
		

		/* 
			Les entrées 
		*/
		switch(strtoupper($this->_mode)){
			
			case '-PDO':

				$q0 = preg_match_all('#\s*=\s*["\'](.*?)["\']#', $query, $Qu);

				$qA = [];

				$qf = $query;

				foreach ($Qu[0] as $k => $v) {

					$qf = str_replace($v, '=\':var' . $k . '\'', $qf);

					$qA['var' . $k] = $Qu[1][$k];
					
				}

				$que = $this->connexion->prepare($query);

				$que->execute($qA);

				// $que = $this->connexion->query($query);

			break;
				

			case '-MYSQL':

				$que = mysql_query($query, $this->connexion);

			break;
				

			case '-MYSQLI':

				$que = @mysqli_query($this->connexion, $query);

			break;

				
		}
		
		return $que;
	}
		
		
		
		
		

	/* Utils */
	public function sterilized($query){

		switch(strtoupper($this->_mode)){
			
			case '-PDO':
				$query = substr($this->connexion->quote($query), 1, -1);
			break;
				
			case '-MYSQL':
				$query = mysql_real_escape_string($query);
			break;
				
			case '-MYSQLI':
				$query = @$this->connexion->real_escape_string($query);
			break;
				
		}
		
		// var_dump($query); exit;

		return ($query);
	}
		

	public static function getDataPath(){
		return GSTORAGE_DATABASE_TABLES;
	}
		


	/* Tables */
	public function CreateTablesName($name, $value){
		return GVariables::create($name, $value, false, self::getDataPath());
	}
		
	public function GetTablesName($name){
		$n = GVariables::invoke($name, self::getDataPath());
		$d=false;
		if(isset($n['data'])){$d=(is_array($n['data']))?((count($n['data'])>0)?((isset($n['data'][0][0]))?$this->prefixe . $n['data'][0][0]: false):false):false; }
		return $d;
	}
		

	// public function AddTables($name, $value){
	// 	$this->tables[$name] = $this->prefixe . $value;
	// 	}
		
	public function QueryTable($operation, $name, $query = "", $useNativeTbls = false){
		$args=func_get_args();

		$query=(isset($args[2]))?$args[2]:"";
		// $useNativeTbls=(isset($args[3])&&is_string($args[3]))?"'".$args[3]."'":false;
		$table = (($useNativeTbls===false)?$this->GetTablesName($name):$name);

		// var_dump($table);
		// var_dump($useNativeTbls);

		$table = (is_string($table))?$table:$name;
		$result=$this->Query($operation . " " . $table . " " . $query);
		return $result;

	}
	
	public function SelectFromTable($name, $query = "", $useNativeTbls = false){
		$args=func_get_args();
		$inst = $this->duplicate();
		// $query=(isset($args[1]))?$args[1]:"";
		// $useNativeTbls=(isset($args[2]))?$args[2]:false;
		$inst->_query = $this->QueryTable("SELECT * FROM", $name, $query, $useNativeTbls);
		return (($inst->_query==false)?false:$inst);
	}
	
	public function InsertIntoTable($name, $query = "", $useNativeTbls = false){
		$args=func_get_args();
		$inst = $this->duplicate();
		// $query=(isset($args[1]))?$args[1]:"";
		// $useNativeTbls=(isset($args[2]))?$args[2]:false;
		$inst->_query = $this->QueryTable("INSERT INTO", $name, $query, $useNativeTbls);
		return (($inst->_query==false)?false:$inst);
	}
	
	public function UpdateTable($name, $query = "", $useNativeTbls = false){
		$args=func_get_args();
		$inst = $this->duplicate();
		// $query=(isset($args[1]))?$args[1]:"";
		// $useNativeTbls=(isset($args[2]))?$args[2]:false;
		$inst->_query = $this->QueryTable("UPDATE ", $name, $query, $useNativeTbls);
		return (($inst->_query==false)?false:$inst);
	}
	
	public function DeleteFromTable($name, $query = "", $useNativeTbls = false){
		$args=func_get_args();
		$inst = $this->duplicate();
		// $query=(isset($args[1]))?$args[1]:"";
		// $useNativeTbls=(isset($args[2]))?$args[2]:false;
		$inst->_query = $this->QueryTable("DELETE FROM", $name, $query, $useNativeTbls);
		return (($inst->_query==false)?false:$inst);
	}
	
	public function TruncateTable($name){
		$args=func_get_args();
		$inst = $this->duplicate();
		$inst->_query = $this->QueryTable("TRUNCATE TABLE", $name, "");
		return (($inst->_query==false)?false:$inst);
	}
	
	public function DropTable($name){
		$args=func_get_args();
		$inst = $this->duplicate();
		$inst->_query = $this->QueryTable("DROP TABLE", $name, "");
		return (($inst->_query==false)?false:$inst);
	}
	
	public function DropDB($name){
		$args=func_get_args();
		$inst = $this->duplicate();
		$inst->_query = $this->Query($operation . " " . $name);
		return (($inst->_query==false)?false:$inst);
	}
	
	
	
	
	
	
	/* Resultats */
	public function results($method = false){
		if(!isset($this->_query)){return false;}
		if($this->_query==false){return false;}

		$result = [];
		$column = [];
		
		/* Liste de toutes les données par vagues */
		$column = $this->getResultColumn();
		$row = count($column);
			

			
		/* Par ligne */
		if($method===true || $method==self::RESULTS_METHOD_LINE){
			if($row>0){
				foreach($column as $entry => $entryValue){
					array_push($result, $entryValue);	
				}
			}
		}
		
		/* Par ligne avec Objet */
		else if($method==self::RESULTS_METHOD_LINE_OBJECT){
			if($row>0){
				foreach($column as $entry => $entryValue){
					$d = new _nativeCustomObject();
					foreach ($entryValue as $key => $value) {
						$d->{$key} = $value;
					}
					array_push($result, $d);	
				}
			}

		}
		
		/* Par colonne */
		else if($method===false || $method==self::RESULTS_METHOD_COLUMN){
			if($row>0){
				foreach($column as $entry => $entryValue){
					foreach($entryValue as $name => $value){
						$result[$name] = (isset($result[$name]))?$result[$name]: [];
						array_push($result[$name], $value);
					}
						
				}
			}
		}
		
		/* Par colonne avec Objet */
		else if($method==self::RESULTS_METHOD_COLUMN_OBJECT){
			if($row>0){
				$result =  new _nativeCustomObject();
				foreach($column as $entry => $entryValue){
					foreach($entryValue as $name => $value){
						$result->{$name} = (isset($result->{$name}))?$result->{$name}: [];
						array_push($result->{$name}, $value);
					}
						
				}
			}
		}

		
		$this->data = $result;
		$this->row = $row;
		
		return $this;
	}
		
		
		
		
		public function getResultColumn(){
			$column = [];
			if($this->_query==false){return false;}
			
			try{
				switch(strtoupper($this->_mode)){
					case '-PDO':
						while($d = $this->_query->fetch(PDO::FETCH_ASSOC)){array_push($column, $d);}
					break;
						
					case '-MYSQL':
						while($d = mysql_fetch_assoc($this->_query)){array_push($column, $d);}
					break;
						
					case '-MYSQLI':
						while($d = mysqli_fetch_array($this->_query, MYSQLI_ASSOC)){array_push($column, $d);}
					break;
						
					}
					
				}catch(Exception $e){self::wCnsl(_native::inivar('TABLE','Erreur',$this->lang['DATABASE']['QUERY_FAILED']));}


			return $column;
		}
		
		
		
		
		
		/* Fermeture de session */
		public function Close(){

			if($this->connected===true){

				switch(strtoupper($this->_mode)){
					case '-PDO':
						unset($this->connexion);
						$this->connected = false;
					break;
						
					case '-MYSQL':
						mysql_close($this->connexion);
						$this->connected = false;
					break;
						
					case '-MYSQLI':
						$this->connexion->close();
						$this->connected = false;
					break;
						
				}
				

			}

		}
		

	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* Traitement */
	$database = new _nativeDB();
	
	require dirname(__FILE__) . '/settings.database.php';

	// $database->Connect();
	
	

	/* Ajout des tables */
	// require dirname(__FILE__) . '/settings.tables.database.php';





	// $tables = [
	// 	'NATIVE_VARS'=>'native_variables'
	// 	, 'NATIVE_USERS'=>'native_users'
	// 	, 'NATIVE_SESSION'=>'native_session'
	// 	, 'NATIVE_APPS'=>'native_applications'
	// 	, 'NATIVE_USERS_IDENTITY'=>'native_users_identity'
	// 	, 'NATIVE_USERS_IDENTITY_ACTIVE'=>'native_users_identity_active'
	// ];

	// foreach ($tables as $key => $value) {
	// 	// echo ($key . ' -> ' . $value . '<bR>');
	// 	var_dump($database->CreateTablesName($key, $value));

	// 	var_dump($database->GetTablesName($key));
	// }

	// exit;


	/* Chargement des variables natives */
	// $_nativeVarsQuery = $database->SelectFromTable('NATIVE_VARS', "WHERE AVAILABLE='1'");
		
	// 	if($_nativeVarsQuery!==false){
	// 		$_nativeVarsQuery = $_nativeVarsQuery->results();
	// 		if($_nativeVarsQuery->row > 0){
				
	// 			for($x=0; $x < $_nativeVarsQuery->row; $x++){
	// 				$_Gougnon[$_nativeVarsQuery->data['NAME'][$x]] = _nativeCrypt::encoder($_nativeVarsQuery->data['DATA'][$x]
	// 					, strtoupper($_nativeVarsQuery->data['ENCODING'][$x]));

	// 				$_VARS[$_nativeVarsQuery->data['NAME'][$x]] = $_Gougnon[$_nativeVarsQuery->data['NAME'][$x]];

	// 			}
				
	// 		}
	// 	}

	

?>