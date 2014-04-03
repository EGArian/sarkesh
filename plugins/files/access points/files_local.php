<?php
		/*
		 * 	By Babak Alizadeh <alizadeh.babak@live.com>
		 * 	
		 * 	This class is for access to files that store on local machine
		 * 	Before use this class sent options to that
		 * 	Option for this class is place of saved files
		 * 	
		 */
		 
class files_local{
				
		private $local_adr;
		
		// WARNING : $local_adr should end with "/" character
		function __construct($local_adr){
			$this->local_adr = AppPath . $local_adr;
		}
		
		//this function save temp file in a places and send back address of that
		public function save_temp_file($file){
			//before use this function check for that file is uploaded successful with no errors
			$random_string = cls_general::random_string(10,'NC');
			$address = $this->local_adr . $random_string . '.' . $file['name'];
			if(! file_exists($address)){
				move_uploaded_file($file['tmp_name'], $address);
			}
			//return address of file
			return $random_string . '.' . $file['name'];			
		}
		
		
}
?>