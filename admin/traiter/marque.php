<?php
    require_once('../../includes/connect.php');

    if(isset($_POST['ajouter_marque'])){

        $nom_marque = htmlspecialchars($_POST['nom_marque']);

        if(!empty($nom_marque)){
            //select les donnee(marques)
            $select = $con->prepare('SELECT * FROM marques WHERE nom_marque = ?');
            $select->execute(array($nom_marque));
            $row = $select->rowCount();
            if($row>0){
                header('Location:../index.php?ajouter_marques=error');
            }
            else{

                //ajouter une marque a la base de donnee
                $insert = $con->prepare('INSERT INTO marques(nom_marque) VALUES(?)');
                $insert->execute(array($nom_marque));
                
                if($insert){
                    header('Location:../index.php?ajouter_marques=success');
                }
            }
        }else{
            header('Location:../index.php?ajouter_marques=empty');
        }
    }

?>