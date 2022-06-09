<?php
    session_start();
    unset($_SESSION['nom_utilisateur']);
    header('Location: index.php');
?>