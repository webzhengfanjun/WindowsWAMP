<?php
  function Main()
  {
    $strFileName = $_SERVER['SCRIPT_FILENAME'];
    echo 'Name: ', basename($strFileName), '<br>';
    echo 'Type: ', @mime_content_type($strFileName), '<br>';
    echo 'Size: ', filesize($strFileName), '<br>';
    echo 'Created: ', date('m/d/Y H:i:s', filectime($strFileName)), '<br>';
    echo 'Last Modified: ', date('m/d/Y H:i:s', filemtime($strFileName)), '<br>';
    echo 'Last Accessed: ', date('m/d/Y H:i:s', fileatime($strFileName)), '<br>';
  }

  Main();
?>