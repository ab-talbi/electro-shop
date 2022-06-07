<?php

    @session_start();
    include('../includes/connect.php');
    include('../fonctions/fonctions.php');
    $adresse_ip = getIPAddress();
    $select_utilisateur = $con->query("SELECT * FROM `utilisateurs` WHERE ip_utilisateur like '$adresse_ip'");
    $id_utilisateur = ($select_utilisateur->fetch(PDO::FETCH_OBJ))->id_utilisateur;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro Shop - Payer</title>
</head>
<body>
    <div class="container">
        <div class="row mt-3 mb-3 text-center">
            <!-- <div class="col-lg-6 col-sm-12"><a href=''><button style='width:100% ;height:100px'><img style='width:50%' src='../images/paypal.png'></img></button></a></div> -->
            
            <div id="paypal-button-container"></div>
            <div class="col-lg-12 col-sm-12"><a href="./les_commandes.php?id_utilisateur=<?php echo $id_utilisateur ?>"><button style='width:100%; height:100px'>Je ne suis Pas Sur mais je veux enregistrer la commande</button></a></div>
        </div>
    </div>
    <input type="hidden" id="amount" name="amount" value=<?php echo $_SESSION['total']?> />
    
    <!-- paypal script -->
    <script src="https://www.paypal.com/sdk/js?client-id=AfaLemrF5KCyRixbyUz3rVNbI09pS1cSEKeCKgPjqVccV_YyFECFcujBTQkABa_nHcKBAO9squeZb7eq"></script>
    <script src="../js/paypal.js"></script>
<!-- </body>&disable-funding=card -->
</html>