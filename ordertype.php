<?php
include 'config.php';
session_start();
if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
}
if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   header('location: log4.php');
   exit;
}
if (!isset($_SESSION['loggedin2']) || $_SESSION['loggedin2'] !== true) {
   header('location: log4.php');
   exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/all.min.css">
    
    <title>Our Products</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');
/* ordertype*/ 
:root {
    --primary-color:black;
    --secondary-color: black;
    --gray-color: #808080;
}

* {
    box-sizing: border-box;
    font-family: 'Source Sans Pro', sans-serif;
    line-height: 1;
    padding: 0;
    margin: 0;
}

body {
   color: black;
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

@media (max-width: 768px) {
    .heading h1 {
        font-size: 21px;
    }
}
/*
.container {
    width: 1000px;
    height:400px;
    padding: 15px;
    margin-left: auto;
    margin-right: auto;
    display: grid;
    justify-content: center;
    
    grid-template-columns: repeat(auto-fill, minmax(250px, auto));
    gap: 35px;
}

*/
*{
   margin: 0;
   padding: 0;
   box-sizing: border-box;
}
      body{
        /* background-color:#6f1a07 ;*/
         /*background-image: url("baq.jpg");*/
          
     
         font-size: 25px;
      }
 
.btn1{
   background-color: blue;
   padding-bottom: 10px;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
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
.font{
   font-size: larger;
   color: black;
}
.cart-icon {
    font-size: 24px;
    color: black;
    cursor: pointer;
    margin-top: 4px;
    margin-left: 10px;
    margin-right: 10px;
    /*margin-bottom: 10px;*/
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
   margin-left: 20px;
   color:white;
   font-size: 30px;
   margin-bottom: 30px;
   text-align: center;
   }
   .headi li a{
      color:white;
      font-weight: 400;
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
   height: 300px;
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
         justify-content: center;
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
.heading{
   text-align: center;
   font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
   
}
.name{
   text-align: center;
   padding: 15px;
   font-size: 30px;

}

.container .box .price{
   
   top:10px; left:153px;
   padding:5px 10px;
   border-radius: 15px;
   background-color:#edfdfb;
   color:black;
   font-size: 25px;
}

.search-icon {
        width: 40px;
        height: 40px;
        margin-right: 17px;
        margin-bottom: 10px;
       
    }
    .icn{
      
      height: 55px;
      border-radius: 24px;
      width:80px;
      
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
   height: 36px;
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

@media (max-width: 768px) {
    .container {
        width: 100%;
    }
}

.box {
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    box-shadow: 5px 5px 10px 1px rgb(0, 0, 0, 12%);
    gap: 7.5px;
    width:300px;
}
.box33 {
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    box-shadow: 5px 5px 10px 1px rgb(0, 0, 0, 12%);
    gap: 7.5px;
    width:300px;
}

.box img {
    width: 100%;
}
.box33 img {
    width: 100%;
}
.box img:hover {
    cursor: pointer;
    opacity: 0.95;
}
.box33 img:hover {
    cursor: pointer;
    opacity: 0.95;
}

.box h2 {
    font-size: 20px;
}
.box33 h2 {
    font-size: 20px;
}
.box{
    height:400px;
}
.box33{
    height:400px;
}
.box img{
    height:380px;
}
.box33 img{
    height:380px;
}

.box2{
    height:700px;
}
.box2 img{
    height:300px;
}
.box3{
    height:400px;
}
.box3 img{
    height:300px;
}
.box p {
    padding: 0 20px;
    font-size: 10px;
    line-height: 1.35;
    color: var(--gray-color);
}
.box2 p {
    padding: 0 20px;
    font-size: 12.5px;
    line-height: 1.35;
    color: var(--gray-color);
}
.box33 p {
    padding: 0 20px;
    font-size: 12.5px;
    line-height: 1.35;
    color: var(--gray-color);
}

.box span {
    font-weight: 800;
    font-size: 18px;
}
.box33 span {
    font-weight: 800;
    font-size: 18px;
}
.box2 span {
    font-weight: 800;
    font-size: 18px;
}

.box .rate {
    color: #ffb900;
    font-size: 12px;
}
.box2 .rate {
    color: #ffb900;
    font-size: 12px;
}
.box3 .rate {
    color: #ffb900;
    font-size: 12px;
}

.box .options {
    margin-bottom: 25px;
}

.box33 .options {
    margin-bottom: 25px;
}

.box .options a {
    color: white;
    background-color:black;
    display: inline-block;
    padding: 10px 15px;
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
    border-radius: 55px;
}

.box33 .options a {
    color: white;
    background-color:black;
    display: inline-block;
    padding: 10px 15px;
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
    border-radius: 55px;
}
.box2 .options a {
    color: white;
    background-color:black;
    display: inline-block;
    /*padding: 10px 15px;*/
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
    border-radius: 55px;
}
.box3 .options a {
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
.box33 .options a:hover {
    background-color: var(--secondary-color);
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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

padding-bottom:7px;
text-align: center;
margin-bottom: 10px;


color:white;

}
.headi li {
margin-left: 20px;
margin-top: 10px;

color:white;
font-size: 30px;
margin-bottom: 30px;
text-align: center;
}
.headi li a{
  
   color:white;
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
  margin-top: 5px;
   border-radius: 10px;

}
.align{
display: flex;
align-items: center;
}
img{
width: 100%;
height: 300px;
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
      justify-content: center;
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
.heading{
text-align: center;
font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif

}
.name{
text-align: center;
padding: 15px;
font-size: 30px;

}

.container .box .price{

top:10px; left:153px;
padding:5px 10px;
border-radius: 15px;
background-color:#edfdfb;
color:black;
font-size: 25px;
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
.search-icon {
     width: 40px;
     height: 40px;
     margin-right: 17px;
     margin-bottom: 10px;
    
 }
 .icn{
   
   height: 50px;
   border-radius: 24px;
   width:80px;
   
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
  

 a{
    text-decoration: none;
    color:#808080;
    font-weight: bold;
  }
  .container{
  display: flex;
  margin: 15px;
  align-items: center;
  justify-content: center;
  gap: 10px;
  }
  .box33{
    margin-left: 17px;
  }
  /*
  .box{
    position:absolute;
    right:750px;
  }
  .box2{
    position:absolute;
    right:320px;
    height:400px;
  }
  .box3{
    position:absolute;
    left:800px;
  }*/
  @media (max-width:767px){
   
   .heading{
    width: 100%;
   }
   h1{

   }
   .box33{
    margin-left: 10px;
    margin-right: 10px;
  }
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
   height: 39px;
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
  /*for phones*/
  @media (max-width: 768px) {
 .carousel-item {
   flex: 0 0 auto;
    width:100%;
}

.carousel-inner img {
            width:100%;
            height: 100%;
        }

        .headi{
background-color: #086788;
color:white;
border-radius: 5px;
width: 100%;
height:40px;
}
.headi ul{
display:flex;
list-style-type: none;
text-decoration: none;
justify-content: center;
width:100%;
text-align: center;

color:white;

}
.headi li {
color:white;
font-size: 8px;
text-align: center;
margin-right: 10px;
margin-top: 0px;
}
.headi li a{
   color:white;
}
.icn{
   width:25px;
   height:30px;
   margin-right: 10px;
}
.cart-icon {
    font-size: 24px;
    color: black;
    cursor: pointer;
    width:3px;
    margin-right: 20px;
    margin-left: 0px;
  }

  .container{
         display: block;
         justify-content: center;
         margin: auto;
         align-items: center;
         gap: 30px;
      margin-top: 20px;
       
       }

       .pimg{
      border-radius: 150px;
      width: 250px;
      margin-left: 65px;
   }
   h1{
   text-align: center;
   }
body{
   width: 100%;
}

   .container .box .price{
   
  width: 300px;

   border-radius: 15px;
   background-color:#edfdfb;
   color:black;
   font-size: 25px;
   margin-left: 45px;
   
}

.qnty{
   width: 300px;
   margin-left: 40px;
 

  }
  .btn1{
      border-radius: 15px;
      color: white;
      font-size: 20px;
      height: 45px;
      width: 300px;
      padding-top: 5px;
      background-color:#086788 ;
      margin-left: 40px;
     
    
   
   }
   img{
    width: 70px;
   }
   .container{
         display: flex;
         justify-content: center;
         align-items: center;
         gap: 20px;
         position: relative;
         margin-left: 30px;
       }

   .footer-basic {
 height: 280px;
  background-color: #404242 ;
  border-radius: 10px;
  color:white;
  width: 100%;
}
.submits{
         height: 1px;
         width: 0px;
         background-color: #086788;
         border: none;
         padding-bottom: 17px;
      
       
       }
       .search-icon {
        width: 10px;
        height: 20px;
        margin-right: 17px;
        margin-bottom: 10px;
       
    }
    h2{
      font-size: 5px;
    }
    img{
      width:90px;
    }

.name{
   text-align: center;

   font-size: 30px;
}
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
margin-left: 150px;
margin-right: 10px;
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
     padding-left: 10px;
 }

 .search input[type="text"]::before {
     content: "";
     position: absolute;
     top: 50%;
     /*left: 10px;*/
     transform: translateY(-50%);
     pointer-events: none;
     background-image: url('search.png');
     background-repeat: no-repeat;
     background-position: center;
     background-color: #ff0022;
     background-size: 16px;
     width: 10px;
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
<div class="headi">
<ul>
   <img class="icn" src="rrr.jpeg" alt="">
   <div class="align">
   <li><a href="product.php" >menu</a></li>
   <li><a href="ordertype.php" >order</a></li>
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
    <div class="heading">
        <h1>order options</h1>
    </div>
    <div class="container">
        <div class="box">
            <img src="take.avif">
            <h2>TakeAway</h2>
           <a class="confirm" href="take.php">confirm</a>
           <br>
            
        </div>
        <br><br> <br>
        
        <div class="box">
            <img src="delivery.avif">
            <h2>Delivery</h2>
            <a  class="confirm" href="ord.php" >confirm</a>
            <br>
            
        </div>
        <br>
        <div class="box33">
            <img src="dine.jpg">
            <h2>Dine in</h2>
            <a  class="confirm" href="dn.php" >confirm</a>
            <br>
            
        </div>
        <br><br>
    
    </div>
    <br><br>
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

</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>