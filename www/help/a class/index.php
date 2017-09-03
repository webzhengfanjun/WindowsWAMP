<?php
  class Student
  {
    var $name;
    var $age;

    function Test()
    {
      echo 'name: ', $this->name, '<br>';
      echo 'age: ', $this->age, '<br>';
    }
  }

  function Main()
  {
    $obj       = new Student;
    $obj->name = 'hi6000.com';
    $obj->age  = 99;
    $obj->Test();
    $obj       = null;
  }

  Main();
?>