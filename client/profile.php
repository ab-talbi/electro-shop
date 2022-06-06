<?php
    include('../includes/connect.php');
    include('../fonctions/fonctions.php');
    session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro Shop - Profile</title>

     <!-- font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- bootstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- sweetalert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
   
    <!-- css file -->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue-black">
        <ul class="navbar-nav headerBC">
            <li class="nav-item">
                <a href="" class="nav-link">Bienvenue <?php if(isset($_SESSION['nom_utilisateur'])){
                    echo $_SESSION['nom_utilisateur'];
                } ?></a>
            </li>
            <ul class="navbar-nav nav-item">
            <?php if(isset($_SESSION['nom_utilisateur'])){
                    echo "
                    <li class='nav-item'>
                        <a href='./profile.php' class='nav-link'>Profile</a>
                    </li>
                    <li class='nav-item'>
                            <a href='../logout.php' class='nav-link'>Déconnecter</a>
                    </li>";
                }else{
                    echo "
                    <li class='nav-item'>
                    <a href='../login.php' class='nav-link'>Se connecter</a>
                    </li>
                    <li class='nav-item'>
                        <a href='../registre.php' class='nav-link'>S'inscrire</a>
                    </li>";
                }
                ?>
            </ul>
            
        </ul>
    </nav>
    
    <!-- NavBar -->
    <?php
        include("../navbar.php");
    ?>

    
    <div class="bg-black-white text-light">
        <h3 class="text-center">Electro Shop</h3>
        <p class="text-center m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, aspernatur!</p>
    </div>

    <div class="row">
        <div class='col-md-2 bg-black-white p-0'>
            <ul class='navbar-nav me-auto text-center'>
                <li class='nav-item bg-blue-black'>
                    <a href='#' class='nav-link text-light'><h4>Le profile</h4></a>
                </li>
                <li class='nav-item'>
                    <?php
                        if(isset($_SESSION['id_utilisateur'])){
                            getProfilImage($_SESSION['id_utilisateur']);
                        }else{
                            getProfilImage(0);
                        }
                    ?>
                </li>
                <li class='nav-item'>
                    <a href='profile.php' class='nav-link text-light'>Commandes incomplete P55</a>
                </li>
                <li class='nav-item'>
                    <a href='profile.php?modifier_compte' class='nav-link text-light'>Modifier le compte</a>
            </li>
                <li class='nav-item'>
                    <a href='profile.php?mes_commandes' class='nav-link text-light'>Mes Commandes</a>
            </li>
                <li class='nav-item'>
                    <a href='profile.php?supprimer_compte' class='nav-link text-light'>Supprimer le compte</a>
            </li>
                <li class='nav-item'>
                    <a href='/Electro-Shop/logout.php' class='nav-link text-light'>Déconnecter</a>
            </li>
            </ul>
        </div>
        <div class="col-md-10">
                <?php
                    if(isset($_GET['modifier_compte'])){
                        include('modifier_compte.php');
                    }

                    if(isset($_GET['supprimer_compte'])){
                        include('supprimer_compte.php');
                    }
                    
                    if(isset($_GET['mes_commandes'])){
                        include('liste_commandes.php');
                    }
                ?>
        </div>
    </div>

    <!-- Footer -->
    <?php
        include("../footer.php");
    ?>


    <!-- js -->

    <script src="../js/fonctions.js"></script>

    <!-- bootstrap-JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>