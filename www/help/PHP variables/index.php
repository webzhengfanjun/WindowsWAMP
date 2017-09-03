<?php
  function Main()
  {
    $arrKeyName = array_keys($_SERVER);
    for ($intIndex = 0; $intIndex < count($arrKeyName); $intIndex++)
    {
      $strKeyName = $arrKeyName[$intIndex]; 
      echo $strKeyName, ': ', $_SERVER[$strKeyName], '<br>';
    }
  }

  Main();
?>