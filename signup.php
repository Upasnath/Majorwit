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
    <br><br>
    <br><br>
    <center>
    <b style="font-size: 50px;">SIGN UP</b>
    </center>
    <section class="vh-50 fade-in-section">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" >
                        <table>
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <label class="form-label" for="form3Example3"><b>Full Name</b></label>
                                        <input type="text" id="N" name="N" class="form-control form-control-lg" placeholder="Full Name" onkeyup="" autocomplete="off" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-label" for="form3Example3"><b>Gender</b></label>
                                        <!-- <input type="text" id="pre_ph" name="pre_ph" class="form-control form-control-lg" placeholder="Previous Ph" /> -->
                                        <select id="cars" name="cars"class="form-control form-control-lg">
                                            <option value="choose">choose</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <input type="hidden" id="demo" name="demo" />
                                    </td>
                                    <td>
                                    <label class="form-label" for="form3Example4"><b>Age</b></label>
                                        <input type="number" id="N" name="N" class="form-control form-control-lg" min="18" max="50" placeholder="Age" onkeyup="" autocomplete="off" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label class="form-label" for="form3Example3"><b>Email</b></label>
                                        <input type="email" id="N" name="N" class="form-control form-control-lg" placeholder="Email" onkeyup="" autocomplete="off" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <label class="form-label" for="form3Example3"><b>Password</b></label>
                                        <input type="text" id="rainfall" name="rainfall" class="form-control form-control-lg" placeholder="password" onkeyup="" autocomplete="off" required/>
                                    </td>
                                    <td>
                                    <label class="form-label" for="form3Example4"><b>Confirm Password</b></label>
                                        <input type="text" id="K" name="K" class="form-control form-control-lg" placeholder="Confirm Password" onkeyup="" autocomplete="off" required/>
                                    </td>
                                </tr><br>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr>
                                    <td colspan="2">
                                        <!-- <label class="form-control form-control-lg" style="border:none;">
                                            <input type="checkbox" class="form-check-input mt-0"  name="agree" id="agreeCheckbox"> I agree to the terms and conditions
                                        </label> -->
                                        <label class="form-control form-control-lg" style="border:none;">
                                            <input type="checkbox" class="form-check-input mt-0" name="agree" id="agreeCheckbox" >
                                            I agree to the <a href="terms_and_conditions.html" target="_blank">Terms and Conditions</a>
                                        </label>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <br>
                        <center>
                            <button type="submit" id="submit" name="submit" class="btn" style="padding-left: 2.5rem; padding-right: 2.5rem;background: #5fcf80;">Submit</button>
                        </center>
                    </form>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-4" style="margin-left:100px;">
                    <img src="images/signup-image.jpg" class="" alt="Sample image">
                </div>
            </div>
            </div>
            <!-- <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
                <div class="text-white mb-3 mb-md-0">
                </div>
        </div> -->
    
    </section>
    
</body>
</html>