<?php
$con=mysqli_connect("localhost","root","","fateh");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}