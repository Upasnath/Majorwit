

<?php
    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';
    function sendMail($e,$u,$p)
        {
                    require 'vendor/autoload.php';
                    $mail = new PHPMailer(true);
                    try {
                            $email = $e;
                            $mail->SMTPOptions = array(
                            'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                            )
                            );                      //Enable verbose debug output
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = 'upasnath2023b@mca.ajce.in';                     //SMTP username
                            $mail->Password   = 'Sandhyaupas@1502';                               //SMTP password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                            $mail->setFrom('upasnath2023b@mca.ajce.in','Admin');
                            $mail->addAddress($email);    
                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'Farmers Assistant';
                            $mail->Body    = "Congratlations💐!! Officer to be a part of Farmers Assistant group.We look forward to your services.<br> 
                                                You can login the website using<br>username:$u<br>password:$p";
                            $mail->send();
                            //   header("otp.php");
                            return true;
                        } catch (Exception $e) 
                        {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            return false;
                        }
                }
                if(isset($_POST['allot']))
                {
                
                    $u=$_POST['username'];
                    $p=$_POST['password'];
                    $e=$_POST['email'];
                    sendMail($e,$u,$p);
                    echo "<script> alert('Details are sent to the mail');</script>";
                }
            ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
   <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
            include("header.php");
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="min-height: 250px;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Sent Credentials</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <div class="col-md-4">
                                    <h3 class="box-title">Select batches(remaining students)</h3>
                                    <select id="batchDropdown" class="form-control" style="border:2px solid #808080;border-radius:10px;">
                                        <option value="select">CHOOSE FROM BELOW</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Container to display batch details -->
                <div class="container" id="batchContainer" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <!-- Table to display batch details -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Sl. No.</th>
                                            <th>Student Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>
                                    <tbody id="batchTableBody">
                                        <!-- Batch details will be populated here dynamically -->
                                    </tbody>
                                </table>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="sentDetails">Send Details</button>
                                </div>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
        </div>
    </div>

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- div tagintem athinte dropdwinteyum code -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Make an AJAX request to get batches from the server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_batches.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Parse the JSON response
                    var batches = JSON.parse(xhr.responseText);

                    // Populate the dropdown with the fetched batches
                    var dropdown = document.getElementById("batchDropdown");
                    batches.forEach(function (batch) {
                        var option = document.createElement("option");
                        option.value = batch;
                        option.text = batch;
                        dropdown.add(option);
                    });
                }
            };
            xhr.send();

            // Add event listener for dropdown change
            var batchContainer = document.getElementById("batchContainer");
            var dropdown = document.getElementById("batchDropdown");

            dropdown.addEventListener("change", function () {
                if (dropdown.value !== "select") {
                    // Make an AJAX request to get batch details from the server based on the selected value
                    var xhr = new XMLHttpRequest();
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "get_batch_details.php?batch=" + encodeURIComponent(dropdown.value), true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            try {
                                    // Parse the JSON response
                                    var batchDetails = JSON.parse(xhr.responseText);

                                    // Populate the table with the fetched batch details
                                    var tableBody = document.getElementById("batchTableBody");
                                    tableBody.innerHTML = ""; // Clear previous content

                                    if (batchDetails.length === 0) {
                                        // If no values, display a message row
                                        var messageRow = tableBody.insertRow();
                                        var messageCell = messageRow.insertCell(0);
                                        messageCell.colSpan = 5; // Span across all columns
                                        messageCell.innerHTML = 'No one seeking username and password😉';
                                    } else {
                                        batchDetails.forEach(function (detail, index) {
                                            var row = tableBody.insertRow();
                                            var checkboxCell = row.insertCell(0); // Cell for checkbox
                                            var cell1 = row.insertCell(1); // Cell for "Sl. No."
                                            var cell2 = row.insertCell(2);
                                            var cell3 = row.insertCell(3);
                                            var cell4 = row.insertCell(4);

                                            // Add a checkbox to the first cell and set its value to student_id
                                            var checkbox = document.createElement("input");
                                            checkbox.type = "checkbox";
                                            checkbox.value = detail.student_id; // Set the checkbox value
                                            checkboxCell.appendChild(checkbox);

                                            // Populate other cells with data
                                            cell1.innerHTML = index + 1;
                                            cell2.innerHTML = detail.student_name;  // Update column name
                                            cell3.innerHTML = detail.student_username;  // Update column name
                                            cell4.innerHTML = detail.student_password;  // Update column name
                                        });
                                    }

                                    // Show the container
                                    batchContainer.style.display = "block";
                                } catch (error) {
                                    // Log the entire response to the console
                                    console.log('Full response:', xhr.responseText);

                                    // Handle parsing error
                                    console.error('Error parsing JSON:', error.message);
                                }

                        }
                    };
                    xhr.send();
                } else {
                    // Hide the container when "select" is chosen
                    batchContainer.style.display = "none";
                }
            });
        });
    </script>
    <!-- <script>
        // Add an event listener to the "Save changes" button
        var saveChangesButton = document.querySelector("#batchContainer .modal-footer .btn-primary");
        saveChangesButton.addEventListener("click", function () {
            // Function to handle the "Send Details" button click
            function sendDetails() {
                // Get all checkboxes in the table
                var checkboxes = document.querySelectorAll("#batchTableBody input[type=checkbox]:checked");

                // Check if any checkboxes are selected
                if (checkboxes.length > 0) {
                    // Iterate through the selected checkboxes
                    checkboxes.forEach(function (checkbox) {
                        // Get the corresponding row for the selected checkbox
                        var row = checkbox.closest("tr");

                        // Get the username and password from the row
                        var username = row.cells[3].textContent;
                        var password = row.cells[4].textContent;

                        // Alert the username and password
                        alert("Username: " + username + "\nPassword: " + password);
                    });
                } else {
                    // Alert if no checkboxes are selected
                    alert("Please select at least one student to send details.");
                }
            }

            // Call the sendDetails function when the "Save changes" button is clicked
            sendDetails();
        });
    </script> -->
    <script>
    var saveChangesButton = document.querySelector("#batchContainer .modal-footer .btn-primary");
    saveChangesButton.addEventListener("click", function () {
        function sendDetails() {
            var checkboxes = document.querySelectorAll("#batchTableBody input[type=checkbox]:checked");

            if (checkboxes.length > 0) {
                checkboxes.forEach(function (checkbox) {
                    var row = checkbox.closest("tr");
                    var username = row.cells[3].textContent;
                    var password = row.cells[4].textContent;

                    // Make an AJAX request to sendMail.php
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Display the response from the server (if needed)
                            console.log(xhr.responseText);
                        }
                    };

                    xhr.open("POST", "sendMail.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    var params = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);
                    xhr.send(params);
                });
                alert("Details are being sent to the mail");
                
                // setTimeout(function () {
                //     // Reload the page
                //     location.reload();
                // }, 3000);
            } else {
                alert("Please select at least one student to send details.");
            }
        }
        sendDetails();
    });
</script>

</body>

</html>