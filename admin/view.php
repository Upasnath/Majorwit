<?php
include('conn.php');
$audioId;
$audioId2;
// Fetch data from the database
$sql = "SELECT * FROM tbl_section1modal";
$result = $conn->query($sql);

// $sql2="SELECT a.audio_id, a.audio_input, a.batchcode AS audio_batchcode, q.question_id, q.batch_code AS question_batchcode, q.question_text, o.option_text, q.correct_answer
//          FROM tbl_audio a 
//          JOIN tbl_questions q ON a.audio_id = q.audio_id 
//          JOIN tbl_options o ON q.question_id = o.question_id 
//          WHERE a.uploadvia='section2'";
// $result2 = $conn->query($sql2);
$sql2="SELECT * from tbl_audio where uploadvia='section2'";
$result2 = $conn->query($sql2);

$sql3="SELECT * from tbl_audio where uploadvia='section3'";
$result3 = $conn->query($sql3);

$sql4="SELECT * from tbl_audio where uploadvia='section4'";
$result4 = $conn->query($sql4);

$sql5="SELECT * FROM `tbl_image`";
$result5= $conn->query($sql5);

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
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .white-box {
            width: 70%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none;
        }

        .navigation-btn {
            margin-top: 10px;
            cursor: pointer;
            padding: 5px 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
        }
        .audio-row {
        display: none;
        }

        .audio-row:first-child {
            display: table-row;
        }
    </style>

