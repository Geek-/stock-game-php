<?
	require_once("includes/common.php");

	$username = mysql_real_escape_string($_POST["username"]);
	$hash = crypt($_POST["password"]);

	$sql = "SELECT * FROM users WHERE username='$username'";
	$add_user = "INSERT INTO users (username, hash, cash) VALUES('$username', '$hash', 10000.00)";
	$result = mysql_query($sql);

	if(mysql_num_rows($result)==1){
		apologize("user name already taken");
	}
	if(empty($_POST["username"])||empty($_POST["password"])){
		apologize("password or username field is empty!");
	}
	if(mysql_query($add_user)){
		$id = mysql_insert_id();
		$_SESSION["id"]=$id;
		redirect("index.php");
	}
	aplogize("could not insert into database!");
?>