<?php
include 'config.php';

$sql = "SELECT * FROM `take`where name!='fixed' ";
$result = mysqli_query($conn, $sql);
echo"<h2>Takeaway Orders</h2>";
if (mysqli_num_rows($result) > 0) {
    echo "<table class='order-table'>";
    echo "<tr><th>Name</th><th>Phone</th> <th>products</th> <th>price</th><th>dateandtime</th><th>chat</th> <th>delete</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $phone = $row['phone'];
        $totalproduct = $row['totalproduct'];
        $id =$row['id'];
        $date =$row['dateandtime'];
        $price = $row['totalprice'];
        echo "<tr>";
        echo "<td>" . $name . "</td>";
        echo "<td>" . $phone . "</td>";
        echo "<td>" . $totalproduct . "</td>";
        echo "<td>" . $price . "</td>";
        echo "<td>" . $date . "</td>";
        echo "<td><button class='chat' onclick='makeCall(\"" . $phone . "\")'>chat</button></td>";
        echo "<td><a class='del' href='deletetake.php?id="
         . $id . "'><img src='dd.png' alt='Delete Order'></a></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo"<div class='flex'>";
    echo"<button class='btn2'><a href='adminn.php'>back</a></button>";
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
.del{

}
h2{
    text-align: center;
    font-size: 30px;
}
.chat{
    border-radius: 17px;
}

.order-table {
    width: 100%;
    border-collapse: collapse;
}

.order-table th,
.order-table td {
    padding: 10px;
    text-align: center;
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
    background-color: red;
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
    width: 100px;
}

.order-table button:hover {
    background-color: red;
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
    width: 80%; /* Adjust the width as needed */
    margin: 0 auto;
    margin-left: 5px;
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

<script>
    function completeOrder(orderId) {
        // Perform actions to complete the order
        // You can use AJAX to send a request to the server and update the order status, for example
        console.log("Complete order for Order ID: " + orderId);
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    
</body>
</html>