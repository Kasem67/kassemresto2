

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/css2/jobee.css">
    <title>Our Products</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');

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
    background-color:  #4e598c;
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
    align-items: center;
    text-align: center;
    box-shadow: 5px 5px 10px 1px rgb(0, 0, 0, 12%);
    gap: 17.5px;
    width: 300px; /* Added fixed width */
    height: 400px; /* Added fixed height */

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

.box .options a {
    color: white;
    background-color:black;
    display: inline-block;
    padding: 10px 15px;
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
    margin-left: 5px;
    border-radius: 55px;
}

.box .options a:hover {
    background-color: var(--secondary-color);
}

.box img {
    width: auto;
    height: 250px; /* Added fixed height */
    object-fit: cover; /* Added object-fit property */
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body {
    min-height: 100vh;
   background-color: #e6d3a3;
     
    color: black;
    font-family: "Lato", sans-serif;
    font-weight: 300;
    font-size: 20px;
    line-height: 1.5;
    @media screen and (max-width: 820px) {
      font-size: 16px;
    }
  }

  @media (max-width:768px){
  
   .container{
    background-color: antiquewhite;
    justify-content: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: auto;
    
}
.box {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    .box img {
        height: 200px;
        width: auto;
    }

    .box .details {
        padding: 10px;
    }

    .box h2 {
        font-size: 18px;
        margin-bottom: 5px;
    }

    .box p {
        font-size: 12px;
        margin-bottom: 5px;
    }

    .box .rate {
        font-size: 10px;
        margin-bottom: 5px;
    }

    .box .options a {
        padding: 8px 12px;
        font-size: 10px;
    }

  }
.container{
    display: flex;
    flex-wrap: wrap;
    background-color: antiquewhite;
    justify-content: center;
    align-items: center;
    
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
    gap: 20px;
    
    width: 900px;
}
.btn2{
  color:white;
  width:300px;
  height: 47px;
  background-color: #000;
  border-radius: 10px;
  margin-top: 10px;
  margin-left: 590px;

}
.btn2 a{
  text-decoration: none;
  color: white;
}
.heading{
    display: flex;
    justify-content: center;
    align-items: center;
}
h1{
    margin-right: 50px;
}
    </style>
</head>
<body>

<div class="heading">
        <h1 class="tit">jobs</h1>
    </div>
    <div class="container">
    <?php
    include 'config.php';

    $sql = "SELECT * FROM `categoryjobs`";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $job_name = $row['catname'];
            $job_image = $row['image'];
            $job_salary = $row['salary'];
            $jobid= $row['catid'];
            $status= $row['status'];
          

            echo "<div class='box'>";
            echo "<img src='uploadimg/" . $row['image'] . "'>";
            echo "<h2>" . $job_name . "</h2>";
            echo "<span>$" . $job_salary . " salary</span>";
            echo "<div class='rate'>";

            echo "</div>";
            echo "<div class='options'>";
            echo "<a href='editjob.php?jobid=" . urlencode($jobid) . "'>Edit</a>";
            echo "<a href='deletejob.php?jobid=" . urlencode($jobid) . "'>Delete</a>";
            if ($status == 'available') {
                echo "<a href='changestatus.php?jobid=" . urlencode($jobid) . "&status=disabled' class='status-btn'>$status</a>";
            } else {
                echo "<a href='changestatus.php?jobid=" . urlencode($jobid) . "&status=available' class='status-btn'>$status</a>";
            }
            echo "</div>";
            echo "</div>";

           
        }
    } else {
        echo "<p>No jobs found.</p>";
    }

    $conn->close();
    ?>
</div>
<button class="btn2"><a href="adminn.php">back</a></button>
</body>
</html>