<?php
$login = false;
$showError = false;
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include '_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql3 = "SELECT * FROM banned_user WHERE username='$username';";
  $result3 = $conn->query($sql3);
  if ($result3) {
    if ($result3->num_rows > 0) {
      echo '
    <div class="alert alert-danger" role="alert">
    Username Is Banned
    </div>';
      $banned = true;
    }else{
      $banned = false;
    }
  } else {
    $banned = false;
  }

  $sql = "Select * from user where username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if (($num == 1 || ($username == 'Admin' && $password == 'pass')) && $banned != true) {
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

    if ($username == 'Admin') {
      $_SESSION['admin_login'] = true;
      $_SESSION['admin'] = $username;
      header("location: admin.php");
    } else {
      header("location: index.php");
    }


  } else {
    $error = true;
    $showError = "Invalid Credentials";
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
</head>

<body>







  <?php
  if ($error) {
    echo '
    <div class="alert alert-danger" role="alert">
    Incorrect Username or Password
    </div>';
  }
  ?>







  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-3" style="width: 500px;">
      <h1 class="text-center mb-4">Login</h1>
      <form action='login.php' method='post'>
        <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
      <div class="mt-3 text-center">
        <p>Don't have an account? <a href="signup.php">Create one</a>.</p>
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