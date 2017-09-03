<?php
  if (mysql_connect('localhost', 'root', ''))
  {
    printf('MySQL server version: %s', mysql_get_server_info());
  }
?>