<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ask Question</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">

<h2>Ask a Question</h2>

<form action="../actions/question_action.php" method="POST">

<label>Question Title</label><br>
<input type="text" name="title" required><br><br>

<label>Description</label><br>
<textarea name="description" rows="5" cols="50" required></textarea><br><br>

<button type="submit">Post Question</button>

</form>

<br>

<a href="home.php">Back to Home</a>
</div>
</body>
<div class="navbar">

<a href="home.php">Home</a>

<a href="ask_question.php">Ask Question</a>

<a href="profile.php">My Profile</a>

<a href="leaderboard.php">Leaderboard</a>

<a href="../logout.php">Logout</a>

<span class="welcome">
Welcome <?php echo $_SESSION['name']; ?>
</span>

<div class="clear"></div>

</div>

<div class="container">
</html>
