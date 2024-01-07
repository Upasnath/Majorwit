<?php
include ('conn.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $batchcode = $_POST["batchcode"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $contactNumber = $_POST["contactNumber"];
    $username = $_POST["username"];
    $password =$_POST["password"]; // Hash the password for security
    // Debugging: Output form data
    // echo "Batch Code: $batchcode<br>";
    // echo "Name: $name<br>";
    // echo "Email: $email<br>";
    // echo "Address: $address<br>";
    // echo "Contact Number: $contactNumber<br>";
    // echo "Username: $username<br>";
    // echo "Hashed Password: $password<br>";

    $sql = "INSERT INTO `tbl_students`(`student_batchcode`, `student_name`, `student_email`, `student_address`, `student_number`, `student_username`, `student_password`,`credentails`)
        VALUES('$batchcode', '$name', '$email', '$address', '$contactNumber', '$username', '$password','waiting')";

    if ($conn->query($sql) === TRUE) {
        $lastInsertedId = $conn->insert_id;  // Get the last inserted ID

        $sql1 = "INSERT INTO `tbl_register`(`student_id`, `username`, `password`, `batch_code`) 
                VALUES ('$lastInsertedId', '$username', '$password', '$batchcode')";

        if ($conn->query($sql1) === TRUE) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

// Close the database connection
$conn->close();
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
    <style>
        /* Add your custom styles here */
        .white-box {
            padding: 20px;
            margin: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        table {
            width: 100%;
            table-layout: fixed; /* Fixed table layout to prevent column width from changing */
        }

        .form-group {
            margin-bottom: 20px;
            height: 50px; /* Set a fixed height for each row */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: calc(100% - 16px); /* Adjust width to account for padding */
            padding: 8px;
            box-sizing: border-box;
            display: inline-block;
        }

        .error-message {
            color: red;
            visibility: hidden; /* Initially hide the error messages */
            display: inline-block; /* Make them display as inline-block elements to reserve space */
            height: 20px; /* Set a fixed height for the error messages */
            vertical-align: top; /* Align error messages to the top */
        }
    </style>
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
                        <h4 class="page-title">Kindly Register the students</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <!-- add -->
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Registration Form</h3>
                            <form id="registrationForm" method="POST">
                                <table>
                                    <tr>
                                        <td >
                                            <div class="form-group">
                                                <label for="name">Full Name:    <span class="error-message" id="nameError"></span></label>
                                                <input type="text" class="form-control"   id="name" name="name" autocomplete="none" required>
                                            </div>
                                        </td>
                                        <td colspan="2" class="d-flex">
                                            <div class="form-group col-md-6">
                                                <label for="email">Email: <span class="error-message" id="emailError"></span></label>
                                                <input type="email" class="form-control" id="email" name="email" autocomplete="none" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">batch code<span class="error-message" id="batchcode"></span></label>
                                                <input type="text" style="border:2px solid green;" class="form-control" id="batchcode" name="batchcode" onkeyup="caps(event);" autocomplete="none" required>
                                            </div>
                                        </td>

                                    </tr>                           
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="address">Address:      <span class="error-message" id="addressError"></span></label>
                                                <input type="text" class="form-control" id="address" name="address" autocomplete="none" required>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="contactNumber">Contact Number:    <span class="error-message" id="contactNumberError"></span></label>
                                                <input type="text" class="form-control" id="contactNumber" name="contactNumber" autocomplete="none" required>
                                                
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="username">Username:     <span class="error-message" id="usernameError"></span></label>
                                                <input type="text" class="form-control" id="username" name="username" autocomplete="none" readonly>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="password">Password:     <span class="error-message" id="passwordError"></span></label>
                                                <input type="text" class="form-control" id="password" name="password" autocomplete="none" readonly>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <button type="submit" class="btn btn-success" onclick="">Register</button>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
            <footer class="footer text-center"> 2023 © Major Wit Admin brought to you by <a
                    href="#">majorwit.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
    <script>
            // alert('one');
            // const form = document.getElementById('registrationForm');
            // const nameField = document.getElementById('name');
            // const usernameField = document.getElementById('username');
            // const passwordField = document.getElementById('password');
            // // Add an event listener to the "name" input field
            // nameField.addEventListener('blur', function () {
            //     generateUsernameAndPassword();
            // });
            // function generateUsernameAndPassword() {
            //     const nameValue = nameField.value.trim();
            //     // Remove spaces and generate username using the first 5 characters of the name in capital letters
            //     const username = nameValue.replace(/\s/g, '').slice(0, 5).toUpperCase();
            //     // Generate password with the specified pattern
            //     const firstLetter = nameValue.charAt(0).toUpperCase();
            //     const threeSmallLetters = nameValue.slice(1, 4).toLowerCase();
            //     const threeNumbers = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
            //     const password = `${firstLetter}${threeSmallLetters}@${threeNumbers}`;
            //     // Set the generated values to the corresponding fields
            //     usernameField.value = username;
            //     passwordField.value = password;
            //     // Check if the generated username is unique before allowing form submission
            //     checkUniqueUsername(username);
            // }
            // function checkUniqueUsername(username) {
            //     // Make an AJAX request to check if the username is unique
            //     // alert('hi');
            //     const xhr = new XMLHttpRequest();
            //     xhr.open('POST', 'check_username.php', true);
            //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //     xhr.onreadystatechange = function () {
            //         if (xhr.readyState == 4 && xhr.status == 200) {
            //             const response = JSON.parse(xhr.responseText);
            //             if (response.unique) {
            //                 // Username is unique
            //                 console.log('Username is unique');
            //             } else {
            //                 // Username already exists, handle accordingly (display error message, disable form submission, etc.)
            //                 console.log('Username already exists');
            //             }
            //         }
            //     };
            //     // Send the username to the server for validation
            //     xhr.send('username=' + encodeURIComponent(username));
            // }
    </script>        
    <script>
        // alert('one');

        const form = document.getElementById('registrationForm');
        const emailField = document.getElementById('email');
        const usernameField = document.getElementById('username');
        const passwordField = document.getElementById('password');

        // Add an event listener to the "email" input field
        emailField.addEventListener('blur', function () {
            setUsernameFromEmail();
        });

        function setUsernameFromEmail() {
            // Set the username field with the value from the email field
            usernameField.value = emailField.value.trim();
        }

            //validation ivde thot

            const form1 = document.getElementById('registrationForm');

            const fields = ['name', 'email', 'contactNumber'];
            fields.forEach(field => {
                const inputField = document.getElementById(field);

                inputField.addEventListener('input', function () {
                    validateField(field);
                });
            });

            function submitForm() {
                if (validateForm()) {
                    form1.submit();
                } else {
                    alert('Validation failed. Please check the form fields.');
                }
            }

            form1.addEventListener('submit', function (event) {
                event.preventDefault();
                submitForm();
            });

            function validateForm() {
                let isValid = true;
                fields.forEach(field => {
                    isValid = isValid && validateField(field);
                });
                return isValid;
            }

            function validateField(field) {
            
                const inputField = document.getElementById(field);
                const value = inputField.value;
                const errorElement = document.getElementById(`${field}Error`);

                switch (field) {
                    case 'name':
                        if (!/^[a-zA-Z\s]+$/.test(value.trim())) {
                            errorElement.innerText = 'Name should only contain alphabets';
                            errorElement.style.visibility = 'visible';
                            inputField.style.color = 'red'; // Change text color to red
                            return false;
                        } else {
                            errorElement.innerText = '';
                            errorElement.style.visibility = 'hidden';
                            inputField.style.color = ''; // Reset text color
                            return true;
                        }

                    case 'email':
                        if (!/^\S+@\S+\.\S+$/.test(value.trim())) {
                            errorElement.innerText = 'Invalid email address';
                            errorElement.style.visibility = 'visible';
                            inputField.style.color = 'red';
                            return false;
                        } else {
                            errorElement.innerText = '';
                            errorElement.style.visibility = 'hidden';
                            inputField.style.color = '';
                            return true;
                        }
                    case 'contactNumber':
                        if (!/^\d+$/.test(value.trim())) {
                            errorElement.innerText = 'Contact Number should only contain numbers';
                            errorElement.style.visibility = 'visible';
                            inputField.style.color = 'red'; // Change text color to red
                            return false;
                        } else {
                            errorElement.innerText = '';
                            errorElement.style.visibility = 'hidden';
                            inputField.style.color = ''; // Reset text color
                            return true;
                        }
                    // case 'username':
                    //     if (!/^[a-zA-Z0-9]+$/.test(value.trim())) {
                    //         errorElement.innerText = 'Username should only contain a combination of alphabets and numbers';
                    //         errorElement.style.visibility = 'visible';
                    //         inputField.style.color = 'red'; // Change text color to red
                    //         return false;
                    //     } else {
                    //         errorElement.innerText = '';
                    //         errorElement.style.visibility = 'hidden';
                    //         inputField.style.color = ''; // Reset text color
                    //         return true;
                    //     }
                    // case 'password':
                    //     if (!/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value)) {
                    //         errorElement.innerText = 'Password should contain a combination of alphabets, numbers, and special characters';
                    //         errorElement.style.visibility = 'visible';
                    //         inputField.style.color = 'red'; // Change text color to red
                    //         return false;
                    //     } else {
                    //         errorElement.innerText = '';
                    //         errorElement.style.visibility = 'hidden';
                    //         inputField.style.color = ''; // Reset text color
                    //         return true;
                    //     }
                    default:
                        return true;
                }
            }

        function caps(event) {
            var batchcodeField = event.target;

            // Check if the input contains any lowercase letters
            if (/[a-z]/.test(batchcodeField.value)) {
                // Convert the entire input to uppercase
                batchcodeField.value = batchcodeField.value.toUpperCase();
            }
        }

        // alert('two');

        const form2 = document.getElementById('registrationForm');
        const nameField2 = document.getElementById('name');
        const passwordField2 = document.getElementById('password');

        // Add an event listener to the "name" input field
        nameField2.addEventListener('blur', function () {
            generatePassword();
        });

        function generatePassword() {
            const nameValue = nameField2.value.trim();

            // Generate password with the specified pattern
            const firstLetter = nameValue.charAt(0).toUpperCase();
            const threeSmallLetters = nameValue.slice(1, 4).toLowerCase();
            const threeNumbers = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
            const password = `${firstLetter}${threeSmallLetters}@${threeNumbers}`;

            // Set the generated password value to the corresponding field
            passwordField2.value = password;
        }
    </script>
</body>

</html>