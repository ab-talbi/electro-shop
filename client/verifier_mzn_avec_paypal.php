<?php
    session_start();
    if(isset($_GET['mode']) and isset($_GET['id'])){
        $_SESSION['mode_paiement'] = $_GET['mode'];
        $_SESSION['id_utilisateur'] = $_GET['id'];
        echo "<script>window.open('/Electro-Shop/client/les_commandes.php','_self')</script>";
    }


?>