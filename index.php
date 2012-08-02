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
<div id='cssmenu'>
<ul>
   <li class='active '><a href='index.php'><span>Home</span></a></li>
   <li><a href='about.php'><span>About</span></a></li>
   <li><a href='rankings.php'><span>Rankings</span></a></li>
   <li><a href='sell.php'><span>Sell</span></a></li>
   <li><a href='quote.php'><span>Quote</span></a></li>
   <li><a href='buy.php'><span>Buy</span></a></li>
   <li><a href='logout.php'><span>Logout</span></a></li>
</ul>
</div>
    <div id="center">
      <br>
      <?
        $id=$_SESSION["id"];
        $result = mysql_query("SELECT symbol, shares FROM portfolio WHERE id=$id");
        if($result){
          $cash = mysql_fetch_array(mysql_query("SELECT cash FROM users WHERE id=$id"));
          $cash = $cash[0];
          print("<form><h1>Your Shares</h1>");
          while($row = mysql_fetch_array($result)){
            $s = lookup($row["symbol"]);
            print('<span>');
            print($s->name);
            print(' ' . $row["shares"] . '.');
            print('</span> <br>');
          }
          print("You have $");
          print($cash);
          print("</form>");
        }
      ?>
    </div>
        <div id="botleft">
      <a href="https://github.com/sam-b/stock/">Source Code</a>
    </div>
    <div id="botright">
      <a href="http://sammy.ws">About me</a>
    </div>
  </body>
</html>
