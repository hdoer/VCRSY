<?php
session_start();
class Person
{
	private $iduser;
	private $email;
	private $name;
	private $rank;
	public function __construct($iduser,$email,$name,$rank)
	{
		$this->iduser = $iduser;
		$this->email = $email;
		$this->name = $name;
		$this->rank = $rank;
	}
	public function __set($property_name, $value)
	{
		$this->$property_name = $value;
	}
	public function __toString()
	{
		return $this;
	}
	public function getElement($parameter)
	{
		return $this->$parameter;
	}
}
?>
