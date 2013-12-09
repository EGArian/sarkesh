<?php
#this class work with database
#this class use pdo extention for work with mysql database

class cls_database{
	private $Link;
	private $Query;
	private $Result;
#this function is construct of class
#perpare database for work with that

function __construct(){
# connect to the database server and select database to work with that

		try{
			$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',); 
			$this->Link = new PDO("mysql:host=" . DatabaseHost . ";dbname=" . DatabaseName , DatabaseUser, DatabasePassword,$options);
			$this->Link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			}
 		catch(PDOException $e) {
			echo "Error In query from database! <br> reason: " , $e->getMessage();
			exit;}
		}	
public function do_query($QueryString,$QueryParamaters = array ("\0")){
	  try{
		 	 if ($QueryString=="" || is_null($this->Link )){ return 0;}
			 #perpare query string from security
			 
			 $this->Query = $this->Link->prepare($QueryString);
			 #going to do query
			 
			 if($QueryParamaters[0]=="\0"){
		 			$this->Result=$this->Query->execute();
			 }
			 else{
					$this->Result=$this->Query->execute($QueryParamaters);
	 		 }
			return $this->Result;
			
			
		}
	 catch(PDOException $e) {
		echo "Error In query from database! <br> reason: " , $e->getMessage();
		exit;
	 }
}
#this function di quary with paameters for find parameters type see link below
#http://www.php.net/manual/de/pdo.constants.php
#OR
#http://www.php.net/manual/de/pdostatement.bindvalue.php

public function do_query_with_type($QueryString,$parameters){
	try{
		if ($QueryString == "" || is_null($this->Link)){ return 0;}
			 #perpare query string from security
			 
			 $this->Query = $this->Link->prepare($QueryString);
			 #going to do query
			 
			 for ($i=0 ; $i<count($parameters) ; $i++){
				 #find type on value
				
					if($parameters[$i][1] == 'integer'){
						$type = PDO::PARAM_INT;
						$this->Query->bindValue($i+1 ,(int) $parameters[$i][0], $type);
					} 
					else{
						$type = PDO::PARAM_STR;
						$this->Query->bindValue($i+1 ,$parameters[$i][0], $type);
					 }
				 
				 #---------------------------------------------
			
			 }
		$this->Result=$this->Query->execute();
	}
	catch(PDOException $e) {
		_e("Error In query from database! <br> reason:");
		echo  $e->getMessage();
		exit;
	 }
}
#this function return obj of last quary
#you can use like this $resultobj->column_name

public function get_object(){
try{
	$this->Quary->setFetchMode(PDO::FETCH_OBJ);
	return $this->Query;
}
 catch(PDOException $e) {
		echo "Error In quary from database! <br> reason: " , $e->getMessage();
		exit;
 }	
		
}
#this function return array of last query

public function get_array(){
	try{
		$this->Query->setFetchMode(PDO::FETCH_ASSOC); 
		return $this->Query->fetchAll();
	}
 	catch(PDOException $e) {
		echo "Error In query from database! <br> reason: " , $e->getMessage();
		exit;
 	}			
}
#this function return first column of query in array

public function get_first_row_array(){
	$result=$this->get_array();
	foreach ($result as $row ){return $row;}
}
#ths function return number of rows that return in last query

function rows_count(){
	#no quary not started yet

	if(is_null($this->Query)){return 0;}
	return $this->Query->rowCount();
}
#end of class
}
?>