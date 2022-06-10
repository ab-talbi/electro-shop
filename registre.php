
 <?php

    include('includes/connect.php');
    include('fonctions/fonctions.php');

    session_start();
    if(!isset($_SESSION['values'])){
        $_SESSION['values']['nom']='';
        $_SESSION['values']['prenom']='';
        $_SESSION['values']['email']='';
        $_SESSION['values']['passwd']='';
        $_SESSION['values']['confPass']='';
        $_SESSION['values']['adresse']='';
        $_SESSION['values']['tel']='';
    }
    if(!isset($_SESSION['erreurs'])){
        $_SESSION['erreurs']['nom']='';
        $_SESSION['erreurs']['prenom']='';
        $_SESSION['erreurs']['email']='';
        $_SESSION['erreurs']['passwd']='';
        $_SESSION['erreurs']['confPass']='';
        $_SESSION['erreurs']['adresse']='';
        $_SESSION['erreurs']['tel']='';
    }
          
    if(isset($_SESSION['nom_utilisateur'])){
        echo "<script>window.open('./index.php','_self')</script>";
    }

if(isset($_POST['register_utilisateur'])){
    $iserreur=0;//pas d'erreurs
    // verifacation de nom
    $nomER='#[a-zA-Z]{0,5}[ -]?[a-zA-Z]{3,10}#';
     if(!preg_match($nomER,$_POST['nom'])){
         $_SESSION['erreurs']['nom']=' invalid';
         $_SESSION['erreurs']['nomMsg'] = "le nom pas valide !";
         $iserreur=1;//il y a des erreurs dons le nom
     }else{
        $_SESSION['erreurs']['nom']=' valid';
        unset($_SESSION['erreurs']['nomMsg']);
     }
    
      // verifacation de nom
     $prenomER='#[a-zA-Z]{3,7}#';
     if(!preg_match($prenomER,$_POST['prenom'])){
        $_SESSION['erreurs']['prenomMsg'] = "le prenom pas valide !"; 
        $_SESSION['erreurs']['prenom']=' invalid';
         $iserreur=1;
     }else{
        $_SESSION['erreurs']['prenom']=' valid';
        unset($_SESSION['erreurs']['prenomMsg']);
     }
    
      // verifacation de pseudo
      $pseudoER='#[a-zA-Z1-9, -]{15,30}#';
      if(!preg_match($pseudoER,$_POST['adresse'])){
         $_SESSION['erreurs']['adresse']=' invalid';
         $_SESSION['erreurs']['adresseMsg'] = "l'adresse pas valide !";
         $iserreur=1;
      }else{
        $_SESSION['erreurs']['adresse']=' valid';
        unset($_SESSION['erreurs']['adresse']);
     }
    
      // verification d'email
      $emailER='#(^([a-zA-Z]){1,20}[@]{1}([a-zA-Z]){1,20}[.]{1}([a-zA-Z1-9]){1,20}){1,3}$#';
      if(!preg_match($emailER,$_POST['email'])){
         $_SESSION['erreurs']['email']=' invalid';
         $_SESSION['erreurs']['emailMsg'] = "l'email pas valide !";
         $iserreur=1;
      }else{
        $_SESSION['erreurs']['email']=' valid';
        unset($_SESSION['erreurs']['email']);
     }
     //verification du mot de passe    '#([a-zA-Z]){1,8}[@%&*+., -]{1}#'
     //  $passeER = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';//makhdamch
     //  if(!preg_match($passeER,$_POST['passwd'])){
     //     $_SESSION['erreurs']['passwd']='invalid';
     //     $_SESSION['erreurs']['confPass']='invalid';
     //     $iserreur=1;
     //  }
    
     if(empty(trim($_POST['passwd']))){
         $_SESSION['erreurs']['passwdMsg'] = "Donnez un mot de passe svp."; 
         $_SESSION['erreurs']['passwd']=' invalid';
         $_SESSION['erreurs']['confPass']=' invalid';
         $iserreur=1;    
     } elseif(strlen(trim($_POST['passwd'])) < 8){
         $_SESSION['erreurs']['passwdMsg'] = "Le mot de passe faut cintient au moin 8 caractèrs.";
         $_SESSION['erreurs']['passwd']=' invalid';
         $_SESSION['erreurs']['confPass']=' invalid';
         $iserreur=1;
     } elseif(preg_match("/^(?=[a-zA-Z0-9]{8,})(?=[a-zA-Z]*[0-9][a-zA-Z]*$)[a-zA-Z0-9]+$/", ($_POST['passwd']))) {
         $_SESSION['erreurs']['passwdMsg'] = "Le mot de passe faut cintient au moin 8 caractèrs, 1 numbre, une letter majescule et caractère specile";
         $_SESSION['erreurs']['passwd']=' invalid';
         $_SESSION['erreurs']['passwd']=' invalid';
         $iserreur=1;
     } elseif($_POST['passwd'] != $_POST['confPass']){
         $_SESSION['erreurs']['passwdMsg'] = "le mot de passe c'est pas le meme";
         $_SESSION['erreurs']['passwd']=' invalid';
         $_SESSION['erreurs']['confPass']=' invalid';
         $iserreur=1;
     } else{
         $_SESSION['erreurs']['passwdMsg']= '';
         $_SESSION['erreurs']['passwd']=' valid';
         $_SESSION['erreurs']['confPass']=' valid';
     }
    
    
     if(!preg_match("/^((00|\+)212|0)[567]([. ]?[0-9]{2}){4}$/",$_POST['tel'])){
         $_SESSION['erreurs']['tel'] =' invalid';
         $_SESSION['erreurs']['telMsg'] = "le numero de telephone pas valide !";
         $iserreur=1;
     }else{
        $_SESSION['erreurs']['tel'] =' valid';
        unset($_SESSION['erreurs']['tel']);
    
     }
    
    
      foreach ($_POST as $key => $value){
         $_SESSION['values'][$key]=$value;
     }
    
}

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

    <title>Electro Shop - Registration</title>
    
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
                        <label for="idnom" class="form-label">Nom <span style="color:red">*</span></label>
                        <input type="text" name="nom" id="idnom" class="form-control <?php echo $_SESSION['erreurs']['nom'] ??"";?>"
                         value="<?php echo $_SESSION['values']['nom'] ??""; ?>" placeholder="Votre nom" autocomplete="off" required="required"/>
                        <div class="mt-2" style="color:red;"><?php
                            echo $_SESSION['erreurs']['nomMsg'] ?? "";
                       ?></div>
                    </div>

                    <!-- Prenom -->
                    <div class="form-outline mb-4">
                        <label for="idprenom" class="form-label">Prenom <span style="color:red">*</span></label>
                        <input type="text" name="prenom" id="idprenom" class="form-control <?php echo $_SESSION['erreurs']['prenom'] ??"";?>"
                         value="<?php echo $_SESSION['values']['prenom'] ??""; ?>" placeholder="Votre prenom" autocomplete="off" required="required"/>
                         <div class="mt-2" style="color:red;"><?php
                            echo $_SESSION['erreurs']['prenomMsg'] ?? "";
                       ?></div>
                    </div>

                    <!-- Email -->
                    <div class="form-outline mb-4">
                        <label for="idemail" class="form-label">Email <span style="color:red">*</span></label>
                        <input type="email" name="email" id="idemail" class="form-control <?php echo $_SESSION['erreurs']['email'] ??"";?>"
                         value="<?php echo $_SESSION['values']['email'] ??""; ?>" placeholder="Votre email valide" autocomplete="off" required="required"/>
                         <div class="mt-2" style="color:red;"><?php
                            echo $_SESSION['erreurs']['emailMsg'] ?? "";
                       ?></div>
                    </div>

                    <!-- image -->
                    <div class="form-outline mb-4">
                        <label for="idimage" class="form-label">Image </label>
                        <input type="file" name="image" id="idimage" class="form-control"/>
                    </div>

                    <!-- passsword -->
                    <div class="form-outline mb-4">
                        <label for="idpasswd" class="form-label">Mot de passe <span style="color:red">*</span></label>
                        <input type="password" name="passwd" id="idpasswd" class="form-control <?php echo $_SESSION['erreurs']['passwd'] ??"";?>"
                         value="<?php echo $_SESSION['values']['passwd'] ??""; ?>" placeholder="Mot de passe" autocomplete="off" required="required"/>
                    </div>

                    <!-- conferm passsword -->
                    <div class="form-outline mb-4">
                        <label for="idconfPass" class="form-label">Cnfiremer mot de passe <span style="color:red">*</span></label>
                        <input type="password" name="confPass" id="idconfPass" class="form-control <?php echo $_SESSION['erreurs']['confPass'] ??"";?>"
                         value="<?php echo $_SESSION['values']['confPass'] ??""; ?>" placeholder=" Confiremer votre mot de passe" autocomplete="off" required="required"/>
                        <div class="mt-2" style="color:red;"><?php
                            echo $_SESSION['erreurs']['passwdMsg'] ?? "";
                       ?></div>
                    </div>

                    <!-- Adresse -->
                    <div class="form-outline mb-4">
                        <label for="idadresse" class="form-label">Adresse <span style="color:red">*</span></label>
                        <input type="text" name="adresse" id="idadresse" class="form-control <?php echo $_SESSION['erreurs']['adresse'] ??"";?>"
                         value="<?php echo $_SESSION['values']['adresse'] ??""; ?>" placeholder="Votre adresse" autocomplete="off" required="required"/>
                         <div class="mt-2" style="color:red;"><?php
                            echo $_SESSION['erreurs']['adresseMsg'] ?? "";
                       ?></div>
                    </div>

                    <!-- telephon -->
                    <div class="form-outline mb-4">
                        <label for="idtel" class="form-label">Telephone <span style="color:red">*</span></label>
                        <input type="tel" name="tel" id="idtel" class="form-control <?php echo $_SESSION['erreurs']['tel'] ??"";?>"
                         value="<?php echo $_SESSION['values']['tel'] ??""; ?>" placeholder="Votre numero de telephone" autocomplete="off" required="required"/>
                         <div class="mt-2" style="color:red;"><?php
                            echo $_SESSION['erreurs']['telMsg'] ?? "";
                       ?></div>
                    </div>
                    <div class="text-center">
                        <input name="register_utilisateur" id="btn" type="submit" value="M'inscrire" class="btn btn-success me-1"/>
                        <input type="submit" id="reset" formaction="reinitialiser.php" value="Reinitialiser" class="btn btn-warning text-light ms-1">
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
                        
    ?>
    

    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>




