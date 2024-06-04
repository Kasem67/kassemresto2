<?php
include 'config.php';

if(isset($_POST['order_btn'])){
   $number = $_POST['phone'];
   $timezone = new DateTimeZone('Asia/Beirut'); // Set the timezone to Lebanon
    $currentDateTime = new DateTime('now', $timezone); // Get the current date and time
    $currentDateTimeStr = $currentDateTime->format('Y-m-d H:i:s');
   // Check if both the phone number and name exist in the "take" table
   $name_query = mysqli_query($conn, "SELECT name FROM `details` LIMIT 1");
   $name_row = mysqli_fetch_assoc($name_query);
   $name = $name_row['name'];

   // Increment the nbofusers column
   mysqli_query($conn, "UPDATE `take` SET nbofusers = nbofusers + 1 WHERE name = 'fixed'");

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   $product_name = []; // Initialize the array

   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      }
   

   $total_product = implode(', ',$product_name);

   // Insert the order details into the "take" table
   $detail_query = mysqli_query($conn, "INSERT INTO `take` (name, phone, totalproduct, totalprice,dateandtime) 
   VALUES ('$name', '$number','$total_product', '$price_total','$currentDateTimeStr')") or die('query failed');

   if($detail_query){
      // Truncate (empty) the cart table

      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'>Total: $".$price_total."/-</span>
         </div>
         <div class='customer-details'>
            <p>Your name: <span>".$name."</span></p>
            <p>Your number: <span>".$number."</span></p>
            <p>(*Pay when you arrive*)</p>
         </div> 
         <div>
            <a href='ordertype.php' class='option-btn1'>Confirm</a>
         </div>
      </div>
      </div>
      ";
      mysqli_query($conn, "TRUNCATE TABLE `cart`");
   }
}
else{
   
      echo "
      <div class='order-message-container'>
          <div class='message-container'>
              <h3>Oops</h3>
              <div class='order-detail'>
                  <span class='total'>Your cart is empty. Please add items to your cart.</span>
              </div>
              <a href='take.php' class='option-btn1'>Ok</a>
          </div>
      </div>";
  

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>

      body{
         background-image: url("or.webp");
         background-repeat: no-repeat;
        background-size: cover;
      }
     
    .btn2{
      color:white;
      background-color: blue;
      width: 140px;
      border-radius: 5px;
      height: 41.5px;
      font-size: 20px;
     
    }
    .btn1{
      margin-left: 330px;
    }
    @media(max-width:768px){
      body{
         background-image: url("or.webp");
         background-repeat: no-repeat;
        background-size: contain;
        background-color: silver;
        position: relative;
      }
   
.displayorder{
   position: absolute;
   top: 10%;
   width: 100%;
   font-size: 10px;
}
    }
   </style>

</head>
<body>
   

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete you order</h1>

   <form  action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>

     <div class="flex">
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="phone" required>
         </div>
     </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn1">
      <a href="ordertype.php" class="btn1">back</a>
   </form>
   <script>
            function showAlert() {
               alert("Order confirmed!");
               window.location.href = "ordertype.php";
            }
         </script>
</section>

</div>

<script src="js/script.js"></script>
   
</body>
</html>
