<?php
	

global $_Gougnon;


	$this->requireSlashPathARCRenderClass('COM.SERVICES/default');


	$serv = [];


	foreach(explode('/',$this->gFile) as $k => $value){

		if($k>0){

			array_push($serv, $value);

		}

	}



	$Services = new GGN_COM_SERVICES(implode('/', $serv));

	$Services->Register = $this;

	$Services->Load();
	
	$Service = $Services->ToJSON();



	if(!is_string($Service)){

		echo '{"response":"internal.error:service.var.not.found"}';

	}
	

	else{

		_native::write($Service);
		
	}

	
?>