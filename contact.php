<?php
// Establish a database connection
$servername = "sql7.freemysqlhosting.net"; // Replace with your database server name
$username = "sql7624551"; // Replace with your database username
$password = "hQJ1zs9MCw"; // Replace with your database password
$dbname = "sql7624551"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$number = $_POST['number'];
$city = $_POST['city'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO customer_details(firstname, lastname, number, city) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstname, $lastname, $number, $city);
$stmt->execute();

// Check if the data was successfully inserted
if ($stmt->affected_rows > 0) {
    echo "Data saved successfully.";
} else {
    echo "Error: Unable to save data.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>

