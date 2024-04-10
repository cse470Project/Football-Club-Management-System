<?php
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
                                List Of Followed Players
                            </h1>
                        </div>

                        <?php

                        $username = $_SESSION['username'];
                        $sql = "SELECT * 
            FROM ((user INNER JOIN follows_player ON user.account_no = follows_player.account_no ) INNER JOIN player ON follows_player.player_id=player.player_id     )
            Where username = '$username' ";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table><tr><th>Player Name</th><th>position</th><th>Age</th><th>Dominant Leg</th><th>Height (In cm)</th> <th></th></tr>";

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
                                echo "<tr><td>" . $row["first_name"] . " " . $row["last_name"] . "</td><td> $position </td><td>" . $row["age"] . "</td><td>" . $row["dominenet_leg"] . "</td><td>" . $row["height"] . "</td><td>" . "<form action='unfollow.php' method='post'><button type='submit' name='unfollow' value='$playerid' class='btn btn-primary w-100'>Unfollow</button></form>" . "</td></tr>";

                            }

                            echo "</table>";
                        } else {
                            echo "0 results";
                        }



                        ?>
                    </div>
                </div>
            </div>

















            <div class="section mt-5">

                <div class="container for_table">

                    <div class="row">

                        <div class="col">

                            <div class="text_box">
                                Latest Transfer
                            </div>

                            <?php
                            $sql = "SELECT transfer.player_id, transfer.amount, transfer.transfer_date, transfer.from_club, transfer.to_club, transfer.season, transfer.duration, player.first_name, player.last_name
                        FROM transfer
                        INNER JOIN player ON transfer.player_id = player.player_id
                        ORDER BY transfer.transfer_date DESC
                        LIMIT 10;";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table><tr><th>Player Name</th><th>Previous Club</th><th>New Club</th><th>Amount  (In Million)</th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["first_name"] . " " . $row["last_name"] . "</td><td>" . $row["from_club"] . "</td><td>" . $row["to_club"] . "</td><td>" . $row["amount"] . "</td></tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </div>

                        <div class="col">
                            <div class="text_box">
                                top winter transfer
                            </div>

                            <?php
                            $sql = "SELECT transfer.Transfer_id, transfer.player_id, transfer.amount, transfer.transfer_date, transfer.from_club, transfer.to_club, transfer.season, transfer.duration, player.first_name, player.last_name
                        FROM (transfer inner join player on player.player_id = transfer.player_id)
                        WHERE transfer.season = 'winter'
                        ORDER BY transfer.amount DESC
                        LIMIT 10;";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table><tr><th>Player Name</th><th>Previous Club</th><th>New Club</th><th>Amount</th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["first_name"] . " " . $row["last_name"] . "</td><td>" . $row["from_club"] . "</td><td>" . $row["to_club"] . "</td><td>" . $row["amount"] . "</td></tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </div>

                    </div>


                </div>
            </div>






























            <div class="section mt-5">

                <div class="container for_table">

                    <div class="row">

                        <div class="col">
                            <h1>English Premier League</h1>
                            <hr>


                            <?php
                            $sql = "SELECT club.club_name, participates_in.league_point
                        FROM club
                        INNER JOIN participates_in ON club.club_id = participates_in.club_id
                        WHERE participates_in.league_id = (SELECT league_id FROM league WHERE league_id = 4)
                        ORDER BY participates_in.league_point DESC
                        LIMIT 5;";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table><tr><th>Club</th><th>Point</th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["club_name"] . "</td><td>" . $row["league_point"] . "</td></tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </div>



                    </div>


                </div>
            </div>




















            <div class="section mt-5">

                <div class="container for_table">

                    <div class="row">

                        <div class="col">
                            <h1>LaLiga</h1>
                            <hr>


                            <?php
                            $sql = "SELECT club.club_name, participates_in.league_point
                        FROM club INNER JOIN participates_in ON club.club_id = participates_in.club_id
                        WHERE participates_in.league_id = 1
                        ORDER BY participates_in.league_point DESC
                        LIMIT 5;";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table><tr><th>Club</th><th>Point</th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["club_name"] . "</td><td>" . $row["league_point"] . "</td></tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </div>



                    </div>


                </div>
            </div>















            <div class="section mt-5">

                <div class="container for_table">

                    <div class="row">

                        <div class="col">
                            <h1>Ligue 1</h1>
                            <hr>


                            <?php
                            $sql = "SELECT club.club_name, participates_in.league_point
            FROM club
            INNER JOIN participates_in ON club.club_id = participates_in.club_id
            WHERE participates_in.league_id = (SELECT league_id FROM league WHERE league_id = 2)
            ORDER BY participates_in.league_point DESC
            LIMIT 5;";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table><tr><th>Club</th><th>Point</th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["club_name"] . "</td><td>" . $row["league_point"] . "</td></tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </div>



                    </div>


                </div>
            </div>








            <div class="section mt-5">

                <div class="container for_table">

                    <div class="row">

                        <div class="col">
                            <h1>UEFA Champions League</h1>
                            <hr>


                            <?php
                            $sql = "SELECT club.club_name, participates_in.league_point
                            FROM club
                            INNER JOIN participates_in ON club.club_id = participates_in.club_id
                            WHERE participates_in.league_id = (SELECT league_id FROM league WHERE league_id = 3)
                            ORDER BY participates_in.league_point DESC
                            LIMIT 5;";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table><tr><th>Club</th><th>Point</th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["club_name"] . "</td><td>" . $row["league_point"] . "</td></tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </div>



                    </div>


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