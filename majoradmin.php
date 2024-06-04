
<?php
session_start();

include 'config.php';



?>

<!DOCTYPE html> 
<html lang="en"> 

<head> 
	<meta charset="UTF-8"> 
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge"> 
	<meta name="viewport"
		content="width=device-width, 
				initial-scale=1.0"> 
	<title>Food Stop</title> 
	 
	<link rel="stylesheet"
		href="responsive.css"> 


        <style>

@import url( 
"https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"); 
  
* { 
  margin: 0; 
  padding: 0; 
  box-sizing: border-box; 
  font-family: "Poppins", sans-serif; 
} 
:root { 
  --background-color1: #fafaff; 
  --background-color2: #ffffff; 
  --background-color3: #ededed; 
  --background-color4: #cad7fda4; 
  --primary-color: #4b49ac; 
  --secondary-color: #0c007d; 
  --Border-color: #3f0097; 
  --one-use-color: #3f0097; 
  --two-use-color: #5500cb; 
} 
body { 
  background-color: var(--background-color4); 
  max-width: 100%; 
  overflow-x: hidden; 
} 
  
header { 
  height: 70px; 
  width: 100vw; 
  padding: 0 30px; 
  background-color:white; 
  position: fixed; 
  z-index: 100; 

  display: flex; 
  justify-content: space-between; 
  align-items: center; 
} 
  
.logo { 
  font-size: 27px; 
  font-weight: 600; 
  color: black; 
} 
  
.icn { 
  height: 30px; 
} 
.menuicn { 
  cursor: pointer; 
} 
  
.searchbar, 
.message, 
.logosec { 
  display: flex; 
  align-items: center; 
  justify-content: center; 
} 
  

.logosec { 
  gap: 60px; 
} 
  


  
.message { 
  gap: 40px; 
  position: relative; 
  cursor: pointer; 
} 
.circle { 
  height: 7px; 
  width: 7px; 
  position: absolute; 
  background-color: #fa7bb4; 
  border-radius: 50%; 
  left: 19px; 
  top: 8px; 
} 
.dp { 
  height: 40px; 
  width: 40px; 
  background-color: #626262; 
  border-radius: 50%; 
  display: flex; 
  align-items: center; 
  justify-content: center; 
  overflow: hidden; 
} 
.main-container { 
  display: flex; 
  width: 100vw; 
  position: relative; 
  top: 70px; 
  z-index: 1; 
} 
.dpicn { 
  height: 42px; 
} 
  
.main { 
  height: calc(100vh - 70px); 
  width: 100%; 
  overflow-y: scroll; 
  overflow-x: hidden; 
  padding: 40px 30px 30px 30px; 
} 
  
.main::-webkit-scrollbar-thumb { 
  background-image:  
        linear-gradient(to bottom, rgb(0, 0, 85), rgb(0, 0, 50)); 
} 
.main::-webkit-scrollbar { 
  width: 5px; 
} 
.main::-webkit-scrollbar-track { 
  background-color: #9e9e9eb2; 
} 
  
.box-container { 
  display: flex; 
  justify-content: space-evenly; 
  align-items: center; 
  flex-wrap: wrap; 
  gap: 50px; 
} 
.nav { 
  min-height: 91vh; 
  width: 250px; 
  background-color: var(--background-color2); 
  position: absolute; 
  top: 0px; 
  left: 00; 
  box-shadow: 1px 1px 10px rgba(198, 189, 248, 0.825); 
  display: flex; 
  flex-direction: column; 
  justify-content: space-between; 
  overflow: hidden; 
  padding: 30px 0 20px 10px; 
} 
.navcontainer { 
  height: calc(100vh - 70px); 
  width: 250px; 
  position: relative; 
  overflow-y: scroll; 
  overflow-x: hidden; 
  transition: all 0.5s ease-in-out; 
  color:black;
} 
.navcontainer::-webkit-scrollbar { 
  display: none; 
  color:black;
} 
.navclose { 
  width: 80px; 
} 
.nav-option { 
  width: 250px; 
  height: 60px; 
  display: flex; 
  align-items: center; 
  padding: 0 30px 0 20px; 
  gap: 20px; 
  transition: all 0.1s ease-in-out; 
  color: black;
} 
.nav-option:hover { 
  border-left: 5px solid #a2a2a2; 
  background-color: #dadada; 
  cursor: pointer; 
  color:black;
} 
.nav-img { 
  height: 30px; 
  background-color: white;
} 
  
