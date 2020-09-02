<?php
        require_once("../connect.php");
?>

<?php

if(isset($_POST['submit']))
{
    $datefrom=err($_POST['leave-from']);
    $datetill=err($_POST['leave-till']);
    $address=err($_POST['address']);
    $number=err($_POST['number']);
    
    
    $yr=err($_SESSION['yr']);
    $batch=err($_SESSION['batch']);
    $rollno=err($_SESSION['roll']);


     $sql="SELECT * FROM students WHERE yr = '$yr' AND batch = '$batch' AND roll = '$rollno'";
     $result=mysqli_query($conn,$sql);
     $num_rows = mysqli_num_rows($result);
     if($num_rows!=0)
      {
        $row=mysqli_fetch_array($result);
        $isfemale = $row['isfemale'];
        $hostel = $row['hostel'];
        $room = $row['room'];
        $passStatus = 0;
        $date = date('y-m-d');

        // echo "<script>window.alert('" . $title . $description . $required . $isfemale . $hostel . $room . $compStatus ."');</script>";     
        $sql = "INSERT INTO gatepass (isfemale, hostel, room, leaveFrom, leaveTill, passStatus, dateFiled, address, number) VALUES ('$isfemale','$hostel','$room', '$datefrom', '$datetill', '$passStatus', '$date', '$address', '$number')";
        $result=mysqli_query($conn,$sql);
        if($result==false)
        echo "<script>window.alert('Database Update Failed due to some reason. Please try again.');</script>"; 
        echo "<script>window.location.href='javascript:history.go(-1)';</script>"; 
    }
    else
    {
        echo "<script>window.alert('Invalid Request');</script>";     
        echo "<script>window.location.href='javascript:history.go(-1)';</script>";  
    }
}
else
{
    echo "<script>window.alert('Invalid request.');</script>";
    echo "<script>window.location.href='javascript:history.go(-1)';</script>";
}

?>