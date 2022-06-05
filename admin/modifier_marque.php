<?php

require_once('../includes/connect.php');

    if(isset($_GET['modifier_marque'])){
        $id_marque = $_GET['modifier_marque'];
        $get_marque = $con->prepare("SELECT * FROM marques WHERE id_marque=?");
        $get_marque->execute(array($id_marque));
        $ligne = $get_marque->fetch();
        $nom_marque = $ligne['nom_marque'];
    }

    if(isset($_POST['Modifier_marque_btn'])){
        $update_marque = $con->prepare("UPDATE marques SET nom_marque=:nom_marque WHERE id_marque=:id_marque");
        $update_marque->execute(array(":nom_marque"=>$_POST['nomMarque'],
                                        "id_marque"=>$id_marque));
        if($update_marque){
            echo "
                <script>
                    alert('une marque à étè modifier');
             
                    window.open('index.php?liste_marques','_self');
               </script>";
        }
    }

?>


<div class="container mt-3">
    <h2 class="text-center text-success my-4">Modifier marque</h2>

    <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="nomMarque" class="form-label">Nom de la marque <span style="color:red">*</span></label>
            <input type="text" name="nomMarque" id="nomMarque" value="<?php echo $nom_marque; ?>" class="form-control" autocomplete="off">
        </div>
        <div class="fw-bold input-group w-50 m-auto">
            <input type="submit" class="mt-2 btn btn-ajouter" name="Modifier_marque_btn" value="Modifier" aria-describedby="basic-addon1">
        </div>
    </form>
</div>
