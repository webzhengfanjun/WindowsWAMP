<?php
  ob_start();
  phpinfo();
  $strContents = ob_get_contents();
  ob_end_clean();
  echo '<textarea cols="110" rows="30" wrap="off">', htmlspecialchars($strContents), '</textarea>';
?>