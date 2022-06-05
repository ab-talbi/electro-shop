    <h3 class="text-danger text-center my-4">Êtes-vous sûr de vouloir le supprimer ?</h3>
    <form action="" method="post" class=" d-flex align-items-center justify-content-center mt-5">
        <div class="form-outline mb-4">
            <input type="submit" value="Oui" name="ok-btn" class="btn btn-danger m-2">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" value="Non" name="no-btn" class="btn btn-success m-2">
        </div>
    </form>


    
<?php

    if(isset($_SESSION['nom_utilisateur'],$_SESSION['id_utilisateur'])){
        $id_utilisateur = $_SESSION['id_utilisateur'];
        if(isset($_POST['ok-btn'])){
            $delete_user = $con->prepare("DELETE FROM utilisateurs WHERE id_utilisateur=?")->execute(array($id_utilisateur));
            if($delete_user){
                session_destroy();
                echo "
                <script>
                    alert('votre compte a étè sipprimer');
             
                    window.open('../index.php','_self');
               </script>";
            }
        }

        if(isset($_POST['no-btn'])){
            echo "
            <script>  
                window.open('profile.php','_self')
            </script>";
        }
    }

?>

