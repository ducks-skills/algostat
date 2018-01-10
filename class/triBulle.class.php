
<?php
class TriBulle extends Tri
{
	public function __construct($tab){
		parent::__construct($tab, 'Bulle');
	}

	public function triTableau()
	{
		$lenght = count($this->tabNb);
		$arrayTab = $this->tabNb;
		$tab_tri = false;
		for ($i = $lenght - 1; $i > 1 && $tab_tri == false $tab_tri ; $i--)
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
	}
}
?>
