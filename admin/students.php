<?php
include ('conn.php');
$sql_select = "SELECT * FROM tbl_students";
$result = $conn->query($sql_select);
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
   <style>
        .custom-table {
            border-radius: 10px;
            overflow: hidden; /* Optional: hides the content that exceeds the rounded corners */
        }
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
                        <h4 class="page-title">Students list page</h4>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Blank Page</h3>
                                <table class="table table-success table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"  class="text-center">Sl. No.</th>
                                            <th scope="col">Batch</th>
                                            <th scope="col">Student name</th>
                                            <th scope="col">address</th>
                                            <th scope="col">Phone number</th>
                                            <!-- <th scope="col">email</th> -->
                                            <th scope="col">username</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result->num_rows > 0) {
                                            $counter = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<tr>';
                                                echo '<th scope="row"  class="text-center">' . $counter . '</th>';
                                                echo '<td  class="text-center"><b>' . $row['student_batchcode'] . '</b></td>';
                                                echo '<td>' . $row['student_name'] . '</td>';
                                                echo '<td>' . $row['student_address'] . '</td>';
                                                echo '<td >' . $row['student_number'] . '</td>';
                                                echo '<td>' . $row['student_username'] . '</td>';
                                                
                                                // Hidden input field to store student_id
                                                echo '<input type="hidden" name="student_id" value="' . $row['student_id'] . '">';

                                                // Delete button
                                                echo '<td><button class="btn btn-danger delete-button" data-student-id="' . $row['student_id'] . '">Delete</button></td>';
                                                
                                                echo '</tr>';
                                                $counter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="5">No Records 😒</td>
                                            </tr>
                                        <?php
                                        } ?>

                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
    <!-- Include jQuery library for easier AJAX handling -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    $(document).ready(function () {
        $(".delete-button").on("click", function () {
            // Get the student_id from the data attribute
            var studentId = $(this).data("student-id");

            // Confirm before deletion
            if (confirm("Are you sure you want to delete this student?")) {
                // Make an AJAX request to delete the student
                $.ajax({
                    type: "POST",
                    url: "delete_student.php", // Change this to the actual PHP file for deletion
                    data: { student_id: studentId },
                    success: function (response) {
                        // Handle the response from the server (if needed)
                        console.log(response);

                        // Reload the page or update the UI as needed
                        location.reload(); // For example, reload the page
                    },
                    error: function (error) {
                        console.error("Error deleting student:", error);
                    }
                });
            }
        });
    });
    </script>

</body>

</html>