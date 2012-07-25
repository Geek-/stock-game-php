<?

    // require common code
    require_once("includes/common.php"); 
    if (isset($_POST["action"])){
      if (empty($_POST["username"]) || empty($_POST["password"]))
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
          if (crypt($_POST["password"]) == $row["hash"]){
            // remember that user's now logged in by caching user's ID in session
            $_SESSION["id"] = $row["id"];
            // redirect to portfolio
            redirect("index.php");
          }
          else{
            $error2=true;
          }
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
      <a href="index.php"><img alt="C$50 Finance" height="110" src="images/logo.png" width="544"></a>
    </div>
    <div id="middle">
      <? if($error): ?>
        <div style="color:red;">One or more fields is empty!</div>
      <? endif ?>
      <? if($error2): ?>
        <div style="color:red;">Incorrect password!</div>
      <? endif ?>
      <form action="login.php" method="post">
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
            <td colspan="2"><input type="submit" value="Log In"></td>
          </tr>
        </table>
      </form>

    <div id="bottom">
      or <a href="register.php">register</a> for an account
    </div>

  </body>

</html>
