<?php
session_start();

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired location
header("Location: ../signin.php");
exit();
?>
