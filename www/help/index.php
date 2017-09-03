<?php
  $m_strTemplateFileName = 'template.html';
  $m_arrHtml             = explode('<!-- - -->', file_get_contents($m_strTemplateFileName));

  function ShowSamples()
  {
    global $m_strTemplateFileName, $m_arrHtml;

    echo str_replace('#title', 'Help Contents', $m_arrHtml[0]);

    $strHtml = $m_arrHtml[2];
    $strHtml = str_replace('#appname', @$_ENV['SERVER_APPNAME'], $strHtml);
    $strHtml = str_replace('#lowercaseappname', strtolower(@$_ENV['SERVER_APPNAME']), $strHtml);
    $strHtml = str_replace('#version', @$_ENV['SERVER_FILEVERSION'], $strHtml);
    $strHtml = str_replace('#phpver', PHP_VERSION, $strHtml);
    echo $strHtml;

    $intCount     = 0;
    $intDirHandle = opendir('.');
    while (true)
    {
      $strFileName = readdir($intDirHandle);
      if ($strFileName == '') break;
      if (is_dir($strFileName) && ($strFileName <> '.') && ($strFileName <> '..'))
      {
        $strHtml = $m_arrHtml[3];
        $strHtml = str_replace('#samplename', $strFileName, $strHtml);
        $strHtml = str_replace('#name-url', $strFileName, $strHtml);
        $strHtml = str_replace('#code-url', '?' . $strFileName, $strHtml);
        echo $strHtml;
        $intCount++;
      }
    }
    closedir($intDirHandle);

    echo str_replace('#count', $intCount, $m_arrHtml[4]);
    echo $m_arrHtml[5];
  }

  function ShowSourceCode($strQueryString)
  {
    global $m_strTemplateFileName, $m_arrHtml;

    $strFileName = $strQueryString;
    if (file_exists($strFileName) && is_dir($strFileName))
    {
      $strFileName = $strFileName . '/index.php';
      if (file_exists($strFileName) && is_file($strFileName))
      {
        echo str_replace('#title', 'Source Code', $m_arrHtml[0]);
        echo str_replace('#text', htmlspecialchars(file_get_contents($strFileName)), $m_arrHtml[1]);
        echo $m_arrHtml[5];
      }
    }
  }

  function Main()
  {
    $strQueryString = rawurldecode($_SERVER['QUERY_STRING']);
    if ($strQueryString == '')
      ShowSamples();
    else if ($strQueryString == 'phpinfo')
      phpinfo();
    else
      ShowSourceCode($strQueryString);
  }

  Main();
?>