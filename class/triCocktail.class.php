<?php
class triCocktail extends tri
{
	public function triTableau()
	{
		$timeD = microtime(true);
		$array  = $this->tabNb;
		$lenght = count($array);
		for($i = 0; $i < $lenght - 1; $i++)
		{
			$min = $i;
			$tmp = $array[$i];
			for($j = $i + 1; $j < $lenght;$j++)
			{
				if ($array[$j] < $array[$min])
				{
					$min = $j;
					$tmp = $array[$i];
				}
			}
			if ($min != $i)
			{
				$array[$i] = $array[$min];
				$array[$min] = $tmp;
			}
		}
		$this->tabTri = array_merge($array);
		$timeF = microtime(true);
		$this->timeExec = $timeF - $timeD;
	}
}
?>
