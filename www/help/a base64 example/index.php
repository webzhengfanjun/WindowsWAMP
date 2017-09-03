<?php
  function Main()
  {
    $str       = 'apple';
    $strEncode = base64_encode($str);
    $strDecode = base64_decode($strEncode);

    echo 'Source: ', $str, '<br>';
    echo 'BASE64 Encode: ', $strEncode, '<br>';
    echo 'BASE64 Decode: ', $strDecode, '<br>';
  }

  Main();
?>