<?php
  function Main()
  {
    echo 'PHP ', PHP_VERSION, '<br>';
    echo 'Zend Engine ', zend_version(), '<br>';
    echo 'OS: ', PHP_OS, '<br>';
  }

  Main();
?>