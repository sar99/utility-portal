<?php
        require_once("../connect.php");
?>

<html>
<head> 

    <title> Rate Meal </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Poppins', sans-serif;">

    <?php

        if(!(isset($_SESSION['yr']) && isset($_SESSION['batch']) && isset($_SESSION['roll']) ))
        {
        ?>

            <script>window.location.href='../';</script>

        <?php
        }
        else
        {
            require_once("header.php");

            $yr=err($_SESSION['yr']);
            $batch=err($_SESSION['batch']);
            $rollno=err($_SESSION['roll']);



            if(isset($_POST['rating']) && isset($_SESSION['yr']) )
            {
                $foodrate = err($_POST['rating']);

                $sql="UPDATE students SET foodrate='$foodrate' WHERE yr = '$yr' AND batch = '$batch' AND roll = '$rollno'";
                $result=mysqli_query($conn,$sql);
                
            }
            
            $sql="SELECT * FROM students WHERE yr = '$yr' AND batch = '$batch' AND roll = '$rollno' AND foodrate = '0'";
            $result=mysqli_query($conn,$sql);
            $num_rows = mysqli_num_rows($result);
            if($num_rows!=0)
            {
    ?>

        <div style="width: 100vw; text-align: center;font-decoration: bold; margin-top: 5vh; font-size: 2.8vh;"> Rate Your Last Meal </div>

        <form action="ratemeal.php" method="post" style="display: flex; flex-direction: column; align-items: center;">
            <div style="display: flex;flex-direction: row; flex-wrap: wrap; justify-content: center;margin-left: auto; margin-right: auto;margin-top: 10vh;">
                <div class="form-check ">
                    <input class="form-check-input" type="radio" id="rating" name="rating" value="1" checked>
                    <label class="form-check-label" for="inlineCheckbox3">  
                        <div style="display: flex; flex-direction: column; justify-content: end; align-items: center;">
                            <div style="color: #FF3B3F; text-align: center; font-size: 2.5vh;"> Satisfied </div> 
                            <img src="./img/happy.png" style=" width: 400px; max-width: 80vw;"/>
                        </div>
                    </label>
                </div>
                <div class="form-check ">
                    <input class="form-check-input" type="radio" id="rating" name="rating" value="2">
                    <label class="form-check-label" for="inlineCheckbox3"> 
                        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div style="color: #FF3B3F; text-align: center; font-size: 2.5vh;"> Not satisfied </div> 
                            <img src="./img/sad.png" style=" width: 400px; max-width: 80vw;"/>
                        </div>
                    </label>
                </div>
                <div class="form-check ">
                    <input class="form-check-input" type="radio" id="rating" name="rating" value="3">
                    <label class="form-check-label" for="inlineCheckbox3">  
                        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div style="color: #FF3B3F; text-align: center; font-size: 2.5vh;"> Went out or ordered</div> 
                            <img src="./img/wentout.png" style=" width: 300px; max-width: 60vw;"/>
                        </div>
                    </label>
                </div>
            </div>    
            <div>
                <input type="submit" value="Submit the rating" style="background-color: #FF3B3F;color: white; margin-top: 2vh;font-size: 2.5vh;margin: 20px; padding: 10px;">
            </div>
        </form>    

    <?php
            }
            else
            {
    ?>
        <div style="margin-top: 15vh;">
            <img src="./img/horray.png" style=" display: block; margin-left: auto; margin-right: auto; width: 900px; max-width: 80vw;"/>
            <div style="color: #FF3B3F; text-align: center; font-size: 2.5vh;">
                Yayy! You have already rated the last meal. Thank you for your support. We'll make sure to give the best recommendations for your food.
            </div>
        <div>

    <?php
            }
        }
    ?>    
   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>