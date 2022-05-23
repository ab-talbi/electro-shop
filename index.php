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
    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">

</head>
<body>
    
    <!-- NavBar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light" style="background:#f39c12;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./images/128.png" alt="logo" class="logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-cart-arrow-down"><sup>1</sup></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Prix: 100 MAD</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
        </nav>
    </div>
    


    <nav class="navbar navbar-expand-lg navbar-dark bg-blue-black">
        <ul class="navbar-nav me-auto">
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
                    <a href="" class="nav-link text-light"><h4>Delivary Brands</h4></a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">Brand 1</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">Brand 2</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">Brand 3</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">Brand 4</a>
                </li>
            </ul>


            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-blue-black">
                    <a href="" class="nav-link text-light"><h4>Les Catégories</h4></a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">Catégorie 1</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">Catégorie 2</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">Catégorie 3</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">Catégorie 4</a>
                </li>
            </ul>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/samsung50.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Samsung 50 4K UHD Smart TV (TU8500)</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Ajouter</a>
                            <a href="#" class="btn btn-secondary">Voir les détails</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/appleimac.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apple iMac A1418 21.5</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Ajouter</a>
                            <a href="#" class="btn btn-secondary">Voir les détails</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/drone.jpg" class="card-img-top" alt="..." >
                        <div class="card-body">
                            <h5 class="card-title">Drone E99 Pro2 4K Dual Camera</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Ajouter</a>
                            <a href="#" class="btn btn-secondary">Voir les détails</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/drone.jpg" class="card-img-top" alt="..." >
                        <div class="card-body">
                            <h5 class="card-title">Drone E99 Pro2 4K Dual Camera</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Ajouter</a>
                            <a href="#" class="btn btn-secondary">Voir les détails</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/drone.jpg" class="card-img-top" alt="..." >
                        <div class="card-body">
                            <h5 class="card-title">Drone E99 Pro2 4K Dual Camera</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Ajouter</a>
                            <a href="#" class="btn btn-secondary">Voir les détails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    </div>

    <!-- Footer -->
    <?php
        include_once("./footer.php");
    ?>

    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>