<?php
try
{
    $bdd = new PDO('mysql:host=sequelle.labri.fr;dbname=tetrum;charset=utf8','bpinaud','b27Trans#3!',array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e)
{
    die('Erreur de la base de données :<br>'.$e->getMessage());
}
?>