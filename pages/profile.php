<?php

session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">

<h2>👤 My Profile</h2>

<div class="card">

<p><strong>Name:</strong> <?php echo $user['name']; ?></p>

<p><strong>Email:</strong> <?php echo $user['email']; ?></p>

<p><strong>Reward Points:</strong> <?php echo $user['points']; ?></p>

</div>

<a href="home.php">Home</a>
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