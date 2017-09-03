<?php
  function ShowData()
  {
    $strDbFileName = realpath('.') . '/Authors.mdb';
    $objConn       = new com('ADODB.Connection');
    $objConn->Open('DRIVER={Microsoft Access Driver (*.mdb)};DBQ=' . $strDbFileName);
    $objRs         = $objConn->Execute('select * from Authors');

    while (!$objRs->EOF)
    {
      echo $objRs->Fields['Author']->Value, '<br>';
      $objRs->MoveNext();
    }

    $objRs->Close();
    $objConn->Close();
    $objRs   = null;
    $objConn = null;
  }

  function Add()
  {
    $strDbFileName = realpath('.') . '/Authors.mdb';
    $objConn       = new com('ADODB.Connection');
    $objConn->Open('DRIVER={Microsoft Access Driver (*.mdb)};DBQ=' . $strDbFileName);
    $objConn->Execute('insert into Authors (Author) values (\'Obama\')');
    $objConn->Close();
    $objConn       = null;
  }

  function Del()
  {
    $strDbFileName = realpath('.') . '/Authors.mdb';
    $objConn       = new com('ADODB.Connection');
    $objConn->Open('DRIVER={Microsoft Access Driver (*.mdb)};DBQ=' . $strDbFileName);
    $objConn->Execute('delete from Authors where Author=\'Obama\'');
    $objConn->Close();
    $objConn       = null;
  }

  function Main()
  {
    $strQueryString = strtolower($_SERVER['QUERY_STRING']);
    if ($strQueryString == 'add')
    {
      Add();
      ShowData();    
    }
    else if ($strQueryString == 'del')
    {
      Del();
      ShowData();
    }
    else
      echo '<a href="?add">Add</a> | <a href="?del">Delete</a>';
  }

  Main();
?>