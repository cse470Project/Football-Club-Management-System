
<?php
$showAlert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "Done";
    include '_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $exists=false;
    if( $exists==false){
        echo "Done2";
        $sql = "INSERT INTO `user2` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
        else {echo"not updated";}
    }
}
?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   
  




  <div class="container">
		<h1 class="text-center mb-4">Create Account</h1>
		<form action="signup2.php" method='post'>
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name='username' placeholder="Enter username">
			</div>
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" id="email" name='email' placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name='password' placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary">Create Account</button>
            </form>
		<div class="mt-3 text-center">
			<p>Already have an account? <a href="#">Login</a>.</p>
		</div>
	</div>












    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>