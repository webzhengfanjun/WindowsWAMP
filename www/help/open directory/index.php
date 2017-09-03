<?php
  function Main()
  {
    $strDir  = realpath('.');
    $strHtml = '<tr><td width="300">#name</td><td width="100">#size</td><td width="100">#type</td><td width="200">#lastmodified</td></tr>' . chr(13) . chr(10);

    echo '<table width="700" border="1">' . chr(13) . chr(10);
    echo '<tr><td width="300">Name</td><td width="100">Size</td><td width="100">Type</td><td width="200">Last Modified</td></tr>' . chr(13) . chr(10);

    $intHandle = opendir($strDir);
    while (true)
    {
      $strFileName = readdir($intHandle);
      if ($strFileName == '') break;

      $strName     = $strFileName;
      $strFileName = $strDir . '/' . $strName;

      if (is_dir($strFileName))
      {
        $intSize         = filesize($strFileName);
        $strLastModified = date('m/d/Y H:i:s', filemtime($strFileName));

        $strTmp = $strHtml;
        $strTmp = str_replace('#name', $strName, $strTmp);
        $strTmp = str_replace('#size', $intSize, $strTmp);
        $strTmp = str_replace('#type', 'Dir', $strTmp);
        $strTmp = str_replace('#lastmodified', $strLastModified, $strTmp);

        echo $strTmp;
      }
    }
    rewinddir($intHandle);
    while (true)
    {
      $strFileName = readdir($intHandle);
      if ($strFileName == '') break;

      $strName     = $strFileName;
      $strFileName = $strDir . '/' . $strName;

      if (is_file($strFileName))
      {
        $intSize         = filesize($strFileName);
        $strLastModified = date('m/d/Y H:i:s', filemtime($strFileName));

        $strTmp = $strHtml;
        $strTmp = str_replace('#name', $strName, $strTmp);
        $strTmp = str_replace('#size', $intSize, $strTmp);
        $strTmp = str_replace('#type', @mime_content_type($strFileName), $strTmp);
        $strTmp = str_replace('#lastmodified', $strLastModified, $strTmp);

        echo $strTmp;
      }
    } 
    closedir($intHandle);

    echo '</table>';
  }

  Main();
?>