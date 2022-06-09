<?php
if(!isset($_GET['liste_commandes'])){
    header('Location: ../index.php');
  }
getTousCommandesPourAdmin();

?>