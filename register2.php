<?php
include 'config.php';

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];

   $error = array();

   if ($pass != $cpass) {
      $error[] = "Passwords do not match!";
   }

   $check_email = "SELECT * FROM user_info WHERE email = '$email'";
   $result = mysqli_query($conn, $check_email);

   if (mysqli_num_rows($result) > 0) {
      $error[] = "Email already exists!";
   }

   if (count($error) == 0) {
      $insert = "INSERT INTO user_info (name, email, password, user_type) VALUES ('$name', '$email', '$pass', 'user')";
      mysqli_query($conn, $insert);
      header('location: login.php');
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      body{
         background-image: url("i.webp");
         background-repeat: no-repeat;
         background-size: cover;
      }
   </style>
</head>
<body>
<div class="form-container">
   <form action="" method="post">
      <h3>Register now</h3>
      <?php
      if (isset($error)) {
         foreach ($error as $error) {
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>
      <input type="text" name="name" required placeholder="Enter your name" class="box">
      <input type="email" name="email" required placeholder="Enter your email" class="box">
      <input type="password" name="password" required placeholder="Enter your password" class="box">
      <input type="password" name="cpassword" required placeholder="Confirm your password" class="box">
      <input type="submit" name="submit" value="Register now" class="box">
      <p>Already have an account? <a href="login2.php">Login now</a></p>
   </form>
</div>
</body>
</html>