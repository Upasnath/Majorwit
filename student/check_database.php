<?php
// include('conn.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "majorwit";
$conn=mysqli_connect($servername,$username,$password,$database);
// Get the batch code from the AJAX request
$batchCode = $_POST['batchCode'];
$username = $_POST['username'];

// anitize the input to prevent SQL injection
$batchCode = mysqli_real_escape_string($conn, $batchCode);

// Perform the database query
$sql = "SELECT * FROM tbl_register WHERE username = '$username' AND batch_code = '$batchCode'";
$result = $conn->query($sql);

// Check if a row was found
if ($result->num_rows > 0) {
    // Batch code found in the database
    echo "success";
} else {
    // Batch code not found in the database
    echo "failure";
}

// Close the database connection
$conn->close();
?>
