<?php
include ('conn.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform SQL query to get student_batchcode from tbl_register
$sql = "SELECT DISTINCT student_batchcode FROM tbl_students";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    $batches = array();

    // Fetch rows and add to array
    while ($row = $result->fetch_assoc()) {
        $batches[] = $row['student_batchcode'];
    }

    // Convert array to JSON and echo
    echo json_encode($batches);
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
