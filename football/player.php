<?php
include "follow-player.php";
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

include "_dbconnect.php";
?>









<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <?php
    if ($_COOKIE["mode"] == "light") {
        echo "<link rel='stylesheet' href='style.css'>";
    } else {
        echo "<link rel='stylesheet' href='darkstyle.css'>";
    }
    ?>
</head>

<body>


    <div class="middle_div">





        <div id="middle_div" class="container-fluid">

            <?php
            include "navbar.php";
            ?>








            <div class="section mt-5">

                <div class="container for_table">

                    <div class="row">

                        <div class="col">

                            <div class="text_box">
                                <h1>
                                    List Of All Player
                                </h1>
                            </div>

                            <?php

                            $username = $_SESSION["username"];
                            $sql4 = "select * from user where username = '$username'";
                            $result4 = $conn->query($sql4);
                            $row4 = $result4->fetch_assoc();
                            $account = $row4["account_no"];


                            $sql = "SELECT * FROM Player p
                            INNER JOIN club c ON p.club_id = c.club_id;";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table><tr><th>Player Name</th><th>position</th><th>Age</th><th>Dominant Leg</th><th>Height (In cm)</th><th>Club_name</th><th></th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    $playerid = $row['player_id'];

                                    $sql2 = "SELECT *
                                    FROM player
                                    LEFT JOIN position ON player.player_id = position.player_id
                                    where player.player_id='$playerid';";
                                    $position = "";
                                    $result2 = $conn->query($sql2);
                                    while ($row2 = $result2->fetch_assoc()) {
                                        $position .= $row2["position"] . ", ";
                                    }

                                    echo "<tr><td>" . $row["first_name"] . " " . $row["last_name"] . "</td><td> $position </td><td>" . $row["age"] . "</td><td>" . $row["dominenet_leg"] . "</td><td>" . $row["height"] . "</td><td>" . $row["club_name"] . "</td><td>" . "<form action='player.php' method='post'><button type='submit' name='$playerid' class='btn btn-primary w-100'>Follow</button></form>" . "</td></tr>";
                                    if (isset($_POST["$playerid"])) {
                                        $follow_id = $playerid;
                                        echo "$follow_id";
                                    }

                                }






                                echo "</table>";
                            } else {
                                echo "0 results";
                            }

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $result5 = $conn->query("INSERT INTO follows_player values ($account, $follow_id);");

                            } else {
                                echo "Failed";
                            }

                            ?>

                        </div>



                    </div>
                </div>
















                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
                    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
                    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                    crossorigin="anonymous"></script>
</body>

</html>