<?php
    $server = "localhost";
    $dbusername = "root";
    $password = "";
    $database = "clinic_system";

    $conn = mysqli_connect($server, $dbusername, $password, $database);
    
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    //   }
    //   echo "Successfully connected to database $database";
   
?>