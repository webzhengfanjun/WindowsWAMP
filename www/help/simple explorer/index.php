<?php
  $strQueryString = rawurldecode($_SERVER['QUERY_STRING']);
  $strFileName    = $strQueryString;

  // my computer
  if ($strFileName == '')
  {
    echo '<b>Directory of My Computer</b><br><br>';
    for ($i = ord('C'); $i <= ord('Z'); $i++)
    {
      $strDir = sprintf('%s:\\', chr($i));
      if (is_dir($strDir))
      {
        echo sprintf('<img src="folder.jpg"><a href="?%s">%s</a><br>', $strDir, $strDir);
      }
    }
    exit();
  }

  // download
  if (is_file($strFileName))
  {
    header('Content-Type: ' . mime_content_type($strFileName));
    header('Content-Length: ' . filesize($strFileName));
    header('Content-Disposition: attachment; filename=' . basename($strFileName));
    echo file_get_contents($strFileName);
    exit();
  }

  // open
  $strDir       = realpath($strFileName);
  $intDirHandle = opendir($strDir);

  echo sprintf('<b>Directory of %s</b><br><br>', $strDir);

  // folders
  if (strlen($strDir) == 3)
  {
    echo '<img src="folder.jpg"><a href="?">..</a><br>';
  }
  while (($strFileName = readdir($intDirHandle)) <> '')
  {
    $strParam = sprintf('%s\\%s', $strDir, $strFileName);
    if (is_dir($strParam) && ($strFileName <> '.'))
    {
      echo sprintf('<img src="folder.jpg"><a href="?%s">%s</a><br>', $strParam, $strFileName);
    }
  }

  rewinddir($intDirHandle);

  // files
  while (($strFileName = readdir($intDirHandle)) <> '')
  {
    $strParam = sprintf('%s\\%s', $strDir, $strFileName);
    if (is_file($strParam))
    {
      echo sprintf('<img src="file.jpg"><a href="?%s">%s</a><br>', $strParam, $strFileName);
    }
  }

  // close
  closedir($intDirHandle);
?>