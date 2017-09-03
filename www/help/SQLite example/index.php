<?php
  function ShowData()
  {
    $strFileName = 'db.db';
    $db          = sqlite_open($strFileName);
    $result      = sqlite_query($db, 'SELECT * FROM tablename');
    sqlite_close($db);

    while ($row = sqlite_fetch_array($result))
    {
      echo $row['user'], '<br>';
    }
  }

  function Add()
  {
    $strFileName = 'db.db';
    $db          = sqlite_open($strFileName);
    sqlite_query($db, 'INSERT INTO tablename VALUES (\'obama\')');
    sqlite_close($db);
  }

  function Del()
  {
    $strFileName = 'db.db';
    $db          = sqlite_open($strFileName);
    sqlite_query($db, 'delete from tablename where user=\'obama\'');
    sqlite_close($db);
  }

  function Create()
  {
    $strFileName = 'db.db';
    if (!file_exists($strFileName))
    {
      $intFileHandle = fopen($strFileName, 'w+');
      fclose($intFileHandle);

      $db = sqlite_open($strFileName);
      sqlite_query($db, 'CREATE TABLE tablename (user text); INSERT INTO tablename VALUES (\'obama\')');
      sqlite_close($db);
    }
  }

  function Main()
  {
    $strQueryString = strtolower($_SERVER['QUERY_STRING']);
    if ($strQueryString == 'add')
    {
      Create();
      Add();
      ShowData();    
    }
    else if ($strQueryString == 'del')
    {
      Create();
      Del();
      ShowData();
    }
    else
      echo '<a href="?add">Add</a> | <a href="?del">Delete</a>';
  }

  Main();
?>