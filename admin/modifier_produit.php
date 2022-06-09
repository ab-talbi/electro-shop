<?php
if(!isset($_GET['modifier_produit'])){
    header('Location: ../index.php');
}
    if(isset($_GET['modifier_produit'])){
        $id_produit = $_GET['modifier_produit'];
        $select_data_produit  = $con->prepare("SELECT * FROM produits WHERE id_produit = ?");
        $select_data_produit->execute(array($id_produit));
        $data = $select_data_produit->fetch();
        $nom_produit = $data['nom_produit'];
        $description_produit = $data['description_produit'];
        $mots_cles = $data['mots_cles'];
        $produit_image1 = $data['produit_image1'];
        $produit_image2 = $data['produit_image2'];
        $produit_image3 = $data['produit_image3'];
        $produit_image4 = $data['produit_image4'];
        $produit_image5 = $data['produit_image5'];
        $prix_produit = $data['prix_produit'];
        $stock = $data['stock'];
        $id_categorie = $data['id_categorie'];
        $id_marque = $data['id_marque'];

        $select_categories = $con->prepare("SELECT * FROM categories WHERE id_categorie = $id_categorie");
        $select_categories->execute();
        $categorie = $select_categories->fetch();
        $nom_categorie = $categorie['nom_categorie'];

        $select_marques = $con->prepare("SELECT * FROM marques WHERE id_marque = $id_marque");
        $select_marques->execute();
        $marque = $select_marques->fetch();
        $nom_marque = $marque['nom_marque'];
    }

?>



<h2 class="text-center text-success my-4">Modifier Le Produit : <?php echo $nom_produit ?></h2>


<form class="w-50 m-auto" action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4" style="width:100%">
            <label for="nom_produit" class="form-label">Nom Produit <span style="color:red">*</span></label>
            <input type="text" name="nom_produit" id="nom_produit" class="form-control w-100" value="<?php echo $nom_produit ?>">
        </div>
        <div class="form-outline mb-4">
            <!-- <label for="description_produit" class="form-label">Description <span style="color:red">*</span></label>
            <input type="text" name="description_produit" id="description_produit" class="form-control w-100" value="<?php echo $description_produit ?>"> -->

            <label for="description_produit" class="form-label">Description <span style="color:red">*</span></label>
            <textarea class="form-control w-100" name="description_produit" id="description_produit" cols="30" rows="10"><?php echo $description_produit ?></textarea>
        </div>
        <div class="form-outline mb-4">
            <label for="mots_cles" class="form-label">Mots Cles <span style="color:red">*</span></label>
            <input type="text" name="mots_cles" id="mots_cles" class="form-control w-100" value="<?php echo $mots_cles ?>">
        </div>
        <div class="form-outline mb-4">
            <label for="categorie" class="form-label">Catégorie <span style="color:red">*</span></label>
            <select name="categorie" id="categorie" class="form-select">
                <option value="<?php echo $id_categorie; ?>"><?php echo $nom_categorie; ?></option>
                <?php getCategoriesAdminSelect(); ?>
            </select>
        </div>
        <div class="form-outline mb-4">
            <label for="marque" class="form-label">Marque <span style="color:red">*</span></label>
            <select name="marque" id="marque" class="form-select">
                <option value="<?php echo $id_marque; ?>"><?php echo $nom_marque; ?></option>
                <?php getMarquesAdminSelect(); ?>
            </select>
        </div>
        <div class="form-outline mb-4">
            <label for="produit_image1">Image 1 <span style="color:red">*</span></label>
            <div class="d-flex">
                <input type="file" name="produit_image1" id="produit_image1" class="form-control <?php if($produit_image1 != '') echo "w-90"; else echo "w-100"; ?> m-auto" value="">
                <?php if($produit_image1 != '') echo "<img src='./produits_images/$produit_image1' style='width:100px'>";?>
                
            </div>
        </div>
        <div class="form-outline mb-4">
            <label for="produit_image2">Image 2</label>
            <div class="d-flex">
                <input type="file" name="produit_image2" id="produit_image2" class="form-control <?php if($produit_image2 != '') echo "w-90"; else echo "w-100"; ?> m-auto" value="">
                <?php if($produit_image2 != '') echo "<img src='./produits_images/$produit_image2' style='width:100px'>";?>
            </div>
        </div>
        <div class="form-outline mb-4">
            <label for="produit_image3">Image 3</label>
            <div class="d-flex">
                <input type="file" name="produit_image3" id="produit_image3" class="form-control <?php if($produit_image3 != '') echo "w-90"; else echo "w-100"; ?> m-auto" value="">
                <?php if($produit_image3 != '') echo "<img src='./produits_images/$produit_image3' style='width:100px'>";?>
            </div>
        </div>
        <div class="form-outline mb-4">
            <label for="produit_image4">Image 4</label>
            <div class="d-flex">
                <input type="file" name="produit_image4" id="produit_image4" class="form-control <?php if($produit_image4 != '') echo "w-90"; else echo "w-100"; ?> m-auto" value="">
                <?php if($produit_image4 != '') echo "<img src='./produits_images/$produit_image4' style='width:100px'>";?>
            </div>
        </div>
        <div class="form-outline mb-4">
            <label for="produit_image5">Image 5</label>
            <div class="d-flex">
                <input type="file" name="produit_image5" id="produit_image5" class="form-control <?php if($produit_image5 != '') echo "w-90"; else echo "w-100"; ?> m-auto" value="">
                <?php if($produit_image5 != '') echo "<img src='./produits_images/$produit_image5' style='width:100px'>";?>
            </div>
        </div>
        <div class="form-outline mb-4">
            <label for="stock">Quantité stocké <span style="color:red">*</span></label>
            <input type="number" name="stock" id="stock" class="form-control" value="<?php echo $stock ?>">
        </div>
        <div class="form-outline mb-4">
            <label for="prix_produit">Prix <span style="color:red">*</span></label>
            <input type="text" name="prix_produit" id="prix_produit" class="form-control" value="<?php echo $prix_produit ?>">
        </div>
        <div class="form-outline mb-2">
            <input type="submit" name="modifier_btn_produit" class="btn btn-primary form-control w-100 m-auto" value="Modifier">
        </div>
        <div class="form-outline mb-5">
            <button class="btn btn-secondary form-control w-100 m-auto"><a class="text-light" href="./index.php?liste_produits">Retour à La liste</a></button>
        </div>
    </form>



    <?php

