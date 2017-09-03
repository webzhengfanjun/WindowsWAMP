<?php
  if (strtolower($_SERVER['REQUEST_METHOD']) == 'post')
  {
    $strFrom    = stripslashes(@$_POST['From']);
    $strTo      = stripslashes(@$_POST['To']);
    $strSubject = stripslashes(@$_POST['Subject']);
    $strMessage = stripslashes(@$_POST['Message']);
    $strHeaders = sprintf('From:%s', $strFrom);

    if (mail($strTo, $strSubject, $strMessage, $strHeaders))
      echo 'OK!';
    else
      echo 'Error!';

    exit();
  }
?>

<form method="post">

From:<br>
<input type="text" name="From" size="42" value="hi6000@gmail.com"><br>

To:<br>
<input type="text" name="To" size="42" value="hi6000@gmail.com"><br>

Subject:<br>
<input type="text" name="Subject" size="42" value="This is a test!"><br>

Message:<br>
<textarea name="Message" cols="50" rows="10" wrap="virtual">This is a test!</textarea><br>

<input type="submit" name="Submit" value="Send">

</form>