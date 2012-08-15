<?
	require_once("includes/common.php");
    if (isset($_POST["action"])){
      if (empty($_POST["symbol"])){
        $message = "Invalid stock symbol!";
      }
      else{
				$symbol = mysql_real_escape_string($_POST["symbol"]);
				$s = lookup($symbol);
				if($s==NULL){
					$message = "Invalid stock symbol!";
				}
				else{
					$message = "<span>	A share of " . $s->name ." currently costs $" .$s->price . ". </span>";
				}
			}
		}
?>

<!DOCTYPE html>

<html>
	<head>
		<link href="images/favicon.ico"type="image/x-icon"rel="shortcut icon">
		<link href="css/styles.css" rel="stylesheet" type="text/css">
		<title> $tock: Quote</title>
	</head>
	<body>
<div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
   <li><a href='about.php'><span>About</span></a></li>
   <li><a href='rankings.php'><span>Rankings</span></a></li>
   <li><a href='sell.php'><span>Sell</span></a></li>
   <li class='active '><a href='quote.php'><span>Quote</span></a></li>
   <li><a href='buy.php'><span>Buy</span></a></li>
   <li><a href='logout.php'><span>Logout</span></a></li>
</ul>
</div>
		<div id="top">
			<a href="index.php"><img alt="C$50 Finance" src="images/logo.png"></a>
		</div>
			<form action="quote.php" method="post">
				<div>
				<h1>Get a Stock Quote!</h1>
					<label>
						<span> Stock Symbol:</span><input name="symbol" value="<?= htmlspecialchars($_POST["symbol"]) ?>" type="text">
					</label>
					<br>
					<input name="action" type="submit" value="Get Quote">
					<br>
					<? if($message) print $text; ?>
				</div>
			</form>

		</div>
		    <div id="botleft">
      <a href="https://github.com/sam-b/stock/">Source Code</a>
    </div>
    <div id="botright">
      <a href="http://sammy.ws">About me</a>
    </div>
		</body>
</html>