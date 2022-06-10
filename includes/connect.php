<?php

try{
    $con=new PDO('mysql:host=localhost;dbname=electroshop;charset=utf8', 'root', '');
}catch(Exception $e)
{
    die('Erreur'.$e->getMessage());
}

?>