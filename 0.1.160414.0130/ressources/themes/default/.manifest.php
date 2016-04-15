<?php
	global $_Gougnon;

	if(!isset($this->manifest)){exit('Accèss réfusé');}



	/* 
		Petite vérification
	*/
	$_NATIVES_VARS = 'SYSTEM_THEME_STYLE';
	
	_native::keyExists(explode(' ', $_NATIVES_VARS), $_Gougnon);


	
	

	/* 
		Auteur du theme
	*/
	$this->manifest->author['name'] = 'GOBOU Y. Yannick';
	
	$this->manifest->author['email'] = 'qaidyann@Gougnon.com';
	
	$this->manifest->author['about'] = 'WebDevelopper';
	


	/* 
		Info du theme
	*/
	$this->manifest->theme['name'] = 'GGN.Default';
	
	$this->manifest->theme['version'] = '0.1';

	$this->manifest->theme['copyright'] = '&copy; 2015 GOBOU Y. Yannick';

	$this->manifest->theme['powered'] = 'Propulsé par ' . \_native::SYSTEM_NAME . ' ' . \_native::SYSTEM_VERSION . ', http://gougnon.com/core';


	
	
	/* 
		Thème pour ordinateur 
	*/
	$this->manifest->computer = [];
	
	$this->manifest->computer['prefixe'] = 'ggn.';


	/* 
		Brique
	*/
	$this->manifest->computer['Slider'] = 'slider/normal';

	$this->manifest->computer['Box.Normal'] = 'box/normal';

	$this->manifest->computer['Form.Box'] = 'form/box';

	$this->manifest->computer['Section.Error'] = 'section/error';









	/* 
		Initialisation
	*/


	/* 
		Chemin des données
	*/
	$this->_path = 'default/';
	

	/* 
		URL des données
	*/
	$this->_url = \HTTP_HOST . $this->_path;
	

	/* 
		Style du package du theme
	*/
	$this->style = \_native::varn('SYSTEM_THEME_STYLE');
		







	/* 
		Donnée pour type de page
	*/

	/* 
		Page : Toutes
	*/

	$this->manifest->package->js->add('ggn.gabarit');



	$this->manifest->package->css->add('ggn.effects')

		->add('ggn.layout')
		
		->add('ggn.gabarit')
		
		->add('ggn.effects')

		->add('ggn.icons')

		->add('font.roboto.thin')

		->add('font.roboto.bold')

		->add('font.roboto.condensed.regular')


	;

	$this->manifest->links->add( $this->_url . 'normal.css?style=' . $this->style);







	/* 
		Page : Home
	*/

	/* Packages */

	/* CSS */
	$this->manifest->package->css->home = $this->manifest->node();

	$this->manifest->package->css->home->add('');


	/* Fichier JS */
	$this->manifest->scripts->home = $this->manifest->node();

	$this->manifest->scripts->home->add($this->_url . 'normal.js?style=' . $this->style);


	/* Tag 'link' */
	$this->manifest->links->home = $this->manifest->node();

	// $this->manifest->links->home->add($this->_url . 'home.css');







	/* 
		Page : Login
	*/

	/* Packages */

	/* CSS */
	$this->manifest->package->css->login = $this->manifest->node();

	$this->manifest->package->css->login->add('');


	/* Fichier JS */
	// $this->manifest->scripts->login = $this->manifest->node();

	// $this->manifest->scripts->login->add($this->_url . '');


	/* Tag 'link' */
	$this->manifest->links->login = $this->manifest->node();

	$this->manifest->links->login->add($this->_url . 'connect.login.css');







	/* 
		Page : Error
	*/

	/* Packages */

	/* CSS */
	$this->manifest->package->css->error = $this->manifest->node();

	$this->manifest->package->css->error->add('font.roboto.thin');


	/* Fichier JS */
	// $this->manifest->scripts->error = $this->manifest->node();

	// $this->manifest->scripts->error->add($this->_url . '');


	/* Tag 'link' */
	$this->manifest->links->error = $this->manifest->node();

	$this->manifest->links->error->add($this->_url . 'error.page.css?style=' . $this->style);




	
?>