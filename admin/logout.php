<?php
    session_start();
    // session_unset();
    // session_destroy();
    unset($_SESSION['admin']);
    header('Location: login.php');
?>