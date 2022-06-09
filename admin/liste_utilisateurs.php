<?php
if(!isset($_GET['liste_utilisateurs'])){
    header('Location: ../index.php');
}
afficherTousUtilisateurs();


?>