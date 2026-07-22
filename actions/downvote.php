<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../pages/login.php");
    exit();
}

$answer_id = $_GET['id'];
$question_id = $_GET['question'];

// Get answer details
$result = mysqli_query($conn, "SELECT * FROM answers WHERE id='$answer_id'");
$answer = mysqli_fetch_assoc($result);

// Reduce one point if the user has points
mysqli_query($conn,
"UPDATE users
SET points = GREATEST(points - 1, 0)
WHERE id='".$answer['user_id']."'");

// Optional: reduce upvotes if greater than 0
mysqli_query($conn,
"UPDATE answers
SET upvotes = GREATEST(upvotes - 1, 0)
WHERE id='$answer_id'");

header("Location: ../pages/view_question.php?id=".$question_id);
exit();
?>