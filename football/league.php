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
                                    List Of Leagues
                                </h1>
                            </div>

                            <?php
                            $sql = "SELECT * FROM 
                            (league l left JOIN english_league e ON l.league_id = e.english_league_id) left join spanish_league s on s.spanish_league_id = l.league_id  ;";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table><tr><th>League Name</th><th>Sponsor</th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    $type_english = $row["english_league_id"];
                                    $type_spanish = $row["spanish_league_id"];
                                    if ($type_english == null) {
                                        $type_english = "";
                                    } else {
                                        $type_english = "(English League)";
                                    }
                                    if ($type_spanish == null) {
                                        $type_spanish = "";
                                    } else {
                                        $type_spanish = "(Spanish League)";
                                    }
                                    $name = $row["league_name"];
                                    echo "<tr><td> $name$type_english$type_spanish  </td><td>" . $row["league_sponsor"] . "</td></tr>";
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