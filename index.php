<?php
        require_once("connect.php");
?>

<html>
<head> 

    <title> Home </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    
</head>
<body style="font-family: 'Poppins', sans-serif;">

    <?php
        require_once("header.php");
    ?>

    <div style="margin-top: 7vh;">
        <img src="./img/food.png" style=" display: block; margin-left: auto; margin-right: auto; width: 900px; max-width: 80vw;"/>
        <!-- <div style="color: #FF3B3F; text-align: center; font-size: 2.5vh;">
            Move across the various sections and get your job done at a click...
        </div> -->

        <div id="alert" class="alert alert-danger" role="alert" style=" font-size: 2.5vh;width: 70vw;text-align: center;margin: auto;margin-bottom: 2vh;">
            Current number of students in the mess is <span id="number" style="font-size: 4vh;">0</span> and the maximum number of students allowed in the mess at once is 1
        </div>
    <div>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">


        var pageExecute = {

            fileContents:"Null",
            pagePrefix:"Null",
            slides:"Null",

            init: function () {
                $.ajax({
                    url: "./people-counting-opencv/current_people.txt",
                    async: false,
                    success: function (data){
                        pageExecute.fileContents = data;
                        console.log("hI");
                        console.log(data);
                    }
                });
            }
        };

    </script>
<script > 
     window.setInterval(function(){

        pageExecute.init();
        document.getElementById("number").innerHTML = (pageExecute.fileContents);
        console.log(pageExecute.fileContents);
        if(pageExecute.fileContents >=2 )
        {
            if(document.getElementById("alert").classList.contains("alert-success"))
            {
                document.getElementById("alert").classList.remove("alert-success");
                document.getElementById("alert").classList.add("alert-danger");
            }
        }
        else
        {
            if(document.getElementById("alert").classList.contains("alert-danger"))
            {
                document.getElementById("alert").classList.remove("alert-danger");
                document.getElementById("alert").classList.add("alert-success");
            }
        }
    },1000); 
    </script>

</body>
</html>