<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
   <script>
        // Declare global arrays
        // alert('hii');
        var optionsArray = [];
        var selectedOptionsArray = [];
        function caps2(batchcodeField) {
            if (/[a-z]/.test(batchcodeField.value)) {
                batchcodeField.value = batchcodeField.value.toUpperCase();
            }
        }
        function caps3(batchcodeField) {
            if (/[a-z]/.test(batchcodeField.value)) {
                batchcodeField.value = batchcodeField.value.toUpperCase();
            }
        }
        function caps4(batchcodeField) {
            if (/[a-z]/.test(batchcodeField.value)) {
                batchcodeField.value = batchcodeField.value.toUpperCase();
            }
        }
        function caps5(batchcodeField) {
            if (/[a-z]/.test(batchcodeField.value)) {
                batchcodeField.value = batchcodeField.value.toUpperCase();
            }
        }
    </script>
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
                        <h4 class="page-title">Course Page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                    </div>
                </div>
            </div>
            <!-- modal start -->
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <h3 class="box-title">Section "1" TEN QUESTIONS</h3>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#section1Modal">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <h3 class="box-title">Section "2" MULTIPLE CHOICE</h3>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#audioModal">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <h3 class="box-title">Section "3" TWO WORDS</h3>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#twoWords">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <h3 class="box-title">Section "4" FILL BLANKS</h3>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#fillBlanks">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <h3 class="box-title">Section "5" IMAGE QUESTION</h3>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#imageQuestionModal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Audio Modal -->
            <!-- Modal for Section 1 TEN QUESTIONS-->
                <div class="modal fade" id="section1Modal" name="section1Modal" tabindex="-1" role="dialog" aria-labelledby="section1ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="section1ModalLabel"><b>10 QUESTION</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="section1Form" method="post" action="save_data.php" enctype="multipart/form-data">
                                    <input type="hidden" name="formType" value="section1Form">
                                    <div class="form-group">
                                        <div class="form-row mb-2">
                                            <div class="col-md-8">
                                                <label for="audioInput"><b>Audio Input</b></label>
                                                <input type="file" class="form-control" style="border:2px solid grey;" id="audioInputsection1Modal" name="audioInputsection1Modal" accept="audio/*" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="audioInput"><b>Batch code</b></label>
                                                <input type="text" class="form-control" style="border: 2px solid grey;" id="batchCodesection1Modal" name="batchCodesection1Modal" onkeyup="caps(this);" autocomplete="none" required>
                                            </div>
                                        </div>                                    
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="questionTitle"><b>Question Title:</b></label>
                                            <input type="text" class="form-control" style="border: 2px solid grey;" id="questionTitlesection1Modal" name="questionTitlesection1Modal" placeholder="Enter question title" autocomplete="none" required>
                                        </div>

                                        <!-- Set of 10 Questions and Answers -->
                                        <h5>Set of 10 Questions and Answers:</h5>
                                        <!-- Loop for 10 questions -->
                                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                            <div class="form-group">
                                                <label for="question<?php echo $i; ?>"><b>Question <?php echo $i; ?>:</b></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" style="border:2px solid black;" id="section1Modalquestion<?php echo $i; ?>" name="section1Modalquestion<?php echo $i; ?>" placeholder="Enter question <?php echo $i; ?>" autocomplete="none" required>&nbsp;&nbsp;
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="button" onclick="insertPlaceholder('section1Modalquestion<?php echo $i; ?>', '(...........<?php echo $i; ?>..........)')">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Answer Input -->
                                            <div class="form-group">
                                                <label for="answer<?php echo $i; ?>">Answer <?php echo $i; ?>:</label>
                                                <input type="text" class="form-control" style="width:300px;border:1px solid black;" id="section1Modalanswer<?php echo $i; ?>" name="section1Modalanswer<?php echo $i; ?>" placeholder="Enter answer <?php echo $i; ?>" autocomplete="none" required>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- MODAL ENDS FOR SECTION1  -->

            <!-- Modal for Section 2 MULTIPLE CHOICE-->
                <div class="modal fade" id="audioModal"  name="audioModal" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="audioModalLabel"><b>MULTIPLE CHOICES</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="audioForm" method="POST" action="save_data.php" enctype="multipart/form-data">
                                    <input type="hidden" name="formType" id="formType" value="section2Form">
                                    <input type="hidden" name="questionText" id="questionText" value="1">
                                    <div class="form-group">
                                        <div class="form-row mb-2">
                                            <div class="col-md-8">
                                                <label for="audioInput"><b>Audio Input</b></label>
                                                <input type="file" style="border:2px solid grey;" class="form-control" id="audioInputaudioModalLabel" name="audioInputaudioModalLabel" accept="audio/*">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="audioInput"><b>Batch code</b></label>
                                                <input type="text" style="border:2px solid grey;" class="form-control" id="batchCodeaudioModalLabel" name="batchCodeaudioModalLabel" onkeyup="caps2(this);" autocomplete="off" required>
                                            </div>
                                        </div>                                  
                                    </div>
                                    <div id="questionsContainer">
                                        <div class="form-group question-container" id="questionContainer1">
                                            <label for="question1"><b>QUESTION 1</b></label>
                                            <input type="text" style="border:2px solid black;" class="form-control" id="questionaudioModalLabel_1" name="questionaudioModalLabel_1" placeholder="Enter your question" autocomplete="none" required>
                                            <input type="hidden" name="correctAnswer1" id="correctAnswer1">
                                            <label for="">(mark the correct answer)</label>
                                            <div class="options-container">
                                                <div class="option-container">
                                                    <label for="optionaudioModalLabel1_1"><b>Option A</b></label>
                                                    <div class="input-group">
                                                        <input type="text" style="border:1px solid black;" class="form-control" id="optionaudioModalLabelA_1" name="optionaudioModalLabelA_1" autocomplete="none" required>&nbsp;&nbsp;
                                                        <div class="input-group-append">
                                                            <div class="input-group-text btn btn-success">
                                                                <input type="radio" class="btn btn-success" name="correctOptionaudioModalLabelA_1" id="correctOptionaudioModalLabelA_1" onclick="updateRadioValue(1, 'A')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="option-container">
                                                    <label for="optionaudioModalLabel2_1"><b>Option B</b></label>
                                                    <div class="input-group">
                                                        <input type="text" style="border:1px solid black;" class="form-control" id="optionaudioModalLabelB_1" name="optionaudioModalLabelB_1" autocomplete="none" required>&nbsp;&nbsp;
                                                        <div class="input-group-append">
                                                            <div class="input-group-text btn btn-success">
                                                                <input type="radio" class="btn btn-success" name="correctOptionaudioModalLabelB_1" id="correctOptionaudioModalLabelB_1" onclick="updateRadioValue(1, 'B')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="option-container">
                                                    <label for="optionaudioModalLabel3_1"><b>Option C</b></label>
                                                    <div class="input-group">
                                                        <input type="text" style="border:1px solid black;" class="form-control" id="optionaudioModalLabelC_1" name="optionaudioModalLabelC_1" autocomplete="none" required >&nbsp;&nbsp;
                                                        <div class="input-group-append">
                                                            <div class="input-group-text btn btn-success">
                                                                <input type="radio" class="btn btn-success" name="correctOptionaudioModalLabelC_1" id="correctOptionaudioModalLabelC_1" onclick="updateRadioValue(1, 'C')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Button to Add Another Question -->
                                    <button type="button" class="btn btn-danger" onclick="deleteLastQuestion()">Delete Last Question</button>
                                    <button type="button" class="btn btn-secondary" onclick="addQuestion()">Add Another Question</button>
                                    <button type="button" class="btn btn-primary" id="submitBtnaudioModalLabel" name="submitBtnaudioModalLabel" onclick="submitForm()">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- MODAL ENDS FOR SECTION2  -->

            <!-- section 3 Modal TWO WORDS-->
                <div class="modal fade" id="twoWords" tabindex="-1" role="dialog" aria-labelledby="twoWordsLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="twoWordsLabel"><b>TWO WORDS</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="twoWordsForm" method="POST" action="save_data.php" enctype="multipart/form-data">
                                    <input type="hidden" name="formType" id="formType" value="section3Form">
                                    <input type="hidden" name="questionCount" id="questionCount" value="1">
                                    <div class="form-group">
                                        <div class="form-row mb-2">
                                            <div class="col-md-8">
                                                <label for="audioInput"><b>Audio Input</b></label>
                                                <input type="file" style="border:2px solid grey;"  class="form-control" id="audioInputtwoWordsLabel" name="audioInputtwoWordsLabel" accept="audio/*">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="audioInput"><b>Batch code</b></label>
                                                <input type="text" style="border:2px solid grey;" class="form-control" id="batchCodetwoWordsLabel" name="batchCodetwoWordsLabel" onkeyup="caps3(this);" required>
                                            </div>
                                        </div>                                    
                                    </div>
                                    <div id="questionsContainer">
                                        <div class="form-group question-containers" id="questionContainer1">
                                            <label for="question1"><b>Question 1</b></label>
                                            <input type="text" style="border:2px solid black;" class="form-control" id="questiontwoWordsLabel1" name="questiontwoWordsLabel1" placeholder="Enter your question...." required>
                                            <input type="hidden" name="selectedOptionsData1" id="selectedOptionsData1">
                                            <label for="heading">(make sure that the only two checkbox is selected)</label>
                                            <div class="options-container">
                                                <div class="option-container">
                                                    <label for="option1"><b>Option A</b></label>
                                                    <div class="input-group">
                                                        <input type="text" style="border:1px solid black;" class="form-control" id="optiontwoWordsLabelA1" name="optiontwoWordsLabelA1" required> &nbsp;&nbsp;
                                                        <div class="input-group-append">
                                                            <div class="input-group-text btn btn-info">
                                                                <input type="checkbox" class="btn btn-info" name="correctOptiontwoWordsLabelA1" id="correctOptiontwoWordsLabelA1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="option-container">
                                                    <label for="option2"><b>Option B</b></label>
                                                    <div class="input-group">
                                                        <input type="text" style="border:1px solid black;" class="form-control" id="optiontwoWordsLabelB1" name="optiontwoWordsLabelB1" required>&nbsp;&nbsp;
                                                        <div class="input-group-append">
                                                            <div class="input-group-text btn btn-info">
                                                                <input type="checkbox" class="btn btn-info"  name="correctOptiontwoWordsLabelB1" id="correctOptiontwoWordsLabelB1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="option-container">
                                                    <label for="option3"><b>Option C</b></label>
                                                    <div class="input-group">
                                                        <input type="text" style="border:1px solid black;" class="form-control" id="optiontwoWordsLabelC1" name="optiontwoWordsLabelC1" required>&nbsp;&nbsp;
                                                        <div class="input-group-append">
                                                            <div class="input-group-text btn btn-info">
                                                                <input type="checkbox" class="btn btn-info" name="correctOptiontwoWordsLabelC1" id="correctOptiontwoWordsLabelC1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="option-container">
                                                    <label for="option4"><b>Option D</b></label>
                                                    <div class="input-group">
                                                        <input type="text" style="border:1px solid black;" class="form-control" id="optiontwoWordsLabelD1" name="optiontwoWordsLabelD1" required>&nbsp;&nbsp;
                                                        <div class="input-group-append">
                                                            <div class="input-group-text btn btn-info">
                                                                <input type="checkbox" class="btn btn-info" name="correctOptiontwoWordsLabelD1" id="correctOptiontwoWordsLabelD1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" id="addQuestionBtnTwoWords">Add Another Question</button>
                                        <button type="button" class="btn btn-primary" id="submitBtntwoWordsLabel" name="submitBtntwoWordsLabel" onclick="submitForm2()">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- MODAL ENDS FOR SECTION3 -->

            <!-- section 4 FILL BLANKS -->
                <div class="modal fade" id="fillBlanks" tabindex="-1" role="dialog" aria-labelledby="fillBlanksLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fillBlanksLabel">Add Section 4 Fill Blanks</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="fillBlanksForm" method="POST" action="save_data.php" enctype="multipart/form-data">
                                    <input type="hidden" name="formType" id="formType" value="section4Form">
                                    <div class="form-group">
                                        <div class="form-row mb-2">
                                            <div class="col-md-8">
                                                <label for="audioFile"><b>Audio File:</b></label>
                                                <input type="file" style="border:2px solid grey;" class="form-control" id="audioFilefillBlanksLabel" name="audioFilefillBlanksLabel"  accept="audio/*" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="audioInput"><b>Batch code</b></label>
                                                <input type="text" style="border:2px solid grey;" class="form-control" id="batchCodefillBlanksLabel" name="batchCodefillBlanksLabel" onkeyup="caps4(this);" required>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label for="question"><b>Question title</b></label>
                                        <input type="text" style="border:2px solid black;" class="form-control" id="questionfillBlanksLabel" name="questionfillBlanksLabel" placeholder="enter the question title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="paragraph"><b>Paragraph:</b></label>
                                        <textarea class="form-control" style="border:1px solid black;resize:none;height:150px;" id="paragraphfillBlanksLabel" name="paragraphfillBlanksLabel" rows="4" required></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <div id="answerFieldsContainerfillBlanksLabel">
                                            <input type="hidden" id="answerCount" name="answerCount">
                                            <input type="hidden" id="answerValues" name="answerValues">

                                        </div>
                                        <!-- Add Button Footer -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" onclick="addPlaceholder()">Add Placeholder</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="submitFillBlanksForm()">Submit</button>
                                    </div>
                                </form>
                            </div>                              
                        </div>
                    </div>
                </div>
            <!-- MODAL END FOR SECTION4  -->

            <!-- scetion 5 -->
                <div class="modal fade" id="imageQuestionModal" tabindex="-1" role="dialog" aria-labelledby="imageQuestionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageQuestionModalLabel">Add Image Question</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="imageQuestionForm" method="POST" action="save_data.php" enctype="multipart/form-data">
                                    <input type="hidden" name="formType" id="formType" value="section5Form">
                                    <div class="form-group">
                                        <label for="audioQuestionTitle">Question Title:</label>
                                        <input type="text" style="border:1px solid black;" class="form-control" id="imageQuestionTitle" name="imageQuestionTitle" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row mb-2">
                                            <div class="col-md-8">
                                                <label for="imageField"><b>Image:</b></label>
                                                <input type="file" style="border:2px solid grey;" class="form-control" id="imageFieldimageQuestionModalLabel" name="imageFieldimageQuestionModalLabel" accept="image/*" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="audioInput"><b>Batch code</b></label>
                                                <input type="text" style="border:2px solid grey;" class="form-control" id="batchCodeimageQuestionModalLabel" name="batchCodeimageQuestionModalLabel" onkeyup="caps5(this);" required>
                                            </div>
                                        </div>                                   
                                    </div>
                                    <div class="form-row mb-2">
                                        <input type="hidden" name="fieldCount" id="fieldCount" value="1">
                                        <div class="col-md-6">
                                            <label for="questionField1">Question: 1</label>
                                            <input type="text" style="border:2px solid black;" class="form-control" id="questionField1" name="questionField1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="answerField1">Answer: 1</label>
                                            <input type="text" style="border:2px solid black;" class="form-control" id="answerField1" name="answerField1" required>
                                        </div>
                                    </div>
                                    <div id="dynamicFieldsContainer"></div>
                                    <button type="button" class="btn btn-secondary" onclick="addQuestionAndAnswerFields()">Add Question and Answer Fields</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="deleteLastField()">Delete Last Field</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="saveChanges5()">Save changes</button>
                            </div>

                        </div>
                    </div>
                </div>
            <!-- MODAL END FOR SECTION5 -->

            <!-- <div class="modal fade" id="twoWords" tabindex="-1" role="dialog" aria-labelledby="twoWordsLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="twoWordsLabel">Add Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="audioInput">Audio:</label>
                                <input type="file" class="form-control" id="audioInput" accept="audio/*">
                            </div>
                            <div class="form-group">
                                <label for="questionInput"><b>Question 1</b></label>
                                <input type="text" class="form-control" id="questionInput">
                            </div>
                            <div class="option-container">
                                <label for="option1"><b>Option 1</b></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="option1" name="options[]" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="correctOption1" id="correctOption1">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="option-container">
                                <label for="option1"><b>Option 2</b></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="option2" name="options[]" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="correctOption1" id="correctOption1">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="option-container">
                                <label for="option1"><b>Option 3</b></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="option3" name="options[]" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="correctOption1" id="correctOption1">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="option-container">
                                <label for="option1"><b>Option 4</b></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="option4" name="options[]" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="correctOption1" id="correctOption1">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" id="addQuestionBtn">Add Another Question</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script>
                function submitForm() {
                    // You can add your form submission logic here
                    // For example, you can use AJAX to send the form data to the server
                    // After submitting the form, you may want to close the modal
                    $('#audioModal').modal('hide');
                }
            </script>
            <!-- MODAL section 1 -->
                <script>
                    function insertPlaceholder(questionId, placeholder) {
                        var questionInput = document.getElementById(questionId);
                        var answerId = questionId.replace("question", "answer");
                        var answerInput = document.getElementById(answerId);

                        // Get the cursor position
                        var cursorPos = questionInput.selectionStart;

                        // Insert the placeholder at the current cursor position
                        var currentValue = questionInput.value;
                        var newValue = currentValue.substring(0, cursorPos) + placeholder + currentValue.substring(cursorPos);
                        questionInput.value = newValue;

                        // Move the cursor after the inserted placeholder
                        questionInput.selectionStart = cursorPos + placeholder.length;
                        questionInput.selectionEnd = cursorPos + placeholder.length;

                        // Set focus on the corresponding answer input
                        answerInput.focus();
                    }
                    function caps(batchcodeField) {
                        // Check if the input contains any lowercase letters
                        if (/[a-z]/.test(batchcodeField.value)) {
                            // Convert the entire input to uppercase
                            batchcodeField.value = batchcodeField.value.toUpperCase();
                        }
                    }

                </script>
                <!-- ============================================================== -->
                <!-- database -->
                <!-- ============================================================== -->
                    <script>
                        function saveChanges() {
                            var formData = new FormData(document.getElementById('section1Form'));

                            // Collect questions and answers
                            for (var i = 1; i <= 10; i++) {
                                formData['question' + i] = document.getElementById('section1Modalquestion' + i).value;
                                formData['answer' + i] = document.getElementById('section1Modalanswer' + i).value;
                            }
                            // for (var i = 1; i <= 2; i++) {
                            //     alert(formData['question' + i]);
                            //     alert(formData['answer' + i]);
                                
                            // }

                            //Perform AJAX request to save data
                            $.ajax({
                                type: 'POST',
                                url: 'save_data.php',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    console.log(response);

                                    // Alert before reloading
                                    alert('Data saved successfully');

                                    // Refresh the page
                                    location.reload();
                                },
                                error: function (error) {
                                    console.error('Error saving data:', error);
                                }
                            });
                        }
                    </script>
                <!-- ============================================================== -->
                <!-- END -->
                <!-- ============================================================== -->
            <!-- MODAL section 1 END -->

            <!-- MODAL section 2 -->
                <script>
                    // Function to update radio button values based on text input

                    function updateRadioValue(questionCount, option) {
                        var selectedValue = document.getElementById(`optionaudioModalLabel${option}_${questionCount}`).value;
                        document.getElementById(`correctAnswer${questionCount}`).value = selectedValue;
                    }



                    // Function to delete the last added question

                    function deleteLastQuestion() {
                        var questionsContainer = document.getElementById('questionsContainer');
                        var lastQuestion = questionsContainer.lastElementChild;

                        if (lastQuestion && lastQuestion.classList.contains('question-container')) {
                            questionsContainer.removeChild(lastQuestion);
                            updateQuestionCount();
                        }
                    }
                    
                    // Function to update question count

                    function updateQuestionCount() {
                        var questionCount = document.querySelectorAll('.question-container').length;
                        var questionCountInput = document.getElementById('questionText');
                        
                        questionCountInput.value = questionCount;                       
                        console.log('Updated question count:', questionCount);
                    }


                    // Function to add a new question dynamically

                    function addQuestion() {
                        console.log('Adding a question');                      
                        var questionCount = document.querySelectorAll('.question-container').length + 1;
                        console.log('Question count:', questionCount);
                        document.getElementById('questionText').value = questionCount;
                        console.log('Hidden field value:', document.getElementById('questionText').value);

                        
                        // Create new question container
                        var newQuestion = document.createElement('div');
                        newQuestion.className = 'form-group question-container';
                        newQuestion.id = 'questionContainer' + questionCount;
                        newQuestion.innerHTML = `
                            <label for="question${questionCount}"><b>QUESTION ${questionCount}</b></label>
                            <input type="text" style="border:2px solid black;" class="form-control" id="questionaudioModalLabel_${questionCount}" name="questionaudioModalLabel_${questionCount}" placeholder="Enter your question" autocomplete="none" required>
                            <input type="hidden" name="correctAnswer${questionCount}" id="correctAnswer${questionCount}">
                            <label for="">(mark the correct answer)</label>
                            <div class="options-container">
                                <div class="option-container">
                                    <label for="optionaudioModalLabelA_${questionCount}"><b>Option A</b></label>
                                    <div class="input-group">
                                        <input type="text" style="border:1px solid black;" class="form-control" id="optionaudioModalLabelA_${questionCount}" name="optionaudioModalLabelA_${questionCount}" autocomplete="none" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text btn btn-success">
                                                <input type="radio" class="btn btn-success" name="correctOptionaudioModalLabelA_${questionCount}" id="correctOptionaudioModalLabelA_${questionCount}" onclick="updateRadioValue(${questionCount}, 'A')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="option-container">
                                    <label for="optionaudioModalLabelB_${questionCount}"><b>Option B</b></label>
                                    <div class="input-group">
                                        <input type="text" style="border:1px solid black;" class="form-control" id="optionaudioModalLabelB_${questionCount}" name="optionaudioModalLabelB_${questionCount}" autocomplete="none" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text btn btn-success">
                                                <input type="radio" class="btn btn-success" name="correctOptionaudioModalLabelB_${questionCount}" id="correctOptionaudioModalLabelB_${questionCount}" onclick="updateRadioValue(${questionCount}, 'B')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="option-container">
                                    <label for="optionaudioModalLabelC_${questionCount}"><b>Option C</b></label>
                                    <div class="input-group">
                                        <input type="text" style="border:1px solid black;" class="form-control" id="optionaudioModalLabelC_${questionCount}" name="optionaudioModalLabelC_${questionCount}" autocomplete="none" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text btn btn-success">
                                                <input type="radio" class="btn btn-success" name="correctOptionaudioModalLabelC_${questionCount}" id="correctOptionaudioModalLabelC_${questionCount}" onclick="updateRadioValue(${questionCount}, 'C')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        // Append the new question container to the questions container
                        document.getElementById('questionsContainer').appendChild(newQuestion);
                    }


                    // Function to submit the form

                    function submitForm() {
                        // console.log('Submitting the form');
                        // Create a FormData object from the form

                        console.log('Submitting the form');
                        var formData = new FormData(document.getElementById('audioForm'));

                        // Ensure 'formType' value is included in the FormData object
                        formData.append('formType', 'section2Form');
                        // console.log(formData);
                        // printing values 
                        for (var pair of formData.entries()) {
                            console.log(pair[0] + ', ' + pair[1]);
                        }
                        // Perform AJAX request to save data
                        $.ajax({
                            type: 'POST',
                            url: 'save_data.php',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                console.log(response);
                                alert('Data saved successfully');

                                // Refresh the page
                                location.reload();
                            },
                            error: function (error) {
                                console.error('Error saving data:', error);
                            }
                        });
                    }
                </script>

            <!--MODAL section 2 END -->

            <!-- MODAL section 3 -->
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        // Get all checkboxes with the class "correctOptionCheckbox"
                        var checkboxes = document.querySelectorAll('.correctOptionCheckbox');

                        // Attach a click event listener to each checkbox
                        checkboxes.forEach(function (checkbox) {
                            checkbox.addEventListener("click", function () {
                                // Extract the question index from the checkbox's data attribute
                                var questionIndex = checkbox.dataset.questionIndex;

                                // Get the corresponding optiontwoWordsLabel field for the clicked checkbox
                                var optionLabelId = checkbox.id.replace("correctOption", "optiontwoWordsLabel");
                                var optionLabelField = document.getElementById(optionLabelId);

                                // Get the hidden input field for the current question
                                var hiddenInput = document.getElementById(`selectedOptionsData${questionIndex}`);

                                // Check if the elements are found before accessing their properties
                                if (optionLabelField && hiddenInput) {
                                    // Update the hidden input field value with the optiontwoWordsLabel field value
                                    if (checkbox.checked) {
                                        hiddenInput.value = optionLabelField.value;
                                        alert(`Value ${optionLabelField.value} stored for Question ${questionIndex}`);
                                    } else {
                                        hiddenInput.value = "";
                                        alert(`Value cleared for Question ${questionIndex}`);
                                    }
                                } else {
                                    console.error("Elements not found. Check IDs and HTML structure.");
                                }
                            });
                        });
                    });

                </script>
                <script>
                    // Function to add a new question in the modal
                    function addTwoWordsQuestion() {
                        // Get the current question count
                        var currentQuestionCount = parseInt($('#questionCount').val());

                        // Print the current question count before updating
                        console.log('Question Count Before: ', currentQuestionCount);

                        // Increment the question count
                        var newQuestionCount = currentQuestionCount + 1;

                        // Update the hidden field with the new question count
                        $('#questionCount').val(newQuestionCount);

                        // Print the updated question count
                        console.log('Question Count After: ', newQuestionCount);

                        // Display a label indicating the addition of a question
                        var additionLabel = `<div class="alert alert-success mt-2" role="alert">Question added successfully!</div>`;
                        $('#questionsContainer').append(additionLabel);

                        // Create the new question HTML
                        var questionIndex = $('.question-container-two-words').length + 2;
                        var newQuestion = `
                            <div class="form-group question-container-two-words">
                                <label for="questionTwoWords${questionIndex}"><b>Question ${questionIndex}</b></label>
                                <input type="hidden" name="selectedOptionsData${questionIndex}" id="selectedOptionsData${questionIndex}">
                                <input type="text"  style="border:2px solid black;" class="form-control" id="questiontwoWordsLabel${questionIndex}" name="questiontwoWordsLabel${questionIndex}" placeholder="Enter your question">
                                <label for="heading">(make sure that the only two checkbox is selected)</label>
                                <div class="options-container">
                                    <div class="option-container">
                                        <label for="optionTwoWords${questionIndex}"><b>Option A</b></label>
                                        <div class="input-group">
                                            <input type="text" style="border:1px solid black;" class="form-control" id="optiontwoWordsLabelA${questionIndex}" name="optiontwoWordsLabelA${questionIndex}" required> &nbsp;&nbsp;
                                            <div class="input-group-append">
                                                <div class="input-group-text btn btn-info">
                                                    <input type="checkbox" class="btn btn-info" name="correctOptiontwoWordsLabelA${questionIndex}" id="correctOptiontwoWordsLabelA${questionIndex}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="option-container">
                                        <label for="optionTwoWords${questionIndex}"><b>Option B</b></label>
                                        <div class="input-group">
                                            <input type="text" style="border:1px solid black;" class="form-control" id="optiontwoWordsLabelB${questionIndex}" name="optiontwoWordsLabelB${questionIndex}" required>&nbsp;&nbsp;
                                            <div class="input-group-append">
                                                <div class="input-group-text btn btn-info">
                                                    <input type="checkbox" class="btn btn-info" name="correctOptiontwoWordsLabelB${questionIndex}" id="correctOptiontwoWordsLabelB${questionIndex}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="option-container">
                                        <label for="optionTwoWords${questionIndex}"><b>Option C</b></label>
                                        <div class="input-group">
                                            <input type="text" style="border:1px solid black;" class="form-control" id="optiontwoWordsLabelC${questionIndex}" name="optiontwoWordsLabelC${questionIndex}" required> &nbsp;&nbsp;
                                            <div class="input-group-append">
                                                <div class="input-group-text btn btn-info">
                                                    <input type="checkbox" class="btn btn-info" name="correctOptiontwoWordsLabelC${questionIndex}" id="correctOptiontwoWordsLabelC${questionIndex}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="option-container">
                                        <label for="optionTwoWords${questionIndex}"><b>Option D</b></label>
                                        <div class="input-group">
                                            <input type="text" style="border:1px solid black;" class="form-control" id="optiontwoWordsLabelD${questionIndex}" name="optiontwoWordsLabelD${questionIndex}" required> &nbsp;&nbsp;
                                            <div class="input-group-append">
                                                <div class="input-group-text btn btn-info">
                                                    <input type="checkbox" class="btn btn-info" name="correctOptiontwoWordsLabelD${questionIndex}" id="correctOptiontwoWordsLabelD${questionIndex}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>`;

                        // Append the new question to the container
                        $('#twoWordsForm').find('#questionsContainer').append(newQuestion);
                    }

                    // Event listener for the "Add Another Question" button in the second modal
                    $('#addQuestionBtnTwoWords').on('click', function (e) {
                    e.preventDefault();
                    addTwoWordsQuestion();
                    });
                    
                    function submitForm2() {

                        // Continue with form submission...
                        console.log('Submitting the form');

                        // Create a FormData object from the form
                        var formData = new FormData(document.getElementById('twoWordsForm'));

                        // Ensure 'formType' value is included in the FormData object
                        formData.append('formType', 'section3Form');
                        var questionCounter=document.getElementById(`questionCount`).value;

                        // Iterate through questions and options to collect data
                        // Loop through the questions
                        for (let i = 1; i <= questionCounter; i++) {
                            const question = document.getElementById(`questiontwoWordsLabel${i}`).value;
                            const selectedOptions = [];

                            // Collect options and check for correct ones
                            for (let j = 1; j <= 4; j++) {
                                const option = document.getElementById(`optiontwoWordsLabel${String.fromCharCode(64 + j)}${i}`).value;
                                const checkbox = document.getElementById(`correctOptiontwoWordsLabel${String.fromCharCode(64 + j)}${i}`);

                                if (checkbox.checked) {
                                    selectedOptions.push(option);
                                }
                            }

                            // Append question, selected options, and correct answers data to FormData
                            formData.append(`question${i}`, question);
                            formData.append(`selectedOptions${i}`, selectedOptions.join(','));
                            formData.append(`correctAnswer1${i}`, selectedOptions[0]); // Assuming the first selected option is correct
                            formData.append(`correctAnswer2${i}`, selectedOptions[1]); // Assuming the second selected option is correct

                            console.log(`Question ${i}: ${question}`);
                            console.log(`Selected Options ${i}: ${selectedOptions.join(', ')}`);
                        }

                        // Perform AJAX request to save data
                        $.ajax({
                            type: 'POST',
                            url: 'save_data.php',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                console.log(response);

                                // Alert success message
                                alert('Data saved successfully');

                                // Refresh the page
                                location.reload();
                            },
                            error: function (error) {
                                console.error('Error saving data:', error);
                            }
                        });

                    }
                </script>
            <!-- MODAL section 3 END -->

            <!-- section 4 -->
                <script>
                    function addPlaceholder() {
                        var textarea = document.getElementById('paragraphfillBlanksLabel');
                        var answerFieldsContainer = document.getElementById('answerFieldsContainerfillBlanksLabel');
                        var answerValuesInput = document.getElementById('answerValues');
                        var answerCountInput = document.getElementById('answerCount');
                        var placeholderNumber = textarea.dataset.placeholderNumber || 0;

                        // Increment the placeholder number
                        placeholderNumber++;

                        // Insert the placeholder at the current cursor position
                        var cursorPos = textarea.selectionStart;
                        var textBefore = textarea.value.substring(0, cursorPos);
                        var textAfter = textarea.value.substring(cursorPos);
                        textarea.value = textBefore + '(..........' + placeholderNumber + '.........)' + textAfter;

                        // Set the new placeholder number as a data attribute
                        textarea.dataset.placeholderNumber = placeholderNumber;

                        // Create a new answer text field
                        var newAnswerField = document.createElement('div');
                        newAnswerField.className = 'form-group answer-field';
                        newAnswerField.innerHTML = `<label for="answer">Answer for Blank ${placeholderNumber}:</label>` +
                            `<input type="text" style="border:1px solid grey;" class="form-control" id="answerFieldfillBlanksLabel${placeholderNumber}" name="answerFieldfillBlanksLabel${placeholderNumber}" required>`;
                        answerFieldsContainer.appendChild(newAnswerField);

                        // Set focus on the newly added answer field
                        var newAnswerInput = newAnswerField.querySelector('input');
                        if (newAnswerInput) {
                            newAnswerInput.focus();
                        }

                        // Update the answer count and set it in the hidden input field
                        answerCountInput.value = placeholderNumber;

                        // // Update the answer values and set them in the hidden input field
                        // var answerValues = [];
                        // for (var i = 1; i <= placeholderNumber; i++) {
                        //     var answerField = document.getElementById(`answerFieldfillBlanksLabel${i}`);
                        //     if (answerField) {
                        //         answerValues.push(answerField.value);
                        //     }
                        // }
                        // answerValuesInput.value = JSON.stringify(answerValues);

                        // // Print the updated answerValues array in the console
                        // console.log('Updated answerValues:', answerValues);

                    }
                    function submitFillBlanksForm() {
                        // Continue with form submission...
                        console.log('Submitting the fillBlanks form');

                        // Create a FormData object from the form
                        var formData = new FormData(document.getElementById('fillBlanksForm'));

                        // Ensure 'formType' value is included in the FormData object
                        formData.append('formType', 'section4Form');

                        // Get the number of placeholders (assuming you have a hidden input with id 'answerCount')
                        var answerCount = document.getElementById('answerCount').value;

                        // Iterate through placeholders to collect data
                        for (let i = 1; i <= answerCount; i++) {
                            const answer = document.getElementById(`answerFieldfillBlanksLabel${i}`).value;

                            // Append answer data to FormData
                            formData.append(`answer${i}`, answer);

                            console.log(`Answer ${i}: ${answer}`);
                        }

                        // Perform AJAX request to save data
                        $.ajax({
                            type: 'POST',
                            url: 'save_data.php', // Adjust the URL accordingly
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                console.log(response);

                                // Alert success message
                                alert('Data saved successfully');

                                // Optionally, you can close the fillBlanks modal or perform other actions
                                // Refresh the page
                                location.reload();

                            },
                            error: function (error) {
                                console.error('Error saving data:', error);
                            }
                        });
                    }

                </script>
            <!-- MODAL section 4 END -->

            <!-- section 5 -->
                <script>
                    function addQuestionAndAnswerFields() {
                        var dynamicFieldsContainer = document.getElementById('dynamicFieldsContainer');
                        var fieldCountElement = document.getElementById('fieldCount');

                        // Increment the field count
                        var fieldCount = parseInt(fieldCountElement.value) + 1;
                        fieldCountElement.value = fieldCount;

                        // Print the updated value to the console
                        console.log("Updated fieldCount:", fieldCount);

                        // Create a new form row
                        var newFormRow = document.createElement('div');
                        newFormRow.className = 'form-row mb-2';

                        // Create question input
                        var questionInput = document.createElement('div');
                        questionInput.className = 'col-md-6';
                        questionInput.innerHTML = '<label for="questionField' + fieldCount + '">Question: ' + fieldCount + '</label>' +
                            '<input type="text" style="border:2px solid black;" class="form-control" id="questionField' + fieldCount + '" name="questionField' + fieldCount + '" required>';
                        newFormRow.appendChild(questionInput);

                        // Create answer input
                        var answerInput = document.createElement('div');
                        answerInput.className = 'col-md-6';
                        answerInput.innerHTML = '<label for="answerField' + fieldCount + '">Answer: ' + fieldCount + '</label>' +
                            '<input type="text" style="border:2px solid black;" class="form-control" id="answerField' + fieldCount + '" name="answerField' + fieldCount + '" required>';
                        newFormRow.appendChild(answerInput);

                        // Append the new form row to the container
                        dynamicFieldsContainer.appendChild(newFormRow);
                    }
                    
                    function deleteLastField() {
                        var dynamicFieldsContainer = document.getElementById('dynamicFieldsContainer');
                        var fieldCountElement = document.getElementById('fieldCount');

                        // Get the last added form row
                        var lastFormRow = dynamicFieldsContainer.lastChild;

                        // Remove the last form row
                        if (lastFormRow) {
                            dynamicFieldsContainer.removeChild(lastFormRow);

                            // Decrement the field count
                            var fieldCount = parseInt(fieldCountElement.value) - 1;
                            fieldCount = Math.max(fieldCount, 1); // Ensure fieldCount is at least 1

                            // Update the fieldCount value
                            fieldCountElement.value = fieldCount;

                            // Print the updated value to the console
                            console.log("Updated fieldCount:", fieldCount);
                        } else {
                            console.log("No fields to delete.");
                        }
                    }

                    function saveChanges5() {
                        console.log('Submitting the form');

                        // Create a FormData object from the form
                        var formData = new FormData(document.getElementById('imageQuestionForm'));

                        // Ensure 'formType' value is included in the FormData object
                        formData.append('formType', 'section5Form');

                        // Perform AJAX request to save data
                        $.ajax({
                            type: 'POST',
                            url: 'save_data.php',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                console.log(response);
                                alert('Data saved successfully');

                                // Refresh the page
                                location.reload();
                            },
                            error: function (error) {
                                console.error('Error saving data:', error);
                            }
                        });
                    }
                </script>
            <!-- MODAL section 5 END -->
            
            <footer class="footer text-center"> 2021 © Major wit Admin brought to you by <a
                    href="https://www.wrappixel.com/">majorwit.com</a>
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
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>