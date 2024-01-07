<?php
// // savedata.php

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Include your database connection logic here
//     include_once 'conn.php';

//     // Process the form submission
//     $rowId = isset($_POST['row_id']) ? $_POST['row_id'] : null;
//     $username = isset($_POST['username']) ? $_POST['username'] : null;
//     $sectionName = isset($_POST['section_name']) ? $_POST['section_name'] : null;
//     $userAnswers = isset($_POST['answer']) ? $_POST['answer'] : null;
//     $ct = isset($_POST['questionCount']) ? $_POST['questionCount'] : null;

//     // Insert the data into the database (modify this part based on your database structure)
//     $insertQuery = "INSERT INTO tbl_section1answers (row_id, username, section_name, answer1, answer2, answer3, answer4, answer5, answer6, answer7, answer8, answer9, answer10) 
//                     VALUES ('$rowId', '$username', '$sectionName', '$userAnswers[0]', '$userAnswers[1]', '$userAnswers[2]', '$userAnswers[3]', '$userAnswers[4]', '$userAnswers[5]', '$userAnswers[6]', '$userAnswers[7]', '$userAnswers[8]', '$userAnswers[9]')";

//     // Execute the query
//     $resultQuery = $conn->query($insertQuery);

//     if ($resultQuery === TRUE) {
//         // Check if there are more questions to display
//         $currentQuestionSetIndex = isset($_GET['question_set_index']) ? $_GET['question_set_index'] : 0;

//         if ($currentQuestionSetIndex < $ct) {
//             // Redirect to the next set of questions
//             $nextQuestionSetIndex = $currentQuestionSetIndex + 1;
//             header("Location: {$_SERVER['PHP_SELF']}?question_set_index=$nextQuestionSetIndex");
//             exit();
//         } else {
//             // Additional logic or actions after completing all sections
//             echo '<script>alert("All sections completed successfully!");</script>';
//             echo json_encode(['success' => true]); // Replace this with your actual JSON response
//         }
//     } else {
//         // Handle database insertion error
//         echo '<script>alert("Error: ' . $conn->error . '");</script>';
//     }
// } else {
//     // Handle invalid request method
//     echo 'Invalid request method';
// }
?>
<?php
    // Assuming you've established a database connection earlier
include_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['form_id'] == 'test1') {
    // Retrieve the form data
    $rowIds = $_POST['row_id'];
    $username = $_POST['username'];
    $sectionName = $_POST['section_name'];
    $questionCount = $_POST['questionCount'];
    $userAnswers = $_POST['answer'];
    print_r($userAnswers); // or var_dump($userAnswers);
    
    // Iterate through each set
    for ($set = 0; $set < $questionCount; $set++) {
        // Construct the SQL query for each set
        $insertQuery = "INSERT INTO tbl_section1answers (row_id, username, section_name";

        // Iterate through the answers for each set
        for ($i = 0; $i < 10; $i++) {
            // Calculate the index in the $userAnswers array for the current answer
            $answerIndex = ($set * 10) + $i;
            $insertQuery .= ", answer" . ($i + 1);
        }

        // Complete the query
        $insertQuery .= ") VALUES ('" . $rowIds[$set] . "', '$username', '$sectionName'";

        // Iterate through the answers for each set
        for ($i = 0; $i < 10; $i++) {
            // Calculate the index in the $userAnswers array for the current answer
            $answerIndex = ($set * 10) + $i;
            $insertQuery .= ", '" . $userAnswers[$answerIndex] . "'";
        }

        // Complete the query
        $insertQuery .= ")";
        echo $insertQuery;
        // Execute the query
        if ($conn->query($insertQuery) !== TRUE) {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
            break;  // Break the loop if there's an error in one of the queries
        }
    }

    // Close the database connection
    $conn->close();

    echo "Data inserted successfully";
} else {
    // Handle cases where the form was not submitted
    echo "Form not submitted!";
}
?>