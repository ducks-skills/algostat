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

	public getTimeExec()  	   { return $this->timeExec;}
	public getTabNb()       { return $this->tabNb;}
	public getTabTri()      { return $this->tabTri;}
	public getName()           { return $this->name;}

	public setTimeExec($time)  { $this->timeExec($time);}
	public setTabNb($tab)   { $this->tabNb($tab);}
	public setTabTri($tab)  { $this->tabTri($tab);}
	public setName($name)      { $this->name($name);}

	abstract public function triTableau();

	public static function explodeChain($str)
	{
		$str = str_replace(" ", "", $str);
		$str = str_replace(";", ",", $str);
		return explode(",", $str);
	}
}
?>
