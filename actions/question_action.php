<?php

session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];

$title = $_POST['title'];
$description = $_POST['description'];

$sql = "INSERT INTO questions(user_id,title,description)
VALUES('$user_id','$title','$description')";

if(mysqli_query($conn,$sql))
{
    header("Location: ../pages/home.php");
}
else
{
    echo "Error";
}

?>