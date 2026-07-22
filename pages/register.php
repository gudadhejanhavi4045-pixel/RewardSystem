<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
<h2>User Registration</h2>

<form action="../actions/register_action.php" method="POST">

    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Register</button>

</form>

<p>Already have an account?
<a href="login.php">Login</a>
</p>
</div>
</body>
</html>