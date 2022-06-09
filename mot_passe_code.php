<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperer votre mot de passe</title>
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
<?php 
session_start();
    
    if(isset($_POST["verifie_mot"]) or isset($_SESSION['otp_code'])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];
        $_SESSION['otp_code'] = $otp_code;

        if($otp != $otp_code){
            echo '<script>Swal.fire({position: "center",
                icon: "error",
                title: "Verifier le code",
                showConfirmButton: true}).then((result) => {
                    if(result.isConfirmed) {
                      Swal.fire(
                        window.open("/Electro-Shop/mot_passe_oublier_verification.php","_self")
                      )
                    }else{
                        window.open("/Electro-Shop/mot_passe_oublier_verification.php","_self")
                    }
                  });
                </script>';

        }else{

            echo '<form class="mt-5 w-50 m-auto" action="derniere_etape_pass.php" method="post">

        <!-- passsword -->
        <div class="form-outline mb-4">
            <label for="idpasswd" class="form-label w-50 m-auto">Mot de passe </label>
            <input type="password" name="passwd" id="idpasswd" class="form-control w-50 m-auto" placeholder="Saisir le nouveau Mot de passe" autocomplete="off"/>
        </div>

        <!-- confermer passsword -->
        <div class="form-outline mb-4">
            <label for="idconfPass" class="form-label w-50 m-auto">Confirmer le mot de passe </label>
            <input type="password" name="confPass" id="idconfPass" class="w-50 m-auto form-control" placeholder="Confiremer votre mot de passe" autocomplete="off"/>
        </div>

        
        <div class="text-center w-50 m-auto">
            <input name="enregistrer_mot_passe" type="submit" value="Enregistrer Le mot de passe" class="btn btn-success me-1 m-auto"/>
            
        </div>
        </form>';


        

        
            
        }
        

    }

?>

    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>