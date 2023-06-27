<html>
	<body>
<form action="Sign.php" method="POST">
    User(POST): <input type="text" name="user">
    Password: <input type="password" name="password">    
	<input type="submit" value = "Sign">
</form>
<form action="ResetPassword.php" method="POST">
	User(POST): <input type="text" name="user">
	New Password(POST): <input type="password" name="NewPass">
	Confirm Password: <input type="password" name = "ConfPass"> 
<input type="submit" value = "Reset">
</form>
</body>
</html>
