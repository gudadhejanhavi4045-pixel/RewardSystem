<?php
session_start();
include("../config/db.php");

$sender = $_SESSION['user_id'];

$receiver = $_POST['receiver_id'];

$points = $_POST['points'];

$user = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM users WHERE id='$sender'"));

if($user['points'] <= 10)
{
    die("You must have more than 10 points to transfer.");
}

if($points > $user['points'])
{
    die("Not enough points.");
}

mysqli_query($conn,
"UPDATE users
SET points = points - $points
WHERE id='$sender'");

mysqli_query($conn,
"UPDATE users
SET points = points + $points
WHERE id='$receiver'");

mysqli_query($conn,
"INSERT INTO transfers(sender_id,receiver_id,points)
VALUES('$sender','$receiver','$points')");

header("Location: ../pages/profile.php");
exit();
?>