<?php
include('conn.php'); // Make sure to include your database connection file

// Check if the username parameter is set in the POST request
if (isset($_POST['username'])) {
    $username = $_POST['username'];

    // Check if the username exists in tbl_register
    $sql = "SELECT COUNT(*) AS count FROM tbl_register WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];

        // Send a JSON response indicating whether the username is unique
        echo json_encode(['unique' => ($count == 0)]);
    } else {
        // Handle database query error
        echo json_encode(['unique' => false, 'error' => $conn->error]);
    }
} else {
    // Handle case where the username parameter is not set
    echo json_encode(['unique' => false, 'error' => 'Username parameter not provided']);
}

// Close the database connection
$conn->close();
?>
