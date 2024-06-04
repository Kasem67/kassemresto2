
<?php
session_start();
session_unset();
include 'config.php';

// Delete all records from the "cart" table
$sql = "DELETE FROM cart";
mysqli_query($conn, $sql);
$sql2 = "DELETE FROM details";
mysqli_query($conn, $sql2);
// Destroy the session
session_destroy();

// Redirect the user to the desired page
header("Location: index.php");
exit;
?>
