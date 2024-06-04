<?php
include 'config.php';

// Retrieve orders from the database
$sql = "SELECT * FROM `order`where name !='fixed'";
$result = mysqli_query($conn, $sql);

// Check if there are any orders
echo"<h2>Delivery Orders</h2>";
if (mysqli_num_rows($result) > 0) {
    echo "<table class='order-table'>";
    echo "<tr><th>user</th><th>Number</th><th>Email</th><th>Street</th>
    <th>City</th><th>Total Products</th><th>Total Price(including dilevery charge)</th><th>datetime</th><th>Action</th><th>delete order</th><th>Complete</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $ordername = $row['name'];
        $phonenumber = $row['number'];
        $email = $row['email'];
         $id = $row['id'];
        $street = $row['street'];
        $city = $row['city'];
        $datetime= $row['datetime'];
   
        $totalproduct = $row['total_products'];
      
        $totalprice = $row['totalprice'];

        echo "<tr>";
        echo "<td>" . $ordername . "</td>";
        echo "<td>" . $phonenumber . "</td>";
        echo "<td>" . $email . "</td>";
        echo "<td>" . $street . "</td>";
        echo "<td>" . $city . "</td>";
        echo "<td>" . $totalproduct . "</td>";
        echo "<td>" . $totalprice . "</td>";
        echo "<td>" . $datetime . "</td>";
        echo "<td><button class='btn' onclick='makeCall(\"" . $phonenumber . "\")'>chat</button></td>";
        echo "<td><a href='deleteorders.php?id=" . $id . "'><img src='dd.png' alt='Delete Order'></a></td>";
    

        echo "<td>
            <form class='orderForm' method='post'>
                <label for='status'>Status:</label>
                <input type='text' name='status'>
                <br>
                <label for='orderName'>Name:</label>
                <input type='text' name='orderName' value='$ordername' readonly>
                <button class='btn' type='submit'>Complete Order</button>
            </form>
        </td>";

        
        echo "</tr>";
        // ... closing tags ...
    }

        
    
//deleteorderajax or deleteorders

    echo "</table>";
    echo"<div class='flex'>";
    echo"<button  class='btn2'><a href='adminn.php'>Back</a></button>";
    echo"</div>";
} else {
    echo "<script>alert('No orders found.');
    window.location.href = 'adminn.php';</script>";

}
?>

<script>
    function makeCall(phone) {
        var whatsappLink = "https://api.whatsapp.com/send?phone=" + phone;
        window.open(whatsappLink);
    }
</script>


<style>
  .flex{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .btn {
  border-radius: 13px;
}
h2{
  text-align: center;
  font-size: 30px;
}

body {
  background-image: url("");
  background-repeat: no-repeat;
  background-size: cover;
}

.order-table {
  width: 100%;
  border-collapse: collapse;
}

.order-table th,
.order-table td {
  padding: 10px;
  text-align: left;
  border: 1px solid #ddd;
}

.order-table th {
  background-color: black;
  font-weight: bold;
}

.order-table tr:nth-child(even) {
  background-color: #f9f9f9;
}

.order-table tr:hover {
  background-color: #e6e6e6;
}

.order-table button {
  padding: 5px 10px;
  background-color: grey;
  color: white;
  border: none;
  cursor: pointer;
}

.order-table button:hover {
  background-color: #45a049;
}

.order-table {
  background-color: #f2f2f2;
  border: none;
}

.order-table th {
  background-color: darkblue;
  color: white;
}

.order-table tr:nth-child(even) {
  background-color: #eaf2f8;
}

.order-table tr:hover {
  background-color: #d4e6f1;
}

.order-table button {
  background-color: grey;
}

.order-table button:hover {
  background-color: grey;
}
@media (max-width: 768px) {
    .order-table {
  width: 100%;
}

.order-table th,
.order-table td {
  padding: 5px;
  width: 100%;
}

.order-table th {
  text-align: center;
  display: flex;
  width: 100%;
}

* {
  font-size: 7px;
}

img {
  width: 10px;
  height: 10px;
}

.order-table td {
  text-align: center;
  border: none;
  height: 100%;
}

.order-table tr {
  border: 1px solid #ddd;
  display: flex;
  flex-direction: row;
}

.order-table button {
  padding: 3px 6px;
  width: 100%;
}

@media (max-width: 768px) {
  .order-table {
    width: 50%; /* Adjust the width as needed */
    margin: 0 auto;
    margin-left: 10px;
  }
}
}
.btn2{
  color:white;
  width:300px;
  height: 47px;
  background-color: #000;
  border-radius: 10px;
  margin-top: 10px;
 

}
.btn2 a{
  text-decoration: none;
  color: white;
}


</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function() {
    var orderCompleted = localStorage.getItem('orderCompleted');

    if (orderCompleted) {
        // If the order was previously completed, show the tick sign immediately
        showTickSign();
    }

    $('.orderForm').submit(function(event) {
        event.preventDefault();

        var status = $(this).find('input[name="status"]').val();
        var orderName = $(this).find('input[name="orderName"]').val();
        var submitButton = $(this).find('button[type="submit"]');
        var form = $(this);

        $.ajax({
            url: 'completeorder.php',
            type: 'POST',
            data: { name: orderName },
            success: function(response) {
                if (response.includes('successfully')) {
                    alert('Order completed successfully.');
                    submitButton.html('<img src="sign.jpeg" height="40px" width="40px" alt="Correct Sign">'); // Replace button text with image of correct sign
                    submitButton.prop('disabled', true); // Disable the button
                    form.hide(400, function() {
                        showTickSign();
                        localStorage.setItem('orderCompleted', true); // Store the order completion status in localStorage
                        form.remove(); // Remove the form from the DOM
                    });
                } else {
                    alert('Failed to complete order. Error: ' + response);
                }
                
            },
            error: function(xhr, status, error) {
                alert('Failed to complete order. Error: ' + error);
            }
        });
    });

    function showTickSign() {
        var tickSign = $('<img src="sign.jpeg" height="40px" width="40px" alt="Correct Sign">'); // Create image element of correct sign
        $('.orderForm').after(tickSign); // Insert the correct sign image after the form
    }
});

</script>

