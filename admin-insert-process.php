<?php


if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != true) {
    header("location: login.php");
    exit;
}


?>


<?php
include '_dbconnect.php';
$select = "empty";
$manager_error = true;
$player_error = true;
$club_error = true;
$plays_in_error = true;
$league_error = true;
$stadium_error = true;
$transfer_error = true;
$stream_error = true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['club'])) {
        $club_name = $_POST['club_name'];
        $club_president = $_POST['club_president'];
        $vice_president = $_POST['vice_president'];
        $sponsor = $_POST['sponsor'];
        $array = explode(',', $sponsor);

        $sql = "INSERT INTO club (club_name, club_president, vice_president) VALUES ('$club_name', '$club_president', '$vice_president');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            foreach ($array as $sponsor2) {
                $sql2 = "select max(club_id) as latest_id from club";
                $result2 = mysqli_query($conn, $sql2);
                $row = $result2->fetch_assoc();
                $latest_value = $row["latest_id"];
                $sql3 = "insert into sponsor values('$sponsor2','$latest_value')";
                $result3 = mysqli_query($conn, $sql3);

            }
            if ($result3) {
                $club_error = false;
                echo
                    '<div class="alert alert-success" role="alert">
Insert Successfull
</div>';

            }

        } else {
            echo "Try Again";
        }



    }
    if (isset($_POST['player'])) {
        $first_name = $_POST['first_name'];
        $middle_initial = $_POST['middle_initial'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $dominant_leg = $_POST['dominant_leg'];
        $height = $_POST['height'];
        $club_id = $_POST['club_id'];
        $position = $_POST['position'];
        $sql = "INSERT INTO Player (first_name, middle_initial, last_name, age, dominenet_leg, height, club_id) VALUES ('$first_name','$middle_initial','$last_name', '$age', '$dominant_leg', '$height', '$club_id')";
        $result = mysqli_query($conn, $sql);
        $array = explode(",", $position);
        if ($result) {
            foreach ($array as $position2) {
                $sql2 = "select max(player_id) as latest_id from player";
                $result2 = mysqli_query($conn, $sql2);
                $row = $result2->fetch_assoc();
                $latest_value = $row["latest_id"];
                $sql3 = "insert into position values('$position2','$latest_value')";
                $result3 = mysqli_query($conn, $sql3);

            }
            if ($result3) {
                $player_error = false;
                echo
                    '<div class="alert alert-success" role="alert">
Insert Successfull
</div>';

            }

        } else {
            echo "Try Again";
        }
    }
    if (isset($_POST['manager'])) {
        $first_name = $_POST['first_name'];
        $middle_initial = $_POST['middle_initial'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $age = (int) $age;
        $speciality = $_POST['speciality'];
        $club_id = $_POST['club_id'];
        $club_id = (int) $club_id;
        $nationality = $_POST['nationality'];
        $sql = "INSERT INTO manager (first_name, middle_initial, last_name, age, speciality, club_id) VALUES ('$first_name', '$middle_initial', '$last_name', '$age', '$speciality', '$club_id')";
        $result = mysqli_query($conn, $sql);
        $array = explode(",", $nationality);
        if ($result) {
            foreach ($array as $nationality2) {
                $sql2 = "select max(manager_id) as latest_id from manager";
                $result2 = mysqli_query($conn, $sql2);
                $row = $result2->fetch_assoc();
                $latest_value = $row["latest_id"];
                $sql3 = "insert into nationality values('$nationality2','$latest_value')";
                $result3 = mysqli_query($conn, $sql3);

            }
            if ($result3) {
                $manager_error = false;
                echo
                    '<div class="alert alert-success" role="alert">
Insert Successfull
</div>';

            }

        } else {
            echo "Try Again";
        }
    }
    if (isset($_POST['league'])) {
        $division = $_POST['division'];
        $league_sponsor = $_POST['league_sponsor'];
        $league_name = $_POST['league_name'];
        $start_date = $_POST['start_date'];
        $start_date = date("Y-m-d", strtotime($start_date));
        $league_type = $_POST['btnradio'];
        $sql = "INSERT INTO league (division, league_sponsor, start_date, league_name) VALUES ('$division', '$league_sponsor', '$start_date', '$league_name')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $league_error = false;
            echo
                '<div class="alert alert-success" role="alert">
Insert Successfull
</div>';

        } else {
            echo "Error: " . mysqli_error($conn);
        }

    }
    if (isset($_POST['stadium'])) {
        $capacity = $_POST['capacity'];
        $stadium_name = $_POST['stadium_name'];
        $address = $_POST['address'];
        $club_id = $_POST['club_id'];
        $establish_date = $_POST['start_date'];
        $establish_date = date("Y-m-d", strtotime($establish_date));
        $sql = "INSERT INTO stadium (capacity, stadium_name, address, club_id, establish_date) VALUES ('$capacity', '$stadium_name', '$address', '$club_id', '$establish_date')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $stadium_error = false;
            echo
                '<div class="alert alert-success" role="alert">
Insert Successfull
</div>';


        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if (isset($_POST['transfer'])) {

        $player_id = $_POST['player_id'];
        $from_club = $_POST['from_club'];
        $to_club = $_POST['to_club'];
        $season = $_POST['season'];
        $duration = $_POST['duration'];
        $amount = $_POST['amount'];
        $transfer_date = $_POST['start_date'];
        $transfer_date = date("Y-m-d", strtotime($transfer_date));
        $sql = "INSERT INTO transfer (player_id, from_club, to_club, season, duration, amount, transfer_date) VALUES ('$player_id', '$from_club', '$to_club', '$season', '$duration', '$amount', '$transfer_date')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $transfer_error = false;
            echo
                '<div class="alert alert-success" role="alert">
Insert Successfull
</div>';

        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }

    }

    if (isset($_POST['plays_in'])) {
        $player_id = $_POST['player_id'];
        $league_id = $_POST['leauge_id'];
        $match_played = $_POST['match_played'];
        $goal = $_POST['goal'];
        $assist = $_POST['assist'];
        $card = $_POST['card'];
        $pass_accuracy = $_POST['pass_accuracy'];

        $sql = "INSERT INTO plays_in (player_id, league_id, match_played, goal, assist, card, pass_accuracy)
            VALUES ('$player_id', '$league_id', '$match_played', '$goal', '$assist', '$card', '$pass_accuracy')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $plays_in_error = false;
            echo
                '<div class="alert alert-success" role="alert">
Insert Successfull
</div>';


        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }








    if (isset($_POST['stream'])) {

        $stream_title = $_POST["stream_title"];
        $link = $_POST["link"];
        $sql = "INSERT INTO stream (title, link) values('$stream_title','$link');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $stream_error = false;
            echo
                '<div class="alert alert-success" role="alert">
Insert Successfull
</div>';

        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }

    }




    if (isset($_POST['submit'])) {
        $select = $_POST['select'];
    }






}




?>