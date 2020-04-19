<?php

session_start();

if (isset($_SESSION['vendeur'])){

   $utilisateur = $_SESSION['vendeur'];

}elseif (isset($_SESSION['admin'])){

   $utilisateur = $_SESSION['admin'];

}


$nom = isset($_POST["nom_item"])? $_POST["nom_item"] : "";
$description = isset($_POST["description_item"])? $_POST["description_item"] : "";
$categorie = isset($_POST["cat_item"])? $_POST["cat_item"] : "";
$vente = isset($_POST["vente_item"])? $_POST["vente_item"] : "";
$prix = isset($_POST["prix_item"])? $_POST["prix_item"] : "";
$photo =isset($_POST["photo_item"])? $_POST["photo_item"] : "";
$tempsRestant =isset($_POST["date_item"])? $_POST["date_item"] : "";
$prixActuel="0";
//$tempsRestant="2020-04-30";
$etat="0";


$database ="items";

//$mysqli = new mysqli('localhost', 'root', '', 'items');

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, 'items');
if($_POST["button"]) {
  if ($db_found) {
    $sql = "SELECT * FROM $categorie";
    $result = mysqli_query($db_handle, $sql);
    $photo = addslashes($photo);
    //print $utilisateur;

    $sql ="INSERT INTO $categorie (nom,description,categorie,vente,prix,photo,tempsRestant,prixActuel,etat,acheteur,vendeur)
    VALUES ('$nom','$description','$categorie','$vente','$prix','$photo','$tempsRestant','$prixActuel','$etat','0','$utilisateur')";
    $result =mysqli_query($db_handle, $sql);  
    header('location:vente.php');
  }


  else { 

    echo "database not found";

  }

}

mysqli_close($db_handle);

?>