<?php
class TriSelection extends Tri
{
	public __construct($tab){
		parent::__construct($tab, 'Selection');
	}

	public triTableau()
	{
		$lenght = count($this->tabNb);
		$arrayTab = $this->tabNb;

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
		
	}
}
?>
