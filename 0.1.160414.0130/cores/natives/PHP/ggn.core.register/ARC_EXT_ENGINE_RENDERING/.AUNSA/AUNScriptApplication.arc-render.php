<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS AUNScriptApplication
	PAGE cores/_natives/PHP/Register.core.g/ARC_ENGINE_RENDING/.AUNSA/AUNScriptApplication.arc-render
======================================================

	Moteur de rendu de script AUN
	
*/

/*
	CLASS 'AUNScriptApplication'
*/

class AUNScriptApplication extends Render{
	
	public function __construct(){
		global $GLANG;
		$this->syslang = $GLANG;
		$this->arguments = func_get_args();
		$this->file = $this->arguments[0];
		$this->path = dirname($this->file) . '/';
		$this->lang = _native::loadLang(_LANG_ . '/AUN.ini');
		}
		
		
		
	public function loadScript(){
		include $this->file;
		}
	
	}

	

	

	$this->Render = new AUNScriptApplication($this->file);
	$this->Render->loadScript();
	
?>