<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "design_club";

$name=$_POST['name'];
$email=$_POST['email'];
$url=$_POST['url'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO product_req (name,email,url) VALUES ('$name','$email','$url')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>