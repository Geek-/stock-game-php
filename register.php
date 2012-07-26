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
			$error2=true;
		}
		else if($_POST["password"]!=$_POST["password2"]){
			$error4=true;
		}
		else{
			if(mysql_query($add_user)){
				$id = mysql_insert_id();
				$_SESSION["id"]=$id;
				redirect("index.php");
			}else{
				$error3=true;
			}
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

		<div id="top">
			<a href="index.php"><img alt="$tock" src="images/logo.png"></a>
		</div>

		<form action="register.php" method="post">
				<div>
					<h1>Register</h1>
					<label>
						<span>User Name</span><input id="username" type="text" name="username" />
					</label>
					<label>
						<span>Password</span><input id="password" type="password" name="password" />
					</label>
					<label>
						<span>Re-enter Password</span><input id="password2" type="password" name="password2" />
					</label>
					<br>
					<input name="action" type="submit" value="Register">
					            <br>
            
<input type="submit" name="submit1" value="Login" onclick="javascript: form.action='login.php';" />

						<br>
						<? if($error1): ?>
        	<span>One or more fields is empty!</span>
      	<? endif ?>
        <? if($error2): ?>
        	<span>user name already taken</span>
      	<? endif ?>
        <? if($error3): ?>
        	<span>Could not add user to the database!</span>
      	<? endif ?>
      	<? if($error4): ?>
        	<span>Passwords do not match!</span>
      	<? endif ?>

				</div>
			</form>
	</body>
</html>