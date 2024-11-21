<?php
$connect = mysqli_connect(
    'localhost', 
    'root', 
    'root', 
    'http5225_assignment_1' //  your database name, double check the database broskie
);

if(!$connect) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>