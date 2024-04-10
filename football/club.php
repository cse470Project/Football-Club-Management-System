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
                                    List Of All Clubs
                                </h1>
                            </div>

                            <?php
                            $sql = "select * from club";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table><tr><th>Club Name</th><th>Club President </th><th>Vice President</th><th>Sponsor</th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    $clubid = $row['club_id'];

                                    $sql2 = "SELECT club.club_id, club.club_name, club.club_president, club.vice_president, sponsor.sponsor_name
                                    FROM club
                                    LEFT JOIN sponsor ON club.club_id = sponsor.club_id
                                    where club.club_id='$clubid';";
                                    $sponsor = "";
                                    $result2 = $conn->query($sql2);
                                    while ($row2 = $result2->fetch_assoc()) {
                                        $sponsor .= $row2["sponsor_name"] . ", ";
                                    }

                                    echo "<tr><td>" . $row["club_name"] . "</td><td>" . $row["club_president"] . "</td><td>" . $row["vice_president"] . "</td><td> $sponsor </td></tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
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