</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php
            include("header.php");
        ?>
        <div class="page-wrapper" style="min-height: 250px;">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Course Details</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row" id="section1">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">SECTION 1 "10 QUESTIONS"</h3>
                            <h4 id="table-label">Table 1</h4>

                            <table class="table" id="data-table">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>AUDIO</th>
                                        <th>BATCH</th>
                                        <th>TITLE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // Fetch all rows into a PHP array
                                        $rows = $result->fetch_all(MYSQLI_ASSOC);

                                        // Display the first row
                                        $row = $rows[0];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php
                                                    $audioPath = $row['audio_input'];
                                                ?>
                                                <audio id="audio" controls controlsList="nodownload">
                                                    <source src="<?php echo $audioPath; ?>" type="audio/mp3">
                                                    Your browser does not support the audio element.
                                                </audio>
                                            </td>
                                            <td><?php echo $row['batch_code']; ?></td>
                                            <td><?php echo $row['question_title']; ?></td>
                                        </tr>
                                        <?php
                                    } else {
                                        echo "<tr><td colspan='3'>0 results</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table" id="second-table">
                                <thead class="table table-danger">
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Display questions and answers for the selected row
                                    for ($i = 1; $i <= 10; $i++) {
                                        $questionField = "question" . $i;
                                        $answerField = "answer" . $i;
                                        ?>
                                        <tr>
                                            <td><?php echo $row[$questionField]; ?></td>
                                            <td><?php echo $row[$answerField]; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <button id="next-btn" class="btn btn-success">Next</button>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    var rows = <?php echo json_encode($rows); ?>;
                                    var currentIndex = 0;
                                    var tableLabel = document.getElementById('table-label');

                                    document.getElementById('next-btn').addEventListener('click', function () {
                                        currentIndex = (currentIndex + 1) % rows.length;
                                        updateRow();
                                    });

                                    function updateRow() {
                                        var row = rows[currentIndex];
                                        document.getElementById('data-table').querySelector('tbody').innerHTML = `
                                            <tr>
                                                <td>
                                                    <?php
                                                        $audioPath = $row['audio_input'];
                                                    ?>
                                                    <audio id="audio" controls controlsList="nodownload">
                                                        <source src="<?php echo $audioPath; ?>" type="audio/mp3">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                </td>
                                                <td><?php echo $row['batch_code']; ?></td>
                                                <td><?php echo $row['question_title']; ?></td>
                                            </tr>
                                        `;

                                        var secondTableBody = document.getElementById('second-table').querySelector('tbody');
                                        secondTableBody.innerHTML = ""; // Clear existing content

                                        // Populate the second table with questions and answers
                                        for (var i = 1; i <= 10; i++) {
                                            var questionField = "question" + i;
                                            var answerField = "answer" + i;
                                            secondTableBody.innerHTML += `
                                                <tr>
                                                    <td>${row[questionField]}</td>
                                                    <td>${row[answerField]}</td>
                                                </tr>
                                            `;
                                        }

                                        // Update the table label with incremented table number
                                        if (tableLabel) {
                                            var tableNumber = currentIndex + 1;
                                            tableLabel.innerText = "Table " + tableNumber;
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="row" id="section2">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">SECTION 2 "MULTIPLE CHOICE"</h3>
                            <!-- <h4 id="table-label">Table 1</h4> -->

                            <table class="table" id="data-table">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>AUDIO</th>
                                        <th>BATCH</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result2->num_rows > 0) {
                                        while ($rows = mysqli_fetch_assoc($result2)) {
                                            // Display the audio details (assuming audio details are the same for all questions)
                                            $audioPath = $rows['audio_input'];
                                            ?>
                                            <tr class="audio-row">
                                                <td>
                                                    <audio id="audio" controls controlsList="nodownload">
                                                        <source src="<?php echo $audioPath; ?>" type="audio/mp3">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                </td>
                                                <td class="hidden">
                                                                                                       
                                                    <?php echo $audioId = $rows['audio_id'];?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['batchcode']; ?>
                                                </td>
                                                
                                                <!-- Add additional columns here using $rows['your_additional_field'] -->
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='2'>0 results</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table" id="questions-table">
                                <thead class="table-danger">
                                    <tr>
                                        <th>Sl.no.</th>
                                        <th>Question</th>
                                        <th>Option A</th>
                                        <th>Option B</th>
                                        <th>Option C</th>
                                        <th class="table-success">Correct Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('conn.php');
                                    $audioId;
                                    $s1 = "SELECT * FROM tbl_questions WHERE audio_id='$audioId'";
                                    $r1 = $conn->query($s1);

                                    if ($r1->num_rows > 0) {
                                        $i = 1;

                                        while ($ro = $r1->fetch_assoc()) {
                                            $qid = $ro['question_id'];
                                            ?>
                                            <tr>
                                                <td><b><?php echo $i; ?></b></td>
                                                <td><?php echo $ro['question_text']; ?></td>
                                                <?php
                                                $s2 = "SELECT * FROM `tbl_options` WHERE question_id='$qid'";
                                                $r2 = $conn->query($s2);

                                                if ($r2 && $r2->num_rows > 0) {
                                                    // Fetch all rows into a PHP array
                                                    $options = $r2->fetch_all(MYSQLI_ASSOC);

                                                    // Display options, assuming there are three options
                                                    for ($j = 0; $j < min(3, count($options)); $j++) {
                                                        echo "<td>{$options[$j]['option_text']}</td>";
                                                    }
                                                } else {
                                                    // Handle the case where there are no options
                                                    for ($j = 0; $j < 3; $j++) {
                                                        echo "<td>No option</td>";
                                                    }
                                                }
                                                ?>
                                                <td><?php echo $ro['correct_answer']; ?></td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>0 results</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <button id="nextButton" class="btn btn-success">Next</button>
                            <script>
                                // JavaScript code to handle the Next button click
                                document.getElementById('nextButton').addEventListener('click', function () {
                                    // Get all rows with the class 'audio-row'
                                    var rows = document.getElementsByClassName('audio-row');
                                    
                                    // Hide the currently displayed row
                                    if (rows.length > 0) {
                                        rows[currentIndex].style.display = 'none';
                                    }
                                    
                                    // Display the next row (or loop back to the first row if at the end)
                                    currentIndex = (currentIndex + 1) % rows.length;
                                    rows[currentIndex].style.display = 'table-row';

                                    // Get the audioId of the currently displayed row
                                    var audioId = document.getElementsByClassName('audio-row')[currentIndex].getElementsByTagName('td')[1].innerText;
                                    // alert(audioId);
                                    // Use AJAX to fetch and update the questions table content
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('GET', 'fetch_row.php?audioId=' + audioId, true);
                                    xhr.onreadystatechange = function () {
                                        if (xhr.readyState == 4 && xhr.status == 200) {
                                            // Update the content of the questions table
                                            document.getElementById('questions-table').innerHTML = xhr.responseText;
                                        }
                                    };
                                    xhr.send();
                                });

                                // Initialize the current index
                                var currentIndex = 0;
                            </script>

                        </div>
                        
                    </div>
                </div>
                <div class="row" id="section3">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">SECTION 3 "TWO WORDS"</h3>
                            <h4 id="table-label">Table 1</h4>

                            <table class="table" id="data-table">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>AUDIO</th>
                                        <th>BATCH</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result3->num_rows > 0) {
                                        while ($rows3 = mysqli_fetch_assoc($result3)) {
                                            // Display the audio details (assuming audio details are the same for all questions)
                                            $audioPath = $rows3['audio_input'];
                                            ?>
                                            <tr class="audio-row1">
                                                <td>
                                                    <audio id="audio" controls controlsList="nodownload">
                                                        <source src="<?php echo $audioPath; ?>" type="audio/mp3">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                </td>
                                                <td class="hidden">
                                                                                                       
                                                    <?php echo $audioId2 = $rows3['audio_id'];?>
                                                </td>
                                                <td>
                                                    <?php echo $rows3['batchcode']; ?>
                                                </td>
                                                
                                                <!-- Add additional columns here using $rows['your_additional_field'] -->
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='2'>0 results</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table" id="questions-table2">
                                <thead class="table-danger">
                                    <tr>
                                        <th>Sl.no.</th>
                                        <th>Question</th>
                                        <th>Option A</th>
                                        <th>Option B</th>
                                        <th>Option C</th>
                                        <th>Option D</th>
                                        <th class="table-success">Correct Answer1</th>
                                        <th class="table-success">Correct Answer2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('conn.php');
                                    // $audioId;
                                    $s3 = "SELECT * FROM tbl_questions2 WHERE audio_id='$audioId2'";
                                    $r3 = $conn->query($s3);

                                    if ($r1->num_rows > 0) {
                                        $i = 1;

                                        while ($ro = $r3->fetch_assoc()) {
                                            $qid = $ro['question_id'];
                                            ?>
                                            <tr>
                                                <td><b><?php echo $i; ?></b></td>
                                                <td><?php echo $ro['question_text']; ?></td>
                                                <?php
                                                $s2 = "SELECT * FROM `tbl_options2` WHERE question_id='$qid'";
                                                $r2 = $conn->query($s2);

                                                if ($r2 && $r2->num_rows > 0) {
                                                    // Fetch all rows into a PHP array
                                                    $options = $r2->fetch_all(MYSQLI_ASSOC);

                                                    // Display options, assuming there are four options
                                                    for ($j = 1; $j <= 4; $j++) {
                                                        // Check if the option exists, otherwise display "No option"
                                                        $optionText = isset($options[0]['option_text'.$j]) ? $options[0]['option_text'.$j] : "No option";
                                                        echo "<td>{$optionText}</td>";
                                                    }
                                                } else {
                                                    // Handle the case where there are no options
                                                    for ($j = 0; $j < 4; $j++) {
                                                        echo "<td>No option</td>";
                                                    }
                                                }
                                                ?>
                                                <td><?php echo $ro['correct_answer1']; ?></td>
                                                <td><?php echo $ro['correct_answer2']; ?></td>
                                            </tr>


                                            <?php
                                            $i++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>0 results</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <button id="next-btn3" class="btn btn-success">Next</button>
                            <script>
                                // Function to initialize the audio row display
                                function initializeAudioRows() {
                                    // Initialize the current index
                                    var currentIndex = 0;

                                    // Hide all audio rows except the one at currentIndex
                                    var rows = document.getElementsByClassName('audio-row1');
                                    if (rows.length > 0) {
                                        for (var i = 0; i < rows.length; i++) {
                                            rows[i].style.display = i === currentIndex ? 'table-row' : 'none';
                                        }
                                    }

                                    // JavaScript code to handle the Next button click
                                    document.getElementById('next-btn3').addEventListener('click', function () {
                                        // Hide the currently displayed row
                                        if (rows.length > 0) {
                                            for (var i = 0; i < rows.length; i++) {
                                                rows[i].style.display = i === currentIndex ? 'none' : 'none';
                                            }
                                        }

                                        // Display the next row (or loop back to the first row if at the end)
                                        currentIndex = (currentIndex + 1) % rows.length;
                                        rows[currentIndex].style.display = 'table-row';

                                        // Get the audioId of the currently displayed row
                                        var audioId = document.getElementsByClassName('audio-row1')[currentIndex].getElementsByTagName('td')[1].innerText;

                                        // Use AJAX to fetch and update the questions table content
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET', 'fetch_row1.php?audioId=' + audioId, true);
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState == 4 && xhr.status == 200) {
                                                // Insert the new HTML content after the table header
                                                document.getElementById('questions-table2').getElementsByTagName('tbody')[0].innerHTML = xhr.responseText;
                                            }
                                        };
                                        xhr.send();
                                    });
                                }

                                // Add event listener to run the initialization function after the page is loaded
                                document.addEventListener('DOMContentLoaded', initializeAudioRows);

                            </script>
                        </div>
                    </div>
                </div>
                <div class="row" id="section4">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">SECTION 4 "FILL BLANKS"</h3>
                            <h4 id="table-label">Table 1</h4>

                            <table class="table" id="data-table">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>AUDIO</th>
                                        <th>id</th>
                                        <th>BATCH</th>
                                        <!-- <th>TITLE</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result4->num_rows > 0) {
                                        while ($rows4 = mysqli_fetch_assoc($result4)) {
                                            // Display the audio details (assuming audio details are the same for all questions)
                                            $audioPath = $rows4['audio_input'];
                                            ?>
                                            <tr class="audio-row2">
                                                <td>
                                                    <audio id="audio" controls controlsList="nodownload">
                                                        <source src="<?php echo $audioPath; ?>" type="audio/mp3">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                </td>
                                                <td>
                                                                                                       
                                                    <?php echo $audioId4 = $rows4['audio_id'];?>
                                                </td>
                                                <td>
                                                    <?php echo $rows4['batchcode']; ?>
                                                </td>
                                                
                                                <!-- Add additional columns here using $rows['your_additional_field'] -->
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='2'>0 results</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <table class="table" id="questions-table3">
                                <thead class="table-danger">
                                    <tr>
                                        <th>Sl.no.</th>
                                        <th>Question</th>
                                        <th class="table-success">Correct Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('conn.php');
                                    $s1 = "SELECT * FROM tbl_questions3 WHERE audio_id='$audioId4'";
                                    $r1 = $conn->query($s1);

                                    if ($r1->num_rows > 0) {
                                        $i = 1;

                                        while ($ro = $r1->fetch_assoc()) {
                                            $qid = $ro['question_id'];
                                            ?>
                                            <tr>
                                                <td><b><?php echo $i; ?></b></td>
                                                <td><?php echo $ro['paragraph']; ?></td>
                                                <td class="table-success">
                                                    <?php
                                                    $s2 = "SELECT * FROM `tbl_options3` WHERE question_id='$qid'";
                                                    $r2 = $conn->query($s2);

                                                    if ($r2 && $r2->num_rows > 0) {
                                                        $options = $r2->fetch_all(MYSQLI_ASSOC);

                                                        for ($j = 0; $j < min(3, count($options)); $j++) {
                                                            echo "{$options[$j]['answer_text']}<br>";
                                                        }
                                                    } else {
                                                        for ($j = 0; $j < 3; $j++) {
                                                            echo "No option<br>";
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>0 results</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <button id="next-btn4" class="btn btn-success">Next</button>
                            <script>
                                // Function to initialize the audio row display
                                function initializeAudioRows() {
                                    // Initialize the current index
                                    var currentIndex = 0;

                                    // Hide all audio rows except the one at currentIndex
                                    var rows = document.getElementsByClassName('audio-row2');
                                    if (rows.length > 0) {
                                        for (var i = 0; i < rows.length; i++) {
                                            rows[i].style.display = i === currentIndex ? 'table-row' : 'none';
                                        }
                                    }

                                    // JavaScript code to handle the Next button click
                                    document.getElementById('next-btn4').addEventListener('click', function () {
                                        // Hide the currently displayed row
                                        if (rows.length > 0) {
                                            for (var i = 0; i < rows.length; i++) {
                                                rows[i].style.display = i === currentIndex ? 'none' : 'none';
                                            }
                                        }

                                        // Display the next row (or loop back to the first row if at the end)
                                        currentIndex = (currentIndex + 1) % rows.length;
                                        rows[currentIndex].style.display = 'table-row';

                                        // Get the audioId of the currently displayed row
                                        var audioId = document.getElementsByClassName('audio-row2')[currentIndex].getElementsByTagName('td')[1].innerText;

                                        // Use AJAX to fetch and update the questions table content
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET', 'fetch_row2.php?audioId=' + audioId, true);
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState == 4 && xhr.status == 200) {
                                                // Insert the new HTML content after the table header
                                                document.getElementById('questions-table3').getElementsByTagName('tbody')[0].innerHTML = xhr.responseText;
                                            }
                                        };
                                        xhr.send();
                                    });
                                }

                                // Add event listener to run the initialization function after the page is loaded
                                document.addEventListener('DOMContentLoaded', initializeAudioRows);

                            </script>
                        </div>

                        <!-- <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var rows4 = <?php echo json_encode($rows4); ?>;
                                var currentIndex4 = <?php echo $s; ?>;
                                var tableLabel4 = document.getElementById('table-label');
                                var nextButton4 = document.getElementById('next-btn4');

                                nextButton4.addEventListener('click', function () {
                                    currentIndex4 = (currentIndex4 + 1) % rows4.length;
                                    updateRow4();
                                });

                                function updateRow4() {
                                    // Perform AJAX request to update $s on the server
                                    var xhttp = new XMLHttpRequest();
                                    xhttp.onreadystatechange = function () {
                                        if (this.readyState === 4 && this.status === 200) {
                                            // Update the local variable and display the new row
                                            currentIndex4 = (currentIndex4 + 1) % rows4.length;
                                            updateRowContent(JSON.parse(this.responseText));
                                        }
                                    };
                                    xhttp.open("GET", "fetch_row2.php?s=" + currentIndex4, true);
                                    xhttp.send();
                                }

                                function updateRowContent(row4) {
                                    document.getElementById('data-table').querySelector('tbody').innerHTML = `
                                        <tr>
                                            <td>
                                                <audio id="audio" controls controlsList="nodownload">
                                                    <source src="${row4['audio_input']}" type="audio/mp3">
                                                    Your browser does not support the audio element.
                                                </audio>
                                            </td>
                                            <td>${row4['batchcode']}</td>
                                        </tr>
                                    `;

                                    var secondTableBody4 = document.getElementById('questions-table').querySelector('tbody');
                                    secondTableBody4.innerHTML = "";

                                    for (var i = 1; i <= 10; i++) {
                                        var questionField4 = "question" + i;
                                        var answerField4 = "answer" + i;
                                        secondTableBody4.innerHTML += `
                                            <tr>
                                                <td>${row4[questionField4]}</td>
                                                <td>${row4[answerField4]}</td>
                                            </tr>
                                        `;
                                    }

                                    if (tableLabel4) {
                                        var tableNumber4 = currentIndex4 + 1;
                                        tableLabel4.innerText = "Table " + tableNumber4;
                                    }
                                }
                            });
                        </script> -->



                    </div>
                </div>
                <div class="row" id="section5">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">SECTION 5 "IMAGE QUESTIONS"</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Batch Code</th>
                                        <th>Question Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result5->num_rows > 0) {
                                        while ($row = $result5->fetch_assoc()) {
                                            $imgid=$row['image_id'];
                                            ?>
                                            <tr>
                                            <td><img style="height:200px;width:200px;" src="<?php echo $row['image_input']; ?>" alt="Image"></td>
                                            <td><?php echo $row['batchcode']; ?></td>
                                            <td><?php echo $row['questiontitle']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>0 results</td></tr>";
                                    }

                                    ?>
                                    
                                </tbody>
                            </table>
                            <table>
                                <thead>
                                    <tr>
                                        <th>question</th>
                                        <th>answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // include('conn.php');
                                    $ss = "SELECT * FROM `tbl_questionanswer` WHERE image_id='$imgid'";
                                    $res = $conn->query($ss);

                                    if ($res) {
                                        if ($res->num_rows > 0) {
                                            while ($row = $res->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['question_text'];?></td>
                                                    <td><?php echo $row['answer_text'];?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    } else {
                                        // Handle query execution error
                                        echo "Error executing query: " . $conn->error;
                                    }

                                    ?>
                                </tbody>
                            </table>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Get the section identifier from the URL
        const params = new URLSearchParams(window.location.search);
        const section = params.get('section');

        // Perform actions based on the section identifier
        if (section === '1') {
            // Show the first section and hide the second section
            $('#section1').show();
            $('#section2').hide();
            $('#section3').hide();
            $('#section4').hide();
            $('#section5').hide();
        } else if (section === '2') {
            // Hide the first section and show the second section
            $('#section1').hide();
            $('#section2').show();
            $('#section3').hide();
            $('#section4').hide();
            $('#section5').hide();
        } else if (section === '3') {
            // Hide the first section and show the second section
            $('#section1').hide();
            $('#section2').hide();
            $('#section3').show();
            $('#section4').hide();
            $('#section5').hide();
        } else if (section === '4') {
            // Hide the first section and show the second section
            $('#section1').hide();
            $('#section2').hide();
            $('#section3').hide();
            $('#section4').show();
            $('#section5').hide();
        } else if (section === '5') {
            // Hide the first section and show the second section
            $('#section1').hide();
            $('#section2').hide();
            $('#section3').hide();
            $('#section4').hide();
            $('#section5').show();
        } else{
            $('#section1').hide();
            $('#section2').hide();
            $('#section3').hide();
            $('#section4').hide();
            $('#section5').hide();
            alert("wrong choice 😉");
        }
        // And so on for other sections
    </script>
</body>
</html>