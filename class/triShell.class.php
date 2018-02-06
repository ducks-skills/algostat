<?php
class triShell extends tri
{

	public function triTableau()
	{
		$this->itNb = 0;
		$this->nbelem = count($this->tabNb);
		$timeD = microtime(true);
		$arrayTab = $this->tabNb;
		$this->tabTri = array_merge($this->shellsort($arrayTab, $this->nbelem));
		$timeF = microtime(true);
		$this->timeExec = $timeF -$timeD;
	}

	public function shellSort($a, $length) {
		$gaps = array(1, 4, 10, 23, 57, 132, 301, 701);
		$ret = array();
		for ($sizeIndex = count($gaps)/count($gaps[0]) - 1;$sizeIndex >= 0;--$sizeIndex)
		{
			$this->itNb++;
			$ret = $this->shellSortPhase($a, $length, $gaps[$sizeIndex]);
		}
		return $ret;
	}


	public function  shellSortPhase($a, $length, $gap) {

		for ($i = $gap; $i < $length; ++$i) {
			$this->itNb++;
			$value = $a[$i];
			for ($j = $i - $gap; $j >= 0 && $a[$j] > $value; $j -= $gap) {
			$this->itNb++;
				$a[$j + $gap] = $a[$j];
			}
			$a[$j + $gap] = $value;
		}
		return $a;
	}


}
?>
