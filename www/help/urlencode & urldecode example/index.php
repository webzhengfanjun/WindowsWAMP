<?php
  function Main()
  {
    $str       = 'http://www.hi6000.com/';
    $strEncode = urlencode($str);
    $strDecode = urldecode($strEncode);

    echo 'Source: ', $str, '<br>';
    echo 'urlencode: ', $strEncode, '<br>';
    echo 'urldecode: ', $strDecode, '<br>';
  }

  Main();
?>