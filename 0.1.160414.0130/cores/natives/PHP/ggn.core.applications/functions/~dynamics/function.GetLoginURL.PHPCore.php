<?php
	
	$return = false;


	if(is_object($context)){
		$message = (isset($args[0]))?'&message='  . $args[0]:'';
		$return = _native::setvar(_native::varn('LOGIN_PAGE') 
			. '?next=' 
			. urlencode(Gougnon::currentURL())
			. $message
			);
	}



?>