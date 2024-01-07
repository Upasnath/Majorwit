<?php
include('conn.php'); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $formType = $_POST['formType'];
    if ($formType === 'section1Form'){
        echo'akath';
        // Access form fields using $_POST or $_FILES array
        $audioFile = $_FILES['audioInputsection1Modal'];
        $audioFileName = $audioFile['name'];
        $targetDirectory = 'uploads/section1/';
        $targetPath = $targetDirectory . $audioFileName;
        echo '<pre>';
        print_r($_FILES);
        echo '</pre>';
        echo 'audio kitty';

        // Move uploaded audio file to the target directory
        if (move_uploaded_file($audioFile['tmp_name'], $targetPath)) {
            echo '1';
            // Access other form fields
            $batchCode = $_POST['batchCodesection1Modal'];
            $questionTitle = $_POST['questionTitlesection1Modal'];
            echo '2';
            // Initialize arrays to store questions and answers
            $questions = $answers = array();

            // Loop through the 10 questions and answers
            for ($i = 1; $i <= 10; $i++) {
                $questions[] = $_POST['section1Modalquestion' . $i];
                $answers[] = $_POST['section1Modalanswer' . $i];
            }
            echo '3';
            $sql = "INSERT INTO tbl_section1Modal (audio_input, batch_code, question_title, ";
            $sql .= "question1, answer1, question2, answer2, question3, answer3, question4, ";
            $sql .= "answer4, question5, answer5, question6, answer6, question7, answer7, ";
            $sql .= "question8, answer8, question9, answer9, question10, answer10) ";
            $sql .= "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param(
                "sssssssssssssssssssssss", 
                $targetPath,
                $batchCode,
                $questionTitle,
                $questions[0], $answers[0],
                $questions[1], $answers[1],
                $questions[2], $answers[2],
                $questions[3], $answers[3],
                $questions[4], $answers[4],
                $questions[5], $answers[5],
                $questions[6], $answers[6],
                $questions[7], $answers[7],
                $questions[8], $answers[8],
                $questions[9], $answers[9]
            );     

            if ($stmt->execute()) {
                echo 'Data saved successfully';
            } else {
                echo 'Error saving data: ' . $stmt->error;
            }

            $stmt->close();
        } else {
            echo 'Error uploading audio file';
        }
    }
    elseif ($formType === 'section2Form') {

        $audioFile = $_FILES['audioInputaudioModalLabel'];
        $audioFileName = $audioFile['name'];
        $targetDirectory = 'uploads/section2/';
        $targetPath = $targetDirectory . $audioFileName;
    
        if (move_uploaded_file($audioFile['tmp_name'], $targetPath)) {

            $batchCode = $_POST['batchCodeaudioModalLabel'];
            $via='section2';
            $sqlAudio = "INSERT INTO tbl_audio (audio_input,batchcode,uploadvia) VALUES (?, ?, ?)";
            $stmtAudio = $conn->prepare($sqlAudio);
            $stmtAudio->bind_param("sss", $targetPath,$batchCode,$via);
    
            if ($stmtAudio->execute()) {
                echo $audioId = $stmtAudio->insert_id;
                echo $numQuestions = $_POST['questionText'];
                echo '<pre>';
                print_r($_POST);
                echo '</pre>';
                for ($i = 1; $i <= $numQuestions; $i++) {
                    $questionText = $_POST['questionaudioModalLabel_' . $i];
                    $correctAnswer = $_POST['correctAnswer'.$i];
    
                    $sqlQuestion = "INSERT INTO tbl_questions ( audio_id, batch_code, question_text, correct_answer) VALUES ( ?, ?, ?, ?)";
                    $stmtQuestion = $conn->prepare($sqlQuestion);
                    $stmtQuestion->bind_param("isss", $audioId, $batchCode, $questionText, $correctAnswer);
    
                    if ($stmtQuestion->execute()) {
                        $questionId = $stmtQuestion->insert_id;
                
                        // Loop through the options for each question
                        foreach (['A', 'B', 'C'] as $optionIndex) {
                            echo $optionKey = "optionaudioModalLabel$optionIndex" . "_$i";
                
                            // Check if the option key exists in the POST data
                            if (isset($_POST[$optionKey])) {
                                $optionText = $_POST[$optionKey];
                
                                // Echo option values
                                echo "Question $i, Option $optionIndex: $optionText<br>";
                
                                $sqlOption = "INSERT INTO tbl_options (question_id, option_text) VALUES (?, ?)";
                                $stmtOption = $conn->prepare($sqlOption);
                                $stmtOption->bind_param("is", $questionId, $optionText);
                
                                $stmtOption->execute();
                            }
                        }
                    } else {
                        echo 'Error saving question data: ' . $stmtQuestion->error;
                    }
                }
    
                echo 'Data saved successfully';

            } else {
                echo 'Error saving audio data: ' . $stmtAudio->error;
            }
    
            $stmtAudio->close();
        } else {
            echo 'Error uploading audio file';
        }
    }
    elseif ($formType === 'section3Form') {
        echo"first";
        // Handle audio file upload
        $audioFile = $_FILES['audioInputtwoWordsLabel'];
        $audioFileName = $audioFile['name'];
        $targetDirectory = 'uploads/section3/';
        $targetPath = $targetDirectory . $audioFileName;
    
        if (move_uploaded_file($audioFile['tmp_name'], $targetPath)) {
            echo"file upload ayi";
            // Get other form data
            $batchCode = $_POST['batchCodetwoWordsLabel'];
            $via = 'section3';  // Update the value based on your requirement
    
            // Insert audio data into the database
            $sqlAudio = "INSERT INTO tbl_audio (audio_input, batchcode, uploadvia) VALUES (?, ?, ?)";
            $stmtAudio = $conn->prepare($sqlAudio);
            $stmtAudio->bind_param("sss", $targetPath, $batchCode, $via);
    
            if ($stmtAudio->execute()) {
                $audioId = $stmtAudio->insert_id;
                echo"audio table insert ayi";
                // Loop through the questions
                for ($i = 1; isset($_POST['questiontwoWordsLabel' . $i]); $i++) {
                    $questionText = $_POST['questiontwoWordsLabel' . $i];
    
                    // Insert question data into the database
                    $correctAnswer1 = $_POST['correctAnswer1' . $i];
                    $correctAnswer2 = $_POST['correctAnswer2' . $i];

                    // Now you can use $correctAnswer1 and $correctAnswer2 in your SQL query for tbl_questions2
                    $sqlQuestion = "INSERT INTO tbl_questions2 (audio_id, batch_code, question_text, correct_answer1, correct_answer2) VALUES (?, ?, ?, ?, ?)";
                    $stmtQuestion = $conn->prepare($sqlQuestion);
                    $stmtQuestion->bind_param("issss", $audioId, $batchCode, $questionText, $correctAnswer1, $correctAnswer2);
    
                    if ($stmtQuestion->execute()) {
                        $questionId = $stmtQuestion->insert_id;

                        // Assuming you have option_text1, option_text2, option_text3, and option_text4 fields
                        $optionText1 = isset($_POST['optiontwoWordsLabelA' . $i]) ? $_POST['optiontwoWordsLabelA' . $i] : '';
                        $optionText2 = isset($_POST['optiontwoWordsLabelB' . $i]) ? $_POST['optiontwoWordsLabelB' . $i] : '';
                        $optionText3 = isset($_POST['optiontwoWordsLabelC' . $i]) ? $_POST['optiontwoWordsLabelC' . $i] : '';
                        $optionText4 = isset($_POST['optiontwoWordsLabelD' . $i]) ? $_POST['optiontwoWordsLabelD' . $i] : '';

                        // Insert option data into the database in a single query
                        $sqlOption = "INSERT INTO tbl_options2 (question_id, option_text1, option_text2, option_text3, option_text4) VALUES (?, ?, ?, ?, ?)";
                        $stmtOption = $conn->prepare($sqlOption);
                        if ($stmtOption) {
                            $stmtOption->bind_param("issss", $questionId, $optionText1, $optionText2, $optionText3, $optionText4);
                            $stmtOption->execute();
                            echo "All set";
                        } else {
                            echo 'Error in preparing SQL statement: ' . $conn->error;
                        }

                        
                    } else {
                        echo 'Error saving question data: ' . $stmtQuestion->error;
                    }

                }
    
                echo 'Data saved successfully';
    
            } else {
                echo 'Error saving audio data: ' . $stmtAudio->error;
            }
    
            $stmtAudio->close();
        } else {
            echo 'Error uploading audio file';
        }
    }
    elseif ($formType === 'section4Form') {
        echo"first";
        // Handle audio file upload
        $audioFile = $_FILES['audioFilefillBlanksLabel'];
        $audioFileName = $audioFile['name'];
        $targetDirectory = 'uploads/section4/';
        $targetPath = $targetDirectory . $audioFileName;
    
        if (move_uploaded_file($audioFile['tmp_name'], $targetPath)) {
            echo"file upload ayi";
            // Get other form data
            $batchCode = $_POST['batchCodefillBlanksLabel'];
            $via = 'section4';  // Update the value based on your requirement
    
            // Insert audio data into the database
            $sqlAudio = "INSERT INTO tbl_audio (audio_input, batchcode, uploadvia) VALUES (?, ?, ?)";
            $stmtAudio = $conn->prepare($sqlAudio);
            $stmtAudio->bind_param("sss", $targetPath, $batchCode, $via);
    
            if ($stmtAudio->execute()) {
                $audioId = $stmtAudio->insert_id;
                echo"audio table insert ayi";
                echo $questionTitle = $_POST['questionfillBlanksLabel'];
                echo $questionParagraph = $_POST['paragraphfillBlanksLabel'];
                $sqlQuestion = "INSERT INTO tbl_questions3 (audio_id, batch_code, question_title, paragraph) VALUES (?, ?, ?, ?)";
                $stmtQuestion = $conn->prepare($sqlQuestion);
                $stmtQuestion->bind_param("isss", $audioId, $batchCode, $questionTitle, $questionParagraph);
    
                if ($stmtQuestion->execute()) {
                    echo" table question sucess";
                    echo $questionId = $stmtQuestion->insert_id;
                    // Get the number of answers
                    echo $answerCount = $_POST['answerCount'];

                    // Process answer fields
                    for ($i = 1; $i <= $answerCount; $i++) {
                        $answerKey = 'answer' . $i;
                        // Check if the answer field is set in the form data
                        if (isset($_POST[$answerKey])) {
                            $answerValue = $_POST[$answerKey];
                            // Insert the answer into the database or perform other actions
                            // Example: Insert into database
                            $sql = "INSERT INTO tbl_options3 (question_id, answer_text) VALUES (?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("is", $questionId, $answerValue);
                            $stmt->execute();
                            // Check for success or handle errors
                            echo "Answer $i: $answerValue";
                        }
                    }
                }
    
                echo 'Data saved successfully';
    
            } else {
                echo 'Error saving audio data: ' . $stmtAudio->error;
            }
    
            $stmtAudio->close();
        } else {
            echo 'Error uploading audio file';
        }
    }
    elseif ($formType === 'section5Form'){
        echo"first";
        // Handle audio file upload
        $imageFile = $_FILES['imageFieldimageQuestionModalLabel'];
        $imageFileName = $imageFile['name'];
        $targetDirectory = 'uploads/section5/';
        $targetPath = $targetDirectory . $imageFileName;
        if (move_uploaded_file($imageFile['tmp_name'], $targetPath)) {
            echo"file upload ayi";
            $questionTitle = $_POST['imageQuestionTitle'];
            $batchCode = $_POST['batchCodeimageQuestionModalLabel'];
            $fieldCount = $_POST['fieldCount'];

            // Insert data into your table (adjust table and column names accordingly)
            $sql = "INSERT INTO `tbl_image`(`image_input`, `batchcode`, `questiontitle`) VALUES ('$targetPath', '$batchCode','$questionTitle')";
            if ($conn->query($sql) === TRUE) {
                $lastInsertId = $conn->insert_id;

                // Insert dynamic field values into another table (adjust table and column names accordingly)
                for ($i = 1; $i <= $fieldCount; $i++) {
                    $questionField = $_POST['questionField' . $i];
                    $answerField = $_POST['answerField' . $i];

                    $sqlDynamic = "INSERT INTO `tbl_questionanswer`( `image_id`, `batch_code`, `question_text`, `answer_text`) VALUES ('$lastInsertId','$batchCode', '$questionField', '$answerField')";
                    if($conn->query($sqlDynamic)=== TRUE){
                        echo"inserted successfully";
                    }else{
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

                echo "Data saved successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo 'Error uploading audio file';
        }
    }
    else {
        echo "Unsupported form type";
    }
    

} 
else {
    echo 'Invalid request';
}
$conn->close();
?>
