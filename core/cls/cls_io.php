<?php
//THIS CLASS FILTER INPUT AND OUTPUT STRINGS
//To know and use filter types visit http://www.php.net/manual/en/filter.filters.php
class cls_io{
	public $FilterType;
	########################################
	
	function cin($VaribleName,$Type="get",$Filter=515,$Flags=""){
		#change const to integer
		$filter_num = $Filter;
		if($VaribleName == "" || $Filter=""){ return 0;	}
		try{
			switch ($Type){
				case "get";
				if ($Flags==""){	$Result=filter_input(INPUT_GET,$VaribleName,$filter_num);}
				else {	$Result=filter_input(INPUT_GET,$VaribleName,$filter_num,$Flags);	}
				break;
				case "post";
				if ($Flags!==""){	$Result=filter_input(INPUT_POST,$VaribleName,$filter_num);	}
				else {	$Result=filter_input(INPUT_POST,$VaribleName,$filter_num,$Flags);	}
				break;
				case "cookie";
				if ($Flags!==""){	$Result=filter_input(INPUT_COOKIE,$VaribleName,$filter_num);	}
				else {	$Result=filter_input(INPUT_COOKIE,$VaribleName,$filter_num,$Flags);	}
				break;
				case "server";
				if ($Flags!==""){	$Result=filter_input(INPUT_SERVER,$VaribleName,$filter_num);	}
				else {	$Result=filter_input(INPUT_SERVER,$VaribleName,$filter_num,$Flags);	}
				break;
				case "request";
				if ($Flags!==""){	$Result=filter_input(INPUT_SERVER,$VaribleName,$filter_num);	}
				else {	$Result=filter_input(INPUT_REQUEST,$VaribleName,$filter_num,$Flags);	}
				break;
			}
		}
		catch(Exception $ex){
			#is invalid type
			return 0;
		}	
		$this->FilterType=$Filter;	
		return $Result;
	}
		
	########################################
	
			
	########################################
	function cout($VaribleName,$Type="inner",$Filter='FILTER_SANITIZE_SPECIAL_CHARS',$Flags=""){
		echo $Input;
		return 1;
	}
	
	
	
	//END CLASS
}
?>