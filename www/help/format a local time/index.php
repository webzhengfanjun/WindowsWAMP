<?php
  function Main()
  {
    echo date('m/d/Y H:i:s', time()), '<br>';
    echo date('m/d/Y h:i:s A', time()), '<br>';

    echo '<br>';

    echo date('m/d/Y G:i:s', time()), '<br>';
    echo date('m/d/Y g:i:s A', time()), '<br>';
  }

  Main();
?>