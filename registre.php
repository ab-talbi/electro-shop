
 <?php

    include('includes/connect.php');
    include('fonctions/fonctions.php');

    session_start();
    if(isset($_SESSION['payer'])){
        $url = "./client/payer.php";
    }else{
        $url=  "login.php";
    }
    session_destroy();             
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
                <a href="" class="nav-link">Bienvenue</a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link">Connexion</a>
            </li>
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
                <form action="" method="post" enctype="multipart/from-data">

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
                        <label for="idtel" class="form-label">Telephon </label>
                        <input type="tel" name="tel" id="idtel" class="form-control" placeholder="Votre numero de telephon" autocomplete="off" required="required"/>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="envoyer" class="btn btn-success me-1"/>
                        <input type="reset" value="renitialiser" class="btn btn-warning ms-1">
                        <p class="mt-2 small fw-bold">Vous avez déjà un comte? <a href="<?php echo $url ; ?>">connexion</a></p>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <?php
                        
        include("footer.php");
                        
    ?>
    <!-- js -->
    <script src="js/fonctions.js"></script>

    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>