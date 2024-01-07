<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student View Notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        h3 {
            color: #0066cc;
        }

        p {
            color: #666;
        }

        hr {
            border: 1px solid #ddd;
        }

        .download-button {
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            display: inline-block;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h2>Student View Notes</h2>

<?php
include('conn.php');

$sql = "SELECT * FROM notes";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<h3>' . $row['title'] . '</h3>';
            echo '<p>Uploaded by: ' . $row['uploaded_by'] . ' on ' . $row['upload_date'] . '</p>';

            $filePath = $row['file_path'];

            if ($filePath) {
                // Provide links to view and download the file
                echo '<a class="download-button" href="' . $filePath . '" target="_blank">View Notes</a>';
                echo '<a class="download-button" href="' . $filePath . '" download>Download Notes</a>';
            } else {
                echo '<p>No file available for download.</p>';
            }

            echo '<hr>';
        }
    } else {
        echo '<p>No notes available.</p>';
    }
} else {
    echo 'Error: ' . $conn->error;
}

?>

</body>
</html>
