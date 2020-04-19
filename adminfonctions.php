<?php

session_start();
$utilisateur = $_SESSION['admin'];

//recuperer les données venant de la page HTML  
$email = isset($_POST["Email"])? $_POST["Email"] : "";
$pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";  


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



//identifier votre BDD  
 $database = "selleraccounts"; 
 $database2 = "items";
 //connectez-vous dans votre BDD  
 //Rappel: votre serveur = localhost |votre login = root |votre password = <rien>  
 $db_handle = mysqli_connect('localhost', 'root', '');  
 $db_found = mysqli_select_db($db_handle, $database); 
 $db_found2 = mysqli_select_db($db_handle, $database2);
 /////////////////// AJOUTER UN VENDEUR ////////////////////////

 if (isset($_POST["bouton01"])) { 
     if ($db_found) {
         $sql = "SELECT * FROM seller";
             if ($email != "") {
                  //on cherche un vendeur avec les memes donnees     
                  $sql .= " WHERE email LIKE '%$email%'";
                       if ($pseudo != "") {
                             $sql .= " AND pseudo LIKE '%$pseudo%'";
                                  }
                                      }
                                          $result = mysqli_query($db_handle, $sql);
                                              //regarder s'il y a de résultat    
                                              if (mysqli_num_rows($result) != 0) {
                                                   //le fournisseur est déjà dans la BDD
                                                        echo "le vendeur existe deja dans la bdd";
                                                        header('location:home.php');
                                                           } 
                                                        else { 

                                                       $sql = "INSERT INTO seller(email, pseudo)
                                                               VALUES('$email', '$pseudo')";
                                                        $result = mysqli_query($db_handle, $sql);
                                                        echo "Ajout effectue avec succes." . "<br>";  
                                                        header('location:home.php');                             
                                                            
                                                        
      }
      } else {    echo "Database not found";   }
 
  } 
  
  /////////////////// SUPPRIMER UN VENDEUR ////////////////////////

  if (isset($_POST["bouton02"])) { // SUPPRIMER UN VENDEUR
   if ($db_found) {    
        $sql = "SELECT * FROM seller";    
              if ($email != "") {     
                 $sql .= " WHERE email LIKE '%$email%'";     
                     if ($pseudo != "") {      
                        $sql .= " AND pseudo LIKE '%$pseudo%'";
                                        }    
                     }    
              $result = mysqli_query($db_handle, $sql);    

        if (mysqli_num_rows($result) == 0) {     
        //vendeur inexistant     
        echo "Cannot delete. seller not found. <br>";    } 
        else {
                    $sql = "DELETE FROM seller";     
                    $sql .= " WHERE pseudo LIKE '%$pseudo%'";     
                    $result = mysqli_query($db_handle, $sql);     
                    echo "Delete successful. <br>"; 
                    header('location:home.php'); 

 
    } 
 

 
  } else {    echo "Database not found";   }  } 

  /////////////////// AJOUTER UN ITEM ////////////////////////

   if (isset($_POST["bouton03"])) {
       if ($db_found2) {
          $sql = "SELECT * FROM $categorie";
          $result = mysqli_query($db_handle, $sql);
          $photo = addslashes($photo);
           //print $utilisateur;

          $sql ="INSERT INTO $categorie (nom,description,categorie,vente,prix,photo,tempsRestant,prixActuel,etat,acheteur,vendeur)
          VALUES ('$nom','$description','$categorie','$vente','$prix','$photo','$tempsRestant','$prixActuel','$etat','0','$utilisateur')";
          $result =mysqli_query($db_handle, $sql);  
          header('location:home.php');
 
  } else {    echo "Database not found";   }  } 

  /////////////////// SUPPRIMER UN ITEM ////////////////////////

   if (isset($_POST["bouton04"])) {
       if ($db_found2) {
          $sql = "SELECT * FROM $categorie";
          $result = mysqli_query($db_handle, $sql);
          $photo = addslashes($photo);
           //print $utilisateur;

           $sql = "DELETE FROM $categorie";     
           $sql .= " WHERE nom LIKE '%$nom%'";     
           $result = mysqli_query($db_handle, $sql);     
           echo "Delete successful. <br>"; 
           header('location:home.php'); 
 
  } else {    echo "Database not found";   }  } 


  //fermer la connexion  
  mysqli_close($db_handle); 

?>