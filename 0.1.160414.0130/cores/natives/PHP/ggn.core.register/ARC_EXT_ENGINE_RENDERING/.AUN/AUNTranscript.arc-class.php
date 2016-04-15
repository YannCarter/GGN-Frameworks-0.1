<?php
/*
	Copyright GOBOU Y. Yannick
======================================================
	CLASS applicationUnityNiceARC
	PAGE cores/_natives/PHP/Register.core.g/ARC_ENGINE_RENDING/.AUN/AUNTranscript.arc-class.php
======================================================
	
*/	
/*
	CLASS 'AUNTranscriptUtil'
*/
class AUNTranscriptUtil extends applicationUnityNiceARC{
	
	protected function toTAG($nd){
		if(strtoupper($nd->nodeName)=='#TEXT'){return $nd->nodeValue;}
		return '<'.strtoupper($nd->nodeName).''.self::toTAGAttributes($nd).'>' . $nd->nodeValue . '</'.strtoupper($nd->nodeName).'>';
		}
	
	protected function toTAGAttributes($nd){
		if(!$nd->hasAttributes()){return '';}
		$attrib = array();
		foreach($nd->attributes as $attr){array_push($attrib, ' ' . $attr->nodeName . '="' . self::sterilizeString($attr->nodeValue) . '"');}
		return implode('', $attrib); }
	
	
	}
	

	
	
	
	
	

/*
	CLASS 'AUNTranscript'
*/
	
class AUNTranscript extends AUNTranscriptUtil{
	
	
	protected function __entries($nodeName, $node, $instance){
		$output = array();
		
		if($nodeName=='#TEXT'){$output = [self::textNode($node), self::T_NRMSC];}
		// if($nodeName=='PHPLAYER'){$output = [self::PHPlayerNode($node), self::T_NTS];}
		if($nodeName=='PHPLAYER'){$output = array(self::PHPlayerNode($node), self::T_NTSC);}
		if($nodeName=='HTMLLAYER'){$output = array(self::HTMLlayerNode($node), self::T_NDCWR);}
			
		return $output;}
		
	
	protected function textNode($node){
		return $node->nodeValue;}
	
	
	
	
	protected function PHPlayerNode($node){
		return self::innerNodeByTagName($node, 'PHPLayer');
		// return addslashes($node->nodeValue);
		}
		
	
	
	
	protected function HTMLlayerNode($node){
		return (ltrim(rtrim(self::innerNodeByTagName($node, 'HTMLLayer'))));
		}
	
	
	static protected function inputToOutput($array, $input, $ouput){
		return Gougnon::arrayToString($array, $input, $ouput);}
	
	
	}
	
	
	
	
?>