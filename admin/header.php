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
    <title>Major Wit Admin</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <style>
        .sidebar-item ul {
            max-height: 0;
            overflow: hidden;
            list-style: none;
            padding-left: 20px;
            transition: max-height 1.5s ease; /* Adjust the duration as needed */
        }

        .sidebar-item:hover ul {
            max-height: 100vh; /* Adjust the max-height as needed */
        }

        .sidebar-item ul li {
            margin-bottom: 5px;
        }

        .sidebar-item a {
            text-decoration: none;
            color: black;
        }

        .sidebar-item:not(:hover) ul {
            max-height: 0;
        }

        /* Add your additional styling here */
    </style>

    <!-- jQuery and Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        
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
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.html">
                        <b class="logo-icon">
                            <img src="plugins/images/logo icon major wit.png" alt="homepage" />
                        </b>
                        <span class="logo-text">
                            <img src="plugins/images/logo-text.png" alt="homepage" />
                        </span>
                        <!-- <div class="logo-icon">
                            <img src="plugins/images/LOGO WEBSITE.png" alt="homepage" />
                        </div> -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="#" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <!-- Inside the <li> element -->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle">
                                <span class="text-white font-medium">
                                    <b><?php echo $username; ?></b>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                            <ul>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="logout.php" aria-expanded="false">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                        <span class="hide-menu">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="students.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Stduents</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="studentreg.php"
                                aria-expanded="false">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                <span class="hide-menu">Register Students</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="sentcredentails.php"
                                aria-expanded="false">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span class="hide-menu">Sent Credentials</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                <span class="hide-menu">Courses</span>
                            </a>
                            <ul>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="courses.php" aria-expanded="false">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <span class="hide-menu">Add Course details</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                        <span class="hide-menu">View Courses</span>
                                    </a>
                                    <ul>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="view.php?section=1" aria-expanded="false">
                                                <i class="fa fa-map-pin" aria-hidden="true"></i>
                                                <span class="hide-menu">Section 1</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="view.php?section=2" aria-expanded="false">
                                                <i class="fa fa-map-pin" aria-hidden="true"></i>
                                                <span class="hide-menu">Section 2</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="view.php?section=3" aria-expanded="false">
                                                <i class="fa fa-map-pin" aria-hidden="true"></i>
                                                <span class="hide-menu">Section 3</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="view.php?section=4" aria-expanded="false">
                                                <i class="fa fa-map-pin" aria-hidden="true"></i>
                                                <span class="hide-menu">Section 4</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="view.php?section=5" aria-expanded="false">
                                                <i class="fa fa-map-pin" aria-hidden="true"></i>
                                                <span class="hide-menu">Section 5</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </nav>
            </div>
        </aside>

    </div>

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <!-- jQuery and Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Your JavaScript for handling the logout with AJAX -->
    <script>
        $(document).ready(function() {
            // Handle logout button click
            $('#logoutBtn').on('click', function(e) {
                e.preventDefault();

                // Perform AJAX logout
                $.ajax({
                    type: 'POST',
                    url: 'logout.php', // Update with your logout script URL
                    success: function(response) {
                        // Redirect to the login page after successful logout
                        window.location.href = 'login.php';
                    },
                    error: function(error) {
                        console.error('Logout failed:', error);
                        // Handle error, if needed
                    }
                });
            });
        });
    </script>

</body>

</html>