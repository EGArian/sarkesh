<?php
/*
 * This class is for working with xml data
 */
 class cls_xml{
	private function array_to_xml(array $arr, SimpleXMLElement $xml){
		foreach ($arr as $k => $v) {
			is_array($v)
				? $this->array_to_xml($v, $xml->addChild($k))
				: $xml->addChild($k, $v);
		}
		return $xml;
	}
	// Thos function change array to xml
	//$arr is input array and $root is root tag of xml data
	public function simple_array_to_xml($arr, $root){
		return $this->array_to_xml($arr, new SimpleXMLElement('<' . $root .'/>'))->asXML();
	}
 }

?>
