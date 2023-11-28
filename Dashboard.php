<?php
include "navbar.php";

if (isset($_REQUEST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $id = $_SESSION["user"]["id"];
    $con = mysqli_connect("localhost", "root", "", "indie_game_shop");
    $sql = "UPDATE user SET username='$name', email='$email', phone='$phone' WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $_SESSION["user"]["username"] = $name;
        echo "Update successful";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin Dashboard</title>
	</head>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 20px;
		}

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

	<body>

		<h2>Admin Dashboard</h2>
		<h3>Welcome, <?php if (isset($_SESSION["user"])) {
      print_r($_SESSION["user"]["username"]);
  } ?></h3>

		<?php
  // Retrieve values from the session (replace these with your actual session variables)
  $name = isset($_SESSION["user"]) ? $_SESSION["user"]["name"] : "";
  $email = isset($_SESSION["user"]) ? $_SESSION["user"]["email"] : "";
  $phone = isset($_SESSION["user"]) ? $_SESSION["user"]["phone"] : "";
  ?>

		<form method="post">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

			<label for="phone">Phone Number:</label>
			<input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" required>

			<button type="submit">Update Information</button>
		</form>

	</body>

</html>