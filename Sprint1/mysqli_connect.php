<?php


// Make the connection:
$conn = new mysqli( 'localhost','root', '', 'hcmedia');

// Notify if connection failed
if ($conn->connect_error) {
    die("Connect failed: " . $conn->connect_error);
}
// Set the encoding...optional but recommended
mysqli_set_charset($conn, 'utf8');
