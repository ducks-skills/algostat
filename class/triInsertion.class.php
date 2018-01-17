<?php

class triInsertion extends tri
{
  public function triTableau()
  {
    $deb = microtime(true);
    $this->itNb = 0;
    if (isset($this->tabNb[0]))
    {
      $i = 0;
      $tmp = 0;
      $tmpTab = $this->getTabNb();
      $lenght = count($tmpTab);
      for ($i = 0; $i < $lenght; $i++)
      {
        $tmp = $tmpTab[$i];
        $j = $i;
        while ($j > 0 && $tmpTab[$j - 1] > $tmp)
        {
          $tmpTab[$j] = $tmpTab[$j - 1];
          $j--;
          $this->itNb++;
        }
        $tmpTab[$j] = $tmp;
        $this->itNb++;
      }
      $this->setTabTri($tmpTab);
    }
    $this->timeExec = microtime(true) - $deb;
  }
}

?>
