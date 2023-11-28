<?php
session_start();
function checkUserDB($username, $password)
{
    $con = mysqli_connect("localhost", "root", "", "indie_game_shop");
    $sql = "SELECT * FROM user WHERE username ='$username' AND password ='$password'";
    $result = mysqli_query($con, $sql);
    $numRows = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);
    if ($numRows > 0) {
        return $data;
    }
}

if (isset($_REQUEST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username != null && $password != null) {
        if (strlen($password) < 4) {
            echo "Password should be at least 4";
            return;
        }
        $user = checkUserDB($username, $password);
        if ($user) {
            print_r($user);
            $_SESSION["user"] = $user;
            header("location: ./Dashboard.php");
        }

        echo "Invalid username/password";
    } else {
        echo "Please fill up the box properly";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- Add your head content here -->
	</head>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

		body {
			margin: 0;
			font-family: 'Poppins', sans-serif;
		}

		.container {
			padding: 16px;
			background-color: gray;
			width: 100%;
			border-radius: 5px;
			padding: 100px auto;


		}
	</style>

	<body>
		<form method="POST" name='loginForm' onsubmit="return validateform()" style="width: 27%;margin: 5% auto;">
			<div class="imgcontainer">
				<h2 style='text-align: center'>Indie Game Shop</h2>
			</div>

			<div class="container">
				<div>
					<label for="uname"><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="username" id="name">
					<p id="errorName" style="color: red;"></p>
				</div>

				<div>

					<label for="psw"><b>Password</b></label>
					<input type="password" name="password" placeholder="Enter Password" name="psw" id="password">
					<p id="errorPassword" style="color: red;"></p>
				</div>

				<input type="submit" name="submit" value="Login" class="button">
				<p id="msg"></p>
			</div>


		</form>
	</body>

</html>