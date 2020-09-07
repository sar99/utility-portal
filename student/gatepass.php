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

        if(isset($_SESSION['yr']) && isset($_SESSION['batch']) && isset($_SESSION['roll']) )
        {
    ?>



    <form action="applygatepass.php" method="post" style="width: 80vw;margin: auto; margin-top: 10vh;">

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Leave From</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="leave-from"  name="leave-from" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Leave Till</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="leave-till"  name="leave-till" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Address while vacation</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="address" rows="3" name="address"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Guardian's number</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="number"  name="number">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="submit" style="background-color: #FF3B3F;">Submit Application</button>
            </div>
        </div>
    </form>


    <div style="width: 100vw; text-align: center;font-decoration: bold; margin-top: 5vh; font-size: 2.8vh;"> Previous Application </div>


    <table class="table" style="width: 85vw; margin: auto;margin-top: 1vh; ">
        <thead  style="background-color: #CAEBF2;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date of applying for pass</th>
                <th scope="col">Leave From</th>
                <th scope="col">Leave Till</th>
                <th scope="col">Address during Leave</th>
                <th scope="col">Guardian's number during leave</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>

                <?php 

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

                    $sql="SELECT * FROM gatepass WHERE isfemale = '$isfemale' AND hostel = '$hostel' AND room = '$room' ORDER BY dateFiled DESC";

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
                            <td>" . $row['dateFiled'] . "</td>
                            <td>" . $row['leaveFrom'] . "</td>
                            <td>" . $row['leaveTill'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['number'] . "</td>";
                            if($row['passStatus']==0)
                            echo "<td style='color:#FF3B3F;'>Pending</td>";
                            else if($row['passStatus']==1)
                            echo "<td style='color:#FF3B3F;'>Approved By Warden/Supervisor</td>";
                            else if($row['passStatus']==-1)
                            echo "<td style='color:#A9A9A9;'>Cancelled By Warden/Supervisor</td>";
                            else if($row['passStatus']==2)
                            echo "<td style='color:#FF3B3F;'>Good to go</td>";
                            else if($row['passStatus']==-2)
                            echo "<td style='color:#A9A9A9;'>Cancelled by control room</td>";
                            else if($row['passStatus']==3)
                            echo "<td style='color:#008F95;'>On Leave</td>";
                            else if($row['passStatus']==-3)
                            echo "<td style='color:#008F95;'>Back to Institute</td>";
                            else 
                            echo "<td style='color:#A9A9A9;'>Invalid Status</td>";
                            
                            echo "</tr>";
                        }
                    }
                }
                else
                {
                    echo "<script>window.alert('Invalid Request');</script>";     
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
                Login first to go ahead with applying for a Gate Pass.
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