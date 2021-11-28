<?php
    //Start session management
    session_start();

    //SQL Database connections
    $conn=mysqli_connect("localhost","root","","MinorProject")
            or die('Error connecting to MySQL server.'); 
            
    date_default_timezone_set('Asia/Kolkata');

    function err($n)
    {
        $n=trim($n);//remove extra tab spaces
        $n=stripslashes($n);//remove blackslashes from input to avoid xss attack
        $n=htmlspecialchars($n);//convert html to plain text
        return $n;
    }

?>