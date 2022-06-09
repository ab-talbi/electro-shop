<?php

    include('../includes/connect.php');
    include('../fonctions/fonctions.php');

    session_start();
    $total_a_payer = $_SESSION['total']*9.8;
    $pourcentage_remise = $_SESSION['remise'];
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    


    <!-- js -->


    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


<?php

$adresse_ip = getIPAddress();
$select_utilisateur = $con->query("SELECT * FROM `utilisateurs` WHERE ip_utilisateur like '$adresse_ip'");
$id_utilisateur = ($select_utilisateur->fetch(PDO::FETCH_OBJ))->id_utilisateur;

if(isset($_GET['id_utilisateur']) and (string)$id_utilisateur == $_GET['id_utilisateur'] or (isset($_SESSION['mode_paiement']) and isset($_SESSION['id_utilisateur']) and $_SESSION['id_utilisateur'] == (string)$id_utilisateur)){

    $random_cmd = mt_rand();
    $status_commande = 'suspens';
    if(isset($_SESSION['mode_paiement'])){
        $status_commande = 'paypal';
    }else{
        $status_commande = 'Après Livraison';
    }

    $prix_total = getPrixTotalProduitsPourUtilisateur();
    $nombre_produits = getNombreProduitsPourUtilisateur();
    if($prix_total == 0){
        echo '<script>window.open("../carte.php","_self")</script>';
    }

    

    $select_carte = $con->query("SELECT * FROM `carte`");

    $rows = $select_carte->rowCount();
    if($rows>0){
        while($ligne = $select_carte->fetch(PDO::FETCH_OBJ)){
            $id_produit = $ligne->id_produit; 
            $quantite = $ligne->quantite;


            //modifier le stock du produits
            $select_stock = $con->prepare('SELECT nom_produit, stock FROM produits WHERE id_produit = ?');
            $select_stock->execute(array($id_produit));
            $stock = $select_stock->fetch();
            $q_stock = $stock['stock'];
            $nom_produit = $stock['nom_produit'];

            if($q_stock >= $quantite){
                $new_stock = $q_stock - $quantite;
                if($new_stock <= 0){
                    $status_produit = "pas disponible";
                }else{
                    $status_produit = "disponible";
                }
                $select_stock = $con->prepare('UPDATE produits SET stock=:stock, status_produit=:status_produit WHERE id_produit = :id_produit');
                $select_stock->execute(array(":stock"=>$new_stock,
                                             ":status_produit"=>$status_produit, 
                                             ":id_produit"=>$id_produit));
            }else{
                echo "
                    <script>
                        alert('une categorie à étè supprimer');
                
                        window.open('../carte.php','_self');
                </script>";
                exit();
            }
            

            
            $insert_carte_backup = $con->prepare('INSERT INTO carte_backup(id_carte_commande,id_produit,quantite) VALUES(:id_carte_commande,:id_produit,:quantite)');
            $insert_carte_backup->execute(array(":id_carte_commande"=>$random_cmd,":id_produit"=>$id_produit,":quantite"=>$quantite));
            


        }
    }



    $insert_commande = $con->prepare('INSERT INTO commande(id_utilisateur,a_payer,random_cmd,nombre_produits,status_commande,remise,total_a_payer) VALUES(:id_utilisateur,:a_payer,:random_cmd,:nombre_produits,:status_commande,:remise,:total_a_payer)');
    $insert_commande->execute(array(":id_utilisateur"=>$id_utilisateur,":a_payer"=>$prix_total,":random_cmd"=>$random_cmd,":nombre_produits"=>$nombre_produits,":status_commande"=>$status_commande,":remise"=>$pourcentage_remise,":total_a_payer"=>$total_a_payer));
    if($insert_commande){
        if(isset($_SESSION['mode_paiement'])){
            unset($_SESSION['mode_paiement']);
            echo "<script>Swal.fire({position: 'center',
                icon: 'success',
                title: 'La commande à été enregistrée avec succés et completé avec PayPal',
                showConfirmButton: true}).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire(
                        window.open('./profile.php?mes_commandes','_self')
                      )
                    }
                    else{
                        window.open('./profile.php?mes_commandes','_self')
                    }
                  });
                </script>";
        }else{
            echo "<script>Swal.fire({position: 'center',
                icon: 'success',
                title: 'La commande à été enregistrée avec succés',
                showConfirmButton: true}).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire(
                        window.open('./profile.php?mes_commandes','_self')
                      )
                    }
                    else{
                        window.open('./profile.php?mes_commandes','_self')
                    }
                  });
                </script>";
        }
        
    }else{
        echo 'Oops erreur insertion';
    }


    
    $supp = $con->prepare("DELETE FROM carte WHERE adresse_ip like '$adresse_ip'")->execute();

}else{
    echo "404 Vous n'avez pas le droit d'accesder a cette page";
}

?>