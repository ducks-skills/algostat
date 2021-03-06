<?php
require_once('database.class.php');
class Tri
{
	protected $timeExec;
	protected $nbelem;
	protected $tabNb;
	protected $tabTri = array();
	protected $name;
	protected $itNb;
	protected $error = "";


	public function __construct($chaine, $name){
		$this->tabNb = Tri::explodeChain($chaine);
		$this->deleteBadElement();
		$this->name = $name;
	}

	public function getTimeExec()  	{ return $this->timeExec;				}
	public function getTabNb()      { return $this->tabNb;					}
	public function getTabTri()     { return $this->tabTri;					}
	public function getName()       { return $this->name;						}
	public function getItNb()				{ return $this->itNb;						}
	public function getOccur()      { return $this->nboccur;        }
	public function getError()			{ return $this->error; 					}
	public function getNbelem()			{ return $this->nbelem; 					}

	public function setTimeExec($time)  { $this->timeExec = $time;	}
	public function setTabNb($tab)   		{ $this->tabNb = $tab;			}
	public function setTabTri($tab)  		{ $this->tabTri = $tab;			}
	public function setName($name)      { $this->name = $name;			}
	public function setItNb($nb)				{	$this->itNb = $nb;				}
	public function setOccur($nb)   		{ $this->nboccu = $nb;			}
	public function setError($err)   		{ $this->error = $err;			}

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
		$sql = "INSERT INTO execution
		(base_chain, sorted_chain, execution_time, date, type, iterations, size)
		VALUES
		(:base_chain, :sorted_chain, :execution_time, :date, :type, :iterations, :size)";
		//var prepare
		$strTabNb = implode(", ", $this->tabNb);
		$strTabTri = implode(", ", $this->tabTri);
		$time = date("Y-m-d H:i:s");
		$sqlCo = Database::getInstance();
		$req = $sqlCo->pdo->prepare($sql);

		//var_dump($this);
		//affect to params
		$req->bindParam(":base_chain", $strTabNb);
		$req->bindParam(":sorted_chain", $strTabTri);
		$req->bindParam(":execution_time", $this->timeExec);
		$req->bindParam(":date", $time);
		$req->bindParam(":type", $this->name);
		$req->bindParam(":iterations", $this->itNb);
		$req->bindParam(":size", $this->nbelem);
		if ($req->execute())
		{
			#header("Location: index.php");
		}
		else
		{
			$this->error = $req->errorInfo();
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

	public static function getTableJsonData($type)
	{
	$arra = array();
	$sql = "SELECT AVG(execution_time) as execution_time, date, type as title_chart, iterations, size FROM execution WHERE type LIKE '$type' GROUP BY size";
	$sqlCo = Database::getInstance();
	$req = $sqlCo->pdo->prepare($sql);
	$req->execute();
	while ($rslt = $req->fetch(PDO::FETCH_ASSOC))
	{
	array_push($arra, $rslt);
	}
	return $arra;
	}
}
?>
