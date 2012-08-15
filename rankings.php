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
    <div id="center">
      <?
        $result = mysql_query("SELECT username, cash FROM users ORDER BY cash DESC");
        if($result){
          $i =1;
          print("<div id='longform'><h1>Rankings</h1>");
          while($row = mysql_fetch_array($result)){
            if($i>16) break;
            print('<span>');
            print($i .'. ');
            print($row[0]);
            print(' $' . $row[1]);
            print('</span> <br>');
            $i++;
          }
          print("</div>");
        }
      ?>
    <div id="botleft">
      <a href="https://github.com/sam-b/stock/">Source Code</a>
    </div>
    <div id="botright">
      <a href="http://sammy.ws">About me</a>
    </div>
  </body>
</html>
