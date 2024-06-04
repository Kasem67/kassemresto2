<?php
include 'config.php';

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];

   $error = array();

   $check_user = "SELECT * FROM user_info WHERE email = '$email' AND password = '$pass'";
   $result = mysqli_query($conn, $check_user);

   if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['user_type'] = $row['user_type'];
      header('location: admin.php');
   } else {
      $error[] = "Invalid email or password!";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

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
      <h3>Login to your account</h3>
      <?php
      if (isset($error)) {
         foreach ($error as $error) {
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>
      <input type="email" name="email" required placeholder="Enter your email" class="box">
      <input type="password" name="password" required placeholder="Enter your password" class="box">
      <input type="submit" name="submit" value="Login" class="box">
      <p>Don't have an account? <a href="register.php">Register now</a></p>
   </form>
</div>
</body>
</html>