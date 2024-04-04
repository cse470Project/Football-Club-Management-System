<?php
session_start();

if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != true) {
    header("location: login.php");
    exit;
}


?>


<?php
include("admin-insert-process.php");
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <?php
    if ($_COOKIE["mode"] == "light") {
        echo "<link rel='stylesheet' href='style.css'>";
    } else {
        echo "<link rel='stylesheet' href='darkstyle.css'>";
    }
    ?>

    <!-- date picker links -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>

<body>




    <div class='wrapper'>
        <div class="container-fluid" id='middle_div'>










            <nav class="navbar bg-white navbar-expand-lg bg-body-tertiary custom-navbar"
                style="background-color: #274169;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="club.php">Club</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="player.php">player</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="transfer.php">transfer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="league.php">league</a>
                            </li>


                            <?php if (!(!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != true)) {
                                echo '
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
                        </li>';
                            }



                            ?>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>



            <form action="admin-insert.php" method='post'>
                <div class="section">
                    <div class="text_box">
                        <h1>Choose A Table To insert</h1>
                        <select class="form-select" aria-label="Default select example" name='select'>
                            <option value="0" selected>Open this select menu</option>
                            <option value="club_select">Club</option>
                            <option value="player_select">Player</option>
                            <option value="manager_select">Manager</option>
                            <option value="league_select">League</option>
                            <option value="stadium_select">Stadium</option>
                            <option value="transfer_select">Transfer</option>
                            <option value="plays_in_select">Plays In</option>
                            <option value="stream_select">Stream</option>
                        </select>
                        <button type="submit" name="submit"
                            class="btn btn-primary w-100 mt-3 insert_button">Submit</button>
                    </div>
                </div>
            </form>



            <?php
            if ($select == "club_select") {
                echo '
            <form action="admin-insert.php" method="post">
                <div class="section">
                    <div class="text_box">
                        <h1>Insert Club</h1>
                        <label for="club_name" class="form-label">Club Name</label>
                        <input type="text" class="form-control" id="club_name" name="club_name">

                        <label for="club_president" class="form-label">Club President</label>
                        <input type="text" class="form-control" id="club_president" name="club_president">

                        <label for="vice_president" class="form-label">vice_president</label>
                        <input type="text" class="form-control" id="vice_president" name="vice_president">

                        <label for="sponsor" class="form-label">sponsor (If there are Multiple sponsors, Separate them
                            by a comma)</label>
                        <input type="text" class="form-control" id="sponsor" name="sponsor">

                        <button type="submit" name="club"
                            class="btn btn-primary w-100 mt-3 insert_button">Submit</button>
                    </div>
                </div>
            </form>';
            }
            ?>






            <?php
            if ($select == 'player_select') {
                echo '
            <form action="admin-insert.php" method="post">
                <div class="section">
                    <div class="text_box">
                        <h1>Insert Player</h1>
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">

                        <label for="middle_initial" class="form-label">Middle Initial</label>
                        <input type="text" class="form-control" id="middle_initial" name="middle_initial">

                        <label for="last_name" class="form-label">last_name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">

                        <label for="age" class="form-label">age</label>
                        <input type="text" class="form-control" id="age" name="age">

                        <label for="dominant_leg" class="form-label">dominant_leg</label>
                        <input type="text" class="form-control" id="dominant_leg" name="dominant_leg">

                        <label for="height" class="form-label">height</label>
                        <input type="text" class="form-control" id="height" name="height">

                        <label for="club_id" class="form-label">club_id</label>
                        <input type="text" class="form-control" id="club_id" name="club_id">

                        <label for="captain_id" class="form-label">captain_id</label>
                        <input type="text" class="form-control" id="captain_id" name="captain_id">

                        <label for="position" class="form-label">position (If there are Multiple positions, Separate
                            them
                            by a comma)</label>
                        <input type="text" class="form-control" id="position" name="position">

                        <button type="submit" name="player"
                            class="btn btn-primary w-100 mt-3 insert_button">Submit</button>
                    </div>
                </div>
            </form>';

            }
            ?>




            <?php
            if ($select == "manager_select") {
                echo '
            <form action="admin-insert.php" method="post">
                <div class="section">
                    <div class="text_box">
                        <h1>Insert Manager</h1>
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">

                        <label for="middle_initial" class="form-label">Middle Initial</label>
                        <input type="text" class="form-control" id="middle_initial" name="middle_initial">

                        <label for="last_name" class="form-label">last_name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">

                        <label for="age" class="form-label">age</label>
                        <input type="text" class="form-control" id="age" name="age">

                        <label for="speciality" class="form-label">speciality</label>
                        <input type="text" class="form-control" id="speciality" name="speciality">

                        <label for="club_id" class="form-label">club_id</label>
                        <input type="text" class="form-control" id="club_id" name="club_id">

                        <label for="nationality" class="form-label">nationality (If there are Multiple nationality,
                            Separate them
                            by a comma)</label>
                        <input type="text" class="form-control" id="nationality" name="nationality">

                        <button type="submit" name="manager"
                            class="btn btn-primary w-100 mt-3 insert_button">Submit</button>
                    </div>
                </div>
            </form>';
            }
            ?>





            <?php
            if ($select == "league_select") {
                echo '
            <form action="admin-insert.php" method="post">
                <div class="section">
                    <div class="text_box">
                        <h1>Insert League</h1>
                        <label for="division" class="form-label">division</label>
                        <input type="text" class="form-control" id="division" name="division">

                        <label for="league_sponsor" class="form-label">league_sponsor</label>
                        <input type="text" class="form-control" id="league_sponsor" name="league_sponsor">

                        <label for="league_name" class="form-label">league_name</label>
                        <input type="text" class="form-control" id="league_name" name="league_name">

                        <div class="btn-group mt-3" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" value="none" class="btn-check" name="btnradio" id="btnradio1"
                                autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnradio1">None</label>

                            <input type="radio" value="english" class="btn-check" name="btnradio" id="btnradio2"
                                autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio2">English League</label>

                            <input type="radio" value="spanish" class="btn-check" name="btnradio" id="btnradio3"
                                autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio3">Spanish League</label>
                        </div>


                        <br>

                        <label for="datepicker">Start Date</label>
                        <input id="datepicker" name="start_date" width="276" />
                        <script>
                            $("#datepicker").datepicker({
                                uiLibrary: "bootstrap5"
                            });
                        </script>




                        <button type="submit" name="league"
                            class="btn btn-primary w-100 mt-3 insert_button">Submit</button>
                    </div>
                </div>
            </form>';


            }
            ?>




            <?php
            if ($select == "stadium_select") {
                echo '

            <form action="admin-insert.php" method="post">
                <div class="section">
                    <div class="text_box">
                        <h1>Insert Stadium</h1>
                        <label for="capacity" class="form-label">capacity</label>
                        <input type="text" class="form-control" id="capacity" name="capacity">

                        <label for="stadium_name" class="form-label">stadium_name</label>
                        <input type="text" class="form-control" id="stadium_name" name="stadium_name">

                        <label for="address" class="form-label">address</label>
                        <input type="text" class="form-control" id="address" name="address">

                        <label for="club_id" class="form-label">club_id</label>
                        <input type="text" class="form-control" id="club_id" name="club_id">

                        <label for="datepicker2">Establish Date</label>
                        <input id="datepicker2" name="start_date" width="276" />
                        <script>
                            $("#datepicker2").datepicker({
                                uiLibrary: "bootstrap5"
                            });
                        </script>

                        <button type="submit" name="stadium"
                            class="btn btn-primary w-100 mt-3 insert_button">Submit</button>
                    </div>
                </div>
            </form>';

            }

            ?>








            <?php
            if ($select == "transfer_select") {
                echo '
            <form action="admin-insert.php" method="post">
                <div class="section">
                    <div class="text_box">
                        <h1>Transfer</h1>
                        <label for="player_id" class="form-label">player_id</label>
                        <input type="text" class="form-control" id="player_id" name="player_id">

                        <label for="from_club" class="form-label">from_club</label>
                        <input type="text" class="form-control" id="from_club" name="from_club">

                        <label for="to_club" class="form-label">to_club</label>
                        <input type="text" class="form-control" id="to_club" name="to_club">

                        <label for="season" class="form-label">season</label>
                        <input type="text" class="form-control" id="season" name="season">

                        <label for="duration" class="form-label">duration</label>
                        <input type="text" class="form-control" id="duration" name="duration">

                        <label for="amount" class="form-label">amount</label>
                        <input type="text" class="form-control" id="amount" name="amount">

                        <label for="datepicker3">Transfer Date</label>
                        <input id="datepicker3" name="start_date" width="276" />
                        <script>
                            $("#datepicker3").datepicker({
                                uiLibrary: "bootstrap5"
                            });
                        </script>
                        <button type="submit" name="transfer"
                            class="btn btn-primary w-100 mt-3 insert_button">Submit</button>
                    </div>
                </div>
            </form>';
            }

            ?>



            <?php
            if ($select == 'plays_in_select') {
                echo '
            <form action="admin-insert.php" method="post">
                <div class="section">
                    <div class="text_box">
                        <h1>Player Performance in Leauge</h1>
                        <label for="player_id" class="form-label">player_id</label>
                        <input type="text" class="form-control" id="player_id" name="player_id">

                        <label for="leauge_id" class="form-label">leauge_id</label>
                        <input type="text" class="form-control" id="leauge_id" name="leauge_id">

                        <label for="match_played" class="form-label">match_played</label>
                        <input type="text" class="form-control" id="match_played" name="match_played">

                        <label for="goal" class="form-label">goal</label>
                        <input type="text" class="form-control" id="goal" name="goal">

                        <label for="assist" class="form-label">assist</label>
                        <input type="text" class="form-control" id="assist" name="assist">

                        <label for="card" class="form-label">card</label>
                        <input type="text" class="form-control" id="card" name="card">

                        <label for="pass_accuracy" class="form-label">pass_accuracy</label>
                        <input type="text" class="form-control" id="pass_accuracy" name="pass_accuracy">

                        <button type="submit" name="plays_in"
                            class="btn btn-primary w-100 mt-3 insert_button">Submit</button>
                    </div>
                </div>
            </form>';

            }
            ?>















            <?php
            if ($select == "stream_select") {
                echo '
            <form action="admin-insert.php" method="post">
                <div class="section">
                    <div class="text_box">
                        <h1>Insert Stream</h1>
                        <label for="stream_title" class="form-label">Stream Title</label>
                        <input type="text" class="form-control" id="stream_title" name="stream_title">

                        <label for="link" class="form-label">stream link</label>
                        <input type="text" class="form-control" id="link" name="link">

                        

                        <button type="submit" name="stream"
                            class="btn btn-primary w-100 mt-3 insert_button">Submit</button>
                    </div>
                </div>
            </form>';
            }
            ?>










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