<?php
$class = ($rank == 1) ? "style='background:#fff8dc;font-weight:bold;'" : "";
?>

<tr <?php echo $class; ?>>
session_start();
include("../config/db.php");

$sql = "SELECT name, points FROM users ORDER BY points DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<div class="container">
<h2>🏆 Reward Leaderboard</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Rank</th>
    <th>Name</th>
    <th>Points</th>
</tr>

<?php
$rank = 1;

while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
    <td><?php echo $rank++; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['points']; ?></td>
</tr>

<?php
}
?>

</table>

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