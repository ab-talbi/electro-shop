<?php 
    session_start();
    include('./includes/connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification du compte</title>
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
<main class="login-form mt-5">
    <div class="container mt-5">
        <form name='w-50 m-auto mt-5' action="" method="post">
            <input type="email" name="email" id="" class="form-control mb-3 w-50 m-auto" value='<?php if(isset($_SESSION['email_pour_password'])) echo $_SESSION['email_pour_password']; ?>' placeholder='Votre email'>

            <input class='form-control btn-primary w-50 m-auto' name='envoyer_password_code' type="submit" value="Envoyer moi un code de verification">
        </form>
    </div>

</main>



<?php 
    
    if(isset($_POST["envoyer_password_code"])){
        
        $email_utilisateur = htmlspecialchars($_POST['email']);

        $select_utilisateur = $con->query("SELECT * FROM `utilisateurs` WHERE email_utilisateur like '$email_utilisateur'");
        $rows = $select_utilisateur->rowCount();
        while($ligne = $select_utilisateur->fetch(PDO::FETCH_OBJ)){
            $nom_utilisateur = $ligne->nom_utilisateur;
        }
        if($rows == 0){
            echo "<script>Swal.fire({position: 'center',
                icon: 'error',
                title: 'Pas de compte associe a cette email',
                showConfirmButton: true});
                </script>";
        }
        else{



            $otp = rand(100000,999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $email_utilisateur;
            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // $mail->Username='electroshop.irisi1@gmail.com';
            // $mail->Password='123abc$456ABC';

            $mail->Username='ayoubtalbi787@gmail.com';
            $mail->Password='tsue nioq ieim tkgc';

            // $mail->setFrom('electroshop.irisi1@gmail.com', 'ElectroShop');
            // $mail->addAddress($_POST["email"]);

            $mail->setFrom('ayoubtalbi787@gmail.com', 'ElectroShop');
            $mail->addAddress($_POST["email"]);

            $mail->isHTML(true);
            $mail->Subject="Votre Code de Verification Pour mettre à jour le mot de Passe";
            $mail->Body="<p>M/Mme $nom_utilisateur, </p><br><br> <h3 style='font-size: 50px;'>Ce Code vous permet de récuperer votre mot de passe de votre compte sur <strong>ElectroShop</strong> :</h3><h1 style='color:red;margin:auto;font-size: 150px'>$otp</h1>
            <br><br>
            <p>Cordialement,</p>
            <p><strong>Equipe ElectroShop</strong></p>
            <p><strong>IRISI1</strong></p>
            <p><strong>2021-2022</strong></p>
            <p><strong>Fstg - Marrakech</strong></p>";

            if(!$mail->send()){

                echo "<script>Swal.fire({position: 'center',
                    icon: 'error',
                    title: 'Email n\'existe pas',
                    showConfirmButton: true});
                    </script>";

            }else{

                $modifier_utilisateur = "UPDATE utilisateurs SET verification_code=:verification_code WHERE email_utilisateur=:email_utilisateur";
                $modifier= $con->prepare($modifier_utilisateur);
                $modifier->execute(array('verification_code' => $otp,'email_utilisateur' => $email_utilisateur));

                echo "<script>Swal.fire({position: 'center',
                    icon: 'success',
                    title: 'Un code à été envoyer à $email_utilisateur',
                    showConfirmButton: true}).then((result) => {
                                if (result.isConfirmed) {
                        Swal.fire(
                                window.open('./mot_passe_oublier_verification.php','_self')
                                )
                                    }else{
                        window.open('./mot_passe_oublier_verification.php','_self')
                    }
                });</script>";
    
                               
                                
                                
            }
                            
                 //----Fin Envoyer Code Verification

        }




        

    }

?>



    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>