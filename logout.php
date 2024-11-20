<?php
  // Start the session before destroying it
  session_start();

  // Destroy the session
  session_destroy();

  // Redirect to login page
  header('Location: login.php');
  exit(); // It's a good practice to call exit() after header redirection
?>
