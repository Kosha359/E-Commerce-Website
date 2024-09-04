<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'eira';

// Create connection
$conn = new mysqli('localhost','root','','login');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data from JSON payload
$data = json_decode(file_get_contents('php://input'), true);

// Insert data into login table
$sql = "INSERT INTO login (firstName, lastName, contactNumber, address, email, password) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssisss", $data['firstName'], $data['lastName'], $data['contactNumber'], $data['address'], $data['email'], $data['password']);
$stmt->execute();

// Check if data was inserted successfully
if ($stmt->affected_rows > 0) {
    echo "Account created successfully!";
} else {
    echo "Error creating account: " . $stmt->error;
}

// Close connection
$conn->close();
?>








<!-- <?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Databse Connection
    $conn = new mysqli('localhost','root','login');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);        
    }else{
        $stmt = $conn->prepare("Insert into registrationForm(firstName, lastName, phone, address, email, password)
             values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss",$firstName, $lastName, $phone, $address, $email, $password);
        $stmt->execute();
        echo "Login Successfully...";
        $stmt->close();
        $conn->close();
        
    }
?> -->


