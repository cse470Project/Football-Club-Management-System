<?php
$showAlert = false;
$exists = false;
$mailExists = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $fullName = $_POST["fullName"];

    if ($username == 'Admin') {
        echo '<div class="alert alert-danger" role="alert">
        Can Not Use The Username Admin
        </div>';
        goto end_code;
    }




    $sql1 = "SELECT * FROM user WHERE username='$username'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        $exists = true;

    }








    $sql2 = "SELECT * FROM user WHERE email='$email'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        $mailExists = true;

    }











    if ($exists == false && $mailExists == false) {

        $sql = "INSERT INTO `user` (`username`, `email`, `password`,`full_name`) VALUES ('$username', '$email', '$password','$fullName');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        }
    }
}
end_code:
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <?php
    if ($showAlert) {
        echo '
    <div class="alert alert-success" role="alert">
    Account Created Successfully
    </div>';
    }
    ?>

    <?php
    if ($exists == true) {
        echo '
    <div class="alert alert-danger" role="alert">
    Username Already Exists
    </div>';
    }
    ?>

    <?php
    if ($mailExists == true) {
        echo '
    <div class="alert alert-danger" role="alert">
    Email already Exists
    </div>';
    }
    ?>


    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-3" style="width: 500px;">
            <h1 class="text-center mb-4">Create Account</h1>
            <form action='signup.php' method='post'>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Create Account</button>
            </form>
            <div class="mt-3 text-center">
                <p>Already have an account? <a href="login.php">Login</a>.</p>
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