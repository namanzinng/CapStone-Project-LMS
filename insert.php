<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "library");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$book_id = $_REQUEST['book_id'];
		$title = $_REQUEST['title'];
    	$price = $_REQUEST['price'];
		$author = $_REQUEST['author'];
		$available = $_REQUEST['available'];
		
		$sql = "INSERT INTO books VALUES ('$book_id', 
			'$title','$author','$price','$available')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h2>Data stored in a database successfully</h2>"; 

			echo nl2br("\n$book_id\n $title\n "
				. "$author\n $price\n $available");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?><br>
		<label><h3><a href="index.html">HOME</a></h3></label>
	</center>
</body>
</html>
