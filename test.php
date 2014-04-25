<?php
function array_to_xml(array $arr, SimpleXMLElement $xml)
{
    foreach ($arr as $k => $v) {
        is_array($v)
            ? array_to_xml($v, $xml->addChild($k))
            : $xml->addChild($k, $v);
    }
    return $xml;
}

function simple_array_to_xml($arr, $root){
	return $this->array_to_xml($arr, new SimpleXMLElement('<' . $root .'/>'))->asXML() 
}
$test_array = array (
    'bla' => 'blub',
    'foo' => 'bar',
    'another_array' => array (
        'stack' => 'overflow',
    ),
);
echo array_to_xml($test_array, new SimpleXMLElement('<root/>'))->asXML();
