<!-- <?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create a new PHPMailer instance
$mail = new PHPMailer(true);
try {
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        ); 
    $mail->isSMTP();                    // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify your SMTP server (e.g., Gmail)
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'rovymvarghese2023b@mca.ajce.in';
    $mail->Password   = 'Rovy@2255';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;


    $mail->setFrom('rovymvarghese2023b@mca.ajce.in', 'Admin');
    $mail->addAddress('rovymvarghese2023b@mca.ajce.in','recipant');
    $mail->isHTML(true);
    $mail->Subject = 'Farmers Assistant';
    $mail->Body    = "Congratulations💐!! Officer to be a part of Farmers Assistant group. We look forward to your services.<br> 
                        You can log in to the website using<br>username";
    $mail->send();
    echo 'Email has been sent successfully.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?> -->

elseif ($formType === 'section2Form') {
    // Access form fields using $_POST or $_FILES array
    $audioFile = $_FILES['audioInput'];
    $audioFileName = $audioFile['name'];
    $targetDirectory = 'uploads/section2/';
    $targetPath = $targetDirectory . $audioFileName;

    // Move uploaded audio file to the target directory
    if (move_uploaded_file($audioFile['tmp_name'], $targetPath)) {
        // Access other form fields
        $batchCode = $_POST['batchCode'];

        // Prepare and execute the INSERT query for audio input
        $sqlAudio = "INSERT INTO tbl_audio (audio_id, audio_input) VALUES (NULL, ?)";
        $stmtAudio = $conn->prepare($sqlAudio);
        $stmtAudio->bind_param("s", $targetPath);

        
