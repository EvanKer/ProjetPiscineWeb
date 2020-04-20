<?php

session_start();

$utilisateur = $_SESSION['vendeur'];

echo $utilisateur;

$nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$pdp  = isset($_POST["Photo_de_profil"])? $_POST["Photo_de_profil"] : "";
$pdp = addslashes($pdp);
$idf  = isset($_POST["Image_de_fond"])? $_POST["Image_de_fond"] : "";
$idf = addslashes($idf);


$database = "selleraccounts";

$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle,$database);

if (isset($_POST["bouton01"])) {
     if ($db_found){
         $sql = "SELECT * FROM seller";
             if ($utilisateur != "") {
                  //on cherche un vendeur avec les memes donnees     
                  $sql .= " WHERE pseudo LIKE '%$utilisateur%'";
                                      }
                                          $result = mysqli_query($db_handle, $sql);
                                              //regarder s'il y a de résultat    
                                              if (mysqli_num_rows($result) != 0) {
                                                   //on a trouve le client dans la BDD
                                              	       $sql = "UPDATE seller SET nom = '$nom' WHERE pseudo = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                        $sql = "UPDATE seller SET photo = '$pdp' WHERE pseudo = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                        $sql = "UPDATE seller SET imagepref = '$idf' WHERE pseudo = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);                                                      

                                                        //echo "le vendeur existe deja dans la bdd, ajout des donnees effectue";                                                     
                                                       header('location:vendeurprofil.php');
                                                           } 
                                                        else { 
                                                        
                                                        //echo "le client n'existe pas dans la bdd";
                                                        header('location:vendeurconnected.php');                             
                                                            
                                                        
      
      } 
 
  }
}  

?>