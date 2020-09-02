<?php
        require_once("../connect.php");
?>

<html>
<head> 

    <title>Complaints </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Poppins', sans-serif;">

    <?php
        require_once("header.php");

        if(isset($_SESSION['yr']) && isset($_SESSION['batch']) && isset($_SESSION['roll']) )
        {
    ?>



    <form action="filecomplaint.php" method="post" style="width: 80vw;margin: auto; margin-top: 10vh;">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Complaint Title</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="title" placeholder="Title of Complaint" name="title" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
            </div>
        </div>

        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Help required from: </legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="required" id="carpenter" value="carpenter" checked>
                        <label class="form-check-label" for="carpenter">
                            Carpenter
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="required" id="electrician" value="electrician">
                        <label class="form-check-label" for="electrician">
                            Electrician
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="required" id="plumber" value="plumber">
                        <label class="form-check-label" for="plumber">
                            Plumber
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="required" id="cleaner" value="cleaner">
                        <label class="form-check-label" for="cleaner">
                            Cleaner
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="submit" style="background-color: #FF3B3F;">Submit Complaint</button>
            </div>
        </div>
    </form>


    <div style="width: 100vw; text-align: center;font-decoration: bold; margin-top: 5vh; font-size: 2.8vh;"> Previous Complaints </div>


    <table class="table" style="width: 85vw; margin: auto;margin-top: 1vh; ">
        <thead  style="background-color: #CAEBF2;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Help required from</th>
                <th scope="col">Status</th>
                <th scope="col">Date of filing complaint</th>
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

                    $sql="SELECT * FROM complaints WHERE isfemale = '$isfemale' AND hostel = '$hostel' AND room = '$room' ORDER BY date DESC";

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
                            <td>" . $row['title'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['helpBy'] . "</td>";
                            if($row['compStatus']==0)
                            echo "<td style='color:#FF3B3F;'>Pending</td>";
                            else
                            echo "<td style='color:#A9A9A9;'>Completed</td>";
                        
                            echo "<td>" . $row['date'] . "</td>
                            </tr>";
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
                Login first to go ahead with filing a complaint.
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