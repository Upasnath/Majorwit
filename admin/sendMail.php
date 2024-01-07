<?php
    include('conn.php');
    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    function sendMail($e, $u, $p)
    {
        $email = $e;
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
            $mail->Username   = 'upasnath2023b@mca.ajce.in;
            $mail->Password   = 'Sandhyaupas@1502';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->setFrom('upasnath2023b@mca.ajce.in', 'Admin');
            $mail->addAddress($email,'recipant');
            $mail->isHTML(true);
            $mail->Subject = 'Major Wit';
            $mail->Body    = "Congratulations💐!! Student, to be a part of Major Wit group. We look forward to your services.<br>
            You can log in to the website using<br>username: $u<br>password: $p";
            $mail->send();
            return true;
            echo 'Email has been sent successfully.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    // Check if data is received through POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "inside if post";
        // Check if the 'allot' key is present in the POST data
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // echo "second if";
            // Retrieve the values from the POST data
            $u = isset($_POST['username']) ? $_POST['username'] : '';
            $p = isset($_POST['password']) ? $_POST['password'] : '';
            $e = isset($_POST['username']) ? $_POST['username'] : '';
            // echo $e;
            // echo $p;
            // echo $u;
            // Call the sendMail function with the retrieved values
            if (sendMail($e, $u, $p)) {
                echo "Details are sent to the mail";
                echo $sql = "UPDATE tbl_students SET credentails = 'sent' WHERE student_username ='$e' AND student_password = '$p'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                setTimeout(function () {
                    // Reload the page
                    location.reload();
                }, 5000);
            } 
            else {
                echo "Failed to send details to the mail";
            }
        } else {
            echo "Invalid request";
        }
    } else {
        echo "Invalid request method";
    }
?>
