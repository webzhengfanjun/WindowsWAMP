<?php
  function Main()
  {
    $strQueryString = $_SERVER['QUERY_STRING'];
    $strFileName    = $strQueryString;

    if (file_exists($strFileName) && is_file($strFileName))
    {
      header('Content-Type: ' . mime_content_type($strFileName));
      header('Content-Length: ' . filesize($strFileName));
      header('Content-Disposition: attachment; filename=' . basename($strFileName));
      echo file_get_contents($strFileName);
    }
    else
      echo '<a href="?index.php">download a file (index.php)</a>';
  }

  Main();
?>