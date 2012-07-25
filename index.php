<?

    // require common code
    require_once("includes/common.php"); 

?>

<!DOCTYPE html>

<html>

  <head>
    <link href="images/favicon.ico" type="images/x-icon"rel="shortcut icon">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>$tock: Home</title>
  </head>

  <body>
    <div id="nav">
      <a href="index.php">home</a>
      <a href="quote.php">Quote</a>
      <a href="logout.php">Logout</a>
    </div>
    <div id="top">
      <a href="index.php"><img alt="C$50 Finance" height="110" src="images/logo.png" width="544"></a>
    </div>
    <div id="middle">
      <?
        $id=$_SESSION["id"];
        $result = mysql_query("SELECT symbol, shares FROM portfolio WHERE id=$id");
        if($result){
          while($row = mysql_fetch_array($result)){
            $s = lookup($row["symbol"]);
            print('<tr>');
            print('<td>' . $s->name . '</td>');
            print('<td>' . $row["shares"] . '</td>');
            print('</tr>');
          }
        }
      ?>
    </div>
  </body>
</html>
