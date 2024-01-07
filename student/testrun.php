<?php
session_start();
// require('conn.php');
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "majorwit";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



function checkSession() {
    if (!isset($_SESSION['username'])) {
        header("Location: ../signin.php");
        exit();
    }
}
checkSession();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'error';
 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_id']) && $_POST['form_id'] == 'test3') {
    // Fetch the value of useranswer and decode it to an array
    $userAnswer = isset($_POST['useranswer3']) ? json_decode($_POST['useranswer3'], true) : [];
    
    // Fetch the values of question_ids_array
    $questionIdsArray = isset($_POST['question_ids_array3']) ? json_decode($_POST['question_ids_array3'], true) : [];

    // Insert data into tbl_section3answers based on the count of questionIdsArray
    for ($i = 0; $i < count($questionIdsArray); $i++) {
        // Assuming $username is defined somewhere in your code
        $username = isset($_POST['username']) ? $_POST['username'] : '';

        // Calculate the array index based on the current loop iteration
        $arrayIndex = $i * 2;

        // Extract values from the answer array
        $value1 = $userAnswer[$arrayIndex];
        $value2 = $userAnswer[$arrayIndex + 1];

        // Extract question ID
        $questionId = $questionIdsArray[$i];

        // Insert data into tbl_section3answers
        // Adjust the column names and SQL query based on your actual table structure
        $insertQuery3 = "INSERT INTO `tbl_section3answers` (`username`, `question_id`, `answer1`, `answer2`) 
                VALUES ('$username', '$questionId', '$value1', '$value2')";

        if ($conn->query($insertQuery3) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $insertQuery3 . "<br>" . $conn->error;
        }
    }

    // Rest of your code...
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Mentor Learning</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <link href="../assets/img/favicon.png" rel="icon">
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <style>
            body, html {
                height: 100%;
                margin: 0;
            }

            .split-container {
                display: flex;
                height: 100%;
            }

            .left-half {
                flex: 6;
                border: 1px solid #ccc;
                
            }

            .right-half {
                flex: 4;
                border: 1px solid #ccc;
                padding: 20px; /* Add padding as needed */
            }

            .button-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr); /* Adjust the number of columns as needed */
                grid-gap: 10px; /* Adjust the gap between buttons as needed */
            }

            .button-grid button {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                background-color: #f5f5f5;
                cursor: pointer;
            }

            .button-grid button:hover {
                background-color: #e0e0e0;
            }

            .content{
                margin-left:14px;
            }
            .audio-container {
                width: 98%;
            }
        </style>
        <script>
            // JavaScript function to validate input
            function validateInput(input) {
                // Remove leading and trailing spaces
                input.value = input.value.trim();
                
                // Allow only a single word or a number without spaces
                if (!/^\w+$|^\d+$/.test(input.value)) {
                    // If the input is invalid, clear it
                    input.value = '';
                    alert('Invalid input. Please enter only a single word or a number without spaces.');
                }
            }
        </script>
    </head>
    <body>
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">
                <h1>TEST MODE</h1>
                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a>WELCOME</a></li>
                        <li><a style="color: green;"><b><?php echo $username; ?></b><input type="hidden" name="username" id="username" value="<?php echo $username; ?>"></a></li>
                        <li><a href="index.php" style="color: RED;">BACK TO HOME</a></li>
                        <li><a><div id="timer" class="btn btn-danger"></div></a></li>
                    </ul>
                </nav>
            </div>
        </header><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="section2" class="section2" style="display: none;">
    <div class="content">
        <h1>Listening2</h1>
        <div class="modal-body">
            <?php
            $question_ids_array = array();
            $sql2 = "SELECT * FROM `tbl_audio` WHERE uploadvia='section2' AND batchcode='EXAM'";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                $ssl2 = "SELECT COUNT(audio_id) as count FROM tbl_audio WHERE uploadvia='section2' AND batchcode='EXAM'";
                $res2 = $conn->query($ssl2);
                $resul2 = mysqli_fetch_assoc($res2);
                $questionSets2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                $sectionName2 = 'section2'; ?>
                <form method="POST" id="test2">
                    <input type="hidden" name="useranswer" id="useranswer">
                    <input type="hidden" name="question_ids_array" id="question_ids_array">
                    <?php
                    $j = 1;
                    foreach ($questionSets2 as $setIndex2 => $row2) {
                        $audioPath = '../admin/' . $row2['audio_input'];
                    ?>
                        <input type="hidden" name="row_id[]" value="<?php echo $row2['audio_id']; ?>">
                        <input type="hidden" name="form_id" id="form_id" value="test2">
                        <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                        <input type="hidden" id="section_name" name="section_name" value="<?php echo $sectionName2; ?>">
                        <input type="hidden" id="questionCount" name="questionCount" value="<?php echo $resul2['count']; ?>">
                        <div class="audio-container" id="questionSet<?php echo $setIndex2; ?>">
                            <div style="text-align: center;">
                                <audio id="audio<?php echo $setIndex2; ?>" controls controlsList="nodownload" style="width: 80%; border-radius: 30px; border: 2px solid black;">
                                    <source src="<?php echo $audioPath; ?>" type="audio/mp3">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                            <?php
                            $ro_id2 = $row2['audio_id'];
                            $sec2 = "SELECT COUNT(question_id) as count2 from tbl_questions where audio_id='$ro_id2'";
                            $sec22 = $conn->query($sec2);
                            $sec222 = mysqli_fetch_assoc($sec22);
                            $q_count2 = $sec222['count2'];

                            $seca2 = "SELECT * FROM tbl_questions where audio_id='$ro_id2'";
                            $seca22 = $conn->query($seca2);
                            $setIndex2 = 0;
                            $sml = "SELECT correct_answer FROM tbl_questions WHERE batch_code = 'EXAM'";
                            $resultsml = $conn->query($sml);
                            if ($resultsml->num_rows > 0) {
                                $CorrectAnswers2 = array();
                                while ($rowsml = $resultsml->fetch_assoc()) {
                                    $CorrectAnswers2[] = $rowsml['correct_answer'];
                                }
                            } else {
                                echo "No records found";
                            }

                            while ($seca222 = mysqli_fetch_assoc($seca22)) {
                            ?>
                                <div class="container mt-4">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <input type="text" id="questionText<?php echo $setIndex2; ?>" name="questionText<?php echo $setIndex2; ?>" class="form-control" readonly value="<?php echo $seca222['question_text']; ?>">
                                            <?php
                                            $q_id2 = $seca222['question_id'];
                                            $question_ids_array[] = $q_id2;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $options_query = "SELECT option_text FROM tbl_options WHERE question_id = '$q_id2'";
                                                    $options_result = $conn->query($options_query);

                                                    $options_rows = $options_result->fetch_all(MYSQLI_ASSOC);

                                                    for ($i = 0; $i < count($options_rows); $i++) {
                                                        $rowq = $options_rows[$i];
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <label>
                                                                    <input type="radio" name="answer<?php echo $j . $setIndex2; ?>[]" id="answer<?php echo $j . $setIndex2; ?>_<?php echo $i; ?>" value="<?php echo $rowq['option_text']; ?>" required>
                                                                    <?php echo $rowq['option_text']; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }

                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php

                                $setIndex2++;
                            }
                            ?>

                        </div><br><br>
                    <?php
                        $j++;
                    } ?>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit Answers</button>
                        </div>
                    </div>
                </form>
            <?php

            } else {
                echo "No audio found for the specified batch code.";
            }
            ?>
        </div>
    </div>