.nav-upper-options { 
  display: flex; 
  flex-direction: column; 
  align-items: center; 
  gap: 30px; 
  text-decoration: none;
  color: black;
} 
  
.h3 a{
  color: black;
}

.box { 
  height: 130px; 
  width: 230px; 
  border-radius: 20px; 
  box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751); 
  padding: 20px; 
  display: flex; 
  align-items: center; 
  justify-content: space-around; 
  cursor: pointer; 
  transition: transform 0.3s ease-in-out; 
  color:black;
} 
.box:hover { 
  transform: scale(1.08); 
} 
  
.box:nth-child(1) { 
  background-color:darkblue; 
} 
.box:nth-child(2) { 
  background-color: darkblue; 
  color:black;
} 
.box:nth-child(3) { 
  background-color: darkblue; 
} 
.box:nth-child(4) { 
  background-color: darkblue; 
} 
  
.box img { 
  height: 50px; 
} 
.box .text { 
  color: white; 
} 
.topic { 
  font-size: 13px; 
  font-weight: 400; 
  letter-spacing: 1px; 
} 
  
.topic-heading { 
  font-size: 23px; 
  letter-spacing: 3px; 
} 
  
.report-container { 
  min-height: 300px; 
  max-width: 1200px; 
  margin: 70px auto 0px auto; 
  background-color: #ffffff; 
  border-radius: 30px; 
  box-shadow: 3px 3px 10px rgb(188, 188, 188); 
  padding: 0px 20px 20px 20px; 
} 
.report-header { 
  height: 80px; 
  width: 100%; 
  display: flex; 
  align-items: center; 
  justify-content: space-between; 
  padding: 20px 20px 10px 20px; 
  border-bottom: 2px solid black; 
} 
  
.recent-Articles { 
  font-size: 30px; 
  font-weight: 600; 
} 
  
.view { 
  height: 35px; 
  width: 90px; 
  border-radius: 8px; 

  color: white; 
  font-size: 15px; 
  border: none; 
  cursor: pointer; 
} 
  
.report-body { 
  max-width: 1160px; 
  overflow-x: auto; 
  padding: 20px; 
} 
.report-topic-heading, 
.item1 { 
  width: 1120px; 
  display: flex; 
  justify-content: space-between; 
  align-items: center; 
} 
.t-op { 
  font-size: 18px; 
  letter-spacing: 0px; 
} 
  
.items { 
  width: 1120px; 
  margin-top: 15px; 
} 
  
.item1 { 
  margin-top: 20px; 
} 
.t-op-nextlvl { 
  font-size: 14px; 
  letter-spacing: 0px; 
  font-weight: 600; 
} 
  
.label-tag { 
  width: 100px; 
  text-align: center; 
  background-color: rgb(0, 177, 0); 
  color: white; 
  border-radius: 4px; 
}
div.nav-option h3 a{
  color:black;
  text-decoration: none;
}
.logo{
  color:darkblue;

}

</style>
</head> 

<body> 

  

	
	<!-- for header part -->
	<header> 

		<div class="logosec"> 
			<div class="logo">Admin</div> 

		</div> 

		
		<div class="message"> 
			
    <div class="dp"> 
    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
        class="dpicn"
        alt="dp"> 
