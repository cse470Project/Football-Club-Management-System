<?php

include "_dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $playerid = $_POST['unfollow'];

    $remove_sql = " DELETE FROM follows_player WHERE player_id = $playerid  ";
    mysqli_query($conn, $remove_sql);
    header("location: index.php");

    
}










?>