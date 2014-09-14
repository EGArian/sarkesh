<?php
	namespace core;
	//this class is filled with html object and control that comes from browser
	class uiobjects{
		private $elements;
		
		function __construct($elements_string){
			$mains = explode("<!!>" , $elements_string);
			//This variable store all elements options
			$element;
			for($i=0; $i< max(array_keys($mains)); $i +=2){
				$options = explode("<!>",$mains[$i+1]);
				for($j=0; $j< max(array_keys($options)); $j += 2){
					$element[$options[1]][$options[$j]] = $options[$j +1];
				}
			}
			$this->elements = $element;
		}
		
		//this function return all elements in array type that send by javascript
		
		public function get_elements(){
			return $this->elements;
		}
		
		
	}
?>
