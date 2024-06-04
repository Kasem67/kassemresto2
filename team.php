<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR TEAM SECTION</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
   /* background-color:#DDEAC1 ;*/
 background-color: #E1DABD;
    background-image: url("");
    background-repeat: no-repeat;
    background-size: cover;
    font-family: "Century Gothic";
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}


.title{
    text-align: center;
    text-transform: capitalize;
    color: black;
    margin: 10px 0;
    position: relative;
}

.title::after{
    content: "";
    position: absolute;
    width: 20%; height: 2px;
    background-image: linear-gradient(to left, transparent 5%, grey);
    bottom: -10px; left: 50%;
    transform: translate(-50%);
}

.team-row{
    display: flex;
    justify-content: center;
    width: 100%;
    flex-wrap: wrap;
    padding: 40px 0;
}

.member{
    flex: 1 1 250px;
    margin: 20px;
    background-color:white;
    text-align: center;
    padding: 20px 10px;
    cursor: pointer;
    max-width: 300px;
    transition: all 0.3s;
    border-radius: 13px;
}

.member:hover{
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    transform: translateY(-20px);
}

.member img{
    display: block;
    width: 150px; height: 150px;
    object-fit: cover;
    border:4px solid black;
    border-radius: 50%;
    margin: 0 auto;
}

.member h2{
    text-transform: uppercase;
    font-size: 24px;
    color: black;
    margin: 15px 0;
}

.member p{
    font-size: 15px;
    color: #838383;
    line-height: 1.6;
}
.chef{
    display: block;
    background-color: black;
    color:white;
    width:1230px;
    border-radius: 13px;
}
.chef h2{
    margin-left: 48%;
}
button{
    background-color: grey;
    border-radius: 15px;
    border: none;
    height: 50px;
    width:130px;
  gap: 10px;
}
button a{
    color:white;
    font-size: 20px;
    text-decoration: none;
}
.cart-icon {
    font-size: 24px;
    color: grey;
    cursor: pointer;
  }
  .mem{
    text-align: center;
    display: block;
    background-color: black;
    color:white;
    
    width:100%;
    border-radius: 13px;

  }
  .mem h2{
    text-align: center;
    
  }
  @media (max-width:767px){
    body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.mem h2{
    text-align: center;
    padding-left: 100px;
  }
    .chef{
    display: block;
    background-color: black;
    color:white;
    
    width:100%;
    border-radius: 13px;
}
h2{
    margin-right: 100px;
}

  }
  .cont{
    display:flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    
  }
  @media (max-width:767px){
    .chef{
    display: block;
    background-color: black;
    color:white;
    width:100%;
    border-radius: 13px;
}
  }
</style>
</head>
<body>

<section>
    <h1 class="title">our team</h1>
    <br>
    <div class="mem">
        <h2>members</h2>
    </div>
    <div class="team-row">
        <?php
       include 'config.php';

        // Fetch team members from the database
        $sql = "SELECT * FROM displayteam";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="member">
                    
                    <img src="<?php echo $row['image']; ?>" alt="">
                    <h2><?php echo $row['fname']; ?></h2>
                    <h2><?php echo $row['jobtype']; ?></h2>
                
                </div>
                <?php
            }
        }
        $conn->close();
        ?>
    </div>
    <div class="chef">
        <h2>jobs</h2>
    </div>
    <br><br>
    <div class="cont">
        <button><a href="jobs.php">Apply now</a></button>
        <button><a href="index.php">back</a></button>
    </div>
    <br><br>
</section>
</body>
</html>