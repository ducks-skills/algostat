
<?php
class triBulle extends tri
{
	public function triTableau()
	{
		$timeD = microtime();
		$lenght = count($this->tabNb);
		$arrayTab = $this->tabNb;
		$tab_tri = false;
		for ($i = $lenght; $i > 1 && $tab_tri == false; $i--)
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
			}
			
		}
		$this->tabTri = array_merge($arrayTab);
		$timeF = microtime();
		$this->execTime = $timeF - $timeD;
	}
}
?>
