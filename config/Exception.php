<?php
class dbconnectException extends Exception{
	function __toString(){
		return "<strong style='color:red'>DBconnectException".$this->getCode().":".$this->getMessage()."<br /> in ".$this->getFile()." on line ".$this->getLine()."<br />";
	}
}
class dbqueryException
{
	function __toString(){
		return "<strong style='color:red'>DBqueryException".$this->getCode().":".$this->getMessage()."<br /> in ".$this->getFile()." on line ".$this->getLine()."<br />";
	}
}
?>