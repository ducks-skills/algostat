<?php

class Tri
{
	protected $timeExec;
	protected $tabNb;
	protected $tabTri = array();
	protected $name;
	protected $itNb;


	public function __construct($chaine, $name){
		$this->tabNb = Tri::explodeChain($chaine);
		$this->name = $name;
	}

	public function getTimeExec()  	{ return $this->timeExec;	}
	public function getTabNb()      { return $this->tabNb;		}
	public function getTabTri()     { return $this->tabTri;		}
	public function getName()       { return $this->name;			}
	public function getItNb()				{ return $this->itNb;			}

	public function setTimeExec($time)  { $this->timeExec = $time;	}
	public function setTabNb($tab)   		{ $this->tabNb = $tab;			}
	public function setTabTri($tab)  		{ $this->tabTri = $tab;			}
	public function setName($name)      { $this->name = $name;			}
	public function setItNb($nb)				{	$this->itNb = $nb;				}


	public static function explodeChain($str)
	{
		$str = str_replace(" ", "", $str);
		$str = str_replace(";", ",", $str);
		return explode(",", $str);
	}

	public function saveTri()
	{
		if (!isset($this->timeExec) || !isset($this->itNb) || !isset($this->name))
		{
			return -1;
		}
		$sql = "INSERT INTO execution () VALUES";
	}
}
?>
