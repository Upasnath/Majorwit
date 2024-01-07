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
<br><br>
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
 
// if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['form_id'] == 'test1') {
//     // Retrieve the form data
//     $rowIds = $_POST['row_id'];
//     $username = $_POST['username'];
//     $sectionName = $_POST['section_name'];
//     $questionCount = $_POST['questionCount'];
//     $userAnswers = $_POST['answer'];
//     // print_r($userAnswers); // or var_dump($userAnswers);
    
//     // Iterate through each set
//     for ($set = 0; $set < $questionCount; $set++) {
//         // Construct the SQL query for each set
//         $insertQuery = "INSERT INTO tbl_section1answers (row_id, username, section_name";

//         // Iterate through the answers for each set
//         for ($i = 0; $i < 10; $i++) {
//             // Calculate the index in the $userAnswers array for the current answer
//             $answerIndex = ($set * 10) + $i;
//             $insertQuery .= ", answer" . ($i + 1);
//         }

//         // Complete the query
//         $insertQuery .= ") VALUES ('" . $rowIds[$set] . "', '$username', '$sectionName'";

//         // Iterate through the answers for each set
//         for ($i = 0; $i < 10; $i++) {
//             // Calculate the index in the $userAnswers array for the current answer
//             $answerIndex = ($set * 10) + $i;
//             $insertQuery .= ", '" . $userAnswers[$answerIndex] . "'";
//         }

//         // Complete the query
//         $insertQuery .= ")";
//         // $insertQuery;
//         // Execute the query
//         if ($conn->query($insertQuery) !== TRUE) {
//             echo "Error: " . $insertQuery . "<br>" . $conn->error;
//             break;  // Break the loop if there's an error in one of the queries
//         }
//     }

//     // Close the database connection
//     // $conn->close();

//     // echo "Data inserted successfully";
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_id']) && $_POST['form_id'] == 'test2') {
//     // Fetch the value of useranswer and decode it to an array
//     $userAnswer = isset($_POST['useranswer']) ? json_decode($_POST['useranswer'], true) : [];
    
//     // Fetch the values of question_ids_array
//     $questionIdsArray = isset($_POST['question_ids_array']) ? json_decode($_POST['question_ids_array'], true) : [];

//     // Insert data into tbl_section2answers based on the count of questionIdsArray
//     for ($i = 0; $i < count($questionIdsArray); $i++) {
//         // Assuming $username is defined somewhere in your code
//         $username = isset($_POST['username']) ? $_POST['username'] : '';

//         // Assuming $userAnswer is an array with the same length as $questionIdsArray
//         $answer = isset($userAnswer[$i]) ? $userAnswer[$i] : '';

//         // Assuming $questionIdsArray contains question_ids
//         $questionId = isset($questionIdsArray[$i]) ? $questionIdsArray[$i] : '';

//         // Insert data into tbl_section2answers
//         $insertQuery2 = "INSERT INTO `tbl_section2answers` (`username`, `question_id`, `answer`) VALUES ('$username', '$questionId', '$answer')";

//         // Execute the query
//         if ($conn->query($insertQuery2) === TRUE) {
//             // echo "Record inserted successfully";
//         } else {
//             echo "Error: " . $insertQuery2 . "<br>" . $conn->error;
//         }
//     }

