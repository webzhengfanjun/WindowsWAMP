<?php
  function Main()
  {
    $strFileName = realpath('.') . '/hitcounter.txt';

    if (file_exists($strFileName))
      $intHits = file_get_contents($strFileName);
    else
      $intHits = 0;

    $intHits++;

    $intHandle = fopen($strFileName, "w");
    fwrite($intHandle, $intHits);
    fclose($intHandle);

    echo $intHits;
  }

  Main();
?>