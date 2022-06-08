<?php
    // if(isset($_SESSION['nom_utilisateur'])){
    //     echo "<script>window.open('/Electro-Shop/index.php','_self')</script>";
    // }
    require_once('../includes/connect.php');
?>
<h2 class="text-center text-success my-4">Les Promos</h2>

<table class="table mt-5">
    <thead class="bg-success text-light">
        <tr class="text-center">
            <th>#</th>
            <th>Le Code Promos</th>
            <th>Pourcentage</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody class="bg-light" >

        <?php
            $number = 1;
            $select_remise = $con->query('SELECT * FROM remise');
            while($ligne = $select_remise->fetch(PDO::FETCH_OBJ)){    
        ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $ligne->nom_remise; ?></td>
            <td><?php echo $ligne->pourcentage_remise; ?></td>
            
            <td><a href="index.php?modifier_promos=<?php echo $ligne->id_remise; ?>" class="text-black"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><button value="index.php?supprimer_promos=<?php echo $ligne->id_remise; ?>" 
            type="button" class=" fa-solid fa-trash btn text-black confirme" data-bs-toggle="modal" data-bs-target="#exampleModal">
            </button></td>
        </tr>
        <?php
            $number++;
            }
        ?>
    </tbody>
</table>

<form action="" method="post" class="mb-2 mt-4">
<div class="input-group w-90 mb-2">
  <span class="input-group-text" style="background: #030026d8;" id="basic-addon1"><i class="fa-solid fa-file-invoice fa-xl" aria-hidden="true" style="color:#fff;"></i></span>
  <input type="text" class="fw-bold form-control" name="nom_remise" placeholder="Ajouter Un Code Promos" aria-describedby="basic-addon1">
  <input type="number" class="fw-bold form-control" name="pourcentage_remise" placeholder="Pourcentage de reduction" aria-describedby="basic-addon1">
</div>
<div class="fw-bold input-group w-90 mb-2 m-auto">
  <input type="submit" class="mt-2 btn btn-ajouter" name="ajouter_promos" value="Ajouter" aria-describedby="basic-addon1">
</div>
</form>


<?php
if(isset($_GET['supprimer_promos'])){

    $select_promos = $con->prepare("SELECT * FROM remise WHERE id_remise=?");
    $select_promos->execute(array($_GET['supprimer_promos']));
    $rows = $select_promos->rowCount();
    if($rows > 0){
        $delete_promos = $con->prepare("DELETE FROM remise WHERE id_remise=?")->execute(array($_GET['supprimer_promos']));

        if($delete_promos){
            echo "<script>Swal.fire({position: 'center',
                icon: 'success',
                title: 'promos à étè supprimer',
                showConfirmButton: true}).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire(
                        window.open('index.php?liste_promos','_self')
                      )
                    }else{
                        window.open('index.php?liste_promos','_self')
                    }
                  });
                </script>";
        }
    }else{
        echo "<script>Swal.fire({position: 'center',
            icon: 'error',
            title: 'Promos n\'existe pas',
            showConfirmButton: true}).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    window.open('index.php?liste_promos','_self')
                  )
                }else{
                    window.open('index.php?liste_promos','_self')
                }
              });
            </script>";
    }

} 




if(isset($_POST['ajouter_promos'])){
        

    $nom_remise = htmlspecialchars($_POST['nom_remise']);
    $pourcentage_remise = htmlspecialchars($_POST['pourcentage_remise']);

    if($pourcentage_remise>100 or $pourcentage_remise < 0){
        echo "<script>Swal.fire({position: 'center',
            icon: 'error',
            title: 'Le pourcentage doit etre entre 0 et 100',
            showConfirmButton: true}).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    window.open('./index.php?liste_promos','_self')
                  )
                }else{
                    window.open('./index.php?liste_promos','_self')
                }
              });
            </script>";
    }elseif(!empty($nom_remise) and !empty($pourcentage_remise)){

        $select = $con->prepare('SELECT * FROM remise WHERE nom_remise = ?');
        $select->execute(array($nom_remise));
        $row = $select->rowCount();
        if($row>0){
            echo "<script>Swal.fire({position: 'center',
                icon: 'error',
                title: 'Ce code promos, déjà ajouté',
                showConfirmButton: true}).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire(
                        window.open('./index.php?liste_promos','_self')
                      )
                    }else{
                        window.open('../index.php?liste_promos','_self')
                    }
                  });
                </script>";
        }
        else{
            
            //ajouter une remise a la base de donnee
            $insert = $con->prepare('INSERT INTO remise(nom_remise,pourcentage_remise) VALUES(:nom_remise,:pourcentage_remise)');
            $insert->execute(array(":nom_remise"=>$nom_remise,":pourcentage_remise"=>$pourcentage_remise));
            
            if($insert){
                echo "<script>Swal.fire({position: 'center',
                    icon: 'success',
                    title: 'Le Promos est ajouté avec succes',
                    showConfirmButton: true}).then((result) => {
                        if (result.isConfirmed) {
                          Swal.fire(
                            window.open('./index.php?liste_promos','_self')
                          )
                        }else{
                            window.open('./index.php?liste_promos','_self')
                        }
                      });
                    </script>";
            }
        }
    }else {
        echo "<script>Swal.fire({position: 'center',
            icon: 'error',
            title: 'Remplir d\'abord les deux champs',
            showConfirmButton: true}).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    window.open('./index.php?liste_promos','_self')
                  )
                }else{
                    window.open('./index.php?liste_promos','_self')
                }
              });
            </script>";
    }
}

?>