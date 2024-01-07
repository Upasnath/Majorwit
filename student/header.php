<?php
session_start();

function checkSession() {
    // Check if the user is logged in by verifying the presence of a session variable
    if (!isset($_SESSION['username'])) {
        // Redirect to the login page if the user is not logged in
        header("Location: ../signin.php");
        exit(); // Make sure to stop the script execution after the redirect
    }
}

// Call this function at the beginning of each page where you want to check the session status
checkSession();

// Assign the username to a variable for later use in the page
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Continue with the rest of your page content
?>
<!-- <script type="text/javascript">
    function preventBack() 
    {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() 
    {
            null
    };
</script> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Mentor Learning </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <style>
    /* Style the dropdown container */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Style the dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        opacity: 0; /* Set initial opacity to 0 */
        transition: opacity 0.5s ease; /* Adjust the duration for a slower animation */
    }

    /* Style the dropdown links */
    .dropdown-content a {
        padding: 12px 16px;
        display: block;
        color: black;
        text-decoration: none;
    }

    /* Change color on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Show the dropdown content with a delay when hovering over the container */
    .dropdown:hover .dropdown-content {
        display: block;
        opacity: 1; /* Set opacity to 1 on hover */
    }

  </style>
</head>
<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
    <div>
        <img src="../images/logo white ed.jpg" alt="logo" style="width:100px;height:80px;display:flex;">
      </div>
      <h1 class="logo me-auto"><a href="index.php">Majo Wit</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="mycourse.php">My Courses</a></li>
          <li><a href="test.php">Test</a></li>
          <li><a href="view_notes.php">Notes</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a>WELCOME</a></li>
          <!-- Add a container for the dropdown -->
          <li class="dropdown">
              <a style="color: green;"><b><?php echo $username; ?></b></a>
              <input type="hidden" name="username" id="username" value="<?php echo $username; ?>">
              
              <!-- Add a dropdown content -->
              <div class="dropdown-content">
                  <a href="logout.php">Logout</a>
                  <!-- Add other dropdown items if needed -->
              </div>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>  
</body>
</html>