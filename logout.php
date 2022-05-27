<?php

include_once 'db.php';
include_once "nav.php";

unset($_SESSION['username']);
unset($_SESSION['id']);

$_SESSION["message"]="You have logged out.";

header("Location: login.php");
