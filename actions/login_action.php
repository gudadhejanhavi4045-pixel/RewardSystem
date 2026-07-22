<?php

session_start();
include("../config/db.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
    $user = mysqli_fetch_assoc($result);

    if(password_verify($password, $user['password']))
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];

        header("Location: ../pages/home.php");
        exit();
    }
    else
    {
        echo "Wrong Password!";
    }
}
else
{
    echo "Email not found!";
}

?>