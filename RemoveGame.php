<?php

if (isset($_GET["id"])) {
    $gameId = $_GET["id"];

    // Perform the deletion query here (replace this with your actual deletion query)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "indie_game_shop";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Perform the deletion query (replace 'games' with your actual table name)
    $sql = "DELETE FROM games WHERE id = $gameId";

    if ($conn->query($sql) === true) {
        echo "Game removed successfully";
    } else {
        echo "Error removing game: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid gameId";
}

?>
