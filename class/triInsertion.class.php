<?php

class triInsertion extends tri
{
  public function triTableau()
  {
    if (isset($this->tabNb[0]))
    {
      $i = 0;
      $tmp = 0;
      $this->setTabTri($this->tabNb);
      $lenght = count($this->tabTri);
      for ($i = 0; $i < $tabTri; $i++)
      {
        $tmp = $this->tabTri;
        $j = $i;
        while ($j > 0 && $this->tabTri[$j - 1] > $tmp)
        {
          $this->tabTri[$j] = $this->tabTri[$j - 1];
          $j--;
        }
        $this->tabTri[$j] = $tmp;
      }
    }
  }
}

?>
