<?php
include('conn.php');
$batchcode = isset($_GET['batchCode']) ? htmlspecialchars($_GET['batchCode']) : '';
// echo '<script>alert("' . $batchcode . '");</script>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
        include("header.php");
        // $sql="SELECT batch_code FROM tbl_register where username='$username'";
        // $resultt=$conn->query($sql);
        // if ($resultt->num_rows > 0)
        // {
        //     $batchcode=$resultt['batch_code'];
        // }
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>
        <!-- <div style="width: 80%;" class="align-items-center">
            <ol class="list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start mb-4" onclick="showModal(1)">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Question 1</div>
                        Content for list item
                    </div>
                    <span class="badge bg-primary rounded-pill">completed</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start mb-4" onclick="showModal(2)">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Question 2</div>
                        Content for list item
                    </div>
                    <span class="badge bg-primary rounded-pill">tap to listen</span>
                </li>
            </ol>
        </div> -->


        <div class="row justify-content-center">
            <div class="col-md-2" style="height: 100px;"> <!-- Adjust the height as needed -->
                <ul class="list-group mb-4" style="width:80%; height: 100%;" onclick="showModal1()">
                    <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius:20px;height: 100%; cursor: pointer;">
                        <div>
                            Section 1 
                        </div>
                        <span id="completionBadge" class="badge bg-success rounded-pill">
                            <span id="completionPercentage">0%</span>
                        </span>
                    </li>
                </ul>
            </div>
            <br><br>
            <div class="col-md-2" style="height: 100px;"> <!-- Adjust the height as needed -->
                <ul class="list-group mb-4" style="width:80%; height: 100%;" onclick="showModal2()">
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
                <ul class="list-group mb-4" style="width:80%; height: 100%;" onclick="showModal3()">
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
                <ul class="list-group mb-4" style="width:80%; height: 100%;" onclick="showModal4()">
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
                <ul class="list-group mb-4" style="width:80%; height: 100%;" onclick="showModal5()">
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

        </div>
    </center>
 

