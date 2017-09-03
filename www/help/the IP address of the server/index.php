<?php
  // Note: The IP address of the server under which the current script is executing

  function Main()
  {
    // 1. Windows running IIS v6 does not include $_SERVER['SERVER_ADDR']
    // 2. Windows running LitePXP does not include $_SERVER['SERVER_ADDR']
    // 3. If you need to get the IP addresse, use this instead:

    $strComputerName = $_SERVER['SERVER_NAME'];
    $strServerIP     = gethostbyname($strComputerName);

    echo 'The IP address of the server: ', $strServerIP;
  }

  Main();
?>