</div>

<div id="section3" class="section3" style="display: none;">
    <div class="content">
        <h1>Listening3</h1>
        <div class="modal-body">
            <?php
            $question_ids_array3 = array();
            $sql3 = "SELECT * FROM `tbl_audio` WHERE uploadvia='section3' AND batchcode='EXAM'";
            $result3 = $conn->query($sql3);
            if ($result3->num_rows > 0) {
                $ssl3 = "SELECT COUNT(audio_id) as count FROM tbl_audio WHERE uploadvia='section3' AND batchcode='Exam'";
                $res3 = $conn->query($ssl3);
                $resul3 = mysqli_fetch_assoc($res3);
                $questionSets3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
                $sectionName3 = 'section3'; ?>
                <form method="POST" id="test3">
                    <input type="text" name="useranswer3" id="useranswer3">
                    <input type="text" name="question_ids_array3" id="question_ids_array3">
                    <?php
                    $j = 1;
                    foreach ($questionSets3 as $setIndex3 => $row3) {

                        $audioPath = '../admin/' . $row3['audio_input'];
                    ?>
                        <input type="hidden" name="row_id[]" value="<?php echo $row3['audio_id']; ?>">
                        <input type="hidden" name="form_id" id="form_id" value="test3">
                        <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                        <input type="hidden" id="section_name" name="section_name" value="<?php echo $sectionName3; ?>">
                        <input type="hidden" id="questionCount" name="questionCount" value="<?php echo $resul3['count']; ?>">
                        <div class="audio-container" id="questionSet<?php echo $setIndex3; ?>">
                            <div style="text-align: center;">
                                <audio id="audio<?php echo $setIndex3; ?>" controls controlsList="nodownload" style="width: 80%; border-radius: 30px; border: 2px solid black;">
                                    <source src="<?php echo $audioPath; ?>" type="audio/mp3">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                            <?php
                            $ro_id3 = $row3['audio_id'];
                            $sec3 = "SELECT COUNT(question_id) as count3 from tbl_questions2 where audio_id='$ro_id3'";
                            $sec33 = $conn->query($sec3);
                            $sec333 = mysqli_fetch_assoc($sec33);
                            $q_count32 = $sec333['count3'];

                            $seca3 = "SELECT * FROM tbl_questions2 where audio_id='$ro_id3'";
                            $seca33 = $conn->query($seca3);
                            $setIndex3 = 0;
                            $sml3 = "SELECT correct_answer1, correct_answer2 FROM tbl_questions2 WHERE batch_code = 'EXAM'";
                            $resultsml3 = $conn->query($sml3);

                            if ($resultsml3->num_rows > 0) {
                                $CorrectAnswers3 = array();
                                while ($rowsml3 = $resultsml3->fetch_assoc()) {
                                    $CorrectAnswers3[] = $rowsml3['correct_answer1'];
                                    $CorrectAnswers3[] = $rowsml3['correct_answer2'];
                                }
                            } else {
                                echo "No records found";
                            }

                            $k = 1;
                            while ($seca333 = mysqli_fetch_assoc($seca33)) {
                            ?>
                                <div class="container mt-4">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <input type="text" id="questionText<?php echo $setIndex3; ?>" name="questionText<?php echo $setIndex3; ?>" class="form-control" readonly value="<?php echo $seca333['question_text']; ?>">
                                            <?php
                                            $q_id3 = $seca333['question_id'];
                                            $question_ids_array3[] = $q_id3;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th colspan="4">Options <span style="color: grey;"> (Please choose any two)</span><span style="color: red;">*</span></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $options_query3 = "SELECT * FROM tbl_options2 WHERE question_id = '$q_id3'";
                                                    $options_result3 = $conn->query($options_query3);

                                                    while ($rowq3 = $options_result3->fetch_assoc()) {
                                                        for ($i = 1; $i <= 4; $i++) { ?>
                                                            <tr>
                                                                <td>
                                                                    <label>
                                                                        <input type="checkbox" name="answer<?php echo $j; ?>_<?php echo $k; ?>_<?php echo $i; ?>" id="<?php echo $j; ?>_<?php echo $k; ?>_<?php echo $i; ?>" value="<?php echo $rowq3['option_text' . $i]; ?>" required>
                                                                        <?php echo $rowq3['option_text' . $i]; ?>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                        $k++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php

                                $setIndex3++;
                            }
                            ?>
                        </div><br><br>
                    <?php
                        $j++;
                    } ?>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" onclick="submitAnswers3()">Submit Answers</button>
                        </div>
                    </div>
                </form>

            <?php
            } else {
                echo "No audio found for the specified batch code.";
            }
            ?>
        </div>
    </div>
</div>


        <div id="section4" class="section4" style="display: none;">
            <div class="content">
                <h1>Listening4</h1>
                <!-- Your content for section 4 here -->
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelector('#section3').style.display = 'block';
            });
        </script>
        <!-- timer -->
            <script>
                // Set the initial time (25 minutes in seconds)
                var timeInSeconds = 25 * 60;

                // Function to update the timer
                function updateTimer() {
                    var minutes = Math.floor(timeInSeconds / 60);
                    var seconds = timeInSeconds % 60;

                    // Display the timer in the specified format
                    document.getElementById('timer').innerHTML = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

                    // Check if the time has reached 0
                    if (timeInSeconds === 0) {
                        alert('Time is up!'); // You can customize this part to suit your needs
                    } else {
                        // Decrement the time by 1 second
                        timeInSeconds--;
                        // Call the function again after 1 second
                        setTimeout(updateTimer, 1000);
                    }
                }

                // Call the function when the page is loaded
                updateTimer();
            </script>
        <!-- timer -->
        <script>
            function submitAnswers3() {
                var selectedValues3 = [];

                $('#test3 input[name^="answer"]:checked').each(function () {
                    selectedValues3.push($(this).val());
                });

                // console.log(selectedValues);

                $('#useranswer3').val(JSON.stringify(selectedValues3));

                var questionIdsArray3 = <?php echo json_encode($question_ids_array3); ?>;
                // console.log(questionIdsArray);
                $('#question_ids_array3').val(JSON.stringify(questionIdsArray3));

                // Use preventDefault to stop the default form submission
                event.preventDefault();
                $('#test3').submit();
            }
        </script>





    </body>
</html>