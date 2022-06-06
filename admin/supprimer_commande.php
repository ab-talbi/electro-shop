<?php
    
    require_once('../includes/connect.php');

    if(isset($_GET['supprimer_commande'])){


        $delete_commande = $con->prepare("DELETE FROM commande WHERE id_commande=?")->execute(array($_GET['supprimer_commande']));

        if($delete_commande){
            echo "
                <script>
                    alert('une commande à étè supprimer');
            
                    window.open('index.php?liste_commandes','_self');
            </script>";
        }
        

    } 
    

?>
