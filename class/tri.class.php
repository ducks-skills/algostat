<?php

class Tri
{
	private $timeExec;
	private $chaineNb;
	private $chaineTri;
	private $name;

	
	public function __construct($chaine){
		$this->chaineNb = $chaine;
	}

	public getTimeExec()  	   { return $timeExec;}
	public getChaineNb()       { return $chaineNb;}
	public getChaineTri()      { return $chaineTri;}
	public getName()           { return $name;}

	public setTimeExec($time)  { $this->timeExec($time);}
	public setChaineNb($tab)   { $this->chaineNb($tab);}
	public setChaineTri($tab)  { $this->chaineTri($tab);}
	public setName($name)      { $this->name($name);}
	
	abstract public function triTableau();
}
?>
