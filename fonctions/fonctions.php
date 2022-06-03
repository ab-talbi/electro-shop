
<?php

    //Afficher les produits
    function getProduits(){
        global $con;
        if(!isset($_GET['categorie']) && !isset($_GET['marque']) && !isset($_get['search_btn'])){
            $select_produit = $con->query('SELECT * FROM produits order by rand() limit 0,12');
            while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                echo "<div class='col-md-3 mb-2 mt-2'>
                    <div class='card'>
                    <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                    <div class='card-body'>
                    <h5 class='card-title'>$ligne->nom_produit</h5>
                    <p class='card-text to-limit'>$ligne->description_produit</p>
                    <p class='card-text'><strong>Prix : $ligne->prix_produit MAD</strong></p>
                    <a href='./index.php?ajouter_produit_carte=$ligne->id_produit' class='btn btn-primary' style='width:49%'>Ajouter</a>
                    <a href='./index.php?voir_details&id_produit=$ligne->id_produit' class='btn btn-secondary' style='width:49%'>Détails</a>
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
                echo "<div class='col-md-3 mb-2 mt-2'>
                    <div class='card'>
                    <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                    <div class='card-body'>
                    <h5 class='card-title'>$ligne->nom_produit</h5>
                    <p class='card-text to-limit'>$ligne->description_produit</p>
                    <p class='card-text'><strong>Prix : $ligne->prix_produit MAD</strong></p>
                    <a href='./index.php?ajouter_produit_carte=$ligne->id_produit' class='btn btn-primary' style='width:49%'>Ajouter</a>
                    <a href='./index.php?voir_details&id_produit=$ligne->id_produit' class='btn btn-secondary' style='width:49%'>Détails</a>
                    </div>
                    </div>
                    </div>";
            }
        }

    }

    //Afficher les Catégories
    function getCategories($url){

        global $con;
        $select_categories = $con->query('SELECT * FROM categories');
        while($ligne = $select_categories->fetch(PDO::FETCH_OBJ)){
           echo "<li><a class='dropdown-item' href='".$url."categorie=$ligne->id_categorie'>$ligne->nom_categorie</a></li>";
            //echo "<li class='nav-item liList'><a href='".$url."categorie=$ligne->id_categorie' class=''>$ligne->nom_categorie</a></li>";
        }

    }

    //Afficher les marques
    function getMarques($url){
        global $con;
        $select_marques = $con->query('SELECT * FROM marques');
        if($select_marques){
            echo "<div class='col-md-2 bg-black-white p-0'>
                    <ul class='navbar-nav me-auto text-center'>
                        <li class='nav-item bg-blue-black'>
                            <a href='#' class='nav-link text-light'><h4>Les Marques</h4></a>
                        </li>";
            while($ligne = $select_marques->fetch(PDO::FETCH_OBJ)){
                echo "<li class='nav-item'><a href='".$url."marque=$ligne->id_marque' class='nav-link text-light'>$ligne->nom_marque</a></li>";
            }
            echo "
            </ul>
        </div>";
        }else{
            echo "Pas de Marques pour le moment";  
        }
    }

    //Afficher les produits d'une catégorie
    function getProduitsByCategorie(){
        global $con;
        if(isset($_GET['categorie']) && !isset($_GET['marque'])){
            $categorie_id = htmlspecialchars($_GET['categorie']);
            $select_produit = $con->query("SELECT * FROM produits where id_categorie = $categorie_id");
            $rows = $select_produit->rowCount();
            if($rows == 0){
                echo '<h2 class="text-center mt-5 text-danger">Pas de Produits disponible pour cette catégorie!</h2>';
            }
            while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                echo "<div class='col-md-3 mb-2 mt-2'>
                    <div class='card'>
                    <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                    <div class='card-body'>
                    <h5 class='card-title'>$ligne->nom_produit</h5>
                    <p class='card-text to-limit'>$ligne->description_produit</p>
                    <p class='card-text'><strong>Prix : $ligne->prix_produit MAD</strong></p>
                    <a href='./index.php?ajouter_produit_carte=$ligne->id_produit' class='btn btn-primary' style='width:49%'>Ajouter</a>
                    <a href='./index.php?voir_details&id_produit=$ligne->id_produit' class='btn btn-secondary' style='width:49%'>Détails</a>
                    </div>
                    </div>
                    </div>";
            }
        }
    }

    //Afficher les produits d'une marque
    function getProduitsByMarque(){
        global $con;
        if(isset($_GET['marque']) && !isset($_GET['categorie'])){
            $marque_id = htmlspecialchars($_GET['marque']);
            $select_produit = $con->query("SELECT * FROM produits where id_marque = $marque_id");
            $rows = $select_produit->rowCount();
            if($rows == 0){
                echo '<h2 class="text-center mt-5 text-danger">Pas de Produits disponible pour cette marque!</h2>';
            }
            while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                echo "<div class='col-md-3 mb-2 mt-2'>
                    <div class='card'>
                    <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                    <div class='card-body'>
                    <h5 class='card-title'>$ligne->nom_produit</h5>
                    <p class='card-text to-limit'>$ligne->description_produit</p>
                    <p class='card-text'><strong>Prix : $ligne->prix_produit MAD</strong></p>
                    <a href='./index.php?ajouter_produit_carte=$ligne->id_produit' class='btn btn-primary' style='width:49%'>Ajouter</a>
                    <a href='./index.php?voir_details&id_produit=$ligne->id_produit' class='btn btn-secondary' style='width:49%'>Détails</a>
                    </div>
                    </div>
                    </div>";
            }
        }
        
    }


    //afficher les produit selon la marque et categorie
    function getProduitsByMarqueEtCategorie(){
        global $con;
        if(isset($_GET['marque']) && isset($_GET['categorie'])){
            $marque_id = htmlspecialchars($_GET['marque']);
            $categorie_id = htmlspecialchars($_GET['categorie']);
            $select_produit = $con->query("SELECT * FROM produits WHERE id_marque = $marque_id AND id_categorie = $categorie_id");
            $rows = $select_produit->rowCount();
            if($rows == 0){
                echo '<h2 class="text-center mt-5 text-danger">Pas de Produits disponible pour cette marque et categorie!</h2>';
            }
            while($ligne = $select_produit->fetch(PDO::FETCH_OBJ)){
                echo "<div class='col-md-3 mb-2 mt-2'>
                    <div class='card'>
                    <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                    <div class='card-body'>
                    <h5 class='card-title'>$ligne->nom_produit</h5>
                    <p class='card-text'>$ligne->description_produit</p>
                    <p class='card-text'>Prix : $ligne->prix_produit MAD</p>
                    <a href='./index.php?ajouter_produit_carte=$ligne->id_produit' class='btn btn-primary'>Ajouter</a>
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
                    echo "<div class='col-md-3 mb-2 mt-2'>
                        <div class='card'>
                        <img src='./admin/produits_images/$ligne->produit_image1' class='card-img-top' alt='$ligne->nom_produit'>
                        <div class='card-body'>
                        <h5 class='card-title'>$ligne->nom_produit</h5>
                        <p class='card-text to-limit'>$ligne->description_produit</p>
                        <p class='card-text'><strong>Prix : $ligne->prix_produit MAD</strong></p>
                        <a href='./index.php?ajouter_produit_carte=$ligne->id_produit' class='btn btn-primary' style='width:49%'>Ajouter</a>
                        <a href='./index.php?voir_details&id_produit=$ligne->id_produit' class='btn btn-secondary' style='width:49%'>Détails</a>
                        </div>
                        </div>
                        </div>";
                }
            }
        }
    }

    //L'adresse ip de l'etulisateur
    function getIPAddress() {  
        //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
        //whether ip is from the remote address  
        else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }  
         
        return $ip;
        
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
                    <p class='card-text'><strong>Prix : $ligne->prix_produit MAD</strong></p>
                </div>
                <div class='col-md-12 text-center p-2'>
                    <a href='./index.php?ajouter_produit_carte=$ligne->id_produit' class='btn btn-primary'>Ajouter</a>
                    <a href='./index.php' class='btn btn-secondary'>Retour</a>
                </div>
                ";
            }
        }
    }

    function ajouterProduitCarte(){
        global $con;
        if(isset($_GET['ajouter_produit_carte'])){
            $adresse_ip = getIPAddress();
            $id_produit = htmlspecialchars($_GET['ajouter_produit_carte']);
            $select_produit = $con->query("SELECT * FROM `carte` WHERE id_produit = $id_produit and adresse_ip like '$adresse_ip'");
            $rows = $select_produit->rowCount();
            if($rows > 0){
                echo "<script>Swal.fire({position: 'center',
                    icon: 'error',
                    title: 'Déjà ajouté',
                    showConfirmButton: true}).then((result) => {
                        if (result.isConfirmed) {
                          Swal.fire(
                            window.open('./index.php','_self')
                          )
                        }else{
                            window.open('./index.php','_self')
                        }
                      });
                    </script>";
            }else{
                $insert_produit = $con->prepare('INSERT INTO carte(id_produit,adresse_ip,quantite) VALUES(:id_produit,:adresse_ip,:quantite)');
                $insert_produit->execute(array(":id_produit"=>$id_produit,":adresse_ip"=>$adresse_ip,":quantite"=>1));

                if($insert_produit){
                    echo "<script>Swal.fire({position: 'center',
                        icon: 'success',
                        title: 'Le Produit à été ajouté avec succés',
                        showConfirmButton: true}).then((result) => {
                            if (result.isConfirmed) {
                              Swal.fire(
                                window.open('./index.php','_self')
                              )
                            }else{
                                window.open('./index.php','_self')
                            }
                          });</script>";
                }
                
            }
        }
    }


    //Afficher le nombre de produits dans la carte pour un etulisateur
    // function getNombreProduitsPourUtilisateur(){
    //         global $con;
    //         $adresse_ip = getIPAddress();
    //         $select_produit_utilisateur = $con->query("SELECT * FROM `carte` WHERE adresse_ip like '$adresse_ip'");
    //         $rows = $select_produit_utilisateur->rowCount();
    //         echo $rows;
    // }


    //Afficher le Prix Total de produits dans la carte pour un etulisateur
    function getPrixTotalProduitsPourUtilisateur(){
        global $con;
        $adresse_ip = getIPAddress();
        $select_produit_utilisateur = $con->query("SELECT * FROM `carte` WHERE adresse_ip like '$adresse_ip'");
        $prix_total = 0;

        while($ligne = $select_produit_utilisateur->fetch(PDO::FETCH_OBJ)){
            $select_produit = $con->query("SELECT * FROM `produits` WHERE id_produit = $ligne->id_produit");
            $row = $select_produit->rowCount();
            if($row != 0){
                $prix_total += (($select_produit->fetch(PDO::FETCH_OBJ))->prix_produit)*$ligne->quantite; 
            }
        }

        return $prix_total;
    }


    //Afficher les produits existent dans la carte pour un etulisateur
    function getTousProduitsCartePourUtilisateur(){
        global $con;
        $adresse_ip = getIPAddress();
        $select_produit_utilisateur = $con->query("SELECT * FROM `carte` WHERE adresse_ip like '$adresse_ip'");
        $compteur = 1;

        $rows = $select_produit_utilisateur->rowCount();
        if($rows>0){
            echo '
            <form action="./carte.php" mathod="get">
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
                <th scope="col"><input style="opacity:0; position:absolute;" id="selectionner" class="selectionner" type="checkbox"/><label for="selectionner">Sélectionner Tous</label></th>
                <th colspan="2">Opérations</th>
                </tr>
            </thead>
            <tbody>
            ';
            $tot = 0;
            while($ligne = $select_produit_utilisateur->fetch(PDO::FETCH_OBJ)){
                $select_produit = $con->query("SELECT * FROM `produits` WHERE id_produit = $ligne->id_produit");
                $quantite = $ligne->quantite;

                $existe_produit = $select_produit->rowCount();
                
                if($existe_produit > 0){
                    while($prod = $select_produit->fetch(PDO::FETCH_OBJ)){
                        $nom_produit = $prod->nom_produit;
                        $prix_unitaire = $prod->prix_produit;
                        $image1 = $prod->produit_image1;
                        $prix_total_produit = $prix_unitaire * $quantite;
                        $tot = $tot + $prix_total_produit;
                        echo "
                            <tr>
                                <th scope='row'>$compteur</th>
                                <td>$nom_produit</td>
                                <td><img style='width:100px' src='./admin/produits_images/$image1' alt='$nom_produit'></td>
                                <td>$prix_unitaire</td>
                                <td><input type='number' name='modifier_quantite_carte_$ligne->id_produit' class='form-input w-50' value='$quantite'></td>
                                <td>$prix_total_produit</td>
                                <td><input class='thecheck' value='$ligne->id_produit' type='checkbox' name='supprimer_prod_cart[]'></td>
                                <td>
                                <input class='btn btn-danger' style='width:100%' type='submit' value='Supprimer' name='supprimer_produit_carte_$ligne->id_produit' formaction='./carte.php'>
                                </td>
                            </tr> 
                        ";
                                 
                    }
                }
                
                $compteur++; 
            }
            echo "
            </tbody>
            </table>
            <input class='btn btn-danger mb-2' style='width:100%' type='submit' value='Supprimer Les Produits' name='supprimer_produits_carte' formaction='./carte.php'>
            <input class='btn btn-primary mb-3' style='width:100%' type='submit' value='Enregistrer les modifications' name='modifier_produit_carte' formaction='./carte.php'>
            </form>

            <div class='d-flex mb-3'>
                <h4 class='px-3'>TOTAL DE LA COMMANDE :<strong> $tot DH<sub>TTC</sub> </strong></h4>
                <a href='./index.php'><button class='px-3 btn btn-primary'>Ajouter Autres Produits</button></a>
                <a class='px-2' href='./client/commander.php'><button class='px-3 btn btn-secondary'>Commander</button></a>
            </div>
            ";
        }else{
            echo "<div class='text-center' style='margin-bottom:60px;margin-top:60px'><h2 style='color:red;' class=' text-center'><strong>La carte est vide</strong></h2>
            <a href='./index.php' class='px-3 btn btn-primary'>Ajouter des Produits</a></div>";
        }
    }


    //Modifier Quantite de Produit dans la carte
    function modifierCarteQuantite(){
        global $con;
        $adresse_ip = getIPAddress();
        $select_produit_utilisateur = $con->query("SELECT * FROM `carte` WHERE adresse_ip like '$adresse_ip'");
    
        $rows = $select_produit_utilisateur->rowCount();
        if($rows>0){
            while($ligne = $select_produit_utilisateur->fetch(PDO::FETCH_OBJ)){
                $select_produit = $con->query("SELECT * FROM `produits` WHERE id_produit = $ligne->id_produit");
    
                $qty = htmlspecialchars($_GET["modifier_quantite_carte_$ligne->id_produit"]);
    
                $modifier_qty = "UPDATE carte SET quantite=:quantite WHERE adresse_ip=:adresse_ip and id_produit = $ligne->id_produit";
                $modifier= $con->prepare($modifier_qty);
                $modifier->execute(array('quantite' => $qty,'adresse_ip' => $adresse_ip));
                if($modifier){
                    echo "<script>Swal.fire({position: 'center',
                        icon: 'success',
                        title: 'la carte à été modifier avec succés',
                        showConfirmButton: true}).then((result) => {
                            if (result.isConfirmed) {
                              Swal.fire(
                                window.open('./carte.php','_self')
                              )
                            }
                            else{
                                window.open('./carte.php','_self')
                            }
                          });
                        </script>";
                }
            }
        } 
    }

    //Supprimer les Produits de la carte
    function supprimerCarteProduits(){
        global $con;
        $adresse_ip = getIPAddress();
        if(isset($_GET['supprimer_produits_carte'])){
            $supp;
            if(isset($_GET['supprimer_prod_cart'])){
                foreach($_GET['supprimer_prod_cart'] as $supprimer_produit_id){
                    $supp = $con->prepare("DELETE FROM carte WHERE id_produit=? and adresse_ip like '$adresse_ip'")->execute([$supprimer_produit_id]);
                }
                if($supp){
                    echo '<script>Swal.fire({position: "center",
                        icon: "success",
                        title: "Produit(s) supprimé(s) de la carte avec succés",
                        showConfirmButton: true}).then((result) => {
                            if (result.isConfirmed) {
                              Swal.fire(
                                window.open("./carte.php","_self")
                              )
                            }
                            else{
                                window.open("./carte.php","_self")
                            }
                          });
                        </script>';
                }
            }else{
                echo '<script>Swal.fire({position: "center",
                    icon: "error",
                    title: "Sélectionner d\'abord un produit ou plus",
                    showConfirmButton: true}).then((result) => {
                        if(result.isConfirmed) {
                          Swal.fire(
                            window.open("./carte.php","_self")
                          )
                        }else{
                            window.open("./carte.php","_self")
                        }
                      });
                    </script>';
            
                    }

        }

    }

    function supprimerCarteUnSeulProduit(){
        global $con;
        $adresse_ip = getIPAddress();

        $select_produit_utilisateur = $con->query("SELECT * FROM `carte` WHERE adresse_ip like '$adresse_ip'");

        $rows = $select_produit_utilisateur->rowCount();
        if($rows>0){
            while($ligne = $select_produit_utilisateur->fetch(PDO::FETCH_OBJ)){
                if(isset($_GET["supprimer_produit_carte_$ligne->id_produit"])){
                    $supp = $con->prepare("DELETE FROM carte WHERE id_produit=? and adresse_ip like '$adresse_ip'")->execute([$ligne->id_produit]);
                    if($supp){
                        echo "<script>Swal.fire({position: 'center',
                            icon: 'success',
                            title: 'Le Produit à été supprimé de la carte avec succés',
                            showConfirmButton: true}).then((result) => {
                                if (result.isConfirmed) {
                                  Swal.fire(
                                    window.open('./carte.php','_self')
                                  )
                                }
                              });
                            </script>";
                    }
                }
            }
        } 
    }



    //Compter le nombre de Produits dans la carte pour un utilisateur
    function getNombreProduitsPourUtilisateur(){
        global $con;
        $adresse_ip = getIPAddress();
            
        $select_produit_utilisateur = $con->query("SELECT * FROM `carte` WHERE adresse_ip like '$adresse_ip'");
        $nombre_produits = 0;
        // echo $rows;
        while($ligne = $select_produit_utilisateur->fetch(PDO::FETCH_OBJ)){
            $nombre_produits += $ligne->quantite;
        }
        return $nombre_produits;
    }


?>