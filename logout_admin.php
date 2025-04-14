<?php
session_start();

// Unset admin specific session variables
unset($_SESSION['admin_id']);
unset($_SESSION['admin_username']);
unset($_SESSION['is_admin']);

// Redirect to login page
header("Location: login.php");
exit();
?> 