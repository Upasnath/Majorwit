<?php
include('conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['form_id'] == 'test1') {
    // Retrieve the form data
    $rowIds = $_POST['row_id'];
    $username = $_POST['username'];
    $sectionName = $_POST['section_name'];
    $questionCount = $_POST['questionCount'];
    $userAnswers = $_POST['answer'];
    // print_r($userAnswers); // or var_dump($userAnswers);
    
    // Iterate through each set
    for ($set = 0; $set < $questionCount; $set++) {
        // Construct the SQL query for each set
        $insertQuery = "INSERT INTO tbl_section1answers (row_id, username, section_name";

        // Iterate through the answers for each set
        // Iterate through the answers for each set
    for ($i = 0; $i < 10; $i++) {
        // Calculate the index in the $userAnswers array for the current answer
        $answerIndex = ($set * 10) + $i;
        
        // For the generic case where you use answer[]
        // $insertQuery .= ", answer" . ($i + 1);

        // For the case where you use answer[setIndex_i]
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
        // $insertQuery;
        // Execute the query
        if ($conn->query($insertQuery) !== TRUE) {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
            break;  // Break the loop if there's an error in one of the queries
        }
    }

    // Close the database connection
    // $conn->close();

    // echo "Data inserted successfully";
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_id']) && $_POST['form_id'] == 'test2') {
    // Fetch the value of useranswer and decode it to an array
    $userAnswer = isset($_POST['useranswer']) ? json_decode($_POST['useranswer'], true) : [];
    
    // Fetch the values of question_ids_array
    $questionIdsArray = isset($_POST['question_ids_array']) ? json_decode($_POST['question_ids_array'], true) : [];

    // Insert data into tbl_section2answers based on the count of questionIdsArray
    for ($i = 0; $i < count($questionIdsArray); $i++) {
        // Assuming $username is defined somewhere in your code
        $username = isset($_POST['username']) ? $_POST['username'] : '';

        // Assuming $userAnswer is an array with the same length as $questionIdsArray
        $answer = isset($userAnswer[$i]) ? $userAnswer[$i] : '';

        // Assuming $questionIdsArray contains question_ids
        $questionId = isset($questionIdsArray[$i]) ? $questionIdsArray[$i] : '';

        // Insert data into tbl_section2answers
        $insertQuery2 = "INSERT INTO `tbl_section2answers` (`username`, `question_id`, `answer`) VALUES ('$username', '$questionId', '$answer')";

        // Execute the query
        if ($conn->query($insertQuery2) === TRUE) {
            // echo "Record inserted successfully";
        } else {
            echo "Error: " . $insertQuery2 . "<br>" . $conn->error;
        }
    }

    // Rest of your code...
}
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_id']) && $_POST['form_id'] == 'test6') {

    $username = $_POST['username'];
    $section1 = $_POST['section1'];
    $section2 = $_POST['section2'];
    $section3 = $_POST['section3'];
    $section4 = $_POST['section4'];
    $section5 = $_POST['section5'];
    // Fetch the value of useranswer and decode it to an array
    echo$sql = "INSERT INTO tbl_result(username, section1, section2, section3, section4, section5) VALUES ('$username', '$section1', '$section2', '$section3', '$section4', '$section5')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    // Rest of your code...
}




?>