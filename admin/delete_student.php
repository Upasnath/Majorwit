<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_id'])) {
    $studentId = $_POST['student_id'];

    // Perform the deletion query
    $sql_delete = "DELETE FROM tbl_students WHERE student_id = $studentId";
    $result = $conn->query($sql_delete);

    if ($result) {
        echo "Student deleted successfully";
        // Additional actions after successful deletion (if needed)
    } else {
        echo "Error deleting student: " . $conn->error;
    }
} else {
    echo "Invalid request";
}
?>
