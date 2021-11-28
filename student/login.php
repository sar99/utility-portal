<?php
        require_once("../connect.php");
?>

<?php

if(isset($_POST['yr']) && isset($_POST['batch']) && isset($_POST['rollno']))
{
    $yr=err($_POST['yr']);
    $batch=err($_POST['batch']);
    $rollno=err($_POST['rollno']);
    $pass=err($_POST["pass"]);
    $pass = md5($pass);

     $sql="SELECT * FROM students WHERE yr = '$yr' AND batch = '$batch' AND roll = '$rollno' AND  pass = '$pass'";
     $result=mysqli_query($conn,$sql);
     $num_rows = mysqli_num_rows($result);
     if($num_rows!=0)
      {$_SESSION['yr']=$yr;
       $_SESSION['batch']=$batch;
       $_SESSION['roll']=$rollno;
       echo "<script>window.location.href='./complaint.php';</script>"; }
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