<?php
//Ouverture de la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=TETRUM;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{

    die('Erreur : ' . $e->getMessage());

}
?>