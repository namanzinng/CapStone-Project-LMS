<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => mydb
		$conn = mysqli_connect("localhost", "root","", "library");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$mem_id = $_REQUEST['mem_id'];
		$name = $_REQUEST['name'];
        $address = $_REQUEST['address'];
		$joining_date = $_REQUEST['joining_date'];
		$ending_date = $_REQUEST['ending_date'];
		
		$sql = "INSERT INTO members VALUES ('$mem_id', 
			'$name','$address','$joining_date','$ending_date')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Data stored in a database successfully</h3>"; 

			echo nl2br("\n$mem_id\n $name\n "
				. "$address\n $joining_date\n $ending_date");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
		<br>
		<label><h3><a href="index.html">HOME</a></h3></label>
	</center>
</body>

</html>