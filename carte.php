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
    <title>Electro Shop - Les Détailles de la Carte</title>

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
        if(isset($_GET['modifier_produit_carte'])){
            modifierCarteQuantite();
        }
        include("./navbar.php");
    ?>

    
    <div class="bg-black-white text-light">
        <h3 class="text-center">Electro Shop</h3>
        <p class="text-center m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, aspernatur!</p>
    </div>


    <div class="container">
        <div class="row">
            <form action="./carte.php" mathod="post">
                <table class="table caption-top text-center mt-3">
                    <caption class="text-center">Les produits que vous avez ajouté à votre carte</caption>
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Image</th>
                        <th scope="col">Prix Unitaire (MAD)</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix Total</th>
                        <th scope="col">choisir</th>
                        <th colspan="2">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            supprimerCarteProduits();
                            if(isset($_GET['modifier_produit_carte'])){
                                modifierCarteQuantite();
                                getTousProduitsCartePourUtilisateur();
                            }
                            else{
                                getTousProduitsCartePourUtilisateur();
                            }
                            
                        ?>
                        
                    </tbody>
                </table>
                <input class='btn btn-danger mb-2' style='width:100%' type='submit' value='Supprimer Les Produits' name='supprimer_produits_carte' formaction='./carte.php'>
                <input class='btn btn-primary mb-3' style='width:100%' type='submit' value='Enregistrer les modifications' name='modifier_produit_carte' formaction='./carte.php'>
            </form>

            <div class="d-flex mb-3">
                <h4 class="px-3">Total :<strong> <?php getPrixTotalProduitsPourUtilisateur() ?> MAD </strong></h4>
                <a href="./index.php"><button class="px-3 btn btn-primary">Ajouter Autres Produits</button></a>
                <a class="px-2" href="./index.php"><button class="px-3 btn btn-secondary">Ajouter Autres Produits</button></a>
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