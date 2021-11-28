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

    <div style="width: 100vw; text-align: center;font-decoration: bold; margin-top: 7vh; font-size: 2.8vh;"> Select your Role </div>
   
    <div style="margin-top: 5vh;">
        <div id="initial" style="display: flex; flex-direction: row; flex-wrap: wrap;justify-content: center;align-items: center;margin-top: 10vh;">
            

            <!-- For any role, display modal if not logged in before, else redirect to the required dashboard -->
            <div>
                <?php 
                    if(isset($_SESSION['yr']) && isset($_SESSION['batch']) && isset($_SESSION['roll']) )
                    {
                ?>

                <a class="nav-link" href="./student/complaint.php">
                <?php

                    }
                    else {
                ?>
                <a class="nav-link" href="" data-toggle="modal" data-target="#StudentLoginModal">
                <?php
                    }
                ?>
                    <button type="button" class="btn" style="background-color: #FF3B3F;color: white; margin: 0 2vw;"> Student </button>
                </a>
            </div>


            <div>
                <?php 
                    if(isset($_SESSION['adminid']))
                    {
                ?>

                <a class="nav-link" href="./admin/recommendation.php">
                <?php

                    }
                    else {
                ?>
                <a class="nav-link" href="" data-toggle="modal" data-target="#AdminLoginModal">
                <?php
                    }
                ?>
                    <button type="button" class="btn" style="background-color: #FF3B3F;color: white; margin: 0 2vw;"> Hostel Admin </button>
                </a>
            </div>

            <div>
                <?php 
                    if(isset($_SESSION['id']))
                    {
                ?>

                <a class="nav-link" href="./security/gatepass.php">
                <?php

                    }
                    else {
                ?>
                <a class="nav-link" href="" data-toggle="modal" data-target="#SecurityLoginModal">
                <?php
                    }
                ?>
                    <button type="button" class="btn" style="background-color: #FF3B3F;color: white; margin: 0 2vw;"> Security Personnel </button>
                </a>
            </div>


        </div>
    <div>

    <div id="initial" style="display: flex; flex-direction: row; flex-wrap: wrap;justify-content: center;align-items: center;margin-top: 5vh;">
        <div><img src="./img/user-profile.png" style="width: 600;max-width: 60vw;" /></div>
    </div>

    <!-- Student Login Modal -->
    <div class="modal fade" id="StudentLoginModal" tabindex="-1" role="dialog" aria-labelledby="StudentLoginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="./student/login.php" method="post">
                    <label for="exampleInputPassword1">Roll No.</label>
                    <div class="form-inline">
                                <input type="text" class="form-control" id="yr" placeholder=" " style="width: 30%;" name="yr" value="2018" required=""> -
                                <input type="text" class="form-control" id="batch" placeholder=" " style="width: 30%;" name="batch" value="BCS" required=""> -
                                <input type="text" class="form-control" id="rollno" placeholder=" " style="width: 30%;" name="rollno" value="48" required="">
                                <small id="emailHelp" class="form-text text-muted">Enter in format: 20XX-XXX-000</small>

                    </div><br>
                    <div class="form-group">
                            <label for="Password">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" value="abcd1234" required="">
                    </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary"  name="submit" style="background-color: #FF3B3F;">Login</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Hostel Admin Login Modal  -->
    <div class="modal fade" id="AdminLoginModal" tabindex="-1" role="dialog" aria-labelledby="AdminLoginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="./admin/login.php" method="post">
                    <label for="exampleInputPassword1">Admin ID</label>
                    <div class="form-group">
                                <input type="text" class="form-control" id="adminid" placeholder="Enter ID "  name="adminid" value="1" required> 

                    </div><br>
                    <div class="form-group">
                            <label for="Password">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" value="abcd1234" required="">
                    </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary"  name="submit" style="background-color: #FF3B3F;">Login</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>


    <!-- Security Personnel Login Modal -->
    <div class="modal fade" id="SecurityLoginModal" tabindex="-1" role="dialog" aria-labelledby="SecurityLoginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="./security/login.php" method="post">
                    <label for="exampleInputPassword1">ID</label>
                    <div class="form-group">
                                <input type="text" class="form-control" id="id" placeholder="Enter ID "  name="id" value="1" required> 

                    </div><br>
                    <div class="form-group">
                            <label for="Password">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" value="abcd1234" required="">
                    </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary"  name="submit" style="background-color: #FF3B3F;">Login</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>