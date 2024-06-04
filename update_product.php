<!-- update_product.php -->
<?php
// Connect to your database (assuming the connection is already established)
include 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if the product ID and other necessary fields are provided
  if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];

    // Check if an image is uploaded
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
      $fileTmpPath = $_FILES['product_image']['tmp_name'];
      $fileName = $_FILES['product_image']['name'];

      // Move the uploaded image to the desired directory
      $targetDir = 'uploadimg/';
      $targetFilePath = $targetDir . $fileName;
      move_uploaded_file($fileTmpPath, $targetFilePath);

      // Update the product with the new information, including the image filename
      $sql = "UPDATE product SET name = '$productName', price = '$productPrice', image = '$fileName'
       WHERE id = $productId"; // Corrected the column name to 'id'
    } else {
      // Update the product without changing the image
      $sql = "UPDATE product SET name = '$productName', price = '$productPrice' WHERE id = $productId"; // Corrected the column name to 'id'
    }

    if ($conn->query($sql) === TRUE) {
      header('location:displayproductsfromcategory.php');

      echo 'Product updated successfully.';
    } else {
      echo 'Error updating product: ' . $conn->error;
    }
  } else {
    echo 'Missing required fields.';
  }
} else {
  echo 'Invalid request.';
}
?>