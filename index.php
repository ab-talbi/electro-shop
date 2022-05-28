<?php

    include('./includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro Shop - Acceuil</title>

    <!-- bootstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <!-- css file -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

</head>
<body>
    
    <!-- NavBar -->
    <?php
        include("./navbar.php");
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-blue-black ">
        <ul class="navbar-nav headerBC">
            <li class="nav-item">
                <a href="" class="nav-link">Bienvenue</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Connexion</a>
            </li>
        </ul>
    </nav>
    
    <div class="bg-black-white text-light">
        <h3 class="text-center">Electro Shop</h3>
        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, aspernatur!</p>
    </div>


    <div class="row">
        <div class="col-md-2 bg-black-white p-0">
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-blue-black">
                    <a href="" class="nav-link text-light"><h4>Les Marques</h4></a>
                </li>
                <?php
                    
                    $select_marques = $con->query('SELECT * FROM marques');
                    if($select_marques){
                        while($ligne = $select_marques->fetch(PDO::FETCH_OBJ)){
                            echo "<li class='nav-item'><a href='index.php?marque=$ligne->id_marque' class='nav-link text-light'>$ligne->nom_marque</a></li>";
                        }
                    }else{
                        echo "Pas de Marques pour le moment";  
                    }

                ?>
            </ul>


            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-blue-black">
                    <a href="" class="nav-link text-light"><h4>Les Catégories</h4></a>
                </li>

                <?php
                    
                    $select_categories = $con->query('SELECT * FROM categories');
                    while($ligne = $select_categories->fetch(PDO::FETCH_OBJ)){
                        echo "<li class='nav-item'><a href='index.php?categorie=$ligne->id_categorie' class='nav-link text-light'>$ligne->nom_categorie</a></li>";
                    }
                    
                ?>
            </ul>
        </div>

        <div class="col-md-10">
            <div class="row">
                <?php
                    
                    $select_produit = $con->query('SELECT * FROM produits order by rand() limit 0,12');
                    while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                            <div class='card-body'>
                                <h5 class='card-title'>$ligne->nom_produit</h5>
                                <p class='card-text'>$ligne->description_produit</p>
                                <p class='card-text'>Prix : $ligne->prix_produit MAD</p>
                                <a href='#' class='btn btn-primary'>Ajouter</a>
                                <a href='#' class='btn btn-secondary'>Voir les détails</a>
                            </div>
                        </div>
                    </div>";
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