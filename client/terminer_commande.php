
<?php

    @session_start();
    include('../includes/connect.php');
    include('../fonctions/fonctions.php');
    $random_cmd;
    $a_payer;
    if(isset($_SESSION['id_utilisateur']) and isset($_GET['id_commande'])){
        $id_commande = $_GET['id_commande'];
        $select_commande_utilisateur = $con->query("SELECT * FROM `commande` WHERE id_commande = $id_commande");
        while($ligne = $select_commande_utilisateur->fetch(PDO::FETCH_OBJ)){
            $random_cmd = $ligne->random_cmd;
            $a_payer = $ligne->a_payer;
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro Shop - Terminer Votre Commande</title>

    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Alice' rel='stylesheet'>

    <!-- bootstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- sweetalert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
   
    <!-- css file -->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>
<body style="background-color:rgb(1, 9, 36); color:white">

    <div class="container mt-5 mb-5 text-light">
        <h3 class="text-light">Terminer La Commande de Réferrence : <?php echo $random_cmd ?></h3>
        <h3 class="text-light">Le Total à Payer :<strong style='color:red'> <?php echo $a_payer ?> MAD TTC</strong></h3>
        <table class="table caption-top text-center mt-3 text-light ">
            <thead>
                <tr>
                    <th scope="col">Réferrence</th>
                    <th scope="col">Le Total à Payer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope='row'><?php echo $random_cmd ?></th>
                    <td><strong style='color:red'> <?php echo $a_payer ?> </strong>MAD TTC</td>
                </tr>
            </tbody>
        </table>


        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="hidden" name="random_cmd" value="<?php echo $random_cmd ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="hidden" name="a_payer" value="<?php echo $a_payer ?>">
            </div>
            <div class="form-outline mt-4 text-center m-auto">
                <select name="mode_paiement" id="" class="form-select w-50 m-auto">
                    <option value="" disabled selected>Selectionner Le Mode De paiement</option>
                    <option value="paypal" id="paypal-button-container">PayPal</option>
                    <option value="offline">Apres Livraison</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center m-auto">
                <input type="submit" name="terminer_btn" value="Terminer" class="btn btn-success" style="width:50%">
            </div>
        </form>
    </div>

    <?php
    
        if(isset($_POST['terminer_btn']) and $random_cmd == $_POST['random_cmd'] and $a_payer == $_POST['a_payer'] and ($_POST['mode_paiement'] == 'paypal' or $_POST['mode_paiement'] == 'offline')){
            $random_cmd_form = $_POST['random_cmd'];
            $a_payer_form = $_POST['a_payer'];
            $mode_paiement = $_POST['mode_paiement'];

            $insert_paiement = $con->prepare('INSERT INTO paiement_utilisateur(id_commande,random_cmd,a_payer,mode_paiement) VALUES(:id_commande,:random_cmd,:a_payer,:mode_paiement)');
            $insert_paiement->execute(array(":id_commande"=>$id_commande,":random_cmd"=>$random_cmd_form,":a_payer"=>$a_payer_form,":mode_paiement"=>$mode_paiement));
            
            if($insert_paiement){
                $modifier_commande = "UPDATE commande SET status_commande='$mode_paiement' WHERE id_commande = $id_commande";
                $modifier = $con->prepare($modifier_commande);
                $modifier->execute();

                echo "<script>Swal.fire({position: 'center',
                    icon: 'success',
                    title: 'La commande à été completée avec succés',
                    showConfirmButton: true}).then((result) => {
                        if (result.isConfirmed) {
                          Swal.fire(
                            window.open('./profile.php?mes_commandes','_self')
                          )
                        }else{
                            window.open('./profile.php?mes_commandes','_self')
                        }
                      });</script>";
            }
        }
    
    ?>




<!-- paypal script  SMAIL-->
    <!-- <script src="https://www.paypal.com/sdk/js?client-id=AfaLemrF5KCyRixbyUz3rVNbI09pS1cSEKeCKgPjqVccV_YyFECFcujBTQkABa_nHcKBAO9squeZb7eq&disable-funding=card"></script> -->

    <!-- paypal script  AYOUB-->
    <script src="https://www.paypal.com/sdk/js?client-id=AYFLwtsdN8wZS45-S4grGpbW7J8vXRA3CF8EwLy89wVYcujbGLNx7wf3iL1MB1cHVr3QQsPy-yiWw_Yx&disable-funding=card"></script>

    <script>

        
paypal.Buttons({
    style:{
        color:'blue',
        shape:'pill'
    },
    createOrder: function(data,actions){
        return actions.order.create({
            purchase_units:[{
                amount:{
                    value:'<?php echo $a_payer_form; ?>'
                }
            }]
        });
    },
    onApprove: function(data,actions){
        return actions.order.capture().then(function(details){
        //    console.log(details);
            alert("Payment effectuée par "+ details.payer.name.given_name);
            window.location.replace("/Electro-Shop/client/verifier_mzn_avec_paypal.php?mode=paypal&id=<?php echo $id_utilisateur ?>&termine")
        })
    },
    onCancel: function(data){
        alert("Un Problème se produite au niveau de paiement");
        window.location.replace("/Electro-Shop/carte.php")
    }
}).render('#paypal-button-container')

    </script>

    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
</body>
</html>
    