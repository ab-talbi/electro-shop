<h2 class="text-center text-success my-4">Tous les produits</h2>

<?php
 if(!isset($_GET['liste_produits'])){
    header('Location: ../index.php');
}
getTousProduitsPourAdmin();

?>

