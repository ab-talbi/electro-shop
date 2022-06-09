<?php
if(!isset($_GET['modifier_promos'])){
    header('Location: ../index.php');
}
require_once('../includes/connect.php');
    if(isset($_GET['modifier_promos'])){
        $id_remise = $_GET['modifier_promos'];
        $get_remise = $con->prepare("SELECT * FROM remise WHERE id_remise=?");
        $get_remise->execute(array($id_remise));
        $ligne = $get_remise->fetch();
        $nom_remise = $ligne['nom_remise'];
        $pourcentage_remise = $ligne['pourcentage_remise'];
    }

    if(isset($_POST['Modifier_remise_btn'])){
        $select = $con->prepare('SELECT * FROM remise WHERE nom_remise = ?');
        $select->execute(array($_POST['nomRemise']));
        $row = $select->rowCount();
        if($row>0){
            echo "<script>Swal.fire({position: 'center',
                icon: 'error',
                title: 'Ce code promos, existe déjà',
                showConfirmButton: true}).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire(
                        window.open('./index.php?modifier_promos=$id_remise','_self')
                      )
                    }else{
                        window.open('../index.php?modifier_promos=$id_remise','_self')
                    }
                  });
                </script>";
        }else{
            $update_remise = $con->prepare("UPDATE remise SET nom_remise=:nom_remise, pourcentage_remise=:pourcentage_remise WHERE id_remise=:id_remise");
            $update_remise->execute(array(":nom_remise"=>$_POST['nomRemise'],":pourcentage_remise"=>$_POST['pourcentage_remise'],
                                            "id_remise"=>$id_remise));
            if($update_remise){
               echo "<script>Swal.fire({position: 'center',
                icon: 'success',
                title: 'une remise à étè modifier',
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
        }
        
    }

?>


<div class="container mt-3">
    <h2 class="text-center text-success my-4">Modifier Promos</h2>

    <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="nomRemise" class="form-label">Code Promos <span style="color:red">*</span></label>
            <input type="text" name="nomRemise" id="nomRemise" value="<?php echo $nom_remise; ?>" class="form-control" autocomplete="off">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="pourcentage_remise" class="form-label">Pourcentage <span style="color:red">*</span></label>
            <input type="text" name="pourcentage_remise" id="pourcentage_remise" value="<?php echo $pourcentage_remise; ?>" class="form-control" autocomplete="off">
        </div>
        <div class="fw-bold input-group w-50 m-auto">
            <input type="submit" class="mt-2 btn btn-ajouter w-100" name="Modifier_remise_btn" value="Modifier" aria-describedby="basic-addon1">
        </div>
    </form>
</div>
