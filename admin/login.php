<?php
        require_once("../connect.php");
?>

<?php

if(isset($_POST['adminid']) )
{
    $adminid=err($_POST['adminid']);
    $pass=err($_POST["pass"]);
    $pass = md5($pass);

     $sql="SELECT * FROM admins WHERE adminid = '$adminid' AND  pass = '$pass'";
     $result=mysqli_query($conn,$sql);
     $num_rows = mysqli_num_rows($result);
     if($num_rows!=0)
      {$_SESSION['adminid']=$adminid;

       echo "<script>window.location.href='./recommendation.php';</script>"; }
     else
      {echo "<script>window.alert('Invalid Credentials. Please try again.');</script>";     
        echo "<script>window.location.href='javascript:history.go(-1)';</script>";  
      }
}
else
{
    echo "<script>window.alert('Invalid request.');</script>";
    echo "<script>window.location.href='javascript:history.go(-1)';</script>";
}