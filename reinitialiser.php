<?php
    session_start();
    unset($_SESSION['values']);
    unset($_SESSION['erreurs']);
    header('Location: registre.php');
?>