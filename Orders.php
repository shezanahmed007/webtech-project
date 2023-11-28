<?php
include "navbar.php";

function getAllOrders()
{
    $con = mysqli_connect("localhost", "root", "", "indie_game_shop");
    $sql =
        "SELECT orders.id, games.title, user.username, user.phone, orders.status FROM orders JOIN user ON orders.user_id = user.id JOIN games ON orders.game_id = games.id;";
    $result = mysqli_query($con, $sql);
    $ArrayF = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $ArrayF[] = $row;
    }
    return $ArrayF;
}

$orders = getAllOrders();

if (isset($_REQUEST["submit"])) {
}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Orders</title>
	</head>

	<body>

		<section>
			<h2>List of Orders</h2>
			<!-- Add list of games content here -->
		</section>

		<table>
			<thead>
				<tr>
					<th>Order ID</th>
					<th>User name</th>
					<th>user Contact info</th>
					<th>Game name</th>
					<th>Order status</th>
					<th>Approve/Reject</th>
				</tr>
			</thead>
			<tbody>


				<?php
    echo "<tr>";
    foreach ($orders as $order) {
        echo "<td>" . $order["id"] . "</td>";
        echo "<td>" . $order["username"] . "</td>";
        echo "<td>" . $order["phone"] . "</td>";
        echo "<td>" . $order["title"] . "</td>";
        echo "<td>" . $order["status"] . "</td>";
        echo "<td><select name='approval_status'>
            <option value='approve'>Approve</option>
            <option value='reject'>Reject</option>
        </select>
        
        <button type='submit'>Submit</button></td>";
        echo "</tr>";
    }
    ?>
				<!-- Add more rows with dummy data as needed -->
			</tbody>
		</table>
	</body>

</html>