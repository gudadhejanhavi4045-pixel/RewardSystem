<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$user = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM users WHERE id='$user_id'"));

$users = mysqli_query($conn,
"SELECT id,name FROM users WHERE id!='$user_id'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Transfer Points</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="container">

<h2>Transfer Reward Points</h2>

<p>Your Points: <b><?php echo $user['points']; ?></b></p>

<form action="../actions/transfer_action.php" method="POST">

<label>Select User</label>

<select name="receiver_id" required>

<?php
while($row=mysqli_fetch_assoc($users))
{
?>
<option value="<?php echo $row['id']; ?>">
<?php echo $row['name']; ?>
</option>
<?php
}
?>

</select>

<br><br>

<label>Points</label>

<input type="number" name="points" required>

<br><br>

<button type="submit">
Transfer
</button>

</form>

<br>

<a href="home.php">Back Home</a>

</div>

</body>
</html>