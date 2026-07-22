<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$question_id = $_POST['question_id'];
$answer = $_POST['answer'];

// Save answer
$sql = "INSERT INTO answers(question_id, user_id, answer)
VALUES('$question_id','$user_id','$answer')";

if(mysqli_query($conn,$sql))
{
    // Give 5 reward points
    mysqli_query($conn,"UPDATE users SET points = points + 5 WHERE id='$user_id'");

    // Redirect back
    header("Location: ../pages/view_question.php?id=".$question_id);
    exit();
}
else
{
    echo mysqli_error($conn);
}
?>