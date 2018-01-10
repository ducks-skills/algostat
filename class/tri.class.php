<?php

class Tri
{
	private $timeExec;
	private $tabNb;
	private $tabTri;
	private $name;


	public function __construct($chaine, $name){
		$this->tabNb = Tri::explodeChain($chaine);
		$this->name = $name;
	}

	public function getTimeExec()  	   { return $this->timeExec;}
	public function getTabNb()       { return $this->tabNb;}
	public function getTabTri()      { return $this->tabTri;}
	public function getName()           { return $this->name;}

	public function setTimeExec($time)  { $this->timeExec($time);}
	public function setTabNb($tab)   { $this->tabNb($tab);}
	public function setTabTri($tab)  { $this->tabTri($tab);}
	public function setName($name)      { $this->name($name);}

	abstract public function triTableau();

	public static function explodeChain($str)
	{
		$str = str_replace(" ", "", $str);
		$str = str_replace(";", ",", $str);
		return explode(",", $str);
	}
}
?>
