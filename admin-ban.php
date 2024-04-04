<?php
include '_dbconnect.php';
session_start();

if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != true) {
    header("location: login.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ban_user = $_POST["ban_user"];
    $sql1 = "SELECT * from user where username='$ban_user' ;";
    $request1 = $conn->query($sql1);
    $row = $request1->fetch_assoc();
    $user_id = $row["account_no"];
    $sql2 = "INSERT INTO banned_user values($user_id , '$ban_user')";
    $request2 = mysqli_query($conn, $sql2);
    if ($request2) {
        echo "
        <div class='alert alert-Success' role='alert'>
        $ban_user Has been Banned
        </div>";
    } else {
        echo "
        <div class='alert alert-danger' role='alert'>
        Try Again
        </div>";
    }

}



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
</head>

<body>

    <!-- inside middle div
    ================================================================================================================================= -->
    <div class='wrapper'>

        <div class="container-fluid py-5" id='middle_div'>



            <?php
            include "navbar.php";
            ?>










            <div class="text_box">
                <h1>Ban User By Username</h1>


                <div class="section">
                    <form action="admin-ban.php" method="post">
                        <label for="ban_user" class="form-label"> Username </label>
                        <input type="text" class="form-control" id="ban_user" name="ban_user">
                    </form>
                </div>
            </div>


















            <br><br><br>
            <div class="section">
                <div class="text_box">
                    <h1>List Of All Banned User</h1>
                </div>
                <?php
                $sql = "select * from banned_user order by username ASC    ;";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr><th>Account No.</th><th>Username</th><th></th></tr>";

                    while ($row = $result->fetch_assoc()) {
                        $account = $row["account_no"];
                        echo "<tr><td>" . $row["account_no"] . "</td><td>" . $row["username"] . "</td><td>" . "<form action='unban.php' method='post'><button type='submit' name='unban' value='$account' class='btn btn-primary w-100'>Unban</button></form>" . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                ?>


            </div>


            <div class="text_box">
                <h1>See List Of All username</h1>
            </div>
            <div class="section">

                <?php

                $sql10 = "SELECT * FROM user ORDER BY username;";
                $result10 = mysqli_query($conn, $sql10);

                if ($result10->num_rows > 0) {
                    echo "  <table>
                            <tr>     <th>Account No</th> <th>Username</th>   </tr>     ";

                    while ($row10 = $result10->fetch_assoc()) {
                        $account_to_print = $row10['account_no'];
                        $username_to_print = $row10['username'];
                        echo " <tr>   <td>$account_to_print</td>    <td>$username_to_print</td>      </tr>   ";
                    }


                } else {
                    echo "0 Results";
                }


                ?>




            </div>
        </div>

    </div>
    </div>
    <!-- ============================================================================================================================= -->




























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