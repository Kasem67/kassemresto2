<?php
include 'config.php';
$totaldelivery = 0;

if (isset($_POST['order_btn'])) {
   $number = $_POST['number'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $status = $_POST['status'];
   date_default_timezone_set('Asia/Beirut');
   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if (mysqli_num_rows($cart_query) > 0) {
       while ($product_item = mysqli_fetch_assoc($cart_query)) {
           $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ') ';
           $product_price = number_format($product_item['price'] * $product_item['quantity']);
           $price_total += $product_price;
       }

       $delivery_charges = 2;
       $totaldelivery++;
       $total_with_delivery = $price_total + $delivery_charges;
       $total_product = implode(', ', $product_name);

       $select_product = mysqli_query($conn, "SELECT name, email FROM details") or die('Query failed');
       if (mysqli_num_rows($select_product) > 0) {
           $fetch_product = mysqli_fetch_assoc($select_product);
           $name = $fetch_product['name'];
           $email = $fetch_product['email'];

           mysqli_query($conn, "UPDATE `order` SET nboforders = nboforders + 1 WHERE name = 'fixed'");

           // Get the current date and time
         
           $currentDateTime = date('Y-m-d H:i:s');

           $detail_query = mysqli_query($conn, "INSERT INTO `order` (name, number, email, street, 
           city,  total_products, totalprice, status, datetime) 
               VALUES ('$name', '$number', '$email', '$street', '$city', 
               '$total_product', '$total_with_delivery', '$status', '$currentDateTime')") or die('Query failed: ' . mysqli_error($conn));

           if ($cart_query && $detail_query) {
               echo "
               <div class='order-message-container'>
                   <div class='message-container'>
                       <h3>Thank you for shopping!</h3>
                       <div class='order-detail'>
                           <span>".$total_product."</span>
                           <span class='total'>Order price: $".$price_total."/-</span>
                           <span class='total'>Delivery charges: $".$delivery_charges."/-</span>
                           <span class='total'>Total: $".$total_with_delivery."/-</span>
                       </div>
                       <div class='customer-details'>
                           <p>Your name: <span>".$name."</span></p>
                           <p>Your number: <span>".$number."</span></p>
                           <p>Your email: <span>".$email."</span></p>
                           <p>Your address: <span>".$street.", ".$city."</span></p>
                           <p>(*Pay when product arrives*)</p>
                       </div>
                       <a href='#' class='option-btn1' onclick='showAlert()'>Confirm</a>
                   </div>
               </div>
               ";
               mysqli_query($conn, "TRUNCATE TABLE `cart`");
           }
       }
       
   } else {
      
         echo "
         <div class='order-message-container'>
             <div class='message-container'>
                 <h3>Oops</h3>
                 <div class='order-detail'>
                     <span class='total'>Your cart is empty. Please add items to your cart.</span>
                 </div>
                 <a href='ord.php' class='option-btn1'>Ok</a>
             </div>
         </div>";
     
   
   }
}?>

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
      background-color: black;
      width: 130px;
      border-radius: 7px;
      height: 45px;
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
    .btn2{
      color: white;
      text-decoration: none;
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
   <br><br><br><br><br>

      <div class="flex">
         
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
   </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. mumbai" name="city" required>
         </div>
         <div class="inputBox">
            <span>status</span>
            <select name="status">
               <option value="pending">pending</option>
            </select>
         </div>

      </div>
      <input type="submit" value="order now" name="order_btn" class="btn1">
      <button id="btn"  ><a class="btn1"  href="ordertype.php">back</a></button>
   </form>
   

</section>

</div>

<script src="js/script.js"></script>
   
</body>
</html>
<script>
  const back = document.querySelector(".btn2"); // Use the correct selector for the button
  back.addEventListener("click", () => {
    window.location.href = "ordertype.php"; // Correct the syntax for setting the href
  });
</script>
<script>
            function showAlert() {
               alert("Order confirmed!");
               window.location.href = "ordertype.php";
            }
         </script>