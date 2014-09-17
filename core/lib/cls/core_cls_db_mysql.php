<?php
#this class work with database
#this class use pdo extention for work with mysql database
namespace core\cls\db;

class mysql{
	private $pdo_obj;
	private $Query;
	private $Result;
#this function is construct of class
#perpare database for work with that

function __construct(){
# connect to the database server and select database to work with that

		try{
			$this->connect();
		}
 		catch(PDOException $e) {
			echo "Error In query from database! <br> reason: " , $e->getMessage();
			exit;}
		}	
public function do_query($QueryString,$QueryParamaters = array ("\0")){
		 try{
			if ($QueryString=="" || is_null($this->pdo_obj )){ return 0;}
			 #perpare query string from security
			 
			 $this->Query = $this->pdo_obj->prepare($QueryString);
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
#this function di quary with paameters for find parameters type see pdo_obj below
#http://www.php.net/manual/de/pdo.constants.php
#OR
#http://www.php.net/manual/de/pdostatement.bindvalue.php

public function do_query_with_type($QueryString,$parameters){
	if($this->pdo_obj == null){ $this->connect();}
	try{
		if ($QueryString == "" || is_null($this->pdo_obj)){ return 0;}
			 #perpare query string from security
			 
			 $this->Query = $this->pdo_obj->prepare($QueryString);
			 #going to do query
			 
			 for ($i=0 ; $i<count($parameters) ; $i++){
				 #find type on value
				
					if($parameters[$i][1] == 'integer'){
						$type = \PDO::PARAM_INT;
						$this->Query->bindValue($i+1 ,(int) $parameters[$i][0], $type);
					} 
					else{
						$type = \PDO::PARAM_STR;
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
//this function send back last insert id 
//warring : this function most run after insert query
public function last_insert_id(){
	return $this->pdo_obj->lastInsertId();
}

#this function return obj of last quary
#you can use like this $resultobj->column_name
public function get_object(){
try{
	$this->Quary->setFetchMode(\PDO::FETCH_OBJ);
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
		$this->Query->setFetchMode(\PDO::FETCH_ASSOC); 
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

public function rows_count(){
	#no quary not started yet
	if(is_null($this->Query)){return 0;}
	return $this->Query->rowCount();
}
//this function create pdo_obj to database
private function connect(){
	$options = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',\PDO::ATTR_PERSISTENT => true); 
	$this->pdo_obj = new \PDO("mysql:host=" . DatabaseHost . ";dbname=" . DatabaseName , DatabaseUser, DatabasePassword,$options);
	$this->pdo_obj->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
}
//this function disconnect from database
private function disconnect(){
	$this->pdo_obj = null;
	$this->query = null;
}

//this function Export sql file from database
//if export will be successful output file is created in upload/buffer/database.sql
//warning : this function use mysqldump program.for use this function first check for this program be installed
// if return| =>0 successful complete
//          | =>1 There was a warning during the export
//	    | =>2 There was an error during export. Please check your values
public function export_to_file(){
	$command='mysqldump --opt -h' . DatabaseHost .' -u' . DatabaseUser .' -p' . DatabasePassword .' ' . DatabaseName .' > ' . AppPath . 'upload/buffer/database.sql';
	//run mysqldump program
	exec($command,$output=array(),$result);
	return $result;
}

//this function import sql file to database
//warning: first of all check permission for use this function
//any change with this function can not undo
public function import_from_file($filename){
	if(file_exists($filename)){
		$command='mysql -h' . DatabaseHost .' -u' . DatabaseUser .' -p' . DatabasePassword .' ' . DatabaseName .' < ' . $filename ;
		//run mysql program
		exec($command,$output=array(),$result);
		return $result;
	}
	else{	
		//file not found
		return null;
	}
}
#end of class
}
?>