//     // Rest of your code...
// }
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
            // echo "Record inserted successfully";
        } else {
            echo "Error: " . $insertQuery3 . "<br>" . $conn->error;
        }
    }

    // Rest of your code...
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_id']) && $_POST['form_id'] == 'test4') {
    // Fetch the value of useranswer and decode it to an array
    $userAnswer = isset($_POST['useranswer4']) ? json_decode($_POST['useranswer4'], true) : [];
    
    // Fetch the username outside the loop
    $username = isset($_POST['username']) ? $_POST['username'] : '';

    // Iterate through each user's answer and insert records
    foreach ($userAnswer as $ans) {
        $questionId = $ans['questionId'];
        $answer = $ans['answer'];

        // Code for insert query
        $insertQuery4 = "INSERT INTO `tbl_section4answers`(`username`, `question_id`, `answer`) 
                         VALUES ('$username', '$questionId', '$answer')";

        if ($conn->query($insertQuery4) === TRUE) {
            // echo "Record inserted successfully";
        } else {
            echo "Error: " . $insertQuery4 . "<br>" . $conn->error;
        }
    }

    // Rest of your code...
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_id']) && $_POST['form_id'] == 'test5') {
    // Fetch the value of useranswer and decode it to an array
    $userAnswer = isset($_POST['useranswer5']) ? json_decode($_POST['useranswer5'], true) : [];
    
    // Fetch the username outside the loop
    $username = isset($_POST['username']) ? $_POST['username'] : '';

    // Iterate through each user's answer and insert records
    foreach ($userAnswer as $ans) {
        $questionId = $ans['questionId'];
        $answer = $ans['answer'];

        // Code for insert query
        $insertQuery5 = "INSERT INTO `tbl_section5answers`(`username`, `question_id`, `answer`) 
                         VALUES ('$username', '$questionId', '$answer')";

        if ($conn->query($insertQuery5) === TRUE) {
            // echo "Record inserted successfully";
        } else {
            echo "Error: " . $insertQuery5 . "<br>" . $conn->error;
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

        <div id="section1" class="section1" style="display: none;">
            <div class="content">
                <h1>Listening1</h1>
                <?php
                    $correctAnswersArray=array();
                    $sql1 = "SELECT * FROM tbl_section1modal WHERE batch_code='EXAM'";
                    $resultt1 = mysqli_query($conn, $sql1);
                    if ($resultt1->num_rows > 0) {
                        $ssl = "SELECT COUNT(id) as count FROM tbl_section1modal WHERE batch_code='EXAM'";
                        $res = $conn->query($ssl);
                        $resul = mysqli_fetch_assoc($res);
                        $questionSets = mysqli_fetch_all($resultt1, MYSQLI_ASSOC);
                        $sectionName = 'section1'; ?>
                        <form method="POST"  id="test1">
                            <?php foreach ($questionSets as $index => $row) {
                                $audioPath = '../admin/' . $row['audio_input']; ?>
                                <input type="hidden" name="row_id[]" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="form_id" id="form_id" value="test1">
                                <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                                <input type="hidden" id="section_name" name="section_name" value="<?php echo $sectionName; ?>">
                                <input type="hidden" id="questionCount" name="questionCount" value="<?php echo $resul['count']; ?>">
                                <div class="audio-container" id="questionSet<?php echo $index; ?>">
                                    <!-- Your audio and question display code here -->
                                    <div style="text-align: center;">
                                        <audio id="audio" controls controlsList="nodownload" style="width: 80%; border-radius: 30px; border: 2px solid black;">
                                            <source src="<?php echo $audioPath; ?>" type="audio/mp3">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>

                                    <div class="container mt-4">
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <h2><?php echo $row['question_title']; ?></h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Question</th>
                                                            <th>Your Answer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php for ($i = 1; $i <= 10; $i++) { 
                                                            $correctAnswersArray[]=$row["answer$i"];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $row["question$i"]; ?></td>
                                                                <td>

                                                                    <!-- <input type="text" name="correct_answer[]" id="correct_answer<?php echo $setIndex . '_' . $i; ?>" value="<?php echo addslashes($row["answer$i"]); ?>"> -->
                                                                    <input type="text" class="form-control" name="answer[]" id="answer<?php echo $setIndex . '_' . $i; ?>" placeholder="Enter your answer" required>
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                        // print_r($correctAnswersArray);
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><br><br>
                            <?php } ?>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="submitAnswers1(event)">Submit Answers</button>
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

        <div id="section2" class="section2" style="display: none;">
            <div class="content">
                <h1>Listening2</h1>
                <div class="modal-body">
                    <?php
                        $question_ids_array = array();
                        $sql2="SELECT * FROM `tbl_audio` WHERE uploadvia='section2' AND batchcode='EXAM'";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            $ssl2 = "SELECT COUNT(audio_id) as count FROM tbl_audio WHERE uploadvia='section2' AND batchcode='EXAM'";
                            $res2 = $conn->query($ssl2);
                            $resul2 = mysqli_fetch_assoc($res2);
                            $questionSets2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                            $sectionName2 = 'section2'; ?>
                            <form method="POST"  id="test2">
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
                                    <input type="hidden" id="section_name" name="section_name" value="<?php echo $sectionName; ?>">
                                    <input type="hidden" id="questionCount" name="questionCount" value="<?php echo $resul2['count']; ?>">
                                    <div class="audio-container" id="questionSet<?php echo $setIndex2; ?>">
                                        <!-- Your audio and question display code here -->
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
                                                                                    <input type="radio" name="answer<?php echo $j.$setIndex2; ?>[]" id="answer<?php echo $j.$setIndex2; ?>_<?php echo $i; ?>" value="<?php echo $rowq['option_text']; ?>" required>
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
                                        <button type="submit" class="btn btn-primary" onclick="submitAnswers2(event)">Submit Answers</button>                                    </div>
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
                        $sql3="SELECT * FROM `tbl_audio` WHERE uploadvia='section3' AND batchcode='EXAM'";
                        $result3 = $conn->query($sql3);
                        if ($result3->num_rows > 0) {
                            $ssl3 = "SELECT COUNT(audio_id) as count FROM tbl_audio WHERE uploadvia='section3' AND batchcode='Exam'";
                            $res3 = $conn->query($ssl3);
                            $resul3 = mysqli_fetch_assoc($res3);
                            $questionSets3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
                            $sectionName3 = 'section3'; ?>
                            <form method="POST"  id="test3">
                                <input type="hidden" name="useranswer3" id="useranswer3">
                                <input type="hidden" name="question_ids_array3" id="question_ids_array3">
                                <?php
                                $j = 1;
                                foreach ($questionSets3 as $setIndex3 => $row3) {
                                    
                                    $audioPath = '../admin/' . $row3['audio_input'];
                                     ?>
                                    <input type="hidden" name="row_id[]" value="<?php echo $row3['audio_id']; ?>">
                                    <input type="hidden" name="form_id" id="form_id" value="test3">
                                    <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                                    <input type="hidden" id="section_name" name="section_name" value="<?php echo $sectionName; ?>">
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



                                            $k=1;
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
                                                                                        <!-- <input type="text" value="answer<?php echo $j;?>_<?php echo $k; ?>_<?php echo $i; ?>"> -->
                                                                                        <input type="checkbox" name="answer<?php echo $j;?>_<?php echo $k; ?>_<?php echo $i; ?>" id="<?php echo $j;?>_<?php echo $k; ?>_<?php echo $i; ?>" value="<?php echo $rowq3['option_text' . $i]; ?>" required>
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
                                        <button type="button" class="btn btn-primary" onclick="submitAnswers3(event)">Submit Answers</button>
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
                <div class="modal-body">
                    <?php
                        $question_ids_array4 = array();
                        $CorrectAnswers4 = array();
                        $sql4="SELECT * FROM `tbl_audio` WHERE uploadvia='section4' AND batchcode='EXAM'";
                        $result4 = $conn->query($sql4);
                        if ($result4->num_rows > 0) {
                            $ssl4 = "SELECT COUNT(audio_id) as count FROM tbl_audio WHERE uploadvia='section4' AND batchcode='EXAM'";
                            $res4 = $conn->query($ssl4);
                            $resul4 = mysqli_fetch_assoc($res4);
                            $questionSets4 = mysqli_fetch_all($result4, MYSQLI_ASSOC);
                            $sectionName3 = 'section4'; ?>
                            <form method="POST"  id="test4">
                                <input type="hidden" name="useranswer4" id="useranswer4">
                                <input type="hidden" name="question_ids_array4" id="question_ids_array4">
                                <?php
                                $j = 1;
                                foreach ($questionSets4 as $setIndex4 => $row4) {
                                    
                                    $audioPath = '../admin/' . $row4['audio_input'];
                                     ?>
                                    <input type="hidden" name="row_id[]" value="<?php echo $row4['audio_id']; ?>">
                                    <input type="hidden" name="form_id" id="form_id" value="test4">
                                    <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                                    <input type="hidden" id="section_name" name="section_name" value="<?php echo $sectionName; ?>">
                                    <input type="hidden" id="questionCount" name="questionCount" value="<?php echo $resul4['count']; ?>">
                                    <div class="audio-container" id="questionSet<?php echo $setIndex4; ?>">
                                        <div style="text-align: center;">
                                            <audio id="audio<?php echo $setIndex4; ?>" controls controlsList="nodownload" style="width: 80%; border-radius: 30px; border: 2px solid black;">
                                                <source src="<?php echo $audioPath; ?>" type="audio/mp3">
                                                Your browser does not support the audio element.
                                            </audio>
                                        </div>
                                        <?php
                                            $ro_id4 = $row4['audio_id'];
                                            $sec4 = "SELECT question_id  from tbl_questions3 where audio_id='$ro_id4'";
                                            $sec44 = $conn->query($sec4);
                                            $sec444 = mysqli_fetch_assoc($sec44);
                                            $q_count44 = $sec444['question_id'];
                                            

                                            $seca4 = "SELECT * FROM tbl_questions3 where audio_id='$ro_id4'";
                                            $seca44 = $conn->query($seca4);
                                            $setIndex4 = 0;
                                            $sml4 = "SELECT answer_text FROM `tbl_options3` WHERE question_id='$q_count44';                                         ";
                                            $resultsml4 = $conn->query($sml4);

                                            if ($resultsml4->num_rows > 0) {
                                                while ($rowsml4 = $resultsml4->fetch_assoc()) {
                                                    $CorrectAnswers4[] = $rowsml4['answer_text'];
                                                }
                                                
                                            } else {
                                                echo "No records found";
                                                
                                            }



                                            // $k=1;
                                            while ($seca444 = mysqli_fetch_assoc($seca44)) {
                                                ?>
                                                <div class="container mt-4">
                                                    <div class="row mb-4">
                                                        <div class="col-md-12">
                                                            <textarea id="questionText<?php echo $setIndex4; ?>" name="questionText<?php echo $setIndex4; ?>" class="form-control" readonly><?php echo $seca444['paragraph']; ?></textarea>
                                                            <?php                                                      
                                                                $q_id4 = $seca444['question_id'];
                                                                $question_ids_array4[] = $q_id4;
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
                                                                    $options_query4 = "SELECT COUNT(*) as cnt FROM tbl_options3 WHERE question_id = '$q_id4'";
                                                                    $options_result4 = $conn->query($options_query4);
                                                                    $rowq4 = $options_result4->fetch_assoc();
                                                                        for ($i = 1; $i <= $rowq4['cnt']; $i++) { ?>    
                                                                            <tr>                                                                           
                                                                                <td>
                                                                                    <label>
                                                                                        <input type="text" name="answer<?php echo $j;?>_<?php echo $i; ?>" id="answer<?php echo $j;?>_<?php echo $i; ?>">
                                                                                        <input type="hidden" name="Q_id<?php echo $j;?>_<?php echo $i; ?>" id="Q_id<?php echo $j;?>_<?php echo $i; ?>" value="<?php echo $q_id4; ?>">
                                                                                    </label>
                                                                                </td>
                                                                            </tr>
                                                                            <?php 
                                                                        }
                                                                        // $k++;
                                                                     ?>
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
                                }
                                     ?>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" onclick="submitAnswers4(event)">Submit Answers</button>
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

        <div id="section5" class="section5" style="display: none;">
            <div class="content">
                <h1>Listening 5</h1>
                <div class="modal-body">
                    <?php
                    $question_ids_array5 = array();
                    $CorrectAnswers5 = array();
                    $sql5 = "SELECT * FROM `tbl_image` WHERE batchcode='EXAM'";
                    $result5 = $conn->query($sql5);

                    if ($result5->num_rows > 0) {
                        $questionSets5 = mysqli_fetch_all($result5, MYSQLI_ASSOC);
                    ?>
                        <form method="POST" id="test5">
                            <input type="hidden" name="useranswer5" id="useranswer5">
                            <?php
                            $j = 1;
                            foreach ($questionSets5 as $setIndex5 => $row5) {
                                $img_id = $row5['image_id'];
                                $ssl5 = "SELECT COUNT(qa_id) as id_count FROM tbl_questionanswer WHERE  image_id='$img_id'";
                                $res5 = $conn->query($ssl5);
                                $resul5 = mysqli_fetch_assoc($res5);
                                $countt = $resul5['id_count'];
                                $imagePath = '../admin/' . $row5['image_input'];
                            ?>
                                <input type="hidden" name="row_id[]" value="<?php echo $row5['image_id']; ?>">
                                <input type="hidden" name="form_id" id="form_id" value="test5">
                                <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                                <input type="hidden" id="section_name" name="section_name" value="<?php echo $sectionName; ?>">

                                <div class="audio-container" id="questionSet<?php echo $setIndex5; ?>">
                                    <label><?php echo $row5['questiontitle']; ?></label><br><br>
                                    <div style="text-align: center;">
                                        <img id="image<?php echo $setIndex5; ?>" src="<?php echo $imagePath; ?>" alt="Image" style="width: 60%; border-radius: 30px; border: 2px solid black;">
                                    </div>

                                    <div class="container mt-4">
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2">questions</th>
                                                            <th>answer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sec5 = "SELECT *  FROM tbl_questionanswer WHERE image_id='$img_id'";
                                                        $sec55 = $conn->query($sec5);
                                                        $ii=1;
                                                        while ($sec555 = mysqli_fetch_assoc($sec55)) {
                                                            $CorrectAnswers5[]=$sec555['answer_text']; 
                                                            $q_id5=$sec555['qa_id']; 
                                                            $question_ids_array5[] = $q_id5;                                                 ?>
                                                                <tr>
                                                                    <td>
                                                                        <label for="question"><?php echo $sec555['question_text']; ?></label>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <label>
                                                                            <input type="text" class="form-control" name="answer<?php echo $j; ?>_<?php echo $ii; ?>" id="answer<?php echo $j; ?>_<?php echo $ii; ?>">
                                                                            <input type="hidden" name="q_id<?php echo $j;?>_<?php echo $i; ?>" id="q_id<?php echo $j;?>_<?php echo $i; ?>" value="<?php echo $q_id5; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                         <?php
                                                         $ii++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><br><br>
                            <?php
                                $j++;
                            }
                            ?>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="submitAnswers5(event)">Submit Answers</button>
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
        <div id="section6" class="section6" style="display: none;">
            <div class="content">
                <form action="POST" id="test6">
                    <input type="hidden" name="form_id" id="form_id" value="test6">
                    <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                    <h1>RESULTS</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-2" style="height: 100px;"> <!-- Adjust the height as needed -->
                            <ul class="list-group mb-4" style="width:80%; height: 100%;">
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius:20px;height: 100%; cursor: pointer;">
                                    <div>
                                        Section 1 
                                    </div>
                                    <span id="completionBadge1" class="badge bg-success rounded-pill">
                                        <span id="completionPercentage1">0%</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <br><br>
                        <div class="col-md-2" style="height: 100px;"> <!-- Adjust the height as needed -->
                            <ul class="list-group mb-4" style="width:80%; height: 100%;">
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius:20px;height: 100%; cursor: pointer;">
                                    <div>
                                        section 2 
                                    </div>
                                    <span id="completionBadge2" class="badge bg-success rounded-pill">
                                        <span id="completionPercentage2">0%</span>
                                        
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <br><br>
                        <div class="col-md-2" style="height: 100px;"> <!-- Adjust the height as needed -->
                            <ul class="list-group mb-4" style="width:80%; height: 100%;">
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius:20px;height: 100%; cursor: pointer;">
                                    <div>
                                        section 3 
                                    </div>
                                    <span id="completionBadge3" class="badge bg-success rounded-pill">
                                        <span id="completionPercentage3">0%</span>
                                        
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <br><br>
                        <div class="col-md-2" style="height: 100px;"> <!-- Adjust the height as needed -->
                            <ul class="list-group mb-4" style="width:80%; height: 100%;">
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius:20px;height: 100%; cursor: pointer;">
                                    <div>
                                        section 4 
                                    </div>
                                    <span id="completionBadge4" class="badge bg-success rounded-pill">
                                        <span id="completionPercentage4">0%</span>
                                        
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <br><br>
                        <div class="col-md-2" style="height: 100px;"> <!-- Adjust the height as needed -->
                            <ul class="list-group mb-4" style="width:80%; height: 100%;">
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius:20px;height: 100%; cursor: pointer;">
                                    <div>
                                        section 5
                                    </div>
                                    <span id="completionBadge5" class="badge bg-success rounded-pill">
                                        <span id="completionPercentage5">0%</span>
                                        
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div><br><br><br>
                    <center>
                        <button type="button" class="btn btn-danger" onclick="submitAnswers6()">Home</button>
                    </center>
                </form>
            </div>
        </div>
        <!-- Repeat the pattern for other sections -->
<!-- Add this script in the head or body section of your HTML -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Your existing script -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#section1').style.display = 'block';

    });
    function submitAnswers1(event) {
        event.preventDefault();
        
        // Calculate percentage
        calculatePercentage();

        // Serialize the form data
        var formData = $('#test1').serialize();

        // AJAX request to save_datas.php
        $.ajax({
            type: 'POST',
            url: 'save_datas.php',
            data: formData,
            success: function (response) {
                // Handle the response from the server, if needed
                console.log(response);

                // Show the next section
                showNextSection('#section1', '#section2');
            },
            error: function (error) {
                // Handle the error, if any
                console.log(error);
            }
        });
    }

    function calculatePercentage() {
        var questionCount = parseInt(document.getElementById('questionCount').value);
        var totalQuestions = questionCount * 10;
        var correctAnswers = <?php echo json_encode($correctAnswersArray); ?>;
        var userAnswers = document.getElementsByName('answer[]');
        // for (var i = 0; i < userAnswers.length; i++) {
        //     console.log('Answer ' + (i + 1) + ': ' + userAnswers[i].value);
        // }
        // for (var i = 0; i < correctAnswers.length; i++) {
        //     console.log('Correct Answer ' + (i + 1) + ': ' + correctAnswers[i]);
        // }
        var correctCount = 0;

        for (var i = 0; i < totalQuestions; i++) {
            var userAnswer = userAnswers[i].value.trim();
            var correctAnswer = correctAnswers[i].trim(); // Use modulo to cycle through correct answers

            // You may want to implement a more sophisticated comparison here
            if (userAnswer.toLowerCase() == correctAnswer.toLowerCase()) {
                // alert('User\'s Answer: ' + userAnswer + '\nCorrect Answer: ' + correctAnswer);
                correctCount++;
            }
            else{
                // alert('User\'s Answer: ' + userAnswer + '\nCorrect Answer: ' + correctAnswer);
            }
            
        }

        // alert(correctCount);
        var percentage = (correctCount / totalQuestions) * 100;
        $('#completionPercentage1').text(percentage.toFixed(2) + '%'); // Set the percentage value
        $('#completionBadge1').show(); // Show the completion badge
        // alert("Your percentage: " + percentage.toFixed(2) + "%");
        // You can also send the percentage to the server for further processing or storage
        // Example: You can use AJAX to send the percentage to a PHP script for database storage.
    }



    function submitAnswers2(event) {
        event.preventDefault();

        calculatePercentage2();


            var selectedValues = [];

            $('input[name^="answer"]:checked').each(function () {
                selectedValues.push($(this).val());
            });

            // console.log(selectedValues);

            $('#useranswer').val(JSON.stringify(selectedValues));

            var questionIdsArray = <?php echo json_encode($question_ids_array); ?>;
            // console.log(questionIdsArray);
            $('#question_ids_array').val(JSON.stringify(questionIdsArray));

            // Serialize the form data
            var formData = $('#test2').serialize();

            // AJAX request to save_datas.php
            $.ajax({
                type: 'POST',
                url: 'save_datas.php',
                data: formData,
                success: function (response) {
                    // Handle the response from the server, if needed
                    console.log(response);

                    // Show the next section
                    showNextSection('#section2', '#section3');
                },
                error: function (error) {
                    // Handle the error, if any
                    console.log(error);
                }
            });
    }

    function calculatePercentage2() {
            var correctAnswers2 = <?php echo json_encode($CorrectAnswers2); ?>;
            // console.log('correctAnswers:', correctAnswers2);

            var selectedValues = []; // Array to store user-selected values

            $('input[name^="answer"]').each(function () {
                if ($(this).is(':checked')) {
                    var selectedValue = $(this).val();
                    selectedValues.push(selectedValue);
                }
            });

            // console.log('User-selected values:', selectedValues);

            var correctCount = 0;

            for (var i = 0; i < selectedValues.length; i++) {
                var selectedValue = selectedValues[i];
                if (correctAnswers2.includes(selectedValue)) {
                    correctCount++;
                    // console.log('correctCount:', correctCount);
                }
            }

            var totalQuestions = correctAnswers2.length;
            var percentage = (correctCount / totalQuestions) * 100;

            $('#completionPercentage2').text(percentage.toFixed(2) + '%');
            $('#section2Completed').val(1);
            // $('#questionModal2').modal('hide');
    }




    function submitAnswers3(event){
        event.preventDefault();

        calculatePercentage3();
        // alert("hi");
        var selectedValues3 = [];

        $('input[name^="answer"]:checked').each(function () {
            selectedValues3.push($(this).val());
        });

        // console.log(selectedValues);

        $('#useranswer3').val(JSON.stringify(selectedValues3));

        var questionIdsArray3 = <?php echo json_encode($question_ids_array3); ?>;
        // console.log(questionIdsArray);
        $('#question_ids_array3').val(JSON.stringify(questionIdsArray3));

            // Serialize the form data
            var formData = $('#test3').serialize();

            // AJAX request to save_datas.php
            $.ajax({
                type: 'POST',
                url: 'save_datas.php',
                data: formData,
                success: function (response) {
                    // Handle the response from the server, if needed
                    console.log(response);

                    // Show the next section
                    showNextSection('#section3', '#section4');
                },
                error: function (error) {
                    // Handle the error, if any
                    console.log(error);
                }
            });
    }
    function calculatePercentage3() {

            var correctAnswers3 = <?php echo json_encode($CorrectAnswers3); ?>;
            // console.log('correctAnswers:', correctAnswers3);

            var selectedValues = []; // Array to store user-selected values

            $('input[name^="answer"]').each(function () {
                if ($(this).is(':checked')) {
                    var selectedValue = $(this).val();
                    selectedValues.push(selectedValue);
                }
            });

            // console.log('User-selected values:', selectedValues);

            var correctCount = 0;

            for (var i = 0; i < selectedValues.length; i++) {
                var selectedValue = selectedValues[i];
                if (correctAnswers3.includes(selectedValue)) {
                    correctCount++;
                    // console.log('correctCount:', correctCount);
                }
            }

            var totalQuestions = correctAnswers3.length;
            var percentage = (correctCount / totalQuestions) * 100;

            $('#completionPercentage3').text(percentage.toFixed(2) + '%');
            $('#section3Completed').val(1);
            // $('#questionModal3').modal('hide');
    }



    function submitAnswers4(event) {
        event.preventDefault();

        calculatePercentage4();

        var selectedValues4 = [];

        $('#test4 input[name^="answer"]').each(function () {
            var answerValue4 = $(this).val();
            var questionIdElement = $(this).siblings('input[name^="Q_id"]');
            var questionId4 = questionIdElement.val();

            selectedValues4.push({ questionId: questionId4, answer: answerValue4 });
        });

        // Convert the array to JSON and set it to the useranswer4 input field
        $('#useranswer4').val(JSON.stringify(selectedValues4));

        var questionIdsArray4 = <?php echo json_encode($question_ids_array4); ?>;
        $('#question_ids_array4').val(JSON.stringify(questionIdsArray4));

        // Serialize the form data
        var formData = $('#test4').serialize();

        // AJAX request to save_datas.php
        $.ajax({
            type: 'POST',
            url: 'save_datas.php',
            data: formData,
            success: function (response) {
                // Handle the response from the server, if needed
                console.log(response);

                // Show the next section
                showNextSection('#section4', '#section5');
            },
            error: function (error) {
                // Handle the error, if any
                console.log(error);
            }
        });
    }
    function calculatePercentage4() {
            var correctAnswers4 = <?php echo json_encode(array_map('strtolower', $CorrectAnswers4)); ?>;
            // console.log('correctAnswers:', correctAnswers4);

            var selectedValues = []; // Array to store user-selected values

            // Use a specific selector based on the form ID
            $('#test4 input[name^="answer"]').each(function () {
                var value = $(this).val().toLowerCase(); // Convert to lowercase
                selectedValues.push(value);

                // Print the user-selected value in the console
                // console.log('User-selected value:', value);
            });

            // console.log('selectedValues:', selectedValues);

            var correctCount = 0;
            for (var i = 0; i < correctAnswers4.length; i++) {
                if (selectedValues.includes(correctAnswers4[i])) {
                    correctCount++;
                    // console.log('Matched correct answer:', correctAnswers4[i]);
                }
            }


            var totalQuestions = correctAnswers4.length;
            var percentage = (correctCount / totalQuestions) * 100;

            $('#completionPercentage4').text(percentage.toFixed(2) + '%');
            $('#section4Completed').val(1);
            // $('#questionModal4').modal('hide');
    }



    function submitAnswers5(event) {
        event.preventDefault();

        calculatePercentage5();
        var selectedValues5 = [];

        $('#test5 input[name^="answer"]').each(function () {
            var answerValue5 = $(this).val();
            var questionIdElement5 = $(this).siblings('input[name^="q_id"]');
            var questionId5 = questionIdElement5.val();

            selectedValues5.push({ questionId: questionId5, answer: answerValue5 });
        });

        // Convert the array to JSON and set it to the useranswer4 input field
        $('#useranswer5').val(JSON.stringify(selectedValues5));

        // var questionIdsArray5 = <?php echo json_encode($question_ids_array5); ?>;
        // $('#question_ids_array5').val(JSON.stringify(questionIdsArray5));

        // Serialize the form data
        var formData = $('#test5').serialize();

        // AJAX request to save_datas.php
        $.ajax({
            type: 'POST',
            url: 'save_datas.php',
            data: formData,
            success: function (response) {
                // Handle the response from the server, if needed
                console.log(response);

                // Show the next section
                showNextSection('#section5', '#section6');
            },
            error: function (error) {
                // Handle the error, if any
                console.log(error);
            }
        });
    }
    function calculatePercentage5() {
            var correctAnswers5 = <?php echo json_encode(array_map('strtolower', $CorrectAnswers5)); ?>;
            // console.log('correctAnswers:', correctAnswers5);
            var selectedValues = []; // Array to store user-selected values

            // Use a specific selector based on the form ID
            $('#test5 input[name^="answer"]').each(function () {
                var value = $(this).val().toLowerCase(); // Convert to lowercase
                selectedValues.push(value);
            });

            var correctCount = 0;
            for (var i = 0; i < correctAnswers5.length; i++) {
                if (selectedValues.includes(correctAnswers5[i])) {
                    correctCount++;
                }
            }

            var totalQuestions = correctAnswers5.length;
            var percentage = (correctCount / totalQuestions) * 100;

            $('#completionPercentage5').text(percentage.toFixed(2) + '%');
            // Additional logic or actions you want to perform after calculating percentage
            $('#section5Completed').val(1);
            // $('#questionModal5').modal('hide');
    }

    function submitAnswers6() {
        // Get values of completion percentages
        var completionPercentage1 = $('#completionPercentage1').text();
        var completionPercentage2 = $('#completionPercentage2').text();
        var completionPercentage3 = $('#completionPercentage3').text();
        var completionPercentage4 = $('#completionPercentage4').text();
        var completionPercentage5 = $('#completionPercentage5').text();

        // Prepare data to send to the server
        var data = {
            username: 'YourUsername', // Replace with the actual username
            section1: completionPercentage1,
            section2: completionPercentage2,
            section3: completionPercentage3,
            section4: completionPercentage4,
            section5: completionPercentage5
        };

        // Use AJAX to send the data to save_datas.php
        $.ajax({
            type: 'POST',
            url: 'save_datas.php',
            data: data,
            success: function(response) {
                // Handle success if needed
                console.log(response);
                // window.location.href = 'index.php';
            },
            error: function(error) {
                // Handle error if needed
                console.error(error);
            }
        });
    }

    function showNextSection(currentSection, nextSection) {
        document.querySelector(currentSection).style.display = 'none';
        document.querySelector(nextSection).style.display = 'block';
    }
</script>


        <!-- <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelector('#section1').style.display = 'block';

                // document.querySelector('#section2').style.display = 'none';
                // document.querySelector('#section3').style.display = 'none';
                // document.querySelector('#section4').style.display = 'none';
                // document.querySelector('#section5').style.display = 'none';

                // // Add similar lines for other sections as needed

                $('#test1').submit(function (event) {
                    event.preventDefault();
                    showNextSection('#section1', '#section2');
                });

                // Add similar lines for other sections as needed
            });

            function showNextSection(currentSection, nextSection) {
                document.querySelector(currentSection).style.display = 'none';
                document.querySelector(nextSection).style.display = 'block';
                $('#test1').submit();
            }
        </script> -->
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
            // $('#test1').submit(function () {
            //     // Prevent the default form submission
            //     // event.preventDefault();
                
            //     // Hide section1
            //     document.querySelector('#section1').style.display = 'none';

            //     // Show section2
            //     document.querySelector('#section2').style.display = 'block';

            //     // Optionally, you can submit the form programmatically if needed
            //     // this.submit();
            // });
        </script>

            
<!-- <script>
    function submitAnswers2() {
        // var selectedValues = [];

        // $('input[name^="answer"]:checked').each(function () {
        //     selectedValues.push($(this).val());
        // });

        // // console.log(selectedValues);

        // $('#useranswer').val(JSON.stringify(selectedValues));

        // var questionIdsArray = <?php echo json_encode($question_ids_array); ?>;
        // // console.log(questionIdsArray);
        // $('#question_ids_array').val(JSON.stringify(questionIdsArray));

        // Check for any JavaScript errors above this line

        // Use preventDefault to stop the default form submission
        // event.preventDefault();
        // $('#test2').submit();
    }
</script> -->
<script>
    // function submitAnswers3() {
    //     var selectedValues3 = [];

    //     $('input[name^="answer"]:checked').each(function () {
    //         selectedValues3.push($(this).val());
    //     });

    //     // console.log(selectedValues);

    //     $('#useranswer3').val(JSON.stringify(selectedValues3));

    //     var questionIdsArray3 = <?php echo json_encode($question_ids_array3); ?>;
    //     // console.log(questionIdsArray);
    //     $('#question_ids_array3').val(JSON.stringify(questionIdsArray3));

    //     // Check for any JavaScript errors above this line

    //     // Use preventDefault to stop the default form submission
    //     event.preventDefault();
    //     $('#test3').submit();
    // }
</script>
<!-- <script>
    // function submitAnswers4() {
    //     var selectedValues4 = [];

    //     $('#test4 input[name^="answer"]').each(function () {
    //         var answerValue4 = $(this).val();
    //         var questionIdElement = $(this).siblings('input[name^="Q_id"]');
    //         var questionId4 = questionIdElement.val();

    //         selectedValues4.push({ questionId: questionId4, answer: answerValue4 });
    //     });

    //     // Convert the array to JSON and set it to the useranswer4 input field
    //     $('#useranswer4').val(JSON.stringify(selectedValues4));

    //     var questionIdsArray4 = <?php echo json_encode($question_ids_array4); ?>;
    //     $('#question_ids_array4').val(JSON.stringify(questionIdsArray4));

    //     event.preventDefault();
    //     $('#test4').submit();
    // }
</script> -->
<!-- <script>
    // function submitAnswers5() {
    //     var selectedValues5 = [];

    //     $('#test5 input[name^="answer"]').each(function () {
    //         var answerValue5 = $(this).val();
    //         var questionIdElement5 = $(this).siblings('input[name^="q_id"]');
    //         var questionId5 = questionIdElement5.val();

    //         selectedValues5.push({ questionId: questionId5, answer: answerValue5 });
    //     });

    //     // Convert the array to JSON and set it to the useranswer4 input field
    //     $('#useranswer5').val(JSON.stringify(selectedValues5));

    //     // var questionIdsArray5 = <?php echo json_encode($question_ids_array5); ?>;
    //     // $('#question_ids_array5').val(JSON.stringify(questionIdsArray5));

    //     event.preventDefault();
    //     $('#test5').submit();
    // }
</script> -->




    </body>
</html>