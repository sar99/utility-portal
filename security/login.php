<?php
        require_once("../connect.php");
?>

<?php

if(isset($_POST['id']) )
{
    $id=err($_POST['id']);
    $pass=err($_POST["pass"]);
    $pass = md5($pass);

     $sql="SELECT * FROM security WHERE id = '$id' AND  pass = '$pass'";
     $result=mysqli_query($conn,$sql);
     $num_rows = mysqli_num_rows($result);
     if($num_rows!=0)
      {$_SESSION['id']=$id;

       echo "<script>window.location.href='./gatepass.php';</script>"; }
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