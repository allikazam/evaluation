<?php
//j'appelle mon fichier des principales fonctions ici crud.php
require_once 'crud.php';

// je redefinie ma variable coincée dans la fonction, la pauvre il fallait la liberer :/ 
$result = readAll();
$user_id;
 
// ici je mets mes conditions afin de créer et supprimer

if (isset($_POST['create'])) {
    create($_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['gender'],	$_POST['password'], $_POST['status']);
}

if (isset ($_POST['delete'])) {
    if (isset($_POST['delete']) and is_numeric($_POST['delete'])) {
        deleteOne($_POST['delete']);
    }
}

//$result = readOne(1) //ça marchait pas, je voulais récupérer l'utilisateur avec l'id 1 mais il veut pas venir
//$delete= deleteOne(5)
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Utilisateurs </title>
</head>

    

<body>
    <div class="container">
        <h1 class="h1">Mon tableau de bord</h1>
        <div>
            <h2 class="h2"> Ajouter un nouvel utilisateur : </h2>
            <form action="" method="post">
                <div class="form-group">
                    <label class="form-label" for="username"> Pseudo :  </label>
                    <input class="form-control" type="text" name="username">
                </div>
                <div class="form-group">
                    <label class="form-label" for="first_name"> Prénom : </label>
                    <textarea class="form-control" name="first_name"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="last_name"> Nom :  </label>
                    <textarea class="form-control" name="last_name"></textarea>
                </div>
            
                <div class="form-group">
                    <label class="form-label" for="gender">  Genre : </label>
                    
                <div>
                    <input type="radio" id="male" name="gender" value="male"
             checked>
                     <label for="Male"> Male </label>
                 </div>

                 <div>
                    <input type="radio" id="female" name="gender" value=female">
                    <label for="female">Female</label>
                </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password"> Mot de passe :  </label>
                    <input type="password" name="password"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="status"> Actif :   </label>
                    <textarea class="form-control" name="status"> 1 </textarea>
                </div>
                <button class="btn btn-success" type="submit" name="create">Créer un nouvel arrivant </button>
            </form>
        </div>


            <!--ici j'affiche les utilisateur --->
        <php?>
        <table>
    <thead>
        <th>ID</th>
        <th>Pseudo</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Genre</th>
        <th>Actif </th>
    </thead>
    <tbody>
        <?php

        //je fais une boucle pour associer chaque résultat de ma fonction à une partie du tableau 
        foreach($result as $user){
            ?>
            <tr>
                <td><?= $user['user_id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['gender'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['status'] ?></td>
              
            </tr>

           
         <?php   
        }
        ?>

        <?php 
         
         ?>
    </tbody>
</table>
</body>







</html>
