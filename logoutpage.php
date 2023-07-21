<?php
// include 'destroy.php';
    session_start();
    // Destroy session
    // session_unset();
    //remove all the session variable
    if(session_destroy()) {
        // Redirecting To Home Page
        header("Location: loginpage.php");
    }
?>