<?php
	$con = oci_connect('YYU', '31415Zhang', 'oracle.cise.ufl.edu:1521/orcl');
	session_start();
	if (!$con)
	{
	  die('Could not connect: ' . oci_error());
	}
	// mysql_select_db("my_db", $con);

	$cardNumber = $_GET['CardNumber'];
	$name 		= $_GET['Name'];
	$department = $_GET['Department'];
	$password 	= $_GET['PassWord'];
	// $searchCard = "
	// 	select *
	// 	from card
	// 	where card.card_number = \"" .$cardNumber.
	// 	"\"";
	$statementselect = oci_parse($con,'select *
		from card
		where card.card_number = (:cardNumber)');
	oci_bind_by_name($statementselect,":cardNumber",$cardNumber);
	// oci_bind_by_name($statementselect,':name', $name);
	// oci_bind_by_name($statementselect,':department',$department);
	// oci_bind_by_name($statementselect,':password', $password);
	$result = oci_execute($statementselect);
	// $query = mysql_query($searchCard);
	$countCard = 0;
	while($row = oci_fetch_array($statementselect))
  	{
  		$countCard = $countCard + 1;
  	}

  	if ($countCard > 0) {
  		echo "<script>alert('Pre-existing card number!')</script>";
		echo "<script language=\"javascript\">";
		echo "document.location=\"index.php\"";
		echo "</script>";
  	}
  	else {
  // 		$sqlQuery = " 	
		// 	insert into card
		// 	values (\"" .$cardNumber. "\", \"" .$name. "\", \"" .$department. "\", \"" .$password. "\")
		// ";
			// $query = mysql_query($sqlQuery);
			$sqlQuery = "insert into card(card_number, name, department, password) values(:card_number,:name,:department,:passWord )";
			$statement = oci_parse($con,'INSERT INTO "card" VALUES (:card_number,:name,:department,:passWord )');
			oci_bind_by_name($statement,':card_number',$cardNumber);
			oci_bind_by_name($statement, ':name', $name);
			oci_bind_by_name($statement,':department',$department);
			oci_bind_by_name($statement,':password', $password);
			$resul = oci_execute($statement,OCI_COMMIT_ON_SUCCESS);
		    oci_free_statement($statement);  
		    // if(oci_num_rows){  
      //       echo "插入成功";  
      // 	    }  
		//echo $sqlQuery;
		
		//echo $query;
		echo "<script>alert('Create card successfully!')</script>";
		echo "<script language=\"javascript\">";
		echo "document.location=\"index.php\"";
		echo "</script>";
		oci_close($con);

  	}
?>