<!-- Modal 1 -->
    <div class="modal" tabindex="-1" role="dialog" id="questionModal1" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Question</h5>
                </div>
                <div class="modal-body">
                    <?php
                        $sql="SELECT * FROM `tbl_section1modal` WHERE batch_code='$batchcode'";
                        $resultt = $conn->query($sql);
                        if ($resultt->num_rows > 0) {
                            $ssl = "SELECT COUNT(id) as count FROM tbl_section1modal WHERE batch_code='$batchcode'";
                            $res = $conn->query($ssl);
                            $resul = mysqli_fetch_assoc($res);
                            $questionSets = mysqli_fetch_all($resultt, MYSQLI_ASSOC);
                            $sectionName = 'section1'; ?>
                            <form method="POST"  id="test1">
                                <?php foreach ($questionSets as $setIndex => $row) {
                                    $audioPath = '../admin/' . $row['audio_input']; ?>
                                    <input type="hidden" name="row_id[]" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="form_id" id="form_id" value="test1">
                                    <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                                    <input type="hidden" id="section_name" name="section_name" value="<?php echo $sectionName; ?>">
                                    <input type="hidden" id="questionCount" name="questionCount" value="<?php echo $resul['count']; ?>">
                                    <div class="audio-container" id="questionSet<?php echo $setIndex; ?>">
                                        <!-- Your audio and question display code here -->
                                        <div style="text-align: center;">
                                            <audio id="audio<?php echo $setIndex; ?>" controls controlsList="nodownload" style="width: 80%; border-radius: 30px; border: 2px solid black;">
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
                                                            <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $row["question$i"]; ?></td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="answer[]" id="answer<?php echo $setIndex . '_' . $i; ?>" placeholder="Enter your answer" required>
                                                                        <input type="hidden" name="correct_answer[]" id="correct_answer<?php echo $setIndex . '_' . $i; ?>" value="<?php echo addslashes($row["answer$i"]); ?>">
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br><br>
                                <?php } ?>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" onclick="submitAnswers()">Submit Answers</button>
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
    </div>
<!-- modal 1 end -->

<!-- modal 2 -->
    <div class="modal" tabindex="-1" role="dialog" id="questionModal2" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Question</h5>
                </div>
                <div class="modal-body">
                    <?php
                        $sql2="SELECT * FROM `tbl_audio` WHERE uploadvia='section2' AND batchcode='$batchcode'";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            $ssl2 = "SELECT COUNT(audio_id) as count FROM tbl_audio WHERE uploadvia='section2' AND batchcode='$batchcode'";
                            $res2 = $conn->query($ssl2);
                            $resul2 = mysqli_fetch_assoc($res2);
                            $questionSets2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                            $sectionName2 = 'section2'; ?>
                            <form method="POST"  id="test2">
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
                                            $sml = "SELECT correct_answer FROM tbl_questions WHERE batch_code = '$batchcode'";
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
                                        <button type="button" class="btn btn-primary" onclick="submitAnswers2()">Submit Answers</button>
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
    </div>
<!-- modal 2 end -->

<!-- modal 3 -->
    <div class="modal" tabindex="-1" role="dialog" id="questionModal3" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Question</h5>
                </div>
                <div class="modal-body">
                    <?php
                        $sql3="SELECT * FROM `tbl_audio` WHERE uploadvia='section3' AND batchcode='$batchcode'";
                        $result3 = $conn->query($sql3);
                        if ($result3->num_rows > 0) {
                            $ssl3 = "SELECT COUNT(audio_id) as count FROM tbl_audio WHERE uploadvia='section3' AND batchcode='$batchcode'";
                            $res3 = $conn->query($ssl3);
                            $resul3 = mysqli_fetch_assoc($res3);
                            $questionSets3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
                            $sectionName3 = 'section3'; ?>
                            <form method="POST"  id="test3">
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
                                            $sml3 = "SELECT correct_answer1, correct_answer2 FROM tbl_questions2 WHERE batch_code = '$batchcode'";
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
    </div>
<!-- modal 3 end -->

<!-- modal 4 -->
    <div class="modal" tabindex="-1" role="dialog" id="questionModal4" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Question</h5>
                </div>
                <div class="modal-body">
                    <?php
                        $CorrectAnswers4 = array();
                        $sql4="SELECT * FROM `tbl_audio` WHERE uploadvia='section4' AND batchcode='$batchcode'";
                        $result4 = $conn->query($sql4);
                        if ($result4->num_rows > 0) {
                            $ssl4 = "SELECT COUNT(audio_id) as count FROM tbl_audio WHERE uploadvia='section4' AND batchcode='$batchcode'";
                            $res4 = $conn->query($ssl4);
                            $resul4 = mysqli_fetch_assoc($res4);
                            $questionSets4 = mysqli_fetch_all($result4, MYSQLI_ASSOC);
                            $sectionName3 = 'section4'; ?>
                            <form method="POST"  id="test4">
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
                                        <button type="button" class="btn btn-primary" onclick="submitAnswers4()">Submit Answers</button>
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
    </div>
<!-- modal 4 end -->

<!-- modal 5 -->
    <div class="modal" tabindex="-1" role="dialog" id="questionModal5" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Question</h5>
                </div>
                <div class="modal-body">
                    <?php
                    $CorrectAnswers5 = array();
                    $sql5 = "SELECT * FROM `tbl_image` WHERE batchcode='$batchcode'";
                    $result5 = $conn->query($sql5);

                    if ($result5->num_rows > 0) {
                        $questionSets5 = mysqli_fetch_all($result5, MYSQLI_ASSOC);
                    ?>
                        <form method="POST" id="test5">
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
                                <input type="hidden" name="form_id" id="form_id" value="test3">
                                <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                                <input type="hidden" id="section_name" name="section_name" value="<?php echo $sectionName; ?>">

                                <div class="audio-container" id="questionSet<?php echo $setIndex5; ?>">
                                    <label><?php echo $row5['questiontitle']; ?></label><br><br>
                                    <div style="text-align: center;">
                                        <img id="image<?php echo $setIndex5; ?>" src="<?php echo $imagePath; ?>" alt="Image" style="width: 80%; border-radius: 30px; border: 2px solid black;">
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
                                                            $CorrectAnswers5[]=$sec555['answer_text'];                                                  ?>
                                                                <tr>
                                                                    <td>
                                                                        <label for="question"><?php echo $sec555['question_text']; ?></label>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <label>
                                                                            <input type="text" class="form-control" name="answer<?php echo $j; ?>_<?php echo $ii; ?>" id="answer<?php echo $j; ?>_<?php echo $ii; ?>">
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
                                    <button type="button" class="btn btn-primary" onclick="submitAnswers5()">Submit Answers</button>
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
    </div>

<!-- modal 4 end -->



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- modal 1 -->
    <script>
        function calculatePercentage() {
            var totalQuestions = <?php echo count($questionSets) * 10; ?>;
            var correctAnswers = 0;
            
            for (var setIndex = 0; setIndex < <?php echo count($questionSets); ?>; setIndex++) {
                for (var i = 1; i <= 10; i++) {
                    var userAnswer = $('#answer' + setIndex + '_' + i).val(); // Get user's answer
                    var correctAnswerElement = $('#correct_answer' + setIndex + '_' + i);
                    var correctAnswer = correctAnswerElement.val(); // Get correct answer

                    if (userAnswer.toLowerCase() === correctAnswer.toLowerCase()) {
                        correctAnswers++;
                    }
                }
            }

            var percentage = (correctAnswers / totalQuestions) * 100;
            $('#completionPercentage').text(percentage.toFixed(2) + '%'); // Set the percentage value
            $('#completionBadge').show(); // Show the completion badge

            $('#questionModal1').modal('hide');
        }
        function submitAnswers() {
            var percentage = calculatePercentage();
        }


        function showModal1() {
            // if ($('#section1Completed').val() == 1) {
            //     alert('Section 1 has arrlready been completed. You cannot submit again.');
            //     return;
            // }

            if ($('#completionPercentage').text() !== '0%') {
                alert('Section 1 has already been completed. You cannot submit again.');
                return;
            }

            $('#questionModal1').modal('show');
            $('#test1').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission
                var percentage = calculatePercentage();
                $('.badge').html(percentage.toFixed(0) + '%');
                $('#section1Completed').val(1);
                $('#questionModal1').modal('hide');
            });
        }
    </script>
<!-- modal 1 end -->

<!-- modal 2 -->
    <script>

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
            $('#questionModal2').modal('hide');
        }

        function submitAnswers2() {
            var percentage = calculatePercentage2();
        }

        function showModal2() {
            if ($('#completionPercentage').text() !== '0%' && $('#completionPercentage2').text() !== '0%') {
                alert('Section 1 & 2 has already been completed. You cannot submit again.');
                return;
            }
            else if ($('#completionPercentage2').text() !== '0%') {
                alert('Section 2 has already been completed. You cannot submit again.');
                return;
            }
            else{
                $('#questionModal2').modal('show');
            }

            $('#test2').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission
                submitAnswers2();
            });
        }


    </script>
