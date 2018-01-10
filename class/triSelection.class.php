<?php
class triSelection extends tri
{
	public function triTableau()
	{
		$lenght = count($this->tabNb);

		for($i = 0; $i < $lenght - 1; $i++)
		{
			$min = $i;
			$tmp = $this->tabNb[$i];
			for($j = $i + 1; $j < $lenght;$j++)
			{
				if ($this->tabNb[$j] < $this->tabNb[$min])
				{
					$min = $j;
					$tmp = $this->tabNb[$i];
				}
			}
			if ($min != $i)
			{
				$this->tabNb[$i] = $this->tabNb[$min];
				$this->tabNb[$min] = $tmp;
			}
		}
	}
}
?>
