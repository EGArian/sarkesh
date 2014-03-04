<?php
//this class just suport gregorian and jallali calendar
//it's based on php calendar functions and JDF functions that stored in core/cls/cls_calendar_jallali
class calendar_module{
	private $view;
	
	//this varible is an object from calendar class for example cls_calendar_jallali or cls_calendar_gregorian
	private $cls_calendar;
	//this varible store calendar name for example gregorian or jallali
	private $calendar_name;
	
	function __construct($type = ''){
		//checking what type of calendar classes need;
		if($type == ''){
			$this->calendar_name = $this->get_calendar_name();
			//checking for that jallali is need
			if($local['calendar'] == 'jallali'){
				$this->cls_calendar = new cls_calendar_jallali;
			}
		}
		// set plugin defined type
		else{
			$this->cls_calendar = new $type;
		}
		
	}	
	//this function return calendar name that defined in localize class
	//calendar name stored in localize table -> calendar
	public function get_calendar_name(){
		$localize = new cls_localize;
		$local = $localize->get_localize();
		return $local['calendar'];
	}
	
	//this function return time with template that you input
	//$tr_num can be en and fa for write outputs . 
	//farsi outputs is just for show on page and can not proccess that with PHP 
	//if you want to use gregorian calendar don't input $time_zone and $tr_num
	public function sdate($format, $timestamp='',$time_zone='',$tr_num='' ){
		if($this->calendar_name == 'gregorian'){
			return date($format, $timestamp);
		}
		elseif($this->calendar_name == 'jallali'){
			return $this->calendar->sdate($format, $timestamp, '', $time_zone, $tr_num);
		}
	
	}
	
	//this function is like sdate function but use for output in a paragraph
	public function sstrftime($format, $timestamp='',$time_zone='',$tr_num=''){
		if($this->calendar_name == 'gregorian'){
			return strftime($format, $timestamp);
		}
		elseif($this->calendar_name == 'jallali'){
			return $this->calendar->jstrftime($format, $timestamp, '', $time_zone, $tr_num);
		}
	}
	//for more information about this function search mktime in php.net site.
	public function smktime($hour , $minute , $second , $month , $day , $year , $is_dst='-1'){
		if($this->calendar_name == 'gregorian'){
			return mktime($hour , $minute , $second , $month , $day , $year , $is_dst);
		}
		elseif($this->calendar_name == 'jallali'){
			return $this->calendar->jmktime($hour , $minute , $second , $month , $day , $year , $is_dst);
		}
	}
	
	//this function get date/time information.
	//for more information see http://us3.php.net/manual/en/function.getdate.php
	public function sgetdate($timestamp='',$none='',$tz='',$tn=''){
		if($this->calendar_name == 'gregorian'){
			return getdate($timestamp);
		}
		elseif($this->calendar_name == 'jallali'){
			return $this->calendar->jgetdate( $timestamp , $none , $time_zone , $tr_num );
		}
	}
	//this function check date that is cerrect or not
	// if date was cerrect this function return true else return false
	public function scheckdate($month , $day , $year ){
		if($this->calendar_name == 'gregorian'){
			return checkdate($month , $day , $year);
		}
		elseif($this->calendar_name == 'jallali'){
			return $this->calendar->jcheckdate($month , $day , $year );
		}
	}

}
?>