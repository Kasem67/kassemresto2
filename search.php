<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <style>
        /* CSS styles omitted for brevity */
      
      .container{
     
     display:flex;
     background-color: rosybrown;
      justify-content: center;
      align-items: center;
      flex-direction: row;
      height: 300px;
      align-content: flex-start;

   }
   .item{
     background-color: grey;
     margin: 50px;
     width:250px;
     height:100px;
     border-radius: 20px;

   }
     .item1{
     height: 200px;
     border-radius: 20px;
   }
   .item2{
     height: 200px;
   }
   .item3{
     height:200px;
   }
   .head{
     height:400px;
     background-image: url("4444.jpeg");
     background-repeat: no-repeat;
     background-size: cover;
   }
   *{
     margin: 0;
     padding: 0;
     box-sizing: border-box;

   }
   nav{
     background-color: brown;
      height:60px;

    

   }
   ul{
     display: flex;
     justify-content: center;
     text-decoration: none;
     align-items: center;
     height: 60px;
     border-radius: 10px solid black;
     list-style-type: none;

   }
   ul li a{
     justify-content: center;
     margin: 100px;
     color: white;
     text-decoration: none;
   }
   .item img{
     width: 250px;
     height:200px;
     border-radius: 20px;
   }
   h1{
     text-align: center;
   }
   *{
     padding: 0;
     margin: 0;
     box-sizing: border-box;
   }
   .cart{
     display: flex;
     justify-content: center ;
   }
   button{
     margin: 20px;
   }
   h2{
    display: flex;
    align-items: flex-start;
    height: 300px;
    width: 100px;
    justify-content: flex-start;
   }

 .add-to-cart-btn{
    width:150px;
    height: 50px;
    margin-right: 100px;
    border-radius: 10px;
 }

    </style>
</head>
<body>

<header class="head">
    <img src="" alt="">
</header>
<nav>
    <ul>
        <li><a href="">home</a></li>
        <li><a href="">menu</a></li>
        <li><a href="">about</a></li>
    </ul>
</nav>

<div class="container">
    <h2>Search Results</h2>

    <?php
    session_start();
    include 'config.php';

    if (isset($_GET['search_query'])) {
        $search_query = $_GET['search_query'];

        // Delete the previous searched product
        mysqli_query($conn, "DELETE FROM searched_products");

        // Search in multiple tables
        $tables = array("burgers", "pizza", "plates", "snack", "baverages");
        $found = false;

        foreach ($tables as $table) {
            $select_sql = "SELECT * FROM $table WHERE name LIKE '%$search_query%' LIMIT 1";
            $result = mysqli_query($conn, $select_sql);

            if (mysqli_num_rows($result) > 0) {
                $found = true;
                $row = mysqli_fetch_assoc($result);

                // Insert the searched product into the "searched_products" table
                $product_id = $row['id'];
                $product_name = $row['name'];
                $product_price = $row['price'];
                $product_image = $row['image'];

                $insert_sql = "INSERT INTO searched_products (product_id, product_name, product_price, product_image)
                               VALUES ('$product_id', '$product_name', '$product_price', '$product_image')";

                if (mysqli_query($conn, $insert_sql)) {
                    echo "";
                } else {
                    echo "Error inserting searched product: " . mysqli_error($conn);
                }

                // Display the searched product form
                echo "<div class='box'>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='product_id' value='" . $product_id . "'>";
                echo "<input type='hidden' name='product_name' value='" . $product_name . "'>";
                echo "<input type='hidden' name='product_price' value='" . $product_price . "'>";
                echo "<input type='hidden' name='product_image' value='" . $product_image . "'>";
                echo "<img width='150px' height='150px' src='uploadimg/" . $product_image . "' alt='Product Image'>";
                echo "<div class='name'>" . $product_name ."$" .$product_price."</div>";
                echo "<div class='price'>$" . $product_price . "/-</div>";
                echo "<div class='add-to-cart'>";
                echo "<input type='number' name='product_quantity' value='1' min='1'> <br>";
                echo "<button class='add-to-cart-btn' name='add_to_cart'>Add to Cart</button>";
                echo "</div>";
                echo "</form>";
                echo "</div>";

                // Break the loop after finding the first match
                break;
            }
        }

        if (!$found) {
            echo "<div class='no-results'>No search results found.</div>";
        }
    } else {
        echo "<div class='no-results'>No search query found.</div>";
    }

    // Handle adding to cart
    if (isset($_POST['add_to_cart'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name'") or die('query failed');

        if (mysqli_num_rows($select_cart) > 0) {
            echo "<div class='message'>Product already added to cart!</div>";
        } else {
            mysqli_query($conn, "INSERT INTO cart (name, price, image, quantity) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
            echo "<div class='message'>Product added to cart!</div>";
        }
    }

    // Display any potential errors
    if (mysqli_error($conn)) {
        echo "<div class='error'>MySQL Error: " . mysqli_error($conn) . "</div>";
    }

    mysqli_close($conn);
    ?>
</div>

</body>
</html>