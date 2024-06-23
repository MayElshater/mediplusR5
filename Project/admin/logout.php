<?php
session_start();

// Destroy the session
session_destroy();

// Redirect the user to login.php
header("Location: login.php");
exit; // Make sure to exit after redirecting
?>
