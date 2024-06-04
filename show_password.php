<?php
session_start();

if (isset($_SESSION['password_hash'])) {
    $hashedPassword = $_SESSION['password_hash'];
    $password = '';

    if (isset($_POST['show_password'])) {
        $enteredPassword = $_POST['password'];

        if (password_verify($enteredPassword, $hashedPassword)) {
            $password = $enteredPassword;
        } else {
            echo "Incorrect password.";
        }
    }

    echo '<form method="POST">';
    echo '<input type="password" name="password" value="' . $password . '" readonly>';
    echo '<button type="submit" name="show_password">Show</button>';
    echo '</form>';
} else {
    echo "Password not found.";
}
?>