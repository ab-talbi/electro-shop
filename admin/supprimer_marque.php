<?php
    
    require_once('../includes/connect.php');

    if(isset($_GET['supprimer_marque'])){

        $select_produits = $con->prepare("SELECT * FROM produits WHERE id_marque=?");
        $select_produits->execute(array($_GET['supprimer_marque']));
        $rows = $select_produits->rowCount();
        if($rows == 0){
            $delete_marque = $con->prepare("DELETE FROM marques WHERE id_marque=?")->execute(array($_GET['supprimer_marque']));

            if($delete_marque){
                echo "
                    <script>
                        alert('une marque à étè sipprimer');
                 
                        window.open('index.php?liste_marques','_self');
                   </script>";
            }
        }else{
            echo "
                    <script>
                        alert('Il y a prosuit\(s\) avec cette marque');
                 
                        window.open('index.php?liste_marques','_self');
                   </script>";
        }
       
    }

?>


