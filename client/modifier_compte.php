<?php
    if(isset($_GET['modifier_compte'])){
        $id_utilisateur = $_SESSION['id_utilisateur'];
        $select_data_utilisateur  = $con->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = ?");
        $select_data_utilisateur->execute(array($id_utilisateur));
        $data = $select_data_utilisateur->fetch();
        $nom_utilisateur = $data['nom_utilisateur'];
        $prenom_utilisateur = $data['prenom_utilisateur'];
        $email_utilisateur = $data['email_utilisateur'];
        $image_utilisateur = $data['image_utilisateur'];
        $adresse_utilisateur = $data['adresse_utilisateur'];
        $tel_utilisateur = $data['tel_utilisateur'];
    }
?>
    
    <form class="w-50 m-auto" action="" method="post" enctype="multipart/form-data">
    <h3 class="text-success my-4">Modification de voter compte</h3>
        <div class="form-outline mb-4">
            <label for="nom_utilisateur">Nom </label>
            <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="form-control w-100" value="<?php echo $nom_utilisateur ?>">
        </div>
        <div class="form-outline mb-4">
            <label for="prenom_utilisateur">Prénom </label>
            <input type="text" name="prenom_utilisateur" id="prenom_utilisateur" class="form-control w-100" value="<?php echo $prenom_utilisateur ?>">
        </div>
        <div class="form-outline mb-4">
            <label for="image_utilisateur">Image </label>
            <div class="d-flex">
                <input type="file" name="image_utilisateur" id="image_utilisateur" class="form-control <?php if($image_utilisateur != '') echo "w-90"; else echo "w-100"; ?> m-auto" >
                <?php if($image_utilisateur != '') echo "<img src='./client_images/$image_utilisateur' style='width:100px' alt='photo de profile'>";?> 
                
            </div>
        </div>
        <div class="form-outline mb-4">
            <label for="adresse_utilisateur">Adresse </label>
            <input type="text" name="adresse_utilisateur" id="adresse_utilisateur" class="form-control w-100" value="<?php echo $adresse_utilisateur ?>">
        </div>
        <div class="form-outline mb-4">
            <label for="email_utilisateur">Email </label>
            <fieldset class="form-control w-100" name="email_utilisateur" id="email_utilisateur"><?php echo $email_utilisateur ?></fieldset>
            <!-- <input type="email" name="email_utilisateur" id="email_utilisateur" class="form-control w-100" value="<?php echo $email_utilisateur ?>"> -->
        </div>
        <div class="form-outline mb-4">
            <label for="tel_utilisateur">Telephone </label>
            <input type="tel" name="tel_utilisateur" id="tel_utilisateur" class="form-control w-100" value="<?php echo $tel_utilisateur ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" name="modifier_btn" class="btn btn-primary form-control w-100 m-auto" value="Modifier">
        </div>
    </form>


<?php

    if(isset($_POST['modifier_btn'])){
        $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);
        $prenom_utilisateur = htmlspecialchars($_POST['prenom_utilisateur']);
        $email_utilisateur = htmlspecialchars($_POST['email_utilisateur']);
        $adresse_utilisateur = htmlspecialchars($_POST['adresse_utilisateur']);
        $tel_utilisateur = htmlspecialchars($_POST['tel_utilisateur']);
        $id_utilisateur = $_SESSION['id_utilisateur'];
        
        //verification d'email
        $select_users = $con->prepare("SELECT * FROM utilisateurs");
        $select_users->execute();
        $exsiste = false;
        if($select_users->rowCount() > 0){
            while($ligne = $select_users->fetch()){
                if($email_utilisateur == $ligne['email_utilisateur'] && $id_utilisateur != $ligne['id_utilisateur']){
                    $exsiste = true;
            }
        }
        }
            if($exsiste){
                echo "
                <script>
                    Swal.fire({position: 'center',
                        icon: 'error',
                        title: 'Ce email utilisé déjà avec un auter compte',
                        showConfirmButton: true});  
                </script>";                    
            }else{
                if($_FILES['image_utilisateur']['name'] == ""){
                    $image_utilisateur_up = $image_utilisateur;
                }else{
                    $image_utilisateur_up = $_FILES['image_utilisateur']['name'];
                    $image_utilisateur_up_tmp = $_FILES['image_utilisateur']['tmp_name'];
                }
            
                move_uploaded_file($image_utilisateur_up_tmp,"./client_images/$image_utilisateur_up");
            
                //Modifier les donnee de l'utilisateur
                $update_data_utilisateur = $con->prepare("UPDATE utilisateurs set nom_utilisateur=:nom_utilisateur,
                prenom_utilisateur=:prenom_utilisateur,
                email_utilisateur=:email_utilisateur,
                adresse_utilisateur=:adresse_utilisateur,
                tel_utilisateur=:tel_utilisateur,
                image_utilisateur=:image_utilisateur WHERE id_utilisateur=:id_utilisateur
                ")->execute(array(
                                ":nom_utilisateur"=>$nom_utilisateur,
                                ":prenom_utilisateur"=>$prenom_utilisateur,
                                ":email_utilisateur"=>$email_utilisateur,
                                ":image_utilisateur"=>$image_utilisateur_up,
                                ":adresse_utilisateur"=>$adresse_utilisateur,
                                ":tel_utilisateur"=>$tel_utilisateur,
                                "id_utilisateur"=>$id_utilisateur));
            
                if($update_data_utilisateur){
                    echo "
                    <script>
                        Swal.fire({position: 'center',
                            icon: 'success',
                            title: 'Voter donnée a étè modifier avec succés',
                            showConfirmButton: true});
                        Swal.fire(
                            window.open('./profile.php?modifier_compte','_self'));
                    </script>";
                }
            }
        


    
}

?>