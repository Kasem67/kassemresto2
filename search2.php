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
  
     $product_name = $_POST['product_name'];
     $product_price = $_POST['product_price'];
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
  
     $product_name = $_POST['product_name'];
     $product_price = $_POST['product_price'];
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


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>beeff</title>

   <!-- custom css file link  -->
  
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

   background-color: #086788;
  
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
    margin-top: 10px;
   margin-left: 100px;
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
    /*margin-bottom: 10px;*/
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
   margin-left: 15px;
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
        width: 30px;
        height: 30px;
        margin-right: 17px;
        margin-bottom: 7px;
        margin-top: 5px;
       
    }

   
       }
      
  /*for mini tablets*/
  @media (max-width: 769px) {
 .carousel-item {
    flex: 0 0 auto;
   /* width: 767px;*/
    width:100%;
    
}

.carousel-inner img {
            /*width: 767px;*/
            width:100%;
            height: 350px;
        }

        .headi{

background-color: #086788;


color:white;
border-radius: 5px;
width: 767px;
height:40px;
}
.headi ul{
display:flex;
list-style-type: none;
text-decoration: none;
justify-content: center;
padding-bottom:7px;
text-align: center;

margin-right: 105px;

color:white;

}
.headi li {
color:white;
font-size: 12px;
text-align: center;
margin: 12px;
margin-top: 0px;
}
.headi li a{
   color:white;
}
.icn{
   width:15px;
   height:30px;
}
.cart-icon {
    font-size: 24px;
    color: black;
    cursor: pointer;
    width:3px;
    margin-right: 10px;
  }

  .container{
         display: block;
         justify-content: center;
         align-items: center;
         gap: 30px;
      margin-top: 20px;
       
       }

       .pimg{
      border-radius: 150px;
      width: 350px;
      margin-left: 160px;
      
   }
   .heading{
     
   }


   .container .box .price{
   
  width: 270px;
margin-left: 170px;
   border-radius: 15px;
   background-color:#edfdfb;
   color:black;
   font-size: 25px;
   
}

.qnty{
   width: 360px;
   margin-left: 150px;

  }
  .btn1{
      border-radius: 15px;
      color: white;
      font-size: 20px;
      height: 45px;
      width: 350px;
      padding-top: 5px;
      background-color:#086788 ;
      margin: 10px;
      margin-left: 150px;
   
   }


   .footer-basic {
 height: 280px;
  background-color: #404242 ;
  border-radius: 10px;
  color:white;
  width: 767px;
}

.name{
   text-align: center;

   font-size: 30px;
}
.phpimg{
    width: 300px;
    border-radius: 20px;
    margin-left: 200px;
}
.price{
    margin-left: 100px;
    width: 300px;
}
}
.btn2{
   border-radius: 16px;
   background-color: #04030f;
   color: white;
   cursor: pointer;
   width: 80px;
   font-weight: bold;
   font-size: 12px;
   margin-left: 5px;
}
.headi{

background-color: orangered;

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
margin-left: 190px;
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
    .container-box{
      margin-left: 370px;
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
.icn{
  margin-top: 11px;
  height: 40px;
}
.confirm{
  text-decoration: none;
  color: #04030f;
}
 </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
<div class="bkk">



<div class="bk">
   <div class="headi">
<ul>
   <img class="icn" src="brg.jpeg" alt="">
   <div class="align">
   <li><a href="product.php" >menu</a></li>
   <li> <a href="ordertype.php">order</a></li>
   <li><a href="logoutuser.php" onclick="return confirm('are your sure you want to logout?');" 
      >home</a></li>
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
   

   <br><br><br>

   
   <?php
if (isset($_GET['search_query'])) {
   $search_query = $_GET['search_query'];

   if (empty($search_query)) {
       echo "<div class='no-results'>Please enter a word.</div>";
   } else {
       // Retrieve products based on the search query
       $select_sql = "SELECT * FROM product 
                      WHERE name LIKE '%$search_query%'
                      LIMIT 1";

       $result = mysqli_query($conn, $select_sql);

       if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
               $product_name = $row['name'];
               $product_price = $row['price'];
               $product_image = $row['image'];

               // Display the searched product
               echo "<div class='container'>";
               echo "<div class='container-box'>";
               echo "<form class='box' method='POST'>";
               echo "<input type='hidden' name='product_name' value='" . $product_name . "'>";
               echo "<input type='hidden' name='product_price' value='" . $product_price . "'>";
               echo "<input type='hidden' name='product_image' value='" . $product_image . "'>";
               echo "<img width='150px' class='phpimg' height='150px' src='uploadimg/" . $product_image . "' alt='Product Image'>";
               echo "<h2>" . $product_name .  "</h2>";
               echo "<span>$" . $product_price . "</span>";
               echo "<div class='rate'>
            <i class='filled fas fa-star'></i>
            <i class='filled fas fa-star'></i>
            <i class='filled fas fa-star'></i>
            <i class='filled fas fa-star'></i>
            <i class='fa-regular fa-star'></i>
          </div>";
               echo "<div class='add-to-cart'>";
               echo "<input type='number'  name='product_quantity' value='1' min='1'>
           
               <br>
               <br>";
              
               echo " <input type='submit' value='buynow' name='buynow' class='btn2'>";
              echo "<input type='submit' value='addtocart' name='addtocart' class='btn2'>
              <br><br>
              " ;
             
              
               echo "</div>";
               echo "</form>";
               echo "</div>";
               echo "</div>";
           }
       } else {
           echo "<div class='no-results'>No products found.</div>";
       }
   }
} else {
   echo "<div class='no-results'>No search query found.</div>";
}
   ?>

  
   <br><br><br><br>

   <script>
  function redirectToPage() {
    window.location.href = "cart.php";
  }
</script>
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
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>

<script>
 function redirectToLocation() {
  var locationName = encodeURIComponent("Food Stop, Sultaniyeh"); // Update with the actual name and location
  var mapUrl = `https://www.google.com/maps/search/?api=1&query=${locationName}`;

  // Redirect to the Google Maps URL
  window.open(mapUrl, "_blank");
}
</script>

<script>
  function redirectToPage() {
    window.location.href = "cart.php";
  }
</script>