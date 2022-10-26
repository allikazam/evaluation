<?php
// le crud sera affiché dans ce dossier, pour utiliser le crud j'aurais besoin de me connecter à la base de données grâce au fichier db.php

require 'db.php';

// je commence par la lire les éléments de mon tableau (READ)
// la fonction read all va être divisée en plusieurs variables, on va chercher les éléments grace à la requete et puis afficher

function readAll()
{
    //Je me connecte à  la db
    $pdo = db_connect();
    //je prépare ma requête
    $query = "SELECT * FROM user_details";
    $request = $pdo->query($query);
    // je stocke mon résultat dans un tableau
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//je vais à présent lire une seule ligne 

function readOne($user_id)
 {
    //Je me connecte à  la db
   $pdo = db_connect();
    //je prépare ma requete
   $queryid = 'SELECT * FROM user_details where id = :user_id';
   $requestid = $pdo->prepare($queryid);
    //je parametre et execute ma requete
    $requestid->bindParam(':user_id', $id);
    $requestid->execute();
    //je stocke mon résultat dans une variable
   $result = $requestid->fetch();
    //Et retourne le résultat
    return ($result);
 }

 // la fonction create va utiliser plusieurs parametres, ceux de la base de données 

 function create($username,$first_name, $last_name, $gender, $password,  $status=1 )
{
    //Je me connecte à  la base de données 
    $pdo = db_connect();
    $querycreate = "INSERT INTO user_details (username, first_name, last_name, gender, password, status) VALUES (:username, :first_name, :last_name, :gender, :password, :status)";
    $requestcreate = $pdo->prepare($querycreate);
    // puis je les execute dans un tableau
    $requestcreate->execute(array(':username' => $username, ':first_name' => $first_name, ':last_name' => $last_name, ':gender' => $gender, ':password' => $password , ':status' => $status));
}

function deleteOne(int $user_id)
{
    //Je me connecte à  la base de donnée
    $pdo = db_connect();
    $querydelete = "DELETE FROM user_details  WHERE user_id=$id";
    $requestdelete = $pdo->prepare($querydelete);
    $requestdelete->execute();
}
?>



