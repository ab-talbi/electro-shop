<?php
    
    require_once('../includes/connect.php');
?>
<h2 class="text-center text-success my-4">Tous les categories</h2>

<table class="table mt-5">
    <thead class="bg-success">
        <tr class="text-center">
            <th>#</th>
            <th>Nom de categorie</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody class="bg-light" >

        <?php
            $number = 1;
            $select_categories = $con->query('SELECT * FROM categories');
            while($ligne = $select_categories->fetch(PDO::FETCH_OBJ)){    
        ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $ligne->nom_categorie; ?></td>
            <td><a href="index.php?modifier_categorie=<?php echo $ligne->id_categorie; ?>" class="text-black"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><button value="index.php?supprimer_categorie=<?php echo $ligne->id_categorie; ?>" 
            type="button" class=" fa-solid fa-trash btn text-black confirme" data-bs-toggle="modal" data-bs-target="#exampleModal">
            </button></td>
            <td><button value="index.php?supprimer_categorie=<?php echo $ligne->id_categorie; ?>"
                        type='button' class='fa-solid fa-trash-can btn text-black confirme' data-bs-toggle='modal' data-bs-target='#exampleModal'></button>
            </td>
        </tr>
        <?php
            $number++;
            }
        ?>
    </tbody>
</table>