<?php
  function Main()
  {
    echo 'OS language: ', @$_ENV['OS_LANGUAGE'];
  }

  Main();
?>