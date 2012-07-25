<?
	require_once("includes/common.php");
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
			<form action="quote2.php" method="post">
				<table>
					<tr>
						<td> Stock Symbol:</td>
						<td><imput name="symbol" type="text"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Get Quote"></td>
					</tr>
				</table>
			</form>
		</div>

		<div id="bottom">
			or <a href="register.php"> register</a> for an account
		</div>

		</body>
</html>