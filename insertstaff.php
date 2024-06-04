

<?php
include 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];
    $city=$_POST["city"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $message=$_POST["message"];
    $position=$_POST["position"];

    $product_image = $_FILES['filetoupload']['name'];
    $product_image_tmp_name = $_FILES['filetoupload']['tmp_name'];
    $product_image_folder = 'uploadimg/' . $product_image;

    if (empty($phone) || empty($fname) || empty($lname)) {
        $message = 'Please fill out all fields';
    } else {
        $sql = "INSERT INTO job (fname, lname,phone,email,city,address,jobtype,message,cv) 
        VALUES ('$fname', '$lname', '$phone','$email','$city',
         '$address','staff','$message','$product_image')";
         $upload = mysqli_query($conn, $sql);
        
        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message = 'New product added successfully';
        } else {
            $message = 'Could not add the product';
        }
    }
  
}

$conn->close();

?>

