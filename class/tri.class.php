<?php
//require_once('DBconnection.php');
class Tri
{
	protected $timeExec;
	protected $nboccur;
	protected $tabNb;
	protected $tabTri = array();
	protected $name;
	protected $itNb;


	public function __construct($chaine, $name){
		$this->tabNb = Tri::explodeChain($chaine);
		$this->deleteBadElement();
		$this->name = $name;
	}

	public function getTimeExec()  	{ return $this->timeExec;	}
	public function getTabNb()      { return $this->tabNb;		}
	public function getTabTri()     { return $this->tabTri;		}
	public function getName()       { return $this->name;		}
	public function getItNb()	{ return $this->itNb;		}
	public function getOccur()      { return $this->nboccur;        }

	public function setTimeExec($time)  { $this->timeExec = $time;	}
	public function setTabNb($tab)   		{ $this->tabNb = $tab;			}
	public function setTabTri($tab)  		{ $this->tabTri = $tab;			}
	public function setName($name)      { $this->name = $name;			}
	public function setItNb($nb)				{	$this->itNb = $nb;				}
	public function setOccur($nb)   { $this->nboccu = $nb;}

	public static function explodeChain($str)
	{
		$str = str_replace(" ", "", $str);
		$str = str_replace(";", ",", $str);
		$str = str_replace(",,", "", $str);
		return explode(",", $str);
	}

	public function saveTri()
	{
		if (!isset($this->timeExec) || !isset($this->itNb) || !isset($this->name))
		{
			return -1;
		}
		$sql = "INSERT INTO execution (
			base_chain,
			sorted_chain,
			execution_time,
			sort_date,
			type,
			iterations
		)
		VALUES (:bsc, :stc, :ext, :std, :typ, :it)";
		$sqlCo = database::getInstance();
		$req = $sqlCo->pdo->prepare($sql);
		//var prepare
		$strTabNb = implode(", ", $this->tabNb);
		$strTabTri = implode(", ", $this->tabTri);
		$time = date("Y-m-d H:i:s");

		//affect to params
		$req->bindParam(':bsc', $strTabNb);
		$req->bindParam(':stc', $strTabTri);
		$req->bindParam(':ext', $this->timeExec);
		$req->bindParam(':std', $time);
		$req->bindParam(':typ', $this->name);
		$req->bindParam(':it', $this->itNb);
		var_dump($req->execute());
		if($req->execute())
		{
			header("Location: index.php");
		}

	}
	//pour eviter les problemes de ,,
	public function deleteBadElement()
	{
		$tmp = [];
		$i = 0;
		foreach($this->tabNb as $tab)
		{

			if ($tab != '')
			{
				$tmp[$i] = $tab;
				$i++;
			}
		}
		$this->tabNb = $tmp;
	}
}
?>
