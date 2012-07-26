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
