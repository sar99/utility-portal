<?php
  session_start();
  if (isset($_SESSION['yr'])) {
    $_SESSION = array();

    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }

    session_destroy();
  

  setcookie('yr', '', time() - 3600);
  setcookie('rollno', '', time() - 3600);
  setcookie('batch', '', time() - 3600);

echo "<script>window.location.href='../';</script>";

}
?>