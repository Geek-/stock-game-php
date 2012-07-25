<?
	require_once("includes/common.php");

	$symbol = mysql_real_escape_string($_POST["symbol"]);
	$s = lookup($symbol);
	if($s==NULL){
		apologize("invalid stock symbol!");
	}
?>

<div style="text-align:center">
	A share of <?= $s->name ?> currently costs $<?= $s->price?>.
</div>