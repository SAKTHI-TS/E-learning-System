<?php  
session_start();
include "Utils/Util.php";

// Clear all session data
session_unset();
session_destroy();

// Set a proper logout message
$message = "Successfully logged out!";
header("Location: login.php?success=" . urlencode($message));
exit();