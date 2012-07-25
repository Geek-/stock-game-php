<?
	require_once("includes/common.php");
    if (isset($_POST["action"])){
      if (empty($_POST["symbol"])){
        $error = true;
      }
      else{
				$symbol = mysql_real_escape_string($_POST["symbol"]);
				$s = lookup($symbol);
				if($s==NULL){
					$error = true;
				}
				else{
					$text = "<div style='text-align:center'>	A share of <?= $s->name ?> currently costs $<?= $s->price?>. </div>";
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
		<div id="top">
			<a href="index.php"><img alt="C$50 Finance" src="images/logo.png"></a>
		</div>
		<div id="middles">
			<form action="quote.php" method="post">
				<table>
					<tr>
						<td> Stock Symbol:</td>
						<td><input name="symbol" type="text"></td>
					</tr>
					<tr>
						<td colspan="2"><input name="action" type="submit" value="Get Quote"></td>
					</tr>
				</table>
				<?
				if($text){
					print $text;
				}
				?>
				<? if($error): ?>
        <div style="color:red;">Invalid stock symbol!</div>
      <? endif ?>
			</form>
		</div>

		<div id="bottom">
			or <a href="register.php"> register</a> for an account
		</div>

		</body>
</html>