<?php

    include('./includes/connect.php');
    include('./fonctions/fonctions.php');
    session_start();
    if(isset($_GET['success'])){
        echo '<script>
                alert("Payment done successfully");
                window.location.replace("/Electro-Shop/index.php")
             </script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro Shop - Acceuil</title>

    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Alice' rel='stylesheet'>

    <!-- bootstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- sweetalert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
   
    <!-- css file -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

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
                    echo "
                    <li class='nav-item'>
                        <a href='./client/profile.php' class='nav-link'>Profile</a>
                    </li>
                    <li class='nav-item'>
                        
                            <a href='./logout.php' class='nav-link'><i class='fa fa-power-off' aria-hidden='true'></i> Déconnecter</a>
                    </li>";
                }else{
                    echo "
                    <li class='nav-item'>
                    <a href='./login.php' class='nav-link'>Se connecter</a>
                    </li>
                    <li class='nav-item'>
                        <a href='./registre.php' class='nav-link'>S'inscrire</a>
                    </li>";
                }
                ?>

            </ul>
            
        </ul>
    </nav>
    
    <!-- NavBar -->
    <?php
        include("./navbar.php");
        ajouterProduitCarte();
    ?>

    
    <div class="bg-black-white text-light">
        <h3 class="text-center">Electro Shop</h3>
        <p class="text-center m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, aspernatur!</p>
    </div>


    <div class="row">
                <?php
                
                    if(isset($_GET['categorie'])){
                        $url = $_SERVER['REQUEST_URI']."&";
                        getMarques($url);
                    }else {
                        $url = "index.php?";
                    }
                    
                ?>

        <div class="<?php echo "".isset($_GET['categorie'])? 'col-md-10' : 'col-md-12'?>">
            <div class="row m-3">
                <?php
                    if(isset($_GET['voir_details'])){
                         getDetails();
                    }else{
                        if(isset($_GET['search_btn'])){
                            searchProducts();
                        }elseif(isset($_GET['touslesproduits'])){
                            getTousProduits();
                        }else{
                            getProduits();
                        }
                    }
                   
                    getProduitsByCategorie();
                   // getProduitsByMarque();
                    if(isset($_GET['marque']) && isset($_GET['categorie'])){
                        getProduitsByMarqueEtCategorie();
                    }
                   
                ?>

            </div>
        </div>


        
    </div>

    <!-- Footer -->
    <?php
        include("./footer.php");
    ?>


    <!-- js -->


    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>