<?php
	
	$return = false;

	if(is_object($context)){


		$message = (isset($args[0]))?'&message='  . $args[0]:'';
		$location = _native::setvar(_native::varn('LOGIN_PAGE') 
			. '?app='.$context->Key.'&next=' 
			. urlencode(Gougnon::currentURL())
			. $message
			);


		if($context->ajaxRun==false){
			if(@header('location:' . $location)){exit;}
		}
		else if($context->ajaxRun==true){
			echo ('<script type="text/javascript">location.href="'.$location.'";</script>'); exit;
		}
		 
	}



?>