</div>


		</div> 

	</header> 

	<div class="main-container"> 
		<div class="navcontainer"> 
			<nav class="nav"> 
				<div class="nav-upper-options"> 
					<div class="nav-option"> 
						<h3><a>Dashboard</a></h3> 
					</div> 
          <div class="nav-option"> 
						<h3><a href="addcategory.php">Add  category</a></h3> 
					</div> 
             
          <div class="nav-option"> 
						<h3><a href="displayproductsfromcategory.php">view category</a></h3> 
					</div> 

					
          <div class="nav-option"> 
						
						<h3><a href="orderajax.php">delivery</a></h3> 
					</div> 
          <div class="nav-option"> 
						
						<h3><a href="takeadmin.php">takeaway</a></h3> 
					</div> 
          <div class="nav-option "> 
						
						<h3><a href="viewuser.php"> users</a></h3> 
					</div> 
          <div class="nav-option "> 
						
						<h3><a href="adminbook.php"> Reservations</a></h3> 
					</div> 
          <div class="nav-option "> 
						
						<h3><a href="diningadmin.php"> dinein</a></h3> 
					</div>

          <div class="nav-option "> 
						<h3><a href="admincontact.php"> view contacts</a></h3> 
					</div>

          <div class="nav-option "> 
						<h3><a href="adminfeedback.php"> feedback</a></h3> 
					</div>
          <div class="nav-option "> 
						
						<h3><a href="adminjob.php"> jobs</a></h3> 
					</div> 
					<div class="nav-option option1 logout"> 
						<h3>
          <a href="logoutadmin.php" class="red">logout</a>
            </h3>
					</div> 

				</div> 
			</nav> 
		</div> 
		<div class="main"> 

			

			<div class="box-container"> 

				<div class="box box1"> 
					<div class="text"> 
					<?php
// Assuming you have a database connection established

// Query to get the total number of feedbacks and their sum of ratings
$query = "SELECT COUNT(*) AS total_feedbacks, SUM(rate) AS total_sum FROM display";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $totalFeedbacks = $row['total_feedbacks'];
    $totalSum = $row['total_sum'];

    // Calculate the average rating
    if ($totalFeedbacks > 0) {
        $averageRating = $totalSum / $totalFeedbacks;
    } else {
        $averageRating = 0;
    }

    // Display the average rating on the admin dashboard
    echo "<h2>Average Rating: " . number_format($averageRating, 2) . "&#9733;</h2>";
}
 else {
    echo "No feedbacks found.";
}
?>
						
					</div> 

				 
				</div> 

				<div class="box box2"> 
					<div class="text"> 
						<h2 class="topic-heading"><?php
             $sql = "SELECT nbofusers FROM user_info where name='numbers'";
             $result = mysqli_query($conn, $sql);
         
             // Check if there are any records
             if (mysqli_num_rows($result) > 0) {
                 $active = true; // Flag to track the active carousel item
         
                 // Loop through the records and generate carousel items
                 while ($row = mysqli_fetch_assoc($result)) {
                     $nb = $row['nbofusers'];
                    
             ?>
                     
                    
             <?php
                     $active = false; // Set the active flag to false after the first item
                 }
                 
                }
                else{
                  $nul=0;
                  echo"<p>$nul</p>";
                }
            ?>
             <p><b><?php echo $nb ?></b></p>
            </h2>

						<h2 class="topic">users loggedin</h2> 
					</div> 
				</div> 

				<div class="box box3"> 
					<div class="text"> 
            <h2 class="topic-heading"><?php
             $sql = "SELECT nboforders FROM `order`";
             $result = mysqli_query($conn, $sql);
         $null=0;
             // Check if there are any records
             if (mysqli_num_rows($result) > 0) {
                 $active = true; // Flag to track the active carousel item
         
                 // Loop through the records and generate carousel items
                 while ($row = mysqli_fetch_assoc($result)) {
                     $nb = $row['nboforders'];
                    
             ?>
                     
                    
             <?php
                     $active = false; // Set the active flag to false after the first item
                 }
                echo" <p><b><?php echo $nb ?></b></p>";
                }
                else{
                  echo"<p><b> $null</b></p>";
                }
            ?>
          
            
          </h2> 
						<h2 class="topic">orders dilvered &#10004</h2> 
					</div> 
                        
				</div> 

				<div class="box box4"> 
					<div class="text"> 
						<h2 class="topic-heading">Fast Delivery</h2> 
						<h2 class="topic"> WideRange Delivery</h2> 
					</div> 
				</div> 
			</div> 

		 
	</div> 

	 
</body> 
</html>
