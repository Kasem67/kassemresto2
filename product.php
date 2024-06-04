<?php
include 'config.php';
session_start();

// Handle form submissions
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['loggedin'] = false;
  }
  if (!isset($_SESSION['loggedin2'])) {
    $_SESSION['loggedin2'] = false;
  }
  
  if(isset($_POST['addtocart'])){
  
    if (!$_SESSION['loggedin']) {
      header('location: log4.php');
      exit;
  }
  
     $product_name = $_POST['productname'];
     $product_price = $_POST['productprice'];
     $product_image = $_POST['product_image'];
     $product_quantity = $_POST['product_quantity'];
     $select_cart = mysqli_query($conn, "SELECT * FROM cart 
     WHERE name = '$product_name'") 
     or die('query failed');
     if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'product already added to cart!';
     }else{
        mysqli_query($conn, "INSERT INTO cart( name, price, image, quantity) 
        VALUES( '$product_name', '$product_price', '$product_image', '$product_quantity')")
         or die('query failed');
        $message[] = 'product added to cart!';
  
     }
     $_SESSION['loggedin'] = true;
    
  };
  
  
  
  if(isset($_POST['buynow'])){
  
    if (!$_SESSION['loggedin2']) {
      header('location: log4.php');
      exit;
  }
  
     $product_name = $_POST['productname'];
     $product_price = $_POST['productprice'];
     $product_image = $_POST['product_image'];
     $product_quantity = $_POST['product_quantity'];
     $select_cart = mysqli_query($conn, "SELECT * FROM cart 
     WHERE name = '$product_name'") 
     or die('query failed');
     if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
     }else{
        
        mysqli_query($conn, "INSERT INTO cart( name, price, image, quantity) 
        VALUES( '$product_name', '$product_price', '$product_image', '$product_quantity')")
         or die('query failed');
         header('location:cart.php');
     }
     $_SESSION['loggedin2'] = true;
  };


  
  if(isset($_POST['update_cart'])){
     $update_quantity = $_POST['cart_quantity'];
     $update_id = $_POST['cart_id'];
     mysqli_query($conn, "UPDATE cart SET quantity = '$update_quantity' WHERE id = '$update_id'")
      or die('query failed');
     $message[] = 'cart quantity updated successfully!';
  }
  
  if(isset($_GET['remove'])){
     $remove_id = $_GET['remove'];
     mysqli_query($conn, "DELETE FROM cart WHERE id = '$remove_id'") or die('query failed');
  
  }
    
  if(isset($_GET['delete_all'])){
     mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'") or die('query failed');
    
  }
  

// Retrieve the categories from the categories table
/*$sql = "SELECT * FROM category";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  $categoryId = $row["catid"];
  $categoryName = $row["catname"];
  
  echo "<h2>$categoryName</h2>";

  
  
  $select_product = mysqli_query($conn, "SELECT * FROM product WHERE catid= $categoryId") or die('query failed');
  if(mysqli_num_rows($select_product) > 0){
     while($fetch_product = mysqli_fetch_assoc($select_product))
  
  {
   
    
   

    // Add the buttons for purchaseand adding to cart
    echo '<form method="POST" action="">';
    echo '<input type="hidden" name="productprice" value="' . $fetch_product['price'] . '">'; // Pass the product price as a hidden field
    echo '<input type="hidden" name="productname" value="' . $fetch_product['name'] . '">'; // Pass the product name as a hidden field
    
   echo '<input type="number" min="1" name="product_quantity" value="1">';
  
   echo '<img name="product_image" src="uploadimg/' . $fetch_product['image'] . '">';
   echo '<input type="hidden"  src="uploadimg/"   name="product_image" value="' . $fetch_product['image'] . '">'; 
   // Pass the product image as a hidden field
    echo '<input type="submit" value="Buy Now" name="buynow">';
    echo '<input type="submit" value="Add to Cart" name="addtocart">';
    echo '</form>';

    echo "<hr>";
  }
}
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/all.min.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');

:root {
    --primary-color:black;
    --secondary-color: black;
    --gray-color: #808080;
}
.message{
   position: sticky;
   top:0; left:0; right:0;
   padding:15px 10px;
   background-color: silver;
   text-align: center;
   z-index: 1000;
   box-shadow: var(--box-shadow);
   color:var(--black);
   font-size: 20px;
   text-transform: capitalize;
   cursor: pointer;
}
* {
    box-sizing: border-box;
    font-family: 'Source Sans Pro', sans-serif;
    line-height: 1;
    padding: 0;
    margin: 0;
}
body{
    width: 100%;
}


.heading {
    /*background-color: #4e598c;*/
    background-color: black;
    color: black;
    padding: 75px 0;
    margin-bottom: 20px;
}

.heading h1 {
    margin: auto;
    width: fit-content;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    color: black;
    color: white;
}



@media (max-width: 1200px) {
    .container {
        width: 1000px;
    }
}

@media (max-width: 1024px) {
    .container {
        width: 750px;
    }
}



.box {
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-items: center;
    text-align: center;
    box-shadow: 5px 5px 10px 1px rgb(0, 0, 0, 12%);
    gap: 17.5px;
    width: 300px;
}

.box img {
    width: 100%;
}

.box img:hover {
    cursor: pointer;
    opacity: 0.95;
}

.box h2 {
    font-size: 20px;
}

.box p {
    padding: 0 20px;
    font-size: 12.5px;
    line-height: 1.35;
    color: var(--gray-color);
}

.box span {
    font-weight: 800;
    font-size: 18px;
}

.box .rate {
    color: #ffb900;
    font-size: 12px;
}

.box .options {
    margin-bottom: 25px;
}

.box .options input {
    width: 80px;
    color: white;
    background-color:black;
    display: inline-block;
    padding: 10px 15px;
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
    border-radius: 55px;
}

.box .options a:hover {
    background-color: var(--secondary-color);
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body {
    min-height: 100vh;
   
     
    color: black;
    font-family: "Lato", sans-serif;
    font-weight: 300;
    font-size: 20px;
    line-height: 1.5;
    @media screen and (max-width: 820px) {
      font-size: 16px;
    }
  }

  @media (max-width:767px){
   .heading{
    width:760px;
   }
  }

.btn{
    width: 150px;
    background-color: black;
    color: white;
    height: 50px;
    
    border-radius: 10px;
    cursor: pointer;

}
.btn a{
    text-decoration: none;
    color: white;
    font-size: 18px;
}
.cont{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 470px;
    width: 300px;
}


.headi{

   background-color:orangered;
  
   padding:0px 100px;
   color:white;
 border-radius: 5px;
  width: 100%;
  height:60px;
  }
  .headi ul{
   display:flex;
   list-style-type: none;
   text-decoration: none;
   justify-content: center;
   margin:0;
   padding-bottom:7px;
   text-align: center;
   margin-bottom: 10px;
   

   color:white;

  }
  .headi li {
    margin-top: 12px;
   margin-left: 130px;
   margin-right: 20px;
   color:white;
   font-size: 30px;
   margin-bottom: 30px;
   text-align: center;
   }
   
   .headi li a{
    
      color:white;
      text-decoration: none;
   }
   .search{
      border-radius: 10px;
   }
   .searchform{
      display: flex;
      height:100px;
      align-items: flex-start;
   }
   .submits{
      border-radius: 10px;

   }
  .align{
   display: flex;
   align-items: center;
  }
  img{
   width: 100%;
   height: 350px;
  }

  .carousel-inner {
    display: flex;
    flex-direction: row;
}

.carousel-item {
    flex: 0 0 auto;
    width: 100%;
    
}

.carousel-inner img {
            width: 100%;
            height: 400px;
        }


        .bk{
       /*  background-color: #e1dabd;*/
        }
        .right{
         background-color: #04030f;
         width: 100%;
         height:40px;
         border-radius: 5px;
        }
        .right p{
         color:white;
         text-align: center;
         font-size: 20px;
         padding-top: 8px;
        }
        html, body {
  overflow-x: hidden;
}
        input{
         height: 35px;
         width:170px;
        }
        button{
         padding-bottom:10px;
        }
       input .btn1{
         padding-bottom: 10px;
        }
       .placeholder{
         font-size: 20px;
       }


       .flex{
         display: flex;
         gap: 10px;
         position: relative;
       }
     
       .flex {
        position: relative;
    }

    .search input[type="text"] {
        padding-left: 30px;
    }

    .search input[type="text"]::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        pointer-events: none;
        background-image: url('search.png');
        background-repeat: no-repeat;
        background-position: center;
        background-color: #ff0022;
        background-size: 16px;
        width: 16px;
        height: 16px;
    }
 input.search{
   font-size: 17px;
 }

       .submits{
         height: 1px;
         width: 0px;
         background-color: #086788;
         border: none;
         padding-bottom: 17px;
       
         margin-right: 8px;
       
       }
       /*.products{
         display: flex;
         justify-content: center;
         align-items: center;
         gap: 10px;
       }*/
       .container{
         display: flex;
         justify-content: space-between;
         flex-direction: row;
         align-items: center;
         gap: 20px;
         position: relative;
       }

   .pimg{
      border-radius: 150px;
      width:250px;
      margin-left: 50px;
   }
   .right{
      margin-top: 30px;
   }
   .btn1{
      border-radius: 15px;
      color: white;
      font-size: 20px;
      height: 45px;
      width: 100%;
      padding-top: 5px;
      background-color:#086788 ;
      margin: 10px;
   }
.qnty{
   border-radius: 20px;
   margin-top: 5px;
}
.icn{
      
      height: 50px;
      border-radius: 24px;
      width:80px;
      
    }
    h1{
        text-align: center;
    }
    .cart-icon {
    font-size: 24px;
    color: black;
    cursor: pointer;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 3px;
  }
  .search{
      border-radius: 10px;
   }
   .searchform{
      display: flex;
      height:100px;
      align-items: flex-start;
   }
   .submits{
      border-radius: 10px;
      margin-top: 8px;

   }
   .submits{
         height: 1px;
         width: 0px;
         background-color: #086788;
         border: none;
         padding-bottom: 17px;
       
         margin-right: 8px;
       
       }
       .search-icon {
        width: 40px;
        height: 40px;
        margin-right: 17px;
        margin-bottom: 10px;
       
    }

    .right{
         background-color: #04030f;
         width: 100%;
         height:40px;
         border-radius: 5px;
        }
        .right p{
         color:white;
         text-align: center;
         font-size: 20px;
         padding-top: 8px;
        }
        html, body {
  overflow-x: hidden;
}
        input{
         height: 35px;
         width:170px;
        }
        button{
         padding-bottom:10px;
        }
       input .btn1{
         padding-bottom: 10px;
        }
       .placeholder{
         font-size: 20px;
       }


       .flex{
         display: flex;
         gap: 10px;
         position: relative;
       }
     
       .flex {
        position: relative;
    }

    .search input[type="text"] {
        padding-left: 30px;
    }

    .search input[type="text"]::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        pointer-events: none;
        background-image: url('search.png');
        background-repeat: no-repeat;
        background-position: center;
        background-color: #ff0022;
        background-size: 16px;
        width: 16px;
        height: 16px;
    }
 input.search{
   font-size: 17px;
 }

       .submits{
         height: 1px;
         width: 0px;
         background-color: #086788;
         border: none;
         padding-bottom: 17px;
       
         margin-right: 8px;
       
       }


       .footer{
	background-color: #24262b;
    padding: 70px 0;
    height:500px;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}

