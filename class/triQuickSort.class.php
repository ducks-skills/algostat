<?php
class triQuickSort extends tri
{

	public function triTableau()
	{
		$timeD = microtime(true);
		$arrayTab = $this->tabNb;
		$this->tabTri = array_merge($this->quickSort($arrayTab));
		$timeF = microtime(true);
		$this->timeExec = $timeF -$timeD;
	}


	public function quickSort($array)
	{

	$length = count($array);
	if($length <= 1){
		return $array;
	}
	else{
		$pivot = $array[0];
		$left = $right = array();
		for($i = 1; $i < count($array); $i++)
		{
			if($array[$i] < $pivot){
				$left[] = $array[$i];
			}
			else{
				$right[] = $array[$i];
			}
		}
		return array_merge($this->quickSort($left), array($pivot), $this->quickSort($right));
	}
	}

}
?>
