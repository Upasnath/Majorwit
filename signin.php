<?php
session_start();
// Debugging statement
echo "Request Method: " . $_SERVER["REQUEST_METHOD"] . "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo '<script>alert("2");</script>';

    $username = $_POST['N'];
    $password = $_POST['P'];

    // Check if the submitted credentials match the admin credentials
    if ($username == "admin" && $password == "Admin@123") {
        // Admin login successful
        $_SESSION['username'] = $username;
        header("Location: admin/index.php");
        exit();
    } else {
        // Check the credentials against the database for students
        // Assuming you have a database connection established
        $conn = new mysqli("localhost", "root", "", "majorwit");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM tbl_register WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists in the database
        if ($result->num_rows > 0) {
            // Student login successful
            $_SESSION['username'] = $username;
            header("Location: student/index.php");
            exit();
        } else {
            // Invalid credentials
            echo '<script>alert("Invalid username or password. Please try again.");</script>';
        }

        $stmt->close();
        $conn->close();
    }
}
?>
<script type="text/javascript">
    function preventBack() 
    {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() 
    {
            null
    };
</script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Mentor Learning </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
            @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .fade-in-section {
            animation: fadeIn 2.5s ease-out;
        }
  </style>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <section class="vh-70 fade-in-section">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-4" style="margin-left:200px;">
                    <img src="images/signin-image.jpg" class="" alt="Sample image">
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 offset-xl-0">
                <center>
                 <b class="fade-in-section" style="font-size: 50px;">SIGN IN</b>
                </center>
                    <form method="POST" id="loginForm">
                        <table style="width:90%;">
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="form-label" for="N"><b>USERNAME</b></label>
                                        <input type="text" id="N" name="N" class="form-control form-control-lg" placeholder="username" onkeyup="validateUsername()" autocomplete="off" required/>
                                        <span id="usernameError" style="color: red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-label" for="P"><b>PASSWORD</b></label>
                                        <input type="password" id="P" name="P" class="form-control form-control-lg" placeholder="password" onkeyup="validatePassword()" autocomplete="off" required/>
                                        <span id="passwordError" style="color: red;"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <center>
                            <button type="submit" id="submit" name="submit" class="btn" style="padding-left: 2.5rem; padding-right: 2.5rem; background: #5fcf80;" onclick="submitForm()"><b>Submit</b></button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function validateUsername() {
            var username = document.getElementById('N').value;
            var usernameError = document.getElementById('usernameError');

            // Check if the username is either a combination of alphabets or a valid email address
            if (!(/^[a-zA-Z]+$/.test(username) || /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/.test(username))) {
                usernameError.textContent = 'Username must be either a combination of alphabets or a valid email address.';
                document.getElementById('N').focus(); // Focus on the username input field
            } else {
                usernameError.textContent = '';
            }
        }


        function validatePassword() {
            var password = document.getElementById('P').value;
            var passwordError = document.getElementById('passwordError');
            
            // Check if the password is a combination of alphabets, numbers, and special characters
            if (!/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/.test(password)) {
                passwordError.textContent = 'Password must be a combination of alphabets, numbers, and special characters.';
                document.getElementById('P').focus(); // Focus on the password input field
            } else {
                passwordError.textContent = '';
            }
        }

        function submitForm() {
            var username = document.getElementById('N').value;
            var password = document.getElementById('P').value;

            // Check if the fields are null or empty
            if (username.trim() === '') {
                document.getElementById('usernameError').textContent = 'Username cannot be empty.';
                document.getElementById('N').focus(); // Focus on the username input field
                return;
            }

            if (password.trim() === '') {
                document.getElementById('passwordError').textContent = 'Password cannot be empty.';
                document.getElementById('P').focus(); // Focus on the password input field
                return;
            }

            // Additional validation logic
            if (!/^[a-zA-Z0-9]+$/.test(username)) {
                document.getElementById('usernameError').textContent = 'Username must be a combination of alphabets and numbers.';
                document.getElementById('N').focus(); // Focus on the username input field
                return;
            }

            if (!/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/.test(password)) {
                document.getElementById('passwordError').textContent = 'Password must be a combination of alphabets, numbers, and special characters.';
                document.getElementById('P').focus(); // Focus on the password input field
                return;
            }

            // If all validations pass, submit the form
            document.getElementById('loginForm').submit();
            console.log("Form submitted!");
        }
    </script>

    
</body>
</html>