<?php

session_start();
echo 'salut';
echo $_SESSION['client'];

$utilisateur = $_SESSION['client'];

$adresse01  = isset($_POST["Adresse01"])? $_POST["Adresse01"] : "";
$adresse02  =isset($_POST["Adresse02"])? $_POST["Adresse02"] : "";
$ville  = isset($_POST["Ville"])? $_POST["Ville"] : "";
$codepostal  = isset($_POST["Codepostal"])? $_POST["Codepostal"] : "";
$pays  = isset($_POST["Pays"])? $_POST["Pays"] : "";
$tel  = isset($_POST["Tel"])? $_POST["Tel"] : "";
$cb  = isset($_POST["CB"])? $_POST["CB"] : "";
$numcb  = isset($_POST["NumCB"])? $_POST["NumCB"] : "";
$nomcb  = isset($_POST["NomCB"])? $_POST["NomCB"] : "";
$dateexpiration  = isset($_POST["DateExpiration"])? $_POST["DateExpiration"] : "";
$cvv  = isset($_POST["CVV"])? $_POST["CVV"] : "";



$database = "useraccounts";

$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle,$database);

if (isset($_POST["bouton01"])) {
     if ($db_found){
         $sql = "SELECT * FROM user";
             if ($utilisateur != "") {
                  //on cherche un client avec les memes donnees     
                  $sql .= " WHERE email LIKE '%$utilisateur%'";
                                      }
                                          $result = mysqli_query($db_handle, $sql);
                                              //regarder s'il y a de résultat    
                                              if (mysqli_num_rows($result) != 0) {
                                                   //on a trouve le client dans la BDD

                                                if ($adresse01 !=""){
                                                  $sql = "UPDATE user SET adresse1 = '$adresse01' WHERE email = '$utilisateur'";
                                                  $result = mysqli_query($db_handle, $sql);
                                                }
                                                 if ($adresse02 !=""){
                                                   $sql = "UPDATE user SET adresse2 = '$adresse02' WHERE email = '$utilisateur'";
                                                   $result = mysqli_query($db_handle, $sql);
                                                }
                                                  if ($ville !=""){
                                                   
                                                        $sql = "UPDATE user SET ville = '$ville' WHERE email = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                }
                                                if ($codepostal !=""){
                                                    $sql = "UPDATE user SET code_postal = '$codepostal' WHERE email = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                }
                                                if ($pays !=""){
                                                  $sql = "UPDATE user SET pays = '$pays' WHERE email = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                }
                                                if ($tel !=""){
                                                    $sql = "UPDATE user SET tel = '$tel' WHERE email = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                }
                                                if ($cb !=""){
                                                   $sql = "UPDATE user SET typecarte = '$cb' WHERE email = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                }
                                                if ($numcb !=""){
                                                   $sql = "UPDATE user SET numcarte = '$numcb' WHERE email = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                }
                                                if ($nomcb !=""){
                                                   $sql = "UPDATE user SET nomcarte = '$nomcb' WHERE email = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                }
                                                if ($dateexpiration !=""){
                                                    $sql = "UPDATE user SET dateexpiration = '$dateexpiration' WHERE email = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                     }
                                                if ($cvv !=""){
                                                       $sql = "UPDATE user SET codecarte = '$cvv' WHERE email = '$utilisateur'";
                                                       $result = mysqli_query($db_handle, $sql);
                                                }
                                              	       
                                                       
                                          
                                                        //echo "le client existe deja dans la bdd, ajout des donnees effectue";

                                                        header('location:userconnected.php');
                                                           } 
                                                        else { 
                                                        
                                                        	echo "le client n'existe pas dans la bdd";
                                                        //header('location:home.php');                             
                                                            
                                                        
      }
      } 
 }


?>