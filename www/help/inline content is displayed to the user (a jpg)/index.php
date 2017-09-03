<?php
  function Main()
  {
    $strFileName = 'test.jpg';
    if (file_exists($strFileName) && is_file($strFileName))
    {
      header('Content-Type: ' . mime_content_type($strFileName));
      header('Content-Length: ' . filesize($strFileName));
      header('Content-Disposition: inline; filename=' . basename($strFileName));
      echo file_get_contents($strFileName);
    }
  }

  Main();
?>