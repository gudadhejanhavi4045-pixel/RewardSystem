<?php
if(isset($_GET['msg']))
{
    if($_GET['msg']=="question_added")
    {
        echo "<p style='color:green;'>Question Posted Successfully!</p>";
    }
}
?>
<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}
include("../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>
<h1>Reward-Based Q&A System</h1>

<p>
Ask questions, answer others, earn reward points, and climb the leaderboard.
</p>
<p>
This is a Reward-Based Question & Answer System where users can ask questions,
answer questions, earn reward points, receive bonus rewards for popular answers,
transfer points to other users, and compete on the leaderboard.
</p>
<hr>
<hr>
<a href="ask_question.php">Ask Question</a>

<br><br>
<a href="profile.php">My Profile</a>
<br><br>
<a href="transfer.php">💸 Transfer Points</a>

<br><br>
<a href="leaderboard.php">🏆 Leaderboard</a>
<br><br>
<hr>

<h3>All Questions</h3>

<?php

$sql = "SELECT * FROM questions ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
?>


<div class="question-card">

<h3><?php echo $row['title']; ?></h3>

<p><?php echo $row['description']; ?></p>

<a href="view_question.php?id=<?php echo $row['id']; ?>">
View Answers
</a>

</div>

<?php
}
?>
<a href="../logout.php">Logout</a>
</div>
<hr>

<center>
    Reward System Project © 2026
</center>
</body>
<center>

<img src="../images/logo.png" width="100">

<h1>Reward-Based Question & Answer System</h1>

<p>Ask Questions • Answer Questions • Earn Reward Points</p>

</center>

<hr>
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
</html>[pn  