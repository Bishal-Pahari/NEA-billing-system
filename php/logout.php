<?php

// Destroy the session
session_destroy();

// Redirect to the login page or any desired location
header("Location: ../index.php");
exit();
?>