<?php


    if(isset($_POST['register_utilisateur']) && $iserreur == 0){
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

            //insertion tous va bien

            // $insert_utilisateur = $con->prepare('INSERT INTO utilisateurs(nom_utilisateur,prenom_utilisateur,email_utilisateur,mot_passe_utilisateur,image_utilisateur,ip_utilisateur,adresse_utilisateur,tel_utilisateur) VALUES(:nom_utilisateur,:prenom_utilisateur,:email_utilisateur,:mot_passe_utilisateur,:image_utilisateur,:ip_utilisateur,:adresse_utilisateur,:tel_utilisateur)');
            // $executer = $insert_utilisateur->execute(array(":nom_utilisateur"=>$nom_utilisateur,
            //     ":prenom_utilisateur"=>$prenom_utilisateur,
            //     ":email_utilisateur"=>$email_utilisateur,
            //     ":mot_passe_utilisateur"=>$password_utilisateur_hash,
            //     ":image_utilisateur"=>$image_utilisateur,
            //     ":ip_utilisateur"=>$ip_utilisateur,
            //     ":adresse_utilisateur"=>$adresse_utilisateur,
            //     ":tel_utilisateur"=>$tel_utilisateur));
    
            //if($executer){
                // echo "<script>Swal.fire({position: 'center',
                //     icon: 'success',
                //     title: 'Vous etes inscrit avec succés',
                //     showConfirmButton: true}).then((result) => {
                //                 if (result.isConfirmed) {
                //           Swal.fire(
                //                  window.open('./login.php','_self')
                //                )
                //               }else{
                //                window.open('./login.php','_self')
                //             }
                //           });</script>";


                //Envoyer Code Verification 

                    $otp = rand(100000,999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email_utilisateur;
                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    // $mail->Username='electroshop.irisi1@gmail.com';
                    // $mail->Password='123abc$456ABC';

                    $mail->Username='ayoubtalbi787@gmail.com';
                    $mail->Password='tsue nioq ieim tkgc';
    
                    // $mail->setFrom('electroshop.irisi1@gmail.com', 'ElectroShop');
                    // $mail->addAddress($_POST["email"]);

                    $mail->setFrom('ayoubtalbi787@gmail.com', 'ElectroShop');
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Votre Code de Verification";
                    $mail->Body="<p>Monsieur/Madame $nom_utilisateur, </p><br><br> <h3 style='font-size: 50px;'>Votre Code de Verification de votre compte sur <strong>ElectroShop</strong> est :</h3><h1 style='color:red;margin:auto;font-size: 150px'>$otp</h1>
                    <br><br>
                    <p>Cordialement,</p>
                    <p><strong>Equipe ElectroShop</strong></p>
                    <p><strong>IRISI1</strong></p>
                    <p><strong>2021-2022</strong></p>
                    <p><strong>Fstg - Marrakech</strong></p>";
    
                    if(!$mail->send()){

                        echo "<script>Swal.fire({position: 'center',
                            icon: 'error',
                            title: 'Email n\'existe pas',
                            showConfirmButton: true});
                            </script>";
                    }else{
                                //insertion tous va bien

                $insert_utilisateur = $con->prepare('INSERT INTO utilisateurs(nom_utilisateur,prenom_utilisateur,email_utilisateur,mot_passe_utilisateur,image_utilisateur,ip_utilisateur,adresse_utilisateur,tel_utilisateur,verification_code,verifie) VALUES(:nom_utilisateur,:prenom_utilisateur,:email_utilisateur,:mot_passe_utilisateur,:image_utilisateur,:ip_utilisateur,:adresse_utilisateur,:tel_utilisateur,:verification_code,:verifie)');
                $executer = $insert_utilisateur->execute(array(":nom_utilisateur"=>$nom_utilisateur,
                    ":prenom_utilisateur"=>$prenom_utilisateur,
                    ":email_utilisateur"=>$email_utilisateur,
                    ":mot_passe_utilisateur"=>$password_utilisateur_hash,
                    ":image_utilisateur"=>$image_utilisateur,
                    ":ip_utilisateur"=>$ip_utilisateur,
                    ":adresse_utilisateur"=>$adresse_utilisateur,
                    ":tel_utilisateur"=>$tel_utilisateur,
                    ":verification_code"=>$otp,
                    ":verifie"=>0,
                    ));


                    if($executer){
                        echo "<script>Swal.fire({position: 'center',
                            icon: 'success',
                            title: 'Vous etes inscrit avec succés, mais verifier d\'abord votre compte associe à $email_utilisateur',
                            showConfirmButton: true}).then((result) => {
                                        if (result.isConfirmed) {
                                Swal.fire(
                                        window.open('./verification.php','_self')
                                        )
                                            }else{
                                window.open('./verification.php','_self')
                            }
                        });</script>";
                    }
                               
                                
                                
            }
                            
                 //----Fin Envoyer Code Verification 

            //}
        }

    }

?>