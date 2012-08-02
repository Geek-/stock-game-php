<?

    // require common code
    require_once("includes/common.php");
    if (isset($_POST["action"])){
      if (empty($_POST["symbol"])||empty($_POST["amount"])){
        $error1 = true;
      }
      else{
        if(preg_match("/^\d+$/", $_POST["amount"])){
          $id=$_SESSION["id"];
          $amount=mysql_real_escape_string($_POST["amount"]);
          $symbol=mysql_real_escape_string($_POST["symbol"]);
          $value = lookup($symbol) -> price;
          mysql_query("INSERT INTO portfolio (id, symbol, shares) VALUES($id, $symbol, $amount) ON DUPLICATE KEY UPDATE shares = shares + VALUES($amount)");
          $total = $value * $number_of_shares;
          mysql_query("UPDATE users SET cash = cash - $total WHERE id=$id ");
          $message = "You bought " . $amount . " shares of " . $symbol . " for $". $total ."." ;
        }
      }
    }
?>

<!DOCTYPE html>

<html>

  <head>
    <link href="images/favicon.ico" type="images/x-icon"rel="shortcut icon">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>$tock: Buy</title>
  </head>

  <body>
<div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
   <li><a href='about.php'><span>About</span></a></li>
   <li><a href='rankings.php'><span>Rankings</span></a></li>
   <li><a href='sell.php'><span>Sell</span></a></li>
   <li><a href='quote.php'><span>Quote</span></a></li>
   <li class='active '><a href='buy.php'><span>Buy</span></a></li>
   <li><a href='logout.php'><span>Logout</span></a></li>
</ul>
</div>
    <form action="buy.php" method="post">
        <div>
        <? if($error1): ?>
          <span>One or more incomplete fields!</span>
        <? endif ?>
        <? if($message){
         print "<span>" . $message . "</span>";
        }
        ?>
          <h1>Buy</h1>
          <label>
            <span>Stock Symbol</span><input id="symbol" type="text" name="symbol" />
          </label>
          <label>
            <span>Amount</span><input id="amount" type="number" name="amount" min="1" step="1" />
          </label>
          <br>
          <input name="action" type="submit" value="Buy">
  </body>
</html>
