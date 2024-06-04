<?php
include 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = $_POST["id5"];
    $productName = $_POST["name5"];
    $productPrice = $_POST["price5"];
    $product_image = $_FILES['product_image5']['name'];
    $product_image_tmp_name = $_FILES['product_image5']['tmp_name'];
    $product_image_folder = 'uploadimg/' . $product_image;

    if (empty($productName) || empty($productPrice) || empty($product_image)) {
        $message[] = 'Please fill out all fields';
    } else {
        move_uploaded_file($product_image_tmp_name, $product_image_folder); // Move the uploaded file to the desired folder

        $sql = "INSERT INTO snack (id, name, price, image) VALUES ('$productid', '$productName',
         '$productPrice', '$product_image')";
        $upload = mysqli_query($conn, $sql);

        if ($upload) {
            $message[] = 'New product added successfully';
        } else {
            $message[] = 'Could not add the product';
        }
    }
    header('location:displaysnacks.php');
}

$conn->close();
?>