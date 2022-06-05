<?php
    require_once('../includes/connect.php');

    if(isset($_GET['supprimer_produit'])){
        $id_produit = $_GET['supprimer_produit'];
        
        $delete_produit = $con->prepare("DELETE FROM produits WHERE id_produit=?")->execute(array($id_produit));
        
        if($delete_produit){
            echo "
                <script>
                    alert('un produit à étè sipprimer');
             
                    window.open('index.php?liste_produits','_self');
               </script>";
        }
    }

?>