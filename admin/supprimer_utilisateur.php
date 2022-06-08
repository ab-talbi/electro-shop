<?php
    
    require_once('../includes/connect.php');

    if(isset($_GET['supprimer_utilisateur'])){

        $select_utilisateur = $con->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur=?");
        $select_utilisateur->execute(array($_GET['supprimer_utilisateur']));
        $data = $select_utilisateur->fetch();
        if($data['role'] != 1){
                
            $select_commande = $con->prepare("SELECT * FROM commande WHERE id_utilisateur=?");
            $select_commande->execute(array($_GET['supprimer_utilisateur']));
            $rows = $select_commande->rowCount();
            
            if($rows == 0){
                $delete_utilisateur = $con->prepare("DELETE FROM utilisateurs WHERE id_utilisateur=?")->execute(array($_GET['supprimer_utilisateur']));

                if($delete_utilisateur){
                    echo "
                        <script>
                            alert('un utilisateur à étè supprimer');
                    
                            window.open('index.php?liste_utilisateurs','_self');
                    </script>";
                }
            }else{
                echo "
                        <script>
                            alert('Il y a commande\(s\) pour ce client');
                    
                            window.open('index.php?liste_utilisateurs','_self');
                    </script>";
            }
        }else{
            echo "<script>
                     alert('impossible de supprimer ce compte!!  \'\'compte d\'administrateur\'\'');
                    
                    window.open('index.php?liste_utilisateurs','_self');
                </script>";
        }


    } 
    

?>
