<?php
  // Note: File Size 0 - 2GB

  function Main()
  {
    if ($_FILES)
    {
      if (@move_uploaded_file($_FILES['userfile']['tmp_name'], sprintf('%s\\%s', realpath('.'), $_FILES['userfile']['name'])))
      {
        echo 'OK<br>';
        echo sprintf('FILENAME: %s<br>', sprintf('%s\\%s', realpath('.'), $_FILES['userfile']['name']));
        echo sprintf('FILETYPE: %s<br>', $_FILES['userfile']['type']);
        echo sprintf('FILESIZE: %d<br>', $_FILES['userfile']['size']);
      }
    }
    else
    {
      $strHtml = '<form ENCTYPE="multipart/form-data" method="post" action="index.php">' .
                 '<input type="file" name="userfile">' .
                 '<input type="submit" value="Upload">' .
                 '</form>';
      echo $strHtml;
    }
  }

  Main();
?>
