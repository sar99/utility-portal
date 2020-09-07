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
        require_once("header.php");

        if(isset($_SESSION['id']) )
        {

            $id = err($_SESSION['id']);

    ?>

    <div style="width: 100vw; text-align: center;font-decoration: bold; margin-top: 5vh; font-size: 2.8vh;"> Pending Applications </div>


    <table class="table" style="width: 85vw; margin: auto;margin-top: 1vh; ">
        <thead  style="background-color: #CAEBF2;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Hostel</th>
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

           
                    $sql="SELECT * FROM gatepass WHERE passStatus = '1' ORDER BY dateFiled ASC";

                    // echo "<script>window.alert('" . $title . $description . $required . $isfemale . $hostel . $room . $compStatus ."');</script>";     
                    $result=mysqli_query($conn,$sql);
                    if($result==false)
                    echo "<script>window.alert('Database Fetch failed due to some reason. Please try again.');</script>"; 
                    else
                    {
                        while($row=mysqli_fetch_array($result))
                        {
                            echo " <tr>    
                            <th scope='row'>" . $row['id'] . "</th>";
                            if($row['isfemale']=='1')
                            echo "<td>GH" . $row['hostel'] . "</td>";
                            else
                            echo "<td>BH" . $row['hostel'] . "</td>";

                            echo "
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


    <?php

        }
        else
        {

    ?>

        <div style="margin-top: 15vh;">
            <img src="./img/login.png" style=" display: block; margin-left: auto; margin-right: auto; width: 900px; max-width: 80vw;"/>
            <div style="color: #FF3B3F; text-align: center; font-size: 2.5vh;">
                Login first to go ahead with pending applications for Gate Pass.
            </div>
        <div>


    <?php
        }
    ?>    



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>