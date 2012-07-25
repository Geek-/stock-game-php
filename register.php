<?
	require_once("includes/common.php");
	if (isset($_POST["action"])){
      if (empty($_POST["username"])||empty($_POST["password"])||empty($_POST["password2"])){
        $error1 = true;
      }
      else{
      	$username = mysql_real_escape_string($_POST["username"]);
		$hash = crypt($_POST["password"]);

		$sql = "SELECT * FROM users WHERE username='$username'";
		$add_user = "INSERT INTO users (username, hash, cash) VALUES('$username', '$hash', 10000.00)";
		$result = mysql_query($sql);

		if(mysql_num_rows($result)==1){
			$eror2=true;
		}
		if(mysql_query($add_user)){
			$id = mysql_insert_id();
			$_SESSION["id"]=$id;
			redirect("index.php");
		}else{
			$error3=true;
		}
      }
	}
?>

<!DOCTYPE html>
<html>

	<head>
		<link href="images/favicon.ico"type="image/x-icon"rel="shortcut icon">
		<link href="css/styles.css" rel="stylesheet" type="text/css">
		<title>$tock: Register</title>
	</head>

	<body>
		<div id="nav">
      		<a href="index.php">home</a>
      		<a href="quote.php">Quote</a>
      		<a href="logout.php">Logout</a>
    	</div>
		<div id="top">
			<a href="index.php"><img alt="$tock" src="images/logo.png"></a>
		</div>

		<div id="middle">
			<form action="register.php" method="post">
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
						<td colspan="2"><input name="action" type="submit" value="Register"></td>
					</tr>
				</table>
			</form>
		</div>
		<? if($error1): ?>
        	<div style="color:red;">One or more fields is empty!</div>
      	<? endif ?>
        <? if($error2): ?>
        	<div style="color:red;">user name already taken</div>
      	<? endif ?>
        <? if($error3): ?>
        	<div style="color:red;">Could not add user to the database!</div>
      	<? endif ?>
		<div id="bottom">
			or <a href="login.php">login</a> to an existing account.
		</div>

	</body>
</html>