@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}

.footer-basic {
  padding:40px 0;
  background-color: #404242 ;
  border-radius: 10px;
  color:white;
}

.footer-basic ul {
  padding:0;
  list-style:none;
  text-align:center;
  font-size:18px;
  line-height:1.6;
  margin-bottom:0;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}

.footer-basic li {
  padding:0 10px;
}

.footer-basic ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.8;
}

.footer-basic ul a:hover {
  opacity:1;
}

.footer-basic .social {
  text-align:center;
  padding-bottom:25px;
}

.footer-basic .social > a {
  font-size:24px;
  width:40px;
  height:40px;
  line-height:40px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  border:1px solid #ccc;
  margin:0 8px;
  color:inherit;
  opacity:0.75;
}

.footer-basic .social > a:hover {
  opacity:0.9;
}

.footer-basic .copyright {
  margin-top:15px;
  text-align:center;
  font-size:13px;
  color:black;
  font-size: 20px;
  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  margin-bottom:0;
}
p.copyright{
   color: white;
}
.pin{
   height: 38px;
   margin-bottom: 1px;
   border-radius: 13px;
   margin-bottom: 10px;
}
.logo{
   height: 60px;
   width: 150px;
   position: absolute;
  right: 1340px;
  bottom: 70px;
  border-radius: 30px;
   
}
.bkk{
   background-color:#f2f4f3 ;
}

.hidden {
    display: none;
  }
  .info-box {
    position: relative;
    display: inline-block;
  }

  .info-text {
    visibility: hidden;
    background-color:grey;
    border-radius: 15px;
    color: black;
    text-align: center;
    border-radius: 34px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    transform: translateX(-50%);
    width: 550px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  }

  .info-box:hover .info-text {
    visibility: visible;
  }
  .ing{
   margin-left: 140px;
   color: #04030f;
  }
  .qnty{
   width: 100%;
  }

  .icn{
    margin-top: 5px;
  }
 .container {
    display: flex;
    flex-direction: column;
  }

  .category {
    margin-bottom: 20px;
    width: 1500px;
  }

  .category-row {
    display: flex;
    flex-wrap: wrap;
    gap: 120px;
    margin-right: 30px;
    margin-top: 10px;
    justify-content: center;
  }

  .box {
    width: 350px;

    margin-bottom: 10px;
    text-align: center;
  }
  
  .category-name {
    text-align: center;
    margin-top: 0;
    margin-right: 35px;
  }

  @media(max-width:768px){
        .container{
          width: 100%;
         display: flex;
         justify-content: space-between;
         flex-direction: row;
         align-items: center;
         gap: 20px;
         position: relative;
       }
       .headi li {
    margin-top: 10px;
   margin-left: 2px;
   color:white;
   font-size: 20px;
   margin-bottom: 30px;
   text-align: center;
   }
   .headi li a{
      color:white;
      text-decoration: none;
   }
   .search-icon {
        width: 20px;
        height: 30px;
        margin-right: 17px;
        margin-bottom: 7px;
        margin-top: 5px;
       
    }
    

   
       }
       input.search{
        margin-top: 10px;
        border: none;
       }
       @import url("https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap");
/* Base */
:root {
  --clr-primary: #fe5722;
  --clr-secondary: #272d36;
}
.option-btn{
  border: none;
}
#tick-sign {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    margin-left: 10px;
    margin-top: 50px;
  }

  .tick-icon {
    width: 300px;
    height: 300px;
    margin-left: 600px;
    margin-top: 180px;
  }
</style>
    </style>
</head>
<body>
    <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
<?php
$showTick = isset($_SESSION['show_tick']) && $_SESSION['show_tick'];

// Clear the session variable
unset($_SESSION['show_tick']);
?>

<!-- Add this code where you want to display the tick sign -->
<?php if ($showTick): ?>
    <div id="tick-sign" style="display: none;">
  <img src="check.png" alt="Tick Sign" class="tick-icon">
</div>
<?php endif; ?>
<!-- Add this code where you want to display the tick sign -->


<script>
  // Show the tick sign for 1 second after the page loads
  document.addEventListener("DOMContentLoaded", function() {
    var tickSign = document.getElementById("tick-sign");
    tickSign.style.display = "block"; // Show the tick sign

    setTimeout(function() {
      tickSign.style.display = "none"; // Hide the tick sign after 1 second
    }, 1000);
  });
</script>

<div class="headi">
<ul>
   <img class="icn" src="brg.jpeg" alt="">
   <div class="align">
   <li><a href="product.php" >menu</a></li>
  
   <li> <a href="ordertype.php">order</a></li>

   <li><a href="index.php" 
      >home</a></li>
      
  <!-- Other navigation items -->
  
  <?php if ($_SESSION['loggedin'] || $_SESSION['loggedin2']): ?>
    <li><a href="logoutuser.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a></li>
  
    <?php endif; ?>

   </div>
      <li> <a href="cart.php"><div class="cart-icon">
    <i class="fas fa-shopping-cart"></i>
  </div></a></li>
  <br>
 
  <button id="search-icon-button" class="submits" type="button" onclick="showSearchInput()">
  <img src="search.png" alt="Search Icon" class="search-icon">
