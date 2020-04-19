<?php

session_start();

if(isset($_SESSION['vendeur'])){
  header('location:vendeurmoncompte.php');
}elseif(isset($_SESSION['admin'])){
  header('location:adminmoncompte.php');
}elseif(isset($_SESSION['client'])==""){
  header('location:connexion.php');
}elseif(isset($_SESSION['client'])){
  $utilisateur = $_SESSION['client'];
}

$item = $_POST['nomlien'];
$_SESSION['item'] = $item;

$database = "items";

$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle,$database);

if ($db_found){
         $sql = "SELECT * FROM sneakers";
             if ($item != "") {
                  //on cherche un client avec les memes donnees     
                  $sql .= " WHERE nom LIKE '%$item%'";
                                      }
                                          $result = mysqli_query($db_handle, $sql);
                                              //regarder s'il y a de résultat    
                                              if (mysqli_num_rows($result) != 0) {
                                                   //on a trouve le vendeur dans la BDD
                                                 while ($data = mysqli_fetch_assoc($result)) { 

                                                        //$item = $data['nom'];
                                                        $Description = $data['description'];                                                                             
                                                        $Photo = $data['photo'];   

                                                        $_SESSION['desc'] = $Description;
                                                        $_SESSION['photo'] = $Photo;                                                  
                                                        
                                                        print $item;
                                                        echo '<br>';                                                        
                                                        print $_SESSION['desc'];
                                                        echo '<br>';   
                                                        print $utilisateur;
                                                        
                                                        header('location:testachat.php');       


                                                        }    } 
                                                                                                             
                                                        else { 
                                                          echo "l'item n'existe pas dans la bdd";}
                                                                                
                                                            
 }else {    echo "Database not found";   } 

 //fermer la connexion  
  mysqli_close($db_handle);  

?>
