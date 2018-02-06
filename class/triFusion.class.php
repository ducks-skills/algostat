<?php
class triFusion extends tri
{

	public function triTableau()
	{
		$this->itNb = 0;
		$this->nbelem = count($this->tabNb);
		$timeD = microtime(true);
		$arrayTab = $this->tabNb;
		$this->tabTri = array_merge($this->Mergesort($arrayTab));
		$timeF = microtime(true);
		$this->timeExec = $timeF -$timeD;
	}
	
	public function Mergesort($array)
	{
		if (count($array) == 1) return $array;
		$midSize = count($array)/2;
		$left = array_slice($array, 0, $midSize);
		$right = array_slice($array,$midSize);
		$left = $this->Mergesort($left);
		$right = $this->Mergesort($right);
		return $this->Fusion($left, $right);
	}

	public function Fusion($left, $right)
	{
		$res = array();
		while (count($left) > 0 && count($right) > 0){
			if($left[0] > $right[0]){
				$res[] = $right[0];
				$right = array_slice($right , 1);
			} else {
				$res[] = $left[0];
				$left = array_slice($left , 1);
			}
			$this->itNb++;
		}
		while (count($left) > 0){
			$res[] = $left[0];
			$left = array_slice($left, 1);
			$this->itNb++;
		}
		while (count($right) > 0){
			$res[] = $right[0];
			$right = array_slice($right, 1);
			$this->itNb++;
		}
	
		return $res;	
	}
}
?>
