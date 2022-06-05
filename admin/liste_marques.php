<?php
    
    require_once('../includes/connect.php');
?>
<h2 class="text-center text-success my-4">Tous les marques</h2>

<table class="table mt-5">
    <thead class="bg-success">
        <tr class="text-center">
            <th>#ID</th>
            <th>Nom de marque</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody class="bg-light" >

        <?php
            $number = 1;
            $select_marques = $con->query('SELECT * FROM marques');
            while($ligne = $select_marques->fetch(PDO::FETCH_OBJ)){    
        ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $ligne->nom_marque; ?></td>
            <td><a href="index.php?modifier_marque=<?php echo $ligne->id_marque; ?>" class="text-black"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a href="index.php?supprimer_marque=<?php echo $ligne->id_marque; ?>" class="text-black"><i class="fa-solid fa-trash"></i></a></td>
        </tr>
        <?php
            $number++;
            }
        ?>
    </tbody>
</table>

