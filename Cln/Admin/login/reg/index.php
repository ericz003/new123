<?php 
session_start();
include("../../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $user = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='../index.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, username,email, password) VALUES('$name', '$user','$email', '$pass')")
			or die("Could not execute the insert query.");

		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='../index.php'>Login</a>";
	}
} else {
    ?>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" placeholder="Your username"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password"  placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit"  class="form-submit" value="Sign up"/>
                        </div>
                        <div class="col s6">
                      <br><br>
                      <a href="../../../index.php" class="waves-effect grey btn">BACK</a>
                  </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="../index.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
                <!-- <?php
                $user = $_POST['user']
                ?> -->
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
<?php
}
?>
</body>
</html>

