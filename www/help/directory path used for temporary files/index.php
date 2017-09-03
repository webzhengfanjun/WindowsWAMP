<?php
  function Main()
  {
    $str1 = $_ENV['TEMP'];
    $str2 = $_ENV['TMP'];

    echo 'Directory path used for temporary files:<br>';
    echo '1: ', $str1, '<br>';
    echo '2: ', $str2, '<br>';
  }

  Main();
?>