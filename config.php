<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbh";

    //Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    mysqli_set_charset($conn , 'UTF8');
    session_start();
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
?>

