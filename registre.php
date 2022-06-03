
 <?php

    include('includes/connect.php');
    include('fonctions/fonctions.php');

    session_start();
          
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- sweetalert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
   
    <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- css file -->
     <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

    <title>Registration</title>
    
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-blue-black">
        <ul class="navbar-nav headerBC">
            <li class="nav-item">
                <a href="" class="nav-link">Bienvenue <?php if(isset($_SESSION['nom_utilisateur'])){
                    echo $_SESSION['nom_utilisateur'];
                } ?></a>
            </li>
            <ul class="navbar-nav nav-item">
                <?php if(isset($_SESSION['nom_utilisateur'])){
                    echo '<li class="nav-item">
                    <a href="logout.php" class="nav-link">Déconnecter</a>
                </li>';
                }else{
                    echo '<li class="nav-item">
                    <a href="login.php" class="nav-link">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a href="registre.php" class="nav-link">S\'inscrire</a>
                </li>';
                }
                ?>

            </ul>
            
        </ul>
    </nav>
    
    <!-- NavBar -->
    <?php
        include("navbar.php");
    ?>

    <div class="container-fluid my-3">
        <h2 class="text-center">creation de compte</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">

                    <!-- Nom -->
                    <div class="form-outline mb-4">
                        <label for="idnom" class="form-label">Nom </label>
                        <input type="text" name="nom" id="idnom" class="form-control" placeholder="Votre nom" autocomplete="off" required="required"/>
                    </div>

                    <!-- Prenom -->
                    <div class="form-outline mb-4">
                        <label for="idprenom" class="form-label">Prenom </label>
                        <input type="text" name="prenom" id="idprenom" class="form-control" placeholder="Votre prenom" autocomplete="off" required="required"/>
                    </div>

                    <!-- Email -->
                    <div class="form-outline mb-4">
                        <label for="idemail" class="form-label">Email </label>
                        <input type="email" name="email" id="idemail" class="form-control" placeholder="Votre email valide" autocomplete="off" required="required"/>
                    </div>

                    <!-- image -->
                    <div class="form-outline mb-4">
                        <label for="idimage" class="form-label">Image </label>
                        <input type="file" name="image" id="idimage" class="form-control"/>
                    </div>

                    <!-- passsword -->
                    <div class="form-outline mb-4">
                        <label for="idpasswd" class="form-label">Mot de passe </label>
                        <input type="password" name="passwd" id="idpasswd" class="form-control" placeholder="Mot de passe" autocomplete="off" required="required"/>
                    </div>

                    <!-- conferm passsword -->
                    <div class="form-outline mb-4">
                        <label for="idconfPass" class="form-label">Cnfiremer mot de passe </label>
                        <input type="password" name="confPass" id="idconfPass" class="form-control" placeholder=" Confiremer votre mot de passe" autocomplete="off" required="required"/>
                    </div>

                    <!-- Adresse -->
                    <div class="form-outline mb-4">
                        <label for="idadresse" class="form-label">Adresse </label>
                        <input type="text" name="adresse" id="idadresse" class="form-control" placeholder="Votre adresse" autocomplete="off" required="required"/>
                    </div>

                    <!-- telephon -->
                    <div class="form-outline mb-4">
                        <label for="idtel" class="form-label">Telephone </label>
                        <input type="tel" name="tel" id="idtel" class="form-control" placeholder="Votre numero de telephone" autocomplete="off" required="required"/>
                    </div>
                    <div class="text-center">
                        <input name="register_utilisateur" type="submit" value="envoyer" class="btn btn-success me-1"/>
                        <input type="reset" value="renitialiser" class="btn btn-warning ms-1">
                        <?php
                                if(isset($_SESSION['payer'])){
                                    $url = "./client/payer.php";
                                }else{
                                    $url=  "login.php";
                                }
                                  
                        ?>
                        <p class="mt-2 small fw-bold">Vous avez déjà un comte? <a href="<?php echo $url ?>">connexion</a></p>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <?php
                        
        include("footer.php");
        session_destroy(); 
                        
    ?>
    <!-- js -->
    <script src="js/fonctions.js"></script>

    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>




<?php

    if(isset($_POST['register_utilisateur'])){
        $nom_utilisateur = htmlspecialchars($_POST['nom']);
        $prenom_utilisateur = htmlspecialchars($_POST['prenom']);
        $email_utilisateur = htmlspecialchars($_POST['email']);
        $password_utilisateur = htmlspecialchars($_POST['passwd']);
        $password_utilisateur_hash = password_hash($password_utilisateur,PASSWORD_DEFAULT);
        $password_utilisateur_verification = htmlspecialchars($_POST['confPass']);
        $adresse_utilisateur = htmlspecialchars($_POST['adresse']);
        $tel_utilisateur = htmlspecialchars($_POST['tel']);

        $image_utilisateur = $_FILES['image']['name'];
        $image_utilisateur_tmp = $_FILES['image']['tmp_name'];

        $ip_utilisateur = getIPAddress();

        move_uploaded_file($image_utilisateur_tmp,"./client/client_images/$image_utilisateur");

        $select_utilisateur = $con->query("SELECT * FROM `utilisateurs` WHERE email_utilisateur like '$email_utilisateur' or tel_utilisateur like '$tel_utilisateur'");
        $rows = $select_utilisateur->rowCount();

        if($rows != 0){
            echo "<script>Swal.fire({position: 'center',
                icon: 'error',
                title: 'Déjà inscrit',
                showConfirmButton: true});
                </script>";
        }
        else if($password_utilisateur != $password_utilisateur_verification){
            echo "<script>Swal.fire({position: 'center',
                icon: 'error',
                title: 'Verifier mot de passe',
                showConfirmButton: true});
                </script>";
        }else{
            $insert_utilisateur = $con->prepare('INSERT INTO utilisateurs(nom_utilisateur,prenom_utilisateur,email_utilisateur,mot_passe_utilisateur,image_utilisateur,ip_utilisateur,adresse_utilisateur,tel_utilisateur) VALUES(:nom_utilisateur,:prenom_utilisateur,:email_utilisateur,:mot_passe_utilisateur,:image_utilisateur,:ip_utilisateur,:adresse_utilisateur,:tel_utilisateur)');
            $executer = $insert_utilisateur->execute(array(":nom_utilisateur"=>$nom_utilisateur,
                ":prenom_utilisateur"=>$prenom_utilisateur,
                ":email_utilisateur"=>$email_utilisateur,
                ":mot_passe_utilisateur"=>$password_utilisateur_hash,
                ":image_utilisateur"=>$image_utilisateur,
                ":ip_utilisateur"=>$ip_utilisateur,
                ":adresse_utilisateur"=>$adresse_utilisateur,
                ":tel_utilisateur"=>$tel_utilisateur));
    
            if($executer){
                echo "<script>Swal.fire({position: 'center',
                    icon: 'success',
                    title: 'Vous etes inscrit avec succés',
                    showConfirmButton: true});</script>";
            }
        }

        $select_carte = $con->query("SELECT * FROM `carte` WHERE adresse_ip like '$ip_utilisateur'");
        $rows_carte = $select_carte->rowCount();
        if($rows_carte>0){
            $_SESSION['nom_utilisateur'] = $nom_utilisateur;
            echo "<script>Swal.fire({position: 'center',
                icon: 'success',
                title: 'Vous avez des produits dans la carte!',
                showConfirmButton: true}).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire(
                        window.open('./client/payer.php','_self')
                      )
                    }else{
                        window.open('./client/payer.php','_self')
                    }
                  });</script>";
        }else{
            echo "<script>window.open('./index.php','_self')</script>";
        }

        


    }
      
?>