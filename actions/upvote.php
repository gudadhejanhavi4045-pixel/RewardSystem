<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../pages/login.php");
    exit();
}
// Get answer details
$sql = "SELECT * FROM answers WHERE id='$answer_id'";
$result = mysqli_query($conn, $sql);
$answer = mysqli_fetch_assoc($result);
$answer_id = $_GET['id'];
$question_id = $_GET['question'];
// Prevent self upvote
if($answer['user_id'] == $_SESSION['user_id'])
{
    die("You cannot upvote your own answer.");
}


// Increase upvotes
mysqli_query($conn,
"UPDATE answers
SET upvotes = upvotes + 1
WHERE id='$answer_id'");
// Get updated answer
$sql = "SELECT * FROM answers WHERE id='$answer_id'";
$result = mysqli_query($conn, $sql);
$answer = mysqli_fetch_assoc($result);

if($answer['upvotes'] >= 5 && $answer['reward_given'] == 0)
{
    mysqli_query($conn,
    "UPDATE users
     SET points = points + 5
     WHERE id='{$answer['user_id']}'");

    mysqli_query($conn,
    "UPDATE answers
     SET reward_given = 1
     WHERE id='$answer_id'");
}
// Get answer details
$result = mysqli_query($conn,
"SELECT * FROM answers WHERE id='$answer_id'");

$answer = mysqli_fetch_assoc($result);

// Give reward only once when upvotes reach 5
if($answer['upvotes'] >= 5 && $answer['reward_given'] == 0)
{
    mysqli_query($conn,
    "UPDATE users
     SET points = points + 5
     WHERE id='".$answer['user_id']."'");

    mysqli_query($conn,
    "UPDATE answers
     SET reward_given = 1
     WHERE id='$answer_id'");
}

header("Location: ../pages/view_question.php?id=".$question_id);
exit();
?>