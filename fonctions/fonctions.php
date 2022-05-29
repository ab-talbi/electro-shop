
<?php
    include('./includes/connect.php');

    //Afficher les produits
    function getProduits(){
        global $con;
        if(!isset($_GET['categorie']) && !isset($_GET['marque']) && !isset($_get['search_btn'])){
            $select_produit = $con->query('SELECT * FROM produits order by rand() limit 0,12');
            while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                echo "<div class='col-md-4 mb-2 mt-2'>
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
        }
    }

    function getTousProduits(){
        global $con;
        if(!isset($_GET['categorie']) && !isset($_GET['marque'])){
            $select_produit = $con->query('SELECT * FROM produits order by rand()');
            while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                echo "<div class='col-md-4 mb-2 mt-2'>
                    <div class='card'>
                    <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                    <div class='card-body'>
                    <h5 class='card-title'>$ligne->nom_produit</h5>
                    <p class='card-text'>$ligne->description_produit</p>
                    <p class='card-text'>Prix : $ligne->prix_produit MAD</p>
                    <a href='#' class='btn btn-primary'>Ajouter</a>
                    <a href='./index.php?voir_details&id_produit=$ligne->id_produit' class='btn btn-secondary'>Voir les détails</a>
                    </div>
                    </div>
                    </div>";
            }
        }

    }

    //Afficher les Catégories
    function getCategories(){

        global $con;
        $select_categories = $con->query('SELECT * FROM categories');
        while($ligne = $select_categories->fetch(PDO::FETCH_OBJ)){
            echo "<li class='nav-item'><a href='index.php?categorie=$ligne->id_categorie' class='nav-link text-light'>$ligne->nom_categorie</a></li>";
        }

    }

    //Afficher les marques
    function getMarques(){
        global $con;
        $select_marques = $con->query('SELECT * FROM marques');
        if($select_marques){
            while($ligne = $select_marques->fetch(PDO::FETCH_OBJ)){
                echo "<li class='nav-item'><a href='index.php?marque=$ligne->id_marque' class='nav-link text-light'>$ligne->nom_marque</a></li>";
            }
        }else{
            echo "Pas de Marques pour le moment";  
        }
    }

    //Afficher les produits d'une catégorie
    function getProduitsByCategorie(){
        global $con;
        if(isset($_GET['categorie'])){
            $categorie_id = htmlspecialchars($_GET['categorie']);
            $select_produit = $con->query("SELECT * FROM produits where id_categorie = $categorie_id");
            $rows = $select_produit->rowCount();
            if($rows == 0){
                echo '<h2 class="text-center mt-5 text-danger">Pas de Produits disponible pour cette catégorie!</h2>';
            }
            while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                echo "<div class='col-md-4 mb-2 mt-2'>
                    <div class='card'>
                    <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                    <div class='card-body'>
                    <h5 class='card-title'>$ligne->nom_produit</h5>
                    <p class='card-text'>$ligne->description_produit</p>
                    <p class='card-text'>Prix : $ligne->prix_produit MAD</p>
                    <a href='#' class='btn btn-primary'>Ajouter</a>
                    <a href='./index.php?voir_details&id_produit=$ligne->id_produit' class='btn btn-secondary'>Voir les détails</a>
                    </div>
                    </div>
                    </div>";
            }
        }
    }

    //Afficher les produits d'une marque
    function getProduitsByMarque(){
        global $con;
        if(isset($_GET['marque'])){
            $marque_id = htmlspecialchars($_GET['marque']);
            $select_produit = $con->query("SELECT * FROM produits where id_marque = $marque_id");
            $rows = $select_produit->rowCount();
            if($rows == 0){
                echo '<h2 class="text-center mt-5 text-danger">Pas de Produits disponible pour cette marque!</h2>';
            }
            while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                echo "<div class='col-md-4 mb-2 mt-2'>
                    <div class='card'>
                    <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                    <div class='card-body'>
                    <h5 class='card-title'>$ligne->nom_produit</h5>
                    <p class='card-text'>$ligne->description_produit</p>
                    <p class='card-text'>Prix : $ligne->prix_produit MAD</p>
                    <a href='#' class='btn btn-primary'>Ajouter</a>
                    <a href='./index.php?voir_details&id_produit=$ligne->id_produit' class='btn btn-secondary'>Voir les détails</a>
                    </div>
                    </div>
                    </div>";
            }
        }
        
    }


    // Afficher les produits recherchees
    function searchProducts(){
        global $con;
        if(isset($_GET['search_btn'])){
            $search_data = htmlspecialchars($_GET['search_data']);

            $select_produit = $con->query("SELECT * FROM produits WHERE mots_cles LIKE '%$search_data%'");
            $rows = $select_produit->rowCount();
            if($rows == 0){
                echo '<h2 class="text-center mt-5 text-danger">Aucun Produits correspondabt à cette recherche !</h2>';
            }else{
                while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                    echo "<div class='col-md-4 mb-2 mt-2'>
                        <div class='card'>
                        <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                        <div class='card-body'>
                        <h5 class='card-title'>$ligne->nom_produit</h5>
                        <p class='card-text'>$ligne->description_produit</p>
                        <p class='card-text'>Prix : $ligne->prix_produit MAD</p>
                        <a href='#' class='btn btn-primary'>Ajouter</a>
                        <a href='./index.php?voir_details&id_produit=$ligne->id_produit' class='btn btn-secondary'>Voir les détails</a>
                        </div>
                        </div>
                        </div>";
                }
            }
        }
    }

    //voire les details
    function getDetails(){
        global $con;
        if(!isset($_GET['categorie']) && !isset($_GET['marque']) && isset($_GET['id_produit'])){
            $id_produit = htmlspecialchars($_GET['id_produit']);
            $select_produit = $con->query("SELECT * FROM produits WHERE id_produit = $id_produit");
            while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                echo "
                <div class='col-md-4'>
                    <!-- photos -->
                    <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                </div>
                <div class='col-md-8'>
                    <!-- text -->
                    <h5 class='card-title'>$ligne->nom_produit</h5>
                    <p class='card-text'><strong>Description: </strong>$ligne->description_produit</p>
                    <p class='card-text'><strong>Prix : </strong>$ligne->prix_produit MAD</p>
                </div>
                <div class='col-md-12 text-center p-2'>
                    <a href='#' class='btn btn-primary'>Ajouter</a>
                    <a href='./index.php' class='btn btn-secondary'>Retour</a>
                </div>
                ";
            }
        }
    }

?>