<?
	require_once("includes/common.php");
?>

<!DOCTYPE html>
<html>

	<head>
		<link href="images/favicon.ico"type="image/x-icon"rel="shortcut icon">
		<link href="css/styles.css" rel="stylesheet" type="text/css">
		<title>$tock: Register</title>
	</head>

	<body>
		<div id="top">
			<a href="index.php"><img alt="$tock" src="images/logo.png"></a>
		</div>

		<div id="middle">
			<form action="register2.php" method="post">
				<table>
					<tr>
						<td>Username:</td>
						<td><input name="username" type="text"></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input name="password" type="password"></td>
					</tr>
					<tr>
						<td>Re-enter Password:</td>
						<td><input name="password2" type="password"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Register"></td>
					</tr>
				</table>
			</form>
		</div>

		<div id="bottom">
			or <a href="login.php">login</a> to an existing account.
		</div>

	</body>
</html>