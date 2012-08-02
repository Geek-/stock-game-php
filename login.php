<?

    // require common code
    require_once("includes/common.php"); 
    if (isset($_POST["action"])){
      if (empty($_POST["username"]) || empty($_POST["password"])){
        $error = true;
      }
      else{
        $username = mysql_real_escape_string($_POST["username"]);
        // prepare SQL
        $sql = "SELECT * FROM users WHERE username='$username'";
        // execute query
        $result = mysql_query($sql);
        // if we found user, check password
        if (mysql_num_rows($result) == 1){
          // grab row
          $row = mysql_fetch_array($result);
          // compare hash of user's input against hash that's in database
          if (crypt($_POST["password"], $row["hash"]) == $row["hash"]){
            // remember that user's now logged in by caching user's ID in session
            $_SESSION["id"] = $row["id"];
            // redirect to portfolio
            redirect("index.php");
          }
          else{
            $error2=true;
          }
        }else{
          $error3=true;
        }
      }
    }
?>

<!DOCTYPE html>

<html>

  <head>
    <link href="images/favicon.ico" type="images/x-icon"rel="shortcut icon">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>$tock: Home</title>
  </head>

  <body>
    <div id="top">
      <a href="index.php"><img alt="C$50 Finance" src="images/logo.png"></a>
    </div>
      <form action="login.php" method="post">
        <div>
                <? if($error): ?>
        <span>One or more fields is empty!</span>
      <? endif ?>
      <? if($error2): ?>
        <span>Incorrect password!</span>
      <? endif ?>
      <? if($error3): ?>
        <span>Incorrect username!</span>
      <? endif ?>
          <h1>Login</h1>
          <label>
            <span>Username:</span><input name="username" value="<?= htmlspecialchars($_POST["username"]) ?>" type="text">
          </label>
          <label>
            <span>Password:</span><input name="password" value="<?= htmlspecialchars($_POST["password"]) ?>" type="password">
          </label>
            <br>
            <input name="action" type="submit" value="Log In">
            <br>
            <input type="submit" name="submit1" value="Register" onclick="javascript: form.action='register.php';" />        
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
