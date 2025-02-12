<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        die("Invalid phone number.");
    }

    echo "Thank you, $name! Your application for $country has been received.";
}
?>
