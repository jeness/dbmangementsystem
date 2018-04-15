<link href="./style1.css" rel="stylesheet">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf8"/>
</head>

<?php
session_start();
$con = mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	else echo "<script>alert('searched successfully!')</script>";
 
	// some code
	mysql_select_db("my_db", $con);
	mysql_query("set CHARACTER SET utf8");
	$url = $_SERVER['REQUEST_URI'];
$p = 1;
if ($_GET["orderby"] == "")
	$order = " order by book_name";
else $order = " order by ".$_GET["orderby"];
$x = $_GET["yearstart"];
$y = $_GET["yearend"];
	$sql = "select * 
				from book
				where year between ".$x." and ".$y.$order;
	$result= mysql_query($sql);
  echo "<h1 align=\"center\">
          Library Database
        </h1>
          <div class=\"container\">
            <div class=\"flat-form_q\">";
              
              echo "<div class = \"breathe-btn\"> The books searched</div>";
	while($row = mysql_fetch_array($result))
  {   
  echo "<div id = \"login\" class=\"form-action show\">";
 
  echo "<form action=\"userborrow.php\" method=\"get\">";
 
  echo "<ul>";
  
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">NO.";
  echo $p."</li>";
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Book Number:</li>";
  echo $row['book_id'];
  $book_id_now = $row['book_id']; 
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Book Name:</li>";
  echo iconv("UTF-8", "GB2312", $row['book_name']);
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Numbers In stock:</li>";
  echo $row['stock'];
  $CardNumber = $_SESSION['CardNumber'];
  echo "<input type = \"hidden\" name = \"CardNumber\" value = $CardNumber \>";
  echo "<input type = \"hidden\" name = \"BookNumber\" value = $book_id_now \>";
  echo "<input type = \"hidden\" name = \"url\" value = $url \>";
  echo "<input style = \"font-size :13px; \" type=\"submit\" value = \"borrow it\" class = \"button\">";
  echo "</ul>";
  echo "</form>";
  echo "</div>";
  $p++;
  if ($p>50) break;
  }
 
$y = "'".$_GET["bookname"]."'";
	$sql = "select * 
				from book
				where book_name = ".$y.$order;
	$result= mysql_query($sql);
	while($row = mysql_fetch_array($result))
  {
     echo "<div id = \"login\" class=\"form-action show\">";
 
  echo "<form action=\"userborrow.php\" method=\"get\">";
 
  echo "<ul>";
  
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">NO.";
  echo $p."</li>";
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Book Number:</li>";
  echo $row['book_id'];
  $book_id_now = $row['book_id']; 
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Book Name:</li>";
  echo iconv("UTF-8", "GB2312//IGNORE", $row['book_name']);
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Numbers In stock:</li>";
  echo $row['stock'];
  $CardNumber = $_SESSION['CardNumber'];
  echo "<input type = \"hidden\" name = \"CardNumber\" value = $CardNumber \>";
  echo "<input type = \"hidden\" name = \"BookNumber\" value = $book_id_now \>";
  echo "<input type = \"hidden\" name = \"url\" value = $url \>";
  echo "<input style = \"font-size :13px; \" type=\"submit\" value = \"borrow it\" class = \"button\">";
  echo "</ul>";
  echo "</form>";
  echo "</div>";
  $p++;
  if ($p>50) break;
  }
  
  $y = "'".$_GET["press"]."'";
	$sql = "select * 
				from book
				where press = ".$y.$order;
	$result= mysql_query($sql);
	while($row = mysql_fetch_array($result))
  {
   echo "<div id = \"login\" class=\"form-action show\">";
 
  echo "<form action=\"userborrow.php\" method=\"get\">";
 
  echo "<ul>";
  
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">NO.";
  echo $p."</li>";
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Book Number:</li>";
  echo $row['book_id'];
  $book_id_now = $row['book_id']; 
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Book Name:</li>";
  echo iconv("UTF-8", "GB2312", $row['book_name']);
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Numbers In stock:</li>";
  echo $row['stock'];
  $CardNumber = $_GET['CardNumber'];
  echo "<input type = \"hidden\" name = \"CardNumber\" value = $CardNumber \>";
  echo "<input type = \"hidden\" name = \"BookNumber\" value = $book_id_now \>";
  echo "<input type = \"hidden\" name = \"url\" value = $url \>";
  echo "<input style = \"font-size :13px; \" type=\"submit\" value = \"borrow it\" class = \"button\">";
  echo "</ul>";
  echo "</form>";
  echo "</div>";
  $p++;
  if ($p>50) break;
  }
 
  $y = "'".$_GET["authorname"]."'";
	$sql = "select * 
				from book
				where author = ".$y.$order;
	$result= mysql_query($sql);
	while($row = mysql_fetch_array($result))
  {
   echo "<div id = \"login\" class=\"form-action show\">";
 
  echo "<form action=\"userborrow.php\" method=\"get\">";
 
  echo "<ul>";
  
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">NO.";
  echo $p."</li>";
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Book Number:</li>";
  echo $row['book_id'];
  $book_id_now = $row['book_id']; 
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Book Name:</li>";
  echo iconv("UTF-8", "GB2312", $row['book_name']);
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Numbers In stock:</li>";
  echo $row['stock'];
  $CardNumber = $_GET['CardNumber'];
  echo "<input type = \"hidden\" name = \"CardNumber\" value = $CardNumber \>";
  echo "<input type = \"hidden\" name = \"BookNumber\" value = $book_id_now \>";
  echo "<input type = \"hidden\" name = \"url\" value = $url \>";
  echo "<input style = \"font-size :13px; \" type=\"submit\" value = \"borrow it\" class = \"button\">";
  echo "</ul>";
  echo "</form>";
  echo "</div>";
  $p++;
  if ($p>50) break;
  }
 
  $y = "'".$_GET["kind"]."'";
	$sql = "select * 
				from book
				where kind = ".$y.$order;
	$result= mysql_query($sql);
	while($row = mysql_fetch_array($result))
  {
   echo "<div id = \"login\" class=\"form-action show\">";
 
  echo "<form action=\"userborrow.php\" method=\"get\">";
 
  echo "<ul>";
  
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">NO.";
  echo $p."</li>";
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Book Number:</li>";
  echo $row['book_id'];
  $book_id_now = $row['book_id']; 
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Book Name:</li>";
  echo iconv("UTF-8", "GB2312", $row['book_name']);
  echo "<li style = \"font-size :18px; font-weight:bold; color:#C8C8C8\">Numbers In stock:</li>";
  echo $row['stock'];
  $CardNumber = $_GET['CardNumber'];
  echo "<input type = \"hidden\" name = \"CardNumber\" value = $CardNumber \>";
  echo "<input type = \"hidden\" name = \"BookNumber\" value = $book_id_now \>";
  echo "<input type = \"hidden\" name = \"url\" value = $url \>";
  echo "<input style = \"font-size :13px; \" type=\"submit\" value = \"borrow it\" class = \"button\">";
  echo "</ul>";
  echo "</form>";
  echo "</div>";
  $p++;
  if ($p>50) break;
  }  
    echo("
            </div>
          </div>")
;
//echo $x;
//echo $y;
?>
<html>
<body>

<body>
<html>