if(isset($_POST['modifier_btn_produit'])){
    $go = 0;
    $nom_produit = htmlspecialchars($_POST['nom_produit']);
    $description_produit = htmlspecialchars($_POST['description_produit']);
    $mots_cles = htmlspecialchars($_POST['mots_cles']);
    $prix_produit = htmlspecialchars($_POST['prix_produit']);
    $stock = htmlspecialchars($_POST['stock']);
    $id_categorie = htmlspecialchars($_POST['categorie']);
    $id_marque = htmlspecialchars($_POST['marque']);

    $not_go = 1;
    if($nom_produit == '' or $description_produit == '' or $mots_cles == '' or $prix_produit == '' or $stock == '' or $id_categorie == '' or $id_marque == '' or $id_categorie == 0 or $id_marque == 0){
        $not_go = 0;
    }

    $produit_image1_post = $_FILES['produit_image1']['name'];
    $produit_image1_tmp_post = $_FILES['produit_image1']['tmp_name'];

    $produit_image2_post = $_FILES['produit_image2']['name'];
    $produit_image2_tmp_post = $_FILES['produit_image2']['tmp_name'];

    $produit_image3_post = $_FILES['produit_image3']['name'];
    $produit_image3_tmp_post = $_FILES['produit_image3']['tmp_name'];

    $produit_image4_post = $_FILES['produit_image4']['name'];
    $produit_image4_tmp_post = $_FILES['produit_image4']['tmp_name'];

    $produit_image5_post = $_FILES['produit_image5']['name'];
    $produit_image5_tmp_post = $_FILES['produit_image5']['tmp_name'];
    
    //verification d'email
    $select_users = $con->prepare("SELECT * FROM utilisateurs");
    $select_users->execute();
    $exsiste = false;
    
        
    if($_FILES['produit_image1']['name'] == ""){
        $produit_image1_up = 0;
    }else{
        $produit_image1_up = $produit_image1_post;
        $produit_image1_tmp_post = $produit_image1_tmp_post;
    }

    if($_FILES['produit_image2']['name'] == ""){
        $produit_image2_up = 0;
    }else{
        $produit_image2_up = $produit_image2_post;
        $produit_image2_tmp_post = $produit_image2_tmp_post;
    }

    if($_FILES['produit_image3']['name'] == ""){
        $produit_image3_up = 0;
    }else{
        $produit_image3_up = $produit_image3_post;
        $produit_image3_tmp_post = $produit_image3_tmp_post;
    }

    if($_FILES['produit_image4']['name'] == ""){
        $produit_image4_up = 0;
    }else{
        $produit_image4_up = $produit_image4_post;
        $produit_image4_tmp_post = $produit_image4_tmp_post;
    }

    if($_FILES['produit_image5']['name'] == ""){
        $produit_image5_up = 0;
    }else{
        $produit_image5_up = $produit_image5_post;
        $produit_image5_tmp_post = $produit_image5_tmp_post;
    }
   

    
    if($not_go != 0){
        if($stock <= 0){
            $status_produit = "pas disponible";
        }else{
            $status_produit = "disponible";
        }
        $update_data_produits = $con->prepare("UPDATE produits SET nom_produit=:nom_produit,
        description_produit=:description_produit,
        mots_cles=:mots_cles,
        status_produit=:status_produit,
        prix_produit=:prix_produit,
        stock=:stock,
        id_categorie=:id_categorie,
        id_marque=:id_marque WHERE id_produit=:id_produit
        ")->execute(array(
                        ":nom_produit"=>$nom_produit,
                        ":description_produit"=>$description_produit,
                        ":mots_cles"=>$mots_cles,
                        ":status_produit"=>$status_produit,
                        ":prix_produit"=>$prix_produit,
                        ":stock"=>$stock,
                        ":id_categorie"=>$id_categorie,
                        ":id_marque"=>$id_marque,
                        ":id_produit"=>$id_produit));
    
        
    }else{
        echo "<script>Swal.fire({position: 'center',
            icon: 'error',
            title: 'Remplir Les Champs Vides',
            showConfirmButton: true}).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    window.open('./index.php?modifier_produit=$id_produit','_self')
                  )
                }else{
                    window.open('./index.php?modifier_produit=$id_produit','_self')
                }
              });
            </script>";
    }


    if($update_data_produits){
        $go = 1;
    }


    if($produit_image1_up != 0){
        move_uploaded_file($produit_image1_tmp_post,"./produits_images/$produit_image1_up");
        $update_data_produits_image1 = $con->prepare("UPDATE produits SET produit_image1=:produit_image1 WHERE id_produit=:id_produit
    ")->execute(array(":produit_image1"=>$produit_image1_up,":id_produit"=>$id_produit));
    $go = 1;
    }
    if($produit_image2_up != 0){
        move_uploaded_file($produit_image2_tmp_post,"./produits_images/$produit_image2_up");
        $update_data_produits_image2 = $con->prepare("UPDATE produits SET produit_image2=:produit_image2 WHERE id_produit=:id_produit
    ")->execute(array(":produit_image2"=>$produit_image2_up,":id_produit"=>$id_produit));
    $go = 1;
    }
    if($produit_image3_up != 0){
        move_uploaded_file($produit_image3_tmp_post,"./produits_images/$produit_image3_up");
        $update_data_produits_image3 = $con->prepare("UPDATE produits SET produit_image3=:produit_image3 WHERE id_produit=:id_produit
    ")->execute(array(":produit_image3"=>$produit_image3_up,":id_produit"=>$id_produit));
    $go = 1;
    }
    if($produit_image4_up != 0){
        move_uploaded_file($produit_image4_tmp_post,"./produits_images/$produit_image4_up");
        $update_data_produits_image4 = $con->prepare("UPDATE produits SET produit_image4=:produit_image4 WHERE id_produit=:id_produit
    ")->execute(array(":produit_image4"=>$produit_image4_up,":id_produit"=>$id_produit));
    $go = 1;
    }
    if($produit_image5_up != 0){
        move_uploaded_file($produit_image5_tmp_post,"./produits_images/$produit_image5_up");
        $update_data_produits_image5 = $con->prepare("UPDATE produits SET produit_image5=:produit_image5 WHERE id_produit=:id_produit
    ")->execute(array(":produit_image5"=>$produit_image5_up,":id_produit"=>$id_produit));
    $go = 1;
    }


    if($go == 1){
        echo "<script>Swal.fire({position: 'center',
            icon: 'success',
            title: 'Le Produit à été modifié avec succés',
            showConfirmButton: true}).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    window.open('./index.php?liste_produits','_self')
                    )
                }else{
                    window.open('./index.php?liste_produits','_self')
                }
                });</script>";
    }
        
    



}

?>
