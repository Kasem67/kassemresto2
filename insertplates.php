


<?php
include 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = $_POST["id3"];
    $productName = $_POST["name3"];
    $productPrice = $_POST["price3"];
    $product_image = $_FILES['product_image4']['name'];
    $product_image_tmp_name = $_FILES['product_image4']['tmp_name'];
    $product_image_folder = 'uploadplates/' . $product_image;

    if (empty($productName) || empty($productPrice) || empty($product_image)) {
        $message[] = 'Please fill out all fields';
    } else {
        $sql = "INSERT INTO pizza (id, name, price, image) VALUES ('$productid', '$productName', '$productPrice', '$product_image')";
        $upload = mysqli_query($conn, $sql);
        
        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'New product added successfully';
        } else {
            $message[] = 'Could not add the product';
        }
    }
    header('location:displayplates.php');
}

$conn->close();
?>
