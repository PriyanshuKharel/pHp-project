<?php

include_once 'db.php';
include_once "nav.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($name == "" || $email == "" || $password == "") {
        $_SESSION['error'] = "Please fill all the fields";
        header("Location: register.php");
    }

    $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE username='$username' AND password='$password'"));
        $_SESSION['message'] = "User created successfully.";
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $user['id'];
        header("Location: index.php");
    } else {
        $_SESSION["error"] = "Unable to create new user. Please try again.Try again with a unique username.";
        header("Location: register.php");
    }
}


?>
<form method="POST">
    <h1 style="margin:5px;padding:5px;">Register Page</h1>


    <div class="form-control">
        <label for="name">Name</label>
        <input required type="text" id="name" name="name" placeholder="Enter Your Full Name">
    </div>

    <div class="form-control">
        <label for="username">Username</label>
        <input required type="text" id="username" name="username" placeholder="Enter Username">
    </div>
    <div class="form-control">
        <label for="password">Password</label>
        <input required type="password" id="password" name="password" placeholder="Enter Password">
    </div>
    <div class="form-control">
        <button type="submit">Register</button>
    </div>



</form>