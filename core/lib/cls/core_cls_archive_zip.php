<?php
	namespace core\cls\archive;
	//this class is for working with tar.gz
	class zip{
		private $zip;
		function __construct($file_name){
			$this->zip = new ZipArchive;
			if ($this->zip->open($file_name) === FALSE) {
				exit( _('can not open zip archive files'));	
			}
		}
		function __destruct(){
			//close zip file
			@$this->zip->close();
		}
		public function extract($address){
			if(is_dir($address)){
				$this->zip->extractTo($address);
				return true;
			}

		}
	
	}


?>
