<?php

if(isset($_GET['msg']))
{
    if($_GET['msg']=="answer_added")
    {
        echo "<p style='color:green;'>Answer Submitted Successfully!</p>";
    }

    if($_GET['msg']=="upvoted")
    {
        echo "<p style='color:green;'>Answer Upvoted!</p>";
    }
}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("../config/db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($id == 0)
{
    die("Invalid Question ID");
}

$sql = "SELECT * FROM questions WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$question = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Question</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">

<h2><?php echo $question['title']; ?></h2>

<p><?php echo $question['description']; ?></p>

<hr>

<h3>Write Your Answer</h3>

<form action="../actions/answer_action.php" method="POST">

    <input type="hidden" name="question_id" value="<?php echo $id; ?>">

    <textarea name="answer" rows="5" cols="60" required></textarea>

    <br><br>

    <button type="submit">Submit Answer</button>

</form>

<hr>

<h3>Answers</h3>

<?php

$sql = "SELECT answers.*, users.name
        FROM answers
        JOIN users ON answers.user_id = users.id
        WHERE question_id='$id'
        ORDER BY answers.id DESC";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
{
?>

<div class="card">

<b><?php echo $row['name']; ?></b>

<p><?php echo $row['answer']; ?></p>

<p>Upvotes: <?php echo $row['upvotes']; ?></p>

<a href="../actions/upvote.php?id=<?php echo $row['id']; ?>&question=<?php echo $id; ?>">
👍 Upvote
</a>
<br>

<a href="../actions/downvote.php?id=<?php echo $row['id']; ?>&question=<?php echo $id; ?>">
👎 Downvote
</a>
</div>

<?php
}
}
else
{
    echo "<p>No answers yet.</p>";
}
?>

<br>

<a href="home.php">← Back to Home</a>
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