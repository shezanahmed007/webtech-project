<?php
include "navbar.php";
if (isset($_REQUEST["submit"])) {
    // Replace these variables with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "indie_game_shop";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get values from the form
    $title = $_POST["title"];
    $systemRequirements = $_POST["system_requirements"];
    $releaseDate = $_POST["release_date"];
    $publisher = $_POST["publisher"];

    // SQL query to insert values into the games table
    $sql = "INSERT INTO games (title, system_requirements, release_date, publisher, status)
            VALUES ('$title', '$systemRequirements', '$releaseDate', '$publisher', 'approved')";

    // Execute the query
    if ($conn->query($sql) === true) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Game Information Form</title>
		<style>
			label {
				display: block;
				margin-bottom: 5px;
			}

			input {
				width: 100%;
				padding: 8px;
				margin-bottom: 10px;
			}

			button {
				padding: 10px;
				background-color: #4CAF50;
				color: white;
				border: none;
				border-radius: 5px;
				cursor: pointer;
			}
		</style>
	</head>

	<body>
		<div style="margin: 0px 10px">

			<h2>Game Information Form</h2>

			<form method="post">
				<label for="title">Title:</label>
				<input type="text" id="title" name="title" required>

				<label for="system_requirements">System Requirements:</label>
				<input type="text" id="system_requirements" name="system_requirements" required>

				<label for="release_date">Release Date:</label>
				<input type="date" id="release_date" name="release_date" required>

				<label for="publisher">Publisher:</label>
				<input type="text" id="publisher" name="publisher" required>

				<button type="submit" name="submit" value="Login">Submit</button>
			</form>

		</div>

	</body>

</html>