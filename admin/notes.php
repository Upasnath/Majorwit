<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Upload PDF Notes</title>
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .white-box {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="file"] {
            width: calc(100% - 16px);
            padding: 8px;
            box-sizing: border-box;
            display: inline-block;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            visibility: hidden;
            display: inline-block;
            height: 20px;
            vertical-align: top;
        }

        .success-message {
            color: green;
            display: inline-block;
            height: 20px;
            vertical-align: top;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="white-box">
            <h2 class="box-title">Admin - Upload PDF Notes</h2>

            <?php
            include('conn.php');

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
                    $file_info = pathinfo($_FILES['pdf_file']['name']);
                    $allowed_extensions = ['pdf'];

                    if (in_array(strtolower($file_info['extension']), $allowed_extensions)) {
                        $upload_dir = 'NotesUpload/';
                        $upload_path = $upload_dir . basename($_FILES['pdf_file']['name']);

                        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $upload_path)) {
                            $title = mysqli_real_escape_string($conn, $_FILES['pdf_file']['name']);
                            $file_path = mysqli_real_escape_string($conn, $upload_path);
                            $uploaded_by = "Admin";

                            $insert_query = "INSERT INTO notes (title, file_path, uploaded_by) VALUES ('$title', '$file_path', '$uploaded_by')";

                            if (mysqli_query($conn, $insert_query)) {
                                echo '<p class="success-message">File uploaded successfully!</p>';
                            } else {
                                echo '<p class="error-message">Error inserting data into the database.</p>';
                            }
                        } else {
                            echo '<p class="error-message">Error uploading file.</p>';
                        }
                    } else {
                        echo '<p class="error-message">Invalid file type. Please upload a PDF file.</p>';
                    }
                } else {
                    echo '<p class="error-message">Error uploading file.</p>';
                }
            }
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="pdf_file">Choose PDF file:</label>
                    <input type="file" name="pdf_file" id="pdf_file" accept=".pdf" required>
                </div>
                <button type="submit">Upload</button>
            </form>
            <br>
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>

    <!-- Additional scripts -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
