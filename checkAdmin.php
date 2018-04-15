<?php
  $con = mysql_connect("localhost","root","");
  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("my_db", $con);
session_start();
  $Username = $_GET["username"];
  $Password = $_GET["password"];

  $admin = mysql_query("
        select *
        from admin
        where admin.username = \"" .$Username. "\"
    ");
  
  $count = 0;

  while($row = mysql_fetch_array($admin))
  {
    $count = $count + 1;
    $rightPassword = $row['password'];
  }

	if ($Password == $rightPassword)
	{ 
		$_SESSION['CardNumber'] = $Username;
		echo "<script>alert('Log in successfully!')</script>";
		echo "<script language=\"javascript\">";
		echo "document.location=\"admin.php\"";
		echo "</script>";
	}
  elseif ($count == 0) {
    echo "<script>alert('Inexistent username')</script>";
    echo "<script language=\"javascript\">";
    echo "document.location=\"index.php\"";
    echo "</script>";
  }
	else {
		echo "<script>alert('Wrong password!')</script>";
		echo "<script language=\"javascript\">";
		echo "document.location=\"index.php\"";
		echo "</script>";
		
	}
?>