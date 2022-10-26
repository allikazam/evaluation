<?php 

//je me connecte à la base de données


function db_connect() {
    
    //On n'oublie pas d'englober notre tentative de connexion d'un try catch
    try {
        return $pdo = new PDO('mysql:host=localhost;dbname=site','root','');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
         return die();
    }
}