<?php
include_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['message'] = "User logged in successfully.";
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $row['id'];
        header("Location: index.php");
    } else {
        $error = "Your username or password is incorrect";
    }
}
include_once "nav.php";
?>
<form method="POST">
    <h1 style="margin:5px;padding:5px;">Login Page</h1>
    <div class="form-control">
        <label for="username">Username</label>
        <input required type="text" id="username" name="username" placeholder="Enter Username">
    </div>
    <div class="form-control">
        <label for="password">Password</label>
        <input required type="password" id="password" name="password" placeholder="Enter Password">
    </div>
    <div class="form-control">
        <button type="submit">Login</button>
    </div>
</form>