
<?php
class triBulle extends tri
{
	public function triTableau()
	{
		$timeD = microtime(true);
		$this->nbelem = count($this->tabNb);
		$arrayTab = $this->tabNb;
          	$this->itNb = 0;
		$tab_tri = false;
		for ($i = $this->nbelem; $i > 1 && $tab_tri == false; $i--)
		{
			$tab_tri = true;
			for ($j = 0; $j < $i - 1; $j++)
			{
				if ($arrayTab[$j + 1] < $arrayTab[$j])
				{
					$tmp = $arrayTab[$j + 1];
					$arrayTab[$j + 1] = $arrayTab[$j];
					$arrayTab[$j] = $tmp;
					$tab_tri = false;
				}
          			$this->itNb++;
			}
          		$this->itNb++;
		}
		$this->tabTri = array_merge($arrayTab);
		$timeF = microtime(true);
		$this->timeExec = $timeF - $timeD;
	}
}
?>
