<?php
  // Creating a new GD image stream and outputting an image

  function Main()
  {
    $strQueryString = strtolower($_SERVER['QUERY_STRING']);

    if ($strQueryString == 'png')
    {
      header("Content-type: image/png");
      $im               = @imagecreate(480, 360);
      $background_color = imagecolorallocate($im, 0, 0, 0);
      $text_color       = imagecolorallocate($im, 233, 14, 91);
      imagestring($im, 5, 5, 5, 'A Simple Text String', $text_color);
      imagepng($im);
      imagedestroy($im);
    }
    else if ($strQueryString == 'gif')
    {
      header("Content-type: image/gif");
      $im               = @imagecreate(480, 360);
      $background_color = imagecolorallocate($im, 0, 0, 0);
      $text_color       = imagecolorallocate($im, 233, 14, 91);
      imagestring($im, 5, 5, 5, 'A Simple Text String', $text_color);
      imagegif($im);
      imagedestroy($im);
    }
    else
      echo '<a href="?png">png</a> | <a href="?gif">gif</a>';
  }

  Main();
?>

