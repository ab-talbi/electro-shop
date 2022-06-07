<?php

    include('../includes/connect.php');
    include('../fonctions/fonctions.php');
    @session_start();
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- sweetalert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
   
    <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- css file -->
     <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

    <title>Connexion</title>
    
</head>
<body class="p-5">   
<!-- 
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue-black">
        <ul class="navbar-nav headerBC">
            <li class="nav-item">
                <a href="" class="nav-link">Bienvenue <?php if(isset($_SESSION['nom_utilisateur'])){
                    echo $_SESSION['nom_utilisateur'];
                } ?></a>
            </li>
            <ul class="navbar-nav nav-item">
                <?php if(isset($_SESSION['nom_utilisateur'])){
                    echo '<li class="nav-item">
                    <a href="logout.php" class="nav-link">Déconnecter</a>
                </li>';
                }else{
                    echo '<li class="nav-item">
                    <a href="login.php" class="nav-link">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a href="registre.php" class="nav-link">S\'inscrire</a>
                </li>';
                }
                ?>

            </ul>
            
        </ul>
    </nav> -->
    
    <!-- NavBar -->
    <!-- <?php
        include("../navbar.php");
    ?> -->

    <div class="container-fluid my-3">
        <div class="row d-flex align-items-center text-center justify-content-center">
            <div class="col-md-6">
                <img src="/Electro-Shop/images/passwd.png" alt="password">
            </div>
            <div class="col-lg-6 ">
        
                <form action="" class="" method="post">
                    <h2 class="m-5">connexion</h2>
                    <!-- Email -->
                    <div class="form-outline mb-4">
                        <label for="idemail" class="form-label">Email </label>
                        <input type="email" name="email" id="idemail" class="form-control" placeholder="Votre email valide" autocomplete="off" required="required"/>
                    </div>

                    <!-- passsword -->
                    <div class="form-outline mb-4">
                        <label for="idpasswd" class="form-label">Mot de passe </label>
                        <input type="password" name="passwd" id="idpasswd" class="form-control" placeholder="Mot de passe" autocomplete="off" required="required"/>
                    </div>

                    <div class="text-center">
                        <input name="connexion_submit_btn" type="submit" value="connexion" class="btn btn-success me-1"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

   
    <?php
                        
        // include("../footer.php");
                        
    ?>

    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php

    if(isset($_POST['connexion_submit_btn'])){
        $email_utilisateur = htmlspecialchars($_POST['email']);
        $password_utilisateur = htmlspecialchars($_POST['passwd']);
        $adresse_ip = getIPAddress();

        $select_utilisateur = $con->query("SELECT * FROM `utilisateurs` WHERE email_utilisateur like '$email_utilisateur'");
        $rows = $select_utilisateur->rowCount();
        $nom_utilisateur;
        $mot_passe_utilisateur;
        $id_utilisateur;
        while($ligne = $select_utilisateur->fetch(PDO::FETCH_OBJ)){
            $nom_utilisateur = $ligne->nom_utilisateur;
            $mot_passe_utilisateur = $ligne->mot_passe_utilisateur;
            $id_utilisateur = $ligne->id_utilisateur;
        }

        if($rows > 0){
            if(password_verify($password_utilisateur,$mot_passe_utilisateur)){
                
                $_SESSION['nom_utilisateur'] = $nom_utilisateur;
                $_SESSION['id_utilisateur'] = $id_utilisateur;
                echo "<script>
                        window.open('./index.php?tableau_bort','_self')
                    </script>";

            }else{
                echo "<script>Swal.fire({position: 'center',
                    icon: 'error',
                    title: 'Mot de passe incorrecte',
                    showConfirmButton: true});
                    </script>";
            }
            
        }else{
            echo "<script>Swal.fire({position: 'center',
                icon: 'error',
                title: 'Ce compte n\'existe pas',
                showConfirmButton: true});
                </script>";
        }
    }

?>