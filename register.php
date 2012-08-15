<?
	require_once("includes/common.php");
	if (isset($_POST["action"])){
      if (empty($_POST["username"])||empty($_POST["password"])||empty($_POST["password2"])||empty($_POST["email"])){
        $message = "One or more fields is empty!";
      }
      else{
      	$username = mysql_real_escape_string($_POST["username"]);
		$hash = crypt($_POST["password"]);
		$email=mysql_real_escape_string($_POST["email"]);
		$sql = "SELECT * FROM users WHERE username='$username'";
		$add_user = "INSERT INTO users (username, hash, cash, email) VALUES('$username', '$hash', 10000.00, '$email')";
		$result = mysql_query($sql);
		if(mysql_num_rows($result)==1){
			$message="user name already taken!";
		}
		else if($_POST["password"]!=$_POST["password2"]){
			$message="Passwords do not match!";
		}
		else if(validEmail($email)==false){
			$message="Invalid e-mail address!";
		}else{
			if(mysql_query($add_user)){
				$id = mysql_insert_id();
				$_SESSION["id"]=$id;
				redirect("index.php");
			}else{
				$message="Could not add user to the database!";
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
						<span>User Name</span><input id="username" type="text" value="<?= htmlspecialchars($_POST["username"]) ?>" name="username" />
					</label>
					<label>
						<span>Password</span><input id="password" type="password" value="<?= htmlspecialchars($_POST["password"]) ?>" name="password" />
					</label>
					<label>
					<label>
						<span>Re-enter Password</span><input id="password2" type="password" value="<?= htmlspecialchars($_POST["password2"]) ?>" name="password2" />
					</label>
					<label>
						<span>E-mail address</span><input id="email" type="text" value="<?= htmlspecialchars($_POST["email"]) ?>" name="email" />
					</label>
					<br>
					<input name="action" type="submit" value="Register">
					            <br>
            
<input type="submit" name="submit1" value="Login" onclick="javascript: form.action='login.php';" />

						<br>
						<? if($message) print("<span>" . $message . "</span>"); ?>
				</div>
			</form>
			    <div id="botleft">
      <a href="https://github.com/sam-b/stock/">Source Code</a>
    </div>
    <div id="botright">
      <a href="http://sammy.ws">About me</a>
    </div>
	</body>
</html>