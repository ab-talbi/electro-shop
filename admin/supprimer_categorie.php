<?php
    
    require_once('../includes/connect.php');

    if(isset($_GET['supprimer_categorie'])){

        $select_produits = $con->prepare("SELECT * FROM produits WHERE id_categorie=?");
        $select_produits->execute(array($_GET['supprimer_categorie']));
        $rows = $select_produits->rowCount();
        if($rows == 0){
            $delete_category = $con->prepare("DELETE FROM categories WHERE id_categorie=?")->execute(array($_GET['supprimer_categorie']));

            if($delete_category){
                echo "
                    <script>
                        alert('une categorie à étè sipprimer');
                
                        window.open('index.php?liste_categories','_self');
                </script>";
            }
        }else{
            echo "
                    <script>
                        alert('Il y a prosuit\(s\) avec cette categorie');
                 
                        window.open('index.php?liste_categories','_self');
                   </script>";
        }

    } 
    

?>
