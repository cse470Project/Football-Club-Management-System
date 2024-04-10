<?php

include "_dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $account = $_POST['unban'];

    $remove = "   DELETE FROM banned_user WHERE account_no = $account   ";
    mysqli_query($conn, $remove);
    header("location: admin-ban.php");
  

    
}










?>