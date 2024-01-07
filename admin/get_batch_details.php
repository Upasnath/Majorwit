<?php
include ('conn.php');

// Check if the batch parameter is provided in the URL
if (isset($_GET['batch'])) {
    // Sanitize the input to prevent SQL injection
    $batch = $_GET['batch'];
    $batch = htmlspecialchars($batch);

    // Your SQL query to retrieve data based on the batch
    $sql = "SELECT student_id,student_name,student_email, student_username, student_password FROM tbl_students WHERE student_batchcode = '$batch' AND credentails='waiting'";

    // Perform the query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $batchDetails = array();

        // Fetch data from the result set
        while ($row = mysqli_fetch_assoc($result)) {
            $batchDetails[] = $row;
        }

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($batchDetails);
        
    } else {
        // Handle query error
        echo "Error executing query: " . mysqli_error($your_db_connection);
    }
} else {
    // Handle missing batch parameter
    echo "Batch parameter is missing";
}
?>
