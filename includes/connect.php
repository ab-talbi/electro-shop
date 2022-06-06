<?php

try{
    $con=new PDO('mysql:host=localhost:3310;dbname=electroshop;charset=utf8', 'root', '');
}catch(Exception $e)
{
    die('Erreur'.$e->getMessage());
}

?>