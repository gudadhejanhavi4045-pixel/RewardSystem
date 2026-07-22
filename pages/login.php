<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
<h2>User Login</h2>

<form action="../actions/login_action.php" method="POST">

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>

</form>

<p>
Don't have an account?
<a href="register.php">Register</a>
</p>
</div>
</body>
</html>