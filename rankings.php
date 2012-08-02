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
   <li ><a href='index.php'><span>Home</span></a></li>
   <li><a href='about.php'><span>About</span></a></li>
   <li class='active'><a href='rankings.php'><span>Rankings</span></a></li>
   <li><a href='sell.php'><span>Sell</span></a></li>
   <li><a href='quote.php'><span>Quote</span></a></li>
   <li><a href='buy.php'><span>Buy</span></a></li>
   <li><a href='logout.php'><span>Logout</span></a></li>
</ul>
</div>
    <div id="middle">
      <br>
      <?
        $result = mysql_query("SELECT username, cash FROM users");
        if($result){
          print("<form><h1>Rankings/h1>");
          $all_users = Array();
          while($row = mysql_fetch_array($result)){
            array_push($all_users,$row);
          }
          foreach ($all_users as $row){
            print('<span>');
            print($row[0]);
            print(' ' . $row[1] . '.');
            print('</span> <br>');
          }
          print("</form>");
        }
      ?>
    </div>
  </body>
</html>
