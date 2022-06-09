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
    <title>Electro Shop - Recuperer votre mot de passe</title>
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
    



        <!-- bootstrap-JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

<?php

if(isset($_POST['enregistrer_mot_passe'])){
            
    $password_utilisateur = htmlspecialchars($_POST['passwd']);
    $password_utilisateur_hash = password_hash($password_utilisateur,PASSWORD_DEFAULT);
    $password_utilisateur_verification = htmlspecialchars($_POST['confPass']);
    // echo $password_utilisateur ;
    // echo $password_utilisateur_hash ;
    // exit;

    if($password_utilisateur != $password_utilisateur_verification){
        $_SESSION['pass_inco'] = 'pass_inco';
        echo "<script>Swal.fire({position: 'center',
            icon: 'error',
            title: 'Verifier mot de passe',
            showConfirmButton: true}).then((result) => {
                if (result.isConfirmed) {
        Swal.fire(
                window.open('./mot_passe_code.php','_self')
                )
                    }else{
        window.open('./mot_passe_code.php','_self')
    }
});
            </script>";
    }else{
        $modifier_utilisateur = "UPDATE utilisateurs SET mot_passe_utilisateur=:mot_passe_utilisateur WHERE email_utilisateur=:email_utilisateur";
        $modifier= $con->prepare($modifier_utilisateur);
        $modifier->execute(array('mot_passe_utilisateur' => $password_utilisateur_hash,'email_utilisateur' => $_SESSION['mail']));

        echo "<script>Swal.fire({position: 'center',
            icon: 'success',
            title: 'Le mot de passe à été enregistré',
            showConfirmButton: true}).then((result) => {
                        if (result.isConfirmed) {
                Swal.fire(
                        window.open('./login.php','_self')
                        )
                            }else{
                window.open('./login.php','_self')
            }
        });</script>";

        
    }
}


?>