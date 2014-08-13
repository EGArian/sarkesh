<?php

/**
 * @author babak alizadeh
 * @copyright 2014 gnu gpl v3
 * this class is for working with strings
 */
 
 class cls_string extends cls_object{
    
    //THIS VARIABLE STORE VALUE OF OBJECT
    public $Value;
    
    
    //this variable set lenght of value
    public $Lenght;
    
    public function __construct($value = ''){
        $this->Value = $value;
        $this->Lenght = $this->GetLength();
    }
    
    //this function return length of $this->value
    
    private function GetLength(){
        return strlen($this->Value);
    }
    
    //this function vhange all of string to upper case
    
    public function ToUpper(){
        
        $this->value = strtoupper($this->value);
    }
    
    
    //this function change $this->value to lover case
    public function ToLower(){
       $this->value = strtolower($this->value); 
    }
    
 }



?>