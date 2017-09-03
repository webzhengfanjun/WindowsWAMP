<?php
  function Main()
  {
    echo 'The names of all modules loaded:', '<br>';

    $arr = get_loaded_extensions();
    for ($intIndex = 0; $intIndex < count($arr); $intIndex++)
    {
      echo $arr[$intIndex], '<br>';
    }
  }

  Main();
?>