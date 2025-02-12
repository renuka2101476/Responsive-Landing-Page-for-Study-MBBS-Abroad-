<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "studyabroad"; 

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    if (!isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['country'])) {
        die("Missing required fields.");
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];

  
    echo "Received Data:<br>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Phone: $phone<br>";
    echo "Country: $country<br>";

   
    $stmt = $conn->prepare("INSERT INTO applications (name, email, phone, country) VALUES (?, ?, ?, ?)");
    
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("ssss", $name, $email, $phone, $country);

    if ($stmt->execute()) {
        echo "<script>alert('Application submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
