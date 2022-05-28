<?php
    require_once('../../includes/connect.php');

    if(isset($_POST['ajouter_cat'])){

        $nom_categorie = htmlspecialchars($_POST['nom_cat']);

        if(!empty($nom_categorie)){
            //select les donnee(caterories)
            $select = $con->prepare('SELECT * FROM categories WHERE nom_categorie = ?');
            $select->execute(array($nom_categorie));
            $row = $select->rowCount();
            if($row>0){
                header('Location:../index.php?ajouter_categories=error');
            }
            else{
                
                //ajouter une categorie a la base de donnee
                $insert = $con->prepare('INSERT INTO categories(nom_categorie) VALUES(?)');
                $insert->execute(array($nom_categorie));
                
                if($insert){
                    header('Location:../index.php?ajouter_categories=success');
                }
            }
        }else {
            header('Location:../index.php?ajouter_categories=empty');
        }
    }

?>