<?php
class TriSelection extends Tri
{
	public function __construct($tab){
		parent::__construct($tab, 'Selection');
	}

	public function triTableau()
	{
		$lenght = count($this->tabNb);
		$arrayTab = $this->tabNb;
	        $timeDeb = microtime(true);
		for($i = 1; $i < $lenght - 1; $i++)
		{
			$min = $i;
			for($j = $i + 1; $j < $lenght;$j++)
			{
				if ($arrayTab[$j] < $arrayTab[$min])
				{
					$min = $j;
				}
			}
			if ($min != $i)
			{
				$tmp = $arrayTab[$i];
				$arrayTab[$i] = $arrayTab[$min];
				$arrayTab[$min] = $tmp;
			}
		}
		$timeFin = microtime(true);
		$this->timeExec = $timeFin-$timeDeb;
		$this->tabTri = $arrayTab;	
	}
}
?>
