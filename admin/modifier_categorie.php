<?php

if(!isset($_GET['modifier_categorie'])){
    header('Location: ../index.php');
}

require_once('../includes/connect.php');
    if(isset($_GET['modifier_categorie'])){
        $id_categorie = $_GET['modifier_categorie'];
        $get_category = $con->prepare("SELECT * FROM categories WHERE id_categorie=?");
        $get_category->execute(array($id_categorie));
        $ligne = $get_category->fetch();
        $nom_categorie = $ligne['nom_categorie'];
    }

    if(isset($_POST['Modifier_categorie_btn'])){
        $update_category = $con->prepare("UPDATE categories SET nom_categorie=:nom_categorie WHERE id_categorie=:id_categorie");
        $update_category->execute(array(":nom_categorie"=>$_POST['nomCategorie'],
                                        "id_categorie"=>$id_categorie));
        if($update_category){
            echo "
                <script>
                    alert('une catéegorie à étè modifier');
             
                    window.open('index.php?liste_categories','_self');
               </script>";
        }
    }

?>


<div class="container mt-3">
    <h2 class="text-center text-success my-4">Modifier categorie</h2>

    <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="nomCategorie" class="form-label">Nom de la categorier <span style="color:red">*</span></label>
            <input type="text" name="nomCategorie" id="nomCategorie" value="<?php echo $nom_categorie; ?>" class="form-control" autocomplete="off">
        </div>
        <div class="fw-bold input-group w-50 m-auto">
            <input type="submit" class="mt-2 btn btn-ajouter" name="Modifier_categorie_btn" value="Modifier" aria-describedby="basic-addon1">
        </div>
    </form>
</div>
