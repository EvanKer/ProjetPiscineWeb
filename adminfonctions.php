<?php


//recuperer les données venant de la page HTML  
$email = isset($_POST["Email"])? $_POST["Email"] : "";
$pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";  

//identifier votre BDD  
 $database = "selleraccounts"; 

 //connectez-vous dans votre BDD  
 //Rappel: votre serveur = localhost |votre login = root |votre password = <rien>  
 $db_handle = mysqli_connect('localhost', 'root', '');  
 $db_found = mysqli_select_db($db_handle, $database); 

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
      } 
 
  } 
  
  if (isset($_POST["bouton02"])) {
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


  //fermer la connexion  
  mysqli_close($db_handle); 

?>