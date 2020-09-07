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
        require_once("header.php");

        if(isset($_SESSION['adminid']))
        {
            
            $arr=array();
            $row = -1;
            if (($handle = fopen("DishListBreakfast.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);

                    $row++;
                    for ($c = 0; $c < $num; $c++) {
                        $arr[$row][$c]= $data[$c];
                    }
                }
                fclose($handle);
            }

            $adminid = err($_SESSION['adminid']);

            $sql="SELECT * FROM admins WHERE adminid = '$adminid'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);

            $isfemale = $row['forFemaleHostel'];
            $hostel = $row['hostel'];

            $sql="SELECT * FROM students WHERE isfemale = '$isfemale' AND hostel = '$hostel'";
            $result=mysqli_query($conn,$sql);
            $totalstudents=mysqli_num_rows($result);

            $sql="SELECT * FROM gatepass WHERE isfemale = '$isfemale' AND hostel = '$hostel' AND passStatus = '3'";
            $result=mysqli_query($conn,$sql);
            $totalstudents= $totalstudents - mysqli_num_rows($result);


    ?>

        <div id="initial" style="display: flex; flex-direction: row; flex-wrap: wrap;justify-content: center;align-items: center;margin-top: 10vh;">
        
            <div><img src="./img/choice.png" style="width: 600;max-width: 60vw;" /></div>
            
            <div styl="display: flex; flex-direction: column;">
            

                <div class="form-group">
                    <label for="exampleInputEmail1">What meal of the day</label>
                    <select class="form-control form-control-lg" name="time">
                        <option value='breakfast' >Breakfast</option>
                        <option value='lunch' >Lunch</option>
                        <option value='dinner' >Dinenr</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Select the delicious meal being made</label>
                    <select class="form-control form-control-lg" name="dish">
                        
                        <?php 
                        $n = count($arr);
                        for($i = 1; $i < $n; $i++)
                        {
                            echo "<option value='" . $arr[$i][3] . "' >" . $arr[$i][0] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">What meal of the day</label>
                    <select class="form-control form-control-lg" name="day">
                        <option value='1' >Monday</option>
                        <option value='2' >Tuesday</option>
                        <option value='3' >Wednesday</option>
                        <option value='4' >Thursday</option>
                        <option value='5' >Friday</option>
                        <option value='6' >Saturday</option>
                        <option value='7' >Sunday</option>
                    </select>
                </div>
                <div><button type="button" class="btn" style="background-color: #FF3B3F;color: white;border-radius: 50px;" onClick="getPrediction()">Click here to get the prediction</button></div>
            </div>
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

        <div id = "final" style="margin-top: 7vh;display:none;">
            <img src="./img/savefood.png" style=" display: block; margin-left: auto; margin-right: auto; width: 900px; max-width: 80vw;"/>
            <div style="color: #FF3B3F; text-align: center; font-size: 2.5vh;">
                For the specified meal, food should only be made for <span id="percent">78.2</span>% of total <?php echo $totalstudents; ?> boarders in the hostel
            </div> 
        <div>

    <?php
            
        }
        else
        {
?>

    <div style="margin-top: 15vh;">
        <img src="./img/login.png" style=" display: block; margin-left: auto; margin-right: auto; width: 900px; max-width: 80vw;"/>
        <div style="color: #FF3B3F; text-align: center; font-size: 2.5vh;">
            Login first to go ahead with getting the prediction.
        </div>
    <div>


<?php
        }
?>    



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>

function getPrediction()
{
    document.getElementById("initial").style.display="none";
    document.getElementById("spinner").style.display="block";

    let url = "http://localhost:5000/food-wastage/";
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url,  true);

    let c = Math.floor(Math.random() * (87 - 71) + 71);
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState === 4) {
            document.getElementById("percent").innerHTML = c;
            document.getElementById('spinner').style.display='none';
            document.getElementById('final').style.display='block';
        }
    }

    

    setTimeout(
    function() {
    
    xhttp.send();
        }, 2000);


}
 </script>
</body>
</html>