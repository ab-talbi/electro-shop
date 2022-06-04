<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro Shop - Modifier Votre Compte</title>
</head>
<body>
    
    <form class="w-50 m-auto" action="" method="post" enctype="multipart/form-data">
    <h3 class="text-success-mb-4">Modification de voter compte</h3>
        <div class="form-outline mb-4">
            <label for="nom_utilisateur">Nom :</label>
            <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="form-control w-50" value="">
        </div>
        <div class="form-outline mb-4">
            <label for="prenom_utilisateur">Prénom :</label>
            <input type="text" name="prenom_utilisateur" id="prenom_utilisateur" class="form-control w-50" value="">
        </div>
        <div class="form-outline mb-4">
            <label for="image_utilisateur">Image :</label>
            <input type="file" name="image_utilisateur" id="image_utilisateur" class="form-control w-50" value="">
        </div>
        <div class="form-outline mb-4">
            <label for="adresse_utilisateur">Adresse :</label>
            <input type="text" name="adresse_utilisateur" id="adresse_utilisateur" class="form-control w-50" value="">
        </div>
        <div class="form-outline mb-4">
            <label for="mot_passe_utilisateur">Mot de Passe :</label>
            <input type="password" name="mot_passe_utilisateur" id="mot_passe_utilisateur" class="form-control w-50" value="">
        </div>
        <div class="form-outline mb-4">
            <label for="email_utilisateur">Email :</label>
            <input type="email" name="email_utilisateur" id="email_utilisateur" class="form-control w-50" value="">
        </div>
        <div class="form-outline mb-4">
            <label for="tel_utilisateur">Telephone :</label>
            <input type="tel" name="tel_utilisateur" id="tel_utilisateur" class="form-control w-50" value="">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" name="modifier_btn" class="btn btn-primary form-control w-50 m-auto" value="Modifier">
        </div>
        
    </form>
</body>
</html>