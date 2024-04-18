<?php
    $hst = "localhost";
    $usr_nm = "root";
    $pwrd = "";
    $dbase = "qms";
    // Create DB Connection
    $conn = mysqli_connect($hst, $usr_nm, $pwrd, $dbase);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

