<?php
  session_start();
  if (isset($_SESSION['adminid'])) {
    $_SESSION = array();

    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }

    session_destroy();
  

  setcookie('adminid', '', time() - 3600);


echo "<script>window.location.href='../';</script>";

}
?>