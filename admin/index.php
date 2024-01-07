<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php
            include("header.php");
        ?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
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
                <!-- Three charts -->
                <!-- ============================================================== -->
                <?php
    include('conn.php'); // Include the database connection

    // Fetch the total number of students from the database
    $query = "SELECT COUNT(*) AS total_students FROM tbl_students";
    $result = mysqli_query($conn, $query);

    // Initialize the total students variable
    $total_students = 0;

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total_students = $row['total_students'];
    }
    ?>

    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Students</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash">
                            <canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-success"><?php echo $total_students; ?></span></li>
                </ul>
            </div>
        </div>

                    <div class="col-lg-4 col-md-12">
    <div class="white-box analytics-info">
        <h3 class="box-title">Notes</h3>
        <ul class="list-inline two-part d-flex align-items-center mb-0">
            <li>
                <div id="sparklinedash2">
                    <canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                </div>
            </li>
            <li class="ms-auto">
                <!-- Connect to notes.php using a link or a button -->
                <a href="notes.php" class="btn btn-primary">ADD Notes</a>
            </li>
        </ul>
    </div>
</div>
                <!-- ============================================================== -->
                <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Our Progress</h3>
                            <div class="d-md-flex">
                                <ul class="list-inline d-flex ms-auto">
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-info"></i>we want</h5>
                                    </li>
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-inverse"></i>we get</h5>
                                    </li>
                                </ul>
                            </div>
                            <div id="ct-visits" style="height: 405px;">
                                <div class="chartist-tooltip" style="top: -17px; left: -12px;"><span
                                        class="chartist-tooltip-value">6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <?php
// Assuming you have a database connection in conn.php
include('conn.php');

// Fetch student details from the database
$query = "SELECT * FROM tbl_students";
$result = mysqli_query($conn, $query);
?>
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
          
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
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
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>