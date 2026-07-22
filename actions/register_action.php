<?php

include("../config/db.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Encrypt the password
$password = password_hash($password, PASSWORD_DEFAULT);

// Insert user into database
$sql = "INSERT INTO users (name, email, password)
VALUES ('$name', '$email', '$password')";

if(mysqli_query($conn, $sql))
{
    echo "Registration Successful!";
}
else
{
    echo "Error: " . mysqli_error($conn);
}

?>