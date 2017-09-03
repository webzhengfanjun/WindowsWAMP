<?php
  function Main()
  {
    $str    = 'apple';
    $strMD5 = md5($str);

    echo 'Source: ', $str, '<br>';
    echo 'MD5: ', $strMD5, '<br>';
  }

  Main();
?>