<?php
class triPeigne extends tri
{

	public function triTableau()
	{
		$this->itNb = 0;
		$this->nbelem = count($this->tabNb);
		$timeD = microtime(true);
		$arrayTab = $this->tabNb;
		$this->tabTri = array_merge($this->Peignesort($arrayTab, $this->nbelem));
		$timeF = microtime(true);
		$this->timeExec = $timeF -$timeD;
	}
	
	public function Peignesort($array, $size)
	{
		$interval = $size;
		$echange = false;
		while ($interval > 1 || $echange)
		{
			$interval = intval($interval / 1.3);
			if ($interval < 1)
			{
				$interval = 1;
			}
			$i = 0;
			$echange = false;
			while ($i <= $size - $interval)
			{
				if ($array[$i] > $array[$i + $interval])
				{
					$tmp = $array[$i];
					$array[$i] = $array[$i + $interval];
					$array[$i + $interval] = $tmp;
					$echange = true;
				}
				$i++;
				$this->itNb++;
			}
		$this->itNb++;
		}
		return $array;
	}


}
?>