</button>

<form class="flex" action="search2.php" method="GET">
  <input type="text" name="search_query" id="search-input" class="search hidden">
  <br><br>
  <button class="submits hidden" type="submit">
    <img src="search.png" alt="Search Icon" class="search-icon">
  </button>
</form>

<script>
  function showSearchInput() {
    const searchInput = document.querySelector('#search-input');
    const submitButton = document.querySelector('.submits');
    const searchIconButton = document.querySelector('#search-icon-button');
    searchInput.classList.remove('hidden');
    submitButton.classList.remove('hidden');
    searchIconButton.classList.add('hidden');
  }
</script>
</ul>


   </div>




   <br>
   <div class="container">
  <?php
  $sql = "SELECT * FROM category";
  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
    $categoryId = $row["catid"];
    $categoryName = $row["catname"];

    echo "<div class='category'>";
    echo "<h1 class='category-name'>$categoryName</h1>";

    echo "<div class='category-row'>"; // Add a container for products within each category

    $select_product = mysqli_query($conn, "SELECT * FROM product WHERE catid = $categoryId") or die('query failed');
    if (mysqli_num_rows($select_product) > 0) {
      while ($fetch_product = mysqli_fetch_assoc($select_product)) {
        ?>
        <form action="" method="post" class="box">
          <img name="product_image" src="uploadimg/<?php echo $fetch_product['image']; ?>">
          <h2><?php echo $fetch_product['name']; ?></h2>
          <span>$<?php echo $fetch_product['price']; ?></span>
          <input type="number" min="1" name="product_quantity" value="1">
          <div class="rate">
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <div class="options">
            <input type="hidden" name="productname" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="productprice" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" value="buynow" name="buynow" class="option-btn">
            <input type="submit" value="addtocart" name="addtocart" class="option-btn">
          </div>
        </form>
        <?php
      }
    }

    echo "</div>"; // Close the category-row container
    echo "</div>"; // Close the category container
  }
  ?>
</div>
<br><br><br>
    <div class="footer-basic">
        <footer>
         
            <div class="social"><a href="#">
               <i class="fab fa-google"></i></a>
               <a href="#"><i class="fab fa-facebook-f"></i></a>
               
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#" onclick="redirectToLocation()">
  <i><img class="pin" src="loce.webp" alt=""></i>
</a>
             </div>
            <ul class="list-inline">
           
                <li class="list-inline-item"><a href="home.php">Home</a></li>
                <li class="list-inline-item">
  <a href="tel:81045813">phone</a>
</li>
                <li class="list-inline-item"><a href="abt.php">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="privacy-policy-template.pdf">Privacy Policy</a></li>
            </ul>
            <p class="copyright" >Foodstop © 2024</p>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<script>
function redirectToLocation() {
  var locationName = encodeURIComponent("Food Stop, Sultaniyeh"); // Update with the actual name and location
  var mapUrl = `https://www.google.com/maps/search/?api=1&query=${locationName}`;

  // Redirect to the Google Maps URL
  window.open(mapUrl, "_blank");
}
</script><script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
  function redirectToPage() {
    window.location.href = "cart.php";
  }
</script>



    

</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>