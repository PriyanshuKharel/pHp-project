<?php
session_start();
$isLoggedIn = isset($_SESSION['id'] )? true : false;
$conn = mysqli_connect("localhost", "root", "", "cv");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

