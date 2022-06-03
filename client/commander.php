<?php

    @session_start();
    
    include('../includes/connect.php');

    $_SESSION['payer']=$_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro Shop - Commander</title>

    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Alice' rel='stylesheet'>

    <!-- bootstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- sweetalert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
   
    <!-- css file -->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">

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
                    <a href="../logout.php" class="nav-link">Déconnecter</a>
                </li>';
                }else{
                    echo '<li class="nav-item">
                    <a href="../login.php" class="nav-link">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a href="../registre.php" class="nav-link">S\'inscrire</a>
                </li>';
                }
                ?>

            </ul>
            
        </ul>
    </nav>
    
    <!-- NavBar -->

    <div class="container-fluid navPrincipal p-0" style="background:#f39c12;">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid" style="margin: 5px auto;">
                <a class="navbar-brand" href="#"><img src="../images/128.png" alt="logo" class="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php?touslesproduits">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
    

    
    <div class="bg-black-white text-light">
        <h3 class="text-center">Electro Shop</h3>
        <p class="text-center m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, aspernatur!</p>
    </div>


    <div class="container">
        <div class="row">
            
                <?php
                    if(!isset($_SESSION['nom_utilisateur'])){
                        include('./login.php');
                    }else{
                        include('./payer.php');
                    }
                ?>

        </div>
    </div>

    <!-- Footer -->
    <?php
      include("../footer.php");
    
    
    ?>

    <script src="../js/fonctions.js?v=<?php echo time(); ?>"></script>
    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>