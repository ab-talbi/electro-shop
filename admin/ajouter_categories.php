<?php
    require_once('../includes/connect.php');

    if(isset($_POST['ajouter_cat'])){

        $nom_categorie = htmlspecialchars($_POST['nom_cat']);

        //select les donnee(caterories)
        $select = $con->prepare('SELECT * FROM categories WHERE nom_categorie = ?');
        $select->execute(array($nom_categorie));
        $row = $select->rowCount();
        if($row>0){
            echo "<script>Swal.fire({position: 'center',
                icon: 'error',
                title: 'La catégorie éxiste déjà',
                showConfirmButton: false,
                timer: 3000});
                </script>";
        }
        else{
            
            //ajouter une categorie a la base de donnee
            $insert = $con->prepare('INSERT INTO categories(nom_categorie) VALUES(?)');
            $insert->execute(array($nom_categorie));
            
            if($insert){
                echo "<script>Swal.fire({position: 'center',
                    icon: 'success',
                    title: 'La catégorie ajouté avec succès',
                    showConfirmButton: false,
                    timer: 3000});
                    </script>";
            }
        }
    }

?>
<h2 class="text-center">Ajouter une catégorie</h2>
<form action="" method="post" class="mb-2 mt-4">
<div class="input-group w-90 mb-2">
  <span class="input-group-text" style="background: #030026d8;" id="basic-addon1"><i class="fa-solid fa-file-invoice fa-xl" aria-hidden="true" style="color:#fff;"></i></span>
  <input type="text" class="fw-bold form-control" name="nom_cat" placeholder="Ajouter Catégories" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="fw-bold input-group w-90 mb-2 m-auto">
  <input type="submit" class="mt-2 btn btn-primary" name="ajouter_cat" value="Ajouter" aria-label="Username" aria-describedby="basic-addon1">
</div>
</form>