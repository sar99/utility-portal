<?php
        require_once("../connect.php");
?>

<?php

if(isset($_POST['submit']))
{
    // Sanitise form data
    $title=err($_POST['title']);
    $description=err($_POST['description']);
    $required=err($_POST['required']);
    
    // Sanitise session data
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
        $compStatus = 0;
        $date = date('y-m-d');

        $sql = "INSERT INTO complaints (title, description, helpBy, isfemale, hostel, room, compStatus, date) VALUES ('$title','$description','$required','$isfemale','$hostel','$room','$compStatus', '$date')";
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