<?php
  function Main()
  {
    $strOutput = '';
    $strLine   = '';
    $intHandle = popen('help', 'r');
    while (true)
    {
      $strLine = fgets($intHandle, 1024);
      if ($strLine == '') break;
      $strOutput = $strOutput . $strLine;
    }
    pclose($intHandle);

    echo '<textarea cols="110" rows="30" wrap="off">', htmlspecialchars($strOutput), '</textarea>';
  }

  Main();
?>