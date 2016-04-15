<?php
	
	$return = false;

	if(isset($args)){
		// $value = (isset($args[0]))?$args[0]:'';
		$column = (isset($args[0]))?((is_array($args[0]))?$args[0]:false):false;

		$opt = [];
		$opt["row"] = 0;
		$opt["column"] = $column;

			$output = "";
			$output .= self::unitHeader();

				$output .= '$' . self::DVAR . '=[];';
				$output .= '$' . self::DVAR . '["data"]=[];';
				$output .= '$' . self::DVAR . '["option"]=[];';
				$output .= '$' . self::DVAR . '["option"]=\''.self::inputEncoder($opt).'\';';

				
				if(is_array($column)){
					$count = 0;

					/*creation des champs*/
					foreach ($column as $tblk => $tbln) {
						$output .= '$' . self::DVAR . '["data"]["'.$tbln.'"]=[];';
						$count++;
					}

				}
				else{}

			$output .= self::unitFooter();
		$return = $output;
	}


?>