<!--modal 2 end  -->

<!-- modal 3 -->
    <script>
        function calculatePercentage3() {
            // alert("ith thridinte");
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
            $('#questionModal3').modal('hide');
        }

        function submitAnswers3() {
            var percentage = calculatePercentage3();
        }

        function showModal3() {

            if ($('#completionPercentage').text() !== '0%' && $('#completionPercentage2').text() !== '0%' && $('#completionPercentage3').text() !== '0%' ) {
                alert('Section 1 & 2 & 3 has already been completed. You cannot submit again.');
                return;
            }
            else if ($('#completionPercentage2').text() !== '0%' && $('#completionPercentage3').text() !== '0%') {
                alert('Section 2 & 3 has already been completed. You cannot submit again.');
                return;
            }
            else if ($('#completionPercentage3').text() !== '0%') {
                alert('Section 3 has already been completed. You cannot submit again.');
                return;
            }
            else{
                $('#questionModal3').modal('show');
            }

            $('#test3').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission
                submitAnswers3();
            });
        }
    </script>
<!--modal 3 end  -->

<!-- modal 4 -->
    <script>
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
            $('#questionModal4').modal('hide');
        }



        function submitAnswers4() {
            var percentage = calculatePercentage4();
        }
        function showModal4(){
            if ($('#completionPercentage').text() !== '0%' && $('#completionPercentage2').text() !== '0%' && $('#completionPercentage3').text() !== '0%' && $('#completionPercentage4').text() !== '0%' ) {
                alert('Section 1 , 2 , 3 & 4 has already been completed. You cannot submit again.');
                return;
            }
            else if ($('#completionPercentage2').text() !== '0%' && $('#completionPercentage3').text() !== '0%' && $('#completionPercentage4').text() !== '0%') {
                alert('Section 2,3 & 4 has already been completed. You cannot submit again.');
                return;
            }
            else if ($('#completionPercentage3').text() !== '0%' && $('#completionPercentage4').text() !== '0%') {
                alert('Section 3 & 4  has already been completed. You cannot submit again.');
                return;
            }
            else if($('#completionPercentage4').text() !== '0%'){
                alert('Section 4 has already been completed. You cannot submit again.');
                return;
            }
            else{
                $('#questionModal4').modal('show');
            }

            $('#test4').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission
                submitAnswers4();
            });
        }
    </script>
<!--modal 4 end  -->

<!-- modal 5 -->
    <script>
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
            $('#questionModal5').modal('hide');
        }

        function submitAnswers5() {
            calculatePercentage5(); // Calculate percentage
            // Additional logic or actions you want to perform after submitting answers for Section 5
        }

        function showModal5() {
            if ($('#completionPercentage').text() !== '0%' && $('#completionPercentage2').text() !== '0%' && $('#completionPercentage3').text() !== '0%' && $('#completionPercentage4').text() !== '0%' && $('#completionPercentage5').text() !== '0%' ) {
                    alert('Section 1 , 2 , 3 , 4 & 5 has already been completed. You cannot submit again.');
                    return;
                }
                else if ($('#completionPercentage2').text() !== '0%' && $('#completionPercentage3').text() !== '0%' && $('#completionPercentage4').text() !== '0%' && $('#completionPercentage5').text() !== '0%') {
                    alert('Section 2,3,4 & 5 has already been completed. You cannot submit again.');
                    return;
                }
                else if ($('#completionPercentage3').text() !== '0%' && $('#completionPercentage4').text() !== '0%' && $('#completionPercentage5').text() !== '0%') {
                    alert('Section 3,4 & 5  has already been completed. You cannot submit again.');
                    return;
                }
                else if($('#completionPercentage4').text() !== '0%' && $('#completionPercentage5').text() !== '0%'){
                    alert('Section 4 & 5 has already been completed. You cannot submit again.');
                    return;
                }
                else if($('#completionPercentage5').text() !== '0%'){
                    alert('Section 5 has already been completed. You cannot submit again.');
                    return;
                }
                else{
                    $('#questionModal5').modal('show');
                }

                $('#test5').submit(function (event) {
                    event.preventDefault(); // Prevent the default form submission
                    submitAnswers5();
                })
        }
    </script>

<!--modal 5 end  -->


</body>
</html>