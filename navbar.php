
    <div class="container-fluid navPrincipal p-0" style="background:#f39c12;">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid" style="margin: 5px auto;">
                <a class="navbar-brand" href="#"><img src="./images/128.png" alt="logo" class="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?touslesproduits">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catégories</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                                if(isset($_GET['marque'])){
                                    $url = $_SERVER['REQUEST_URI']."&";
                                }else {
                                    $url = "index.php?";
                                }
                                    getCategories($url);
                            ?>
                        </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./carte.php"><i class="fa-solid fa-cart-arrow-down"> <?php getNombreProduitsPourUtilisateur() ?></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Prix Total : <?php getPrixTotalProduitsPourUtilisateur() ?> MAD</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="index.php">
                        <input class="form-control me-2" name="search_data" type="search" placeholder="Rechercher" aria-label="Search"/>
                        <input type="submit" value="Rechercher" name="search_btn" class="btn btn-outline-light"/>
                    </form>
                </div>
            </div>
        </nav>
</div>
    