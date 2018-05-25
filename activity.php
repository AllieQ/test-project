<!--This page will allow users to see all available posts-->

<?php
 // Create a database connection
$dbhost = "localhost";
$dbuser = "aquereng";
$dbpass = "j76&hGbU";
$dbname = "ya_reviews";
$connection = mysqli_connect($dbhost,  $dbuser, $dbpass, $dbname);

//Test if connection occurred.
if (mysqli_connect_errno()) {
	die("Database connection failed: " .
	mysqli_connect_error() .
	" (" . mysqli_connect_errno() . ")"
	);
}

?>


<!DOCTYPE html> 
<html lang=en>

	<head>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<title>YA Book Lovers</title>
	</head>

	<body>

		<!-- ~*~*~HEADER~*~*~ -->

		<header>
			<h1>YA Book Lovers</h1>
				<nav>
					<a href="index.html">Home</a> | <a href="post.html">Leave a Review!</a> | <a href="activity.php">Read all the Reviews</a> | <a href="http://www.goodreads.com">GoodReads</a>
				</nav>
		</header>

		<!-- ~*~*~BODY~*~*~ -->
		<!--This should display all of the posted reponses from the HTML form.-->	
			<section>
				<h4>All Activity</h4>
				<p>Below you will see all posts made by you and other users!
					Or perhaps only the review because for somereason the name and title
					aren't displaying. =( </p>
			<hr>

			<?php

			//This will fetch the data from the database 
			$query = "SELECT * FROM reviews";
			$result = mysqli_query($connection, $query);
			//Test if there was a query error
			if (!$result) {
				die("Database query failed.");
			}

			// This will let me display the data.
			// The loop will be spilt so I can format with HTML
			while ($row = mysqli_fetch_assoc($result)) {
				//output data from each row
			?>

			Name: <?php echo $row["name"] . "<br />"; ?>
			Title: <?php echo $row["title"] . "<br />"; ?>
			Review: <?php echo $row["body"] . "<br />";
				echo "<hr>"; ?>
			<?php
			} ?>

			</section>

<!--~*~*~FOOTER~*~*~-->

<footer>Copyright Allie Querengesser 2016 | Last Updated: 29 December 2016</footer>


	</body>

</html>

<?php
//4. Release returned data
			mysqli_free_result($result);

// 5. CLose database connection
mysqli_close($connection);
?>
