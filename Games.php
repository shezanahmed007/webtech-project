<?php
include "navbar.php";

function getAllGames()
{
    $con = mysqli_connect("localhost", "root", "", "indie_game_shop");
    $sql = "select * from games";
    $result = mysqli_query($con, $sql);
    $ArrayF = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $ArrayF[] = $row;
    }
    return $ArrayF;
}

$allGames = getAllGames();
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Games</title>

	</head>

	<body>

		<h2>Game Information Table</h2>

		<section style="margin: 10px">
			<button onclick="window.location.href='./AddNewGame.php'" style="margin: 5px; padding: 5px 8px; background-color: #0394fc;  border-color: #0394fc;">Add new game</button>
		</section>


		<table>
			<thead>
				<tr>
					<th>Title</th>
					<th>System Requirements</th>
					<th>Release Date</th>
					<th>Publisher</th>
					<th>Approval Status</th>
					<th>Remove</th>
				</tr>
			</thead>
			<tbody>


				<?php
    echo "<tr>";
    foreach ($allGames as $game) {
        echo "<td>" . $game["title"] . "</td>";
        echo "<td>" . $game["system_requirements"] . "</td>";
        echo "<td>" . $game["release_date"] . "</td>";
        echo "<td>" . $game["publisher"] . "</td>";
        echo "<td>" . $game["status"] . "</td>";
        echo "<td><a href='./RemoveGame.php?id=" .
            $game["id"] .
            "'>Remove</a></td>";
        echo "</tr>";
    }
    ?>
				<!-- Add more rows with dummy data as needed -->
			</tbody>
		</table>
	</body>

</html>