<?php
// Include your database connection file or function
require '../php/functions.php';

// Establish a connection to the database
$conn = connecttodb();

// Query to fetch all user data
$sql = "SELECT * FROM user";

// Execute the query and get the result
$result = $conn->query($sql);

// Initialize an array to hold the user data
$data = array();

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Fetch all users from the result
    while ($row = $result->fetch_assoc()) {
        // Append each row (user data) to the $data array
        $data[] = $row;
    }
}

// Close the database connection
$conn->close();

// Set the content type to JSON
header('Content-Type: application/json');

// Output the user data as a JSON response
echo json_encode($data);
?>
