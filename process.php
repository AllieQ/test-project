<?php 
// Create a database connection.
$dbhost = "localhost";
$dbuser = "aquereng";
$dbpass = "j76&hGbU";
$dbname = "ya_reviews";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//Test if connection occurred.
if (mysqli_connect_errno()) {
	die("Database connection failed: " .
	mysqli_connect_error() .
	" (" . mysqli_connect_errno() . ")"
	);
}

	//Perform database query
	$name = $_POST['name'];
	$title = $_POST['title'];
	$body = $_POST['body'];

	//This function will clean the data and add slashes.
	// Since I'm using the newer MySQL v. 5.7.14 I have to addslashes
	$name = mysqli_real_escape_string($connection, $name);
	$title = mysqli_real_escape_string($connection, $title);
	$body = mysqli_real_escape_string($connection, $body);

	//This should retrive HTML form data and insert into database

	$query  = "INSERT INTO reviews (name, title, body) VALUES ('$name', '$title', '$body')"; //need to use escaped variables here

			$result = mysqli_query($connection, $query);
			//Test if there was a query error
			if ($result) {
				//SUCCESS
			header('Location: activity.php');
			} else {
				//FAILURE
				die("Database query failed. " . mysqli_error($connection)); 
				//last bit is for me, delete when done
			}

mysqli_close($connection);
?>
