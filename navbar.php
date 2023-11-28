<?php
session_start(); ?>
<html>

	<head>
		<title>DashBoard</title>
	</head>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

		body {
			margin: 0;
			font-family: 'Poppins', sans-serif;
		}

		.topnav {
			overflow: hidden;
			background-color: #333;
		}

		.topnav a {
			float: left;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		.topnav a.active {
			background-color: #04AA6D;
			color: white;
		}

		.button {

			width: auto;
			padding: 10px 18px;
			background-color: #04AA6D;
		}

		.button a {
			color: white;
			text-decoration: none
		}

		.cancelbtn {
			width: auto;
			padding: 10px 18px;
			background-color: #f44336;
		}

		.cancelbtn a {
			color: white;
			text-decoration: none
		}

		table {
			font-family: 'Poppins', sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td,
		th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		tr:hover {
			background-color: #ddd;
		}

		th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #04AA6D;
			color: white;
		}
	</style>

	<body>

		<div class="topnav">
			<a href="./DashBoard.php" class="active">My profile</a>
			<a href="./Games.php">Games</a>
			<a href="./Orders.php">Orders</a>
			<a href="./logout.php">Logout</a>
			<a rowspan="4" align="right"> Welcome,
				<?php if (isset($_SESSION["user"])) {
        print_r($_SESSION["user"]["username"]);
    } ?>
			</a>

		</div>





		</th>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		</table>
		</fieldset>