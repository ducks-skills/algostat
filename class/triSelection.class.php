<?php
class triSelection extends tri
{
	public function triTableau()
	{
		$timeD = microtime(true);
		$this->itNb = 0;
		$array  = $this->tabNb;
		$this->nbelem = count($array);
		for($i = 0; $i < $this->nbelem - 1; $i++)
		{
			$min = $i;
			$tmp = $array[$i];
			for($j = $i + 1; $j < $this->nbelem; $j++)
			{
				if ($array[$j] < $array[$min])
				{
					$min = $j;
					$tmp = $array[$i];
				}
				$this->itNb++;
			}
			if ($min != $i)
			{
				$array[$i] = $array[$min];
				$array[$min] = $tmp;
			}
			$this->itNb++;
		}
		$this->tabTri = array_merge($array);
		$timeF = microtime(true);
		$this->timeExec = $timeF - $timeD;
	}
}
?>
