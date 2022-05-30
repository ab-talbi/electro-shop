<?php

    include('./includes/connect.php');
    include('./fonctions/fonctions.php');

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
                <a href="" class="nav-link">Bienvenue</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Connexion</a>
            </li>
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
        <div class="col-md-2 bg-black-white p-0">
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-blue-black">
                    <a href="" class="nav-link text-light"><h4>Les Marques</h4></a>
                </li>
                <?php
                    if(isset($_GET['categorie'])){
                        $url = $_SERVER['REQUEST_URI']."&";
                    }else {
                        $url = "index.php?";
                    }
                    getMarques($url);

                ?>
            </ul>


            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-blue-black">
                    <a href="" class="nav-link text-light"><h4>Les Catégories</h4></a>
                </li>

                <?php
                if(isset($_GET['marque'])){
                    $url = $_SERVER['REQUEST_URI']."&";
                }else {
                    $url = "index.php?";
                }
                    getCategories($url);
                    
                ?>
            </ul>
        </div>

        <div class="col-md-10">
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
                    getProduitsByMarque();
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

    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>