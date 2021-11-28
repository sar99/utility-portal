<?php
        require_once("../connect.php");
?>

<html>
<head> 

    <title> Gate Pass </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Poppins', sans-serif;">

    <?php

        if(!isset($_SESSION['adminid']) )
        {
    ?>
        <script>window.location.href='../';</script>
    <?php
        }
        else
        {
            require_once("header.php");

            $adminid = err($_SESSION['adminid']);

            $sql="SELECT * FROM admins WHERE adminid = '$adminid'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);

            $isfemale = $row['forFemaleHostel'];
            $hostel = $row['hostel'];
    ?>

    <div style="width: 100vw; text-align: center;font-decoration: bold; margin-top: 5vh; font-size: 2.8vh;"> Pending Applications </div>


    <table class="table" style="width: 85vw; margin: auto;margin-top: 1vh; ">
        <thead  style="background-color: #CAEBF2;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Room No.</th>
                <th scope="col">Leave From</th>
                <th scope="col">Leave Till</th>
                <th scope="col">Address during Leave</th>
                <th scope="col">Guardian's number during leave</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

                <?php 

           
                    $sql="SELECT * FROM gatepass WHERE isfemale = '$isfemale' AND hostel = '$hostel' AND passStatus = '0' ORDER BY dateFiled ASC";

                    // echo "<script>window.alert('" . $title . $description . $required . $isfemale . $hostel . $room . $compStatus ."');</script>";     
                    $result=mysqli_query($conn,$sql);
                    if($result==false)
                    echo "<script>window.alert('Database Fetch failed due to some reason. Please try again.');</script>"; 
                    else
                    {
                        while($row=mysqli_fetch_array($result))
                        {
                            echo " <tr>    
                            <th scope='row'>" . $row['id'] . "</th>
                            <td>" . $row['room'] . "</td>
                            <td>" . $row['leaveFrom'] . "</td>
                            <td>" . $row['leaveTill'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['number'] . "</td>
                            <td>
                                <form action='gatePassAction.php' method='post'>
                                    <input type='hidden' name = 'id' value = '" . $row['id'] . "' />
                                    <input type='submit' name='approve' value='Approve' class='btn btn-success'/>
                                </form>
                            </td>
                            <td>
                                <form action='gatePassAction.php' method='post'>
                                    <input type='hidden' name = 'id' value = '" . $row['id'] . "' />
                                    <input type='submit' name='reject' value='Reject' class='btn btn-danger'/>
                                </form>
                            </td>";
                            
                            echo "</tr>";
                        }
                    }
                      
            ?>
        </tbody>
    </table>



    <div style="width: 100vw; text-align: center;font-decoration: bold; margin-top: 5vh; font-size: 2.8vh;"> Students About to go </div>


    <table class="table" style="width: 85vw; margin: auto;margin-top: 1vh; ">
        <thead  style="background-color: #CAEBF2;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Room No.</th>
                <th scope="col">Leave From</th>
                <th scope="col">Leave Till</th>
                <th scope="col">Address during Leave</th>
                <th scope="col">Guardian's number during leave</th>

            </tr>
        </thead>
        <tbody>

                <?php 

           
                    $sql="SELECT * FROM gatepass WHERE isfemale = '$isfemale' AND hostel = '$hostel' AND passStatus = '2' ORDER BY dateFiled ASC";

                    // echo "<script>window.alert('" . $title . $description . $required . $isfemale . $hostel . $room . $compStatus ."');</script>";     
                    $result=mysqli_query($conn,$sql);
                    if($result==false)
                    echo "<script>window.alert('Database Fetch failed due to some reason. Please try again.');</script>"; 
                    else
                    {
                        while($row=mysqli_fetch_array($result))
                        {
                            echo " <tr>    
                            <th scope='row'>" . $row['id'] . "</th>
                            <td>" . $row['room'] . "</td>
                            <td>" . $row['leaveFrom'] . "</td>
                            <td>" . $row['leaveTill'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['number'] . "</td>";
                            
                            echo "</tr>";
                        }
                    }
                      
            ?>
        </tbody>
    </table>


    <div style="width: 100vw; text-align: center;font-decoration: bold; margin-top: 5vh; font-size: 2.8vh;"> Students On Leave </div>


    <table class="table" style="width: 85vw; margin: auto;margin-top: 1vh; ">
        <thead  style="background-color: #CAEBF2;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Room No.</th>
                <th scope="col">Leave From</th>
                <th scope="col">Leave Till</th>
                <th scope="col">Address during Leave</th>
                <th scope="col">Guardian's number during leave</th>

            </tr>
        </thead>
        <tbody>

                <?php 

           
                    $sql="SELECT * FROM gatepass WHERE isfemale = '$isfemale' AND hostel = '$hostel' AND passStatus = '3' ORDER BY dateFiled ASC";

                    // echo "<script>window.alert('" . $title . $description . $required . $isfemale . $hostel . $room . $compStatus ."');</script>";     
                    $result=mysqli_query($conn,$sql);
                    if($result==false)
                    echo "<script>window.alert('Database Fetch failed due to some reason. Please try again.');</script>"; 
                    else
                    {
                        while($row=mysqli_fetch_array($result))
                        {
                            echo " <tr>    
                            <th scope='row'>" . $row['id'] . "</th>
                            <td>" . $row['room'] . "</td>
                            <td>" . $row['leaveFrom'] . "</td>
                            <td>" . $row['leaveTill'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['number'] . "</td>";
                            
                            echo "</tr>";
                        }
                    }
                      
            ?>
        </tbody>
    </table>

    <?php
        }
    ?>    



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>