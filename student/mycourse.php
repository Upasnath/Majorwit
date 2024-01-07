<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .list-group {
            margin-bottom: 20px; /* Adjust the value as needed */
        }

        .mb-4:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a box shadow on hover */
            transition: box-shadow 0.3s ease; /* Smooth transition effect */
        }
    </style>
</head>
<body>
<?php
        include("header.php");
    ?>
    <br>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br><br>
    <br>
    <br>
    <center>
        <div class="col">
            <div class="col-md-12" style="height: 100px;"> <!-- Adjust the height as needed -->
                <ul class="list-group mb-4" style="width:80%; height: 100%;" onclick="showModal1()">
                    <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius:20px;height: 100%; cursor: pointer;">
                        <div>
                            <img src="images/listen.jpg" alt="Image 1" style="max-width: 90px; max-height: 90px; margin-right: 10px;">
                            Listening 
                        </div>
                        <span class="badge bg-success rounded-pill">14%
                            <span>completed</span>
                        </span>
                    </li>
                </ul>
            </div>
            <br><br>
            <div class="col-md-12" style="height: 100px;"> <!-- Adjust the height as needed -->
                <ul class="list-group mb-4" style="width:80%; height: 100%;" onclick="showModal2()">
                <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius:20px;height: 100%; cursor: pointer;">
                        <div>
                            <img src="images/reading.jpg" alt="Image 1" style="max-width: 90px; max-height: 90px; margin-right: 10px;">
                            reading 
                        </div>
                        <span class="badge bg-primary rounded-pill">Not completed
                        </span>
                    </li>
                </ul>
            </div>
            <br><br>
            <div class="col-md-12" style="height: 100px;"> <!-- Adjust the height as needed -->
                <ul class="list-group mb-4" style="width:80%; height: 100%;" onclick="showModal3()">
                <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius:20px;height: 100%; cursor: pointer;">
                        <div>
                            <img src="images/writting.jpg" alt="Image 1" style="max-width: 90px; max-height: 90px; margin-right: 10px;">
                            writting 
                        </div>
                        <span class="badge bg-primary rounded-pill">Not completed
                        </span>
                    </li>
                </ul>
            </div>
            <br><br>

        </div>
    </center>

    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="batchCodeModal1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enter Batch Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="batchCodeInput" name="batchCodeInput" style="text-transform: uppercase;" class="form-control" placeholder="Enter Batch Code">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="redirectToListen()">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>


    <script>
        function showModal1() {
            $('#batchCodeModal1').modal('show');
            $('#batchCodeInput').focus(); // Set focus on the input field
        }


        function redirectToListen() {
            // Get the entered batch code
            var batchCode = document.getElementById('batchCodeInput').value;
            var username = document.getElementById('username').value;
            // console.log(username);
            // Make an AJAX request to check the database
            $.ajax({
                type: "POST",
                url: "check_database.php", // Replace with the actual server-side script
                data: { batchCode: batchCode,
                        username:username
                        },
                success: function(response) {
                    // The server-side script should return a response indicating success or failure
                    if (response === "success") {
                        // Redirect to listen.php with the batch code as a query parameter
                        window.location.href = 'listen.php?batchCode=' + batchCode;
                    } else {
                        // console.log(username);
                        // Handle the case where the batch code was not found in the database
                        alert("Invalid batch code. Please try again.");
                    }
                }
            });
        }

    </script>

</body>
</html>