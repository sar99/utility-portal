<?php
        require_once("../connect.php");
?>

<html>
<head> 

    <title> Home </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Poppins', sans-serif;">

    <?php

        if(!isset($_SESSION['adminid']))
        {
    ?>
        <script>window.location.href='../';</script>
    <?php
        }
        else
        {
            require_once("header.php");

            if(!isset($_GET['display']))
            {
    ?>

        <div style="width: 100vw; text-align: center;font-decoration: bold; margin-top: 5vh; font-size: 2.8vh;"> Menu Recommendations </div>


        <div id="initial" style="display: flex; flex-direction: row; flex-wrap: wrap;justify-content: center;align-items: center;margin-top: 10vh;">
        
            <div><img src="./img/recommendations.png" style="width: 600;max-width: 60vw;" /></div>
            <div><button type="button" class="btn" style="background-color: #FF3B3F;color: white;" onClick="callRecommendations()">Click here to get your recommendations</button></div>
        </div>

        <div id="spinner" style="display:none;margin: auto;margin-top: 40vh;text-align: center;">
            <div class="spinner-grow" style="width: 3rem; height: 3rem;background-color: #FF3B3F;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow" style="width: 3rem; height: 3rem;background-color: #CAEBF2;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow" style="width: 3rem; height: 3rem;background-color: #FF3B3F;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow" style="width: 3rem; height: 3rem;background-color: #CAEBF2;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>


    <?php
            }
            else
            {
                echo '<table class="table" style="width: 85vw; margin: auto;margin-top: 1vh; ">
                <thead  style="background-color: #CAEBF2;">
                    <tr>
                        <th scope="col">Ranking</th>
                        <th scope="col">Dish Name</th>
                        <th scope="col">Preferrence Factor</th>
                    </tr>
                </thead>
                <tbody>';
                $f = fopen("final_rating.csv", "r");
                $fr = fread($f, filesize("final_rating.csv"));
                fclose($f);
                $lines = array();
                $lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of... 

                for($i=0;$i<count($lines);$i++)
                {
                    echo "<tr>";
                    $cells = array(); 
                    $cells = explode(",",$lines[$i]); // use the cell/row delimiter what u need!
                    echo "<td>".($i+1)."</td>";
                    for($k=0;$k<count($cells);$k++)
                    {
                    echo "<td>".$cells[$k]."</td>";
                    }
                    // for k end
                    echo "</tr>";
                }

                echo '</tbody>
                </table>';

            }
        }
    ?>    



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>

        function callRecommendations()
        {
            document.getElementById("initial").style.display="none";
            document.getElementById("spinner").style.display="block";

            let url = "http://localhost:5000/my-link/";
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", url,  true);
            xhttp.send();

            setTimeout(
            function() {
            document.getElementById('spinner').style.display='none';
            window.location.href = "http://localhost/interface/admin/recommendation.php?display";
            }, 5000);


        }
    </script>
</body>
</html>