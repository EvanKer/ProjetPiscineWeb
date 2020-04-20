<?php

session_start();

$database = "useraccounts";
$utilisateur = $_SESSION['client'];

$valide = 0;

//print $_SESSION['prixtotalfinal'];

$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle,$database);

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

                                                while ($data = mysqli_fetch_assoc($result)) {     
    
                                                        $CB = $data['typecarte']; 
                                                        $NomCB = $data['nomcarte'];
                                                        $NumCB = $data['numcarte'];
                                                        $CVV= $data['codecarte'];

                                                        }    } 
                                                                                                             
                                                        else { 
                                                          echo "le client n'existe pas dans la bdd";}
                                                                                
                                                            
 }else {    echo "Database not found";   } 



$database2 = "bankaccounts";
$db_found2 = mysqli_select_db($db_handle,$database2);

if ($db_found2){
         $sql = "SELECT * FROM bank";
                $result2 = mysqli_query($db_handle, $sql);
                                            
                if (mysqli_num_rows($result2) != 0) {
                                                  
                             while ($data = mysqli_fetch_assoc($result2)) {     
    
                                                        $bankCB = $data['typecarte']; 
                                                        $bankNomCB = $data['nomcarte'];
                                                        $bankNumCB = $data['numcarte'];
                                                        $bankCVV= $data['codecarte'];
                                                        $bankfonds= $data['fonds'];
                                                        }    } 
                                                                                                             
                                                        else { 
                                                          echo "le client n'existe pas dans la bdd";}
                                                                                
                                                            
 }else {    echo "Database not found";   } 

///////////////////// COMPARAISON UTILISATEUR ET BANQUE ////////////////

if ( $CB==$bankCB && $NomCB==$bankNomCB && $NumCB== $bankNumCB &&  $CVV==$bankCVV && $bankfonds >= $_SESSION['prixtotalfinal']){ 

  $valide = 1;
  $bankfondsapres = $bankfonds - $_SESSION['prixtotalfinal']; 
  //echo 'valide : '; echo $valide; echo '<br>';// DONNEES OK 

}else { $valide=0; echo $valide;}  // DONNEES PAS OK 

/////////////////////// SI DONNEES BANCAIRES OK //////////////////////////////////
// ici //
if ($valide == 1){


$database2 = "bankaccounts";
$db_found2 = mysqli_select_db($db_handle,$database2);

if ($db_found2){

            $sql = "SELECT * FROM bank ";
            $sql .= " WHERE nomcarte LIKE '%$bankNomCB%'";
            $result3 = mysqli_query($db_handle, $sql);
            
      

              $sql = "UPDATE bank SET fonds = '$bankfondsapres' WHERE nomcarte = '$bankNomCB'";
              $result = mysqli_query($db_handle, $sql);
                                                
                                                   


          }


$database3 = "items";
$db_found3 = mysqli_select_db($db_handle,$database3);

if ($db_found3){

            $sql = "SELECT etat FROM sneakers ";
            $result = mysqli_query($db_handle, $sql);

            $sql ="UPDATE sneakers SET etat = '3' WHERE `sneakers`.`acheteur`= '".$utilisateur."'";
            $result =mysqli_query($db_handle, $sql);

            $sql = "SELECT etat FROM streetwear ";
            $result = mysqli_query($db_handle, $sql);

            $sql ="UPDATE streetwear SET etat = '3' WHERE `streetwear`.`acheteur`= '".$utilisateur."'";
            $result =mysqli_query($db_handle, $sql); 


            $sql = "SELECT etat FROM collectibles ";
            $result = mysqli_query($db_handle, $sql);

            $sql ="UPDATE collectibles SET etat = '3' WHERE `collectibles`.`acheteur`= '".$utilisateur."'";
            $result =mysqli_query($db_handle, $sql); 
 
      header('location:paiementfinalvalide.php');

  }

}else {} header('location:paiementfinalnonvalide');}
 //fermer la connexion  
  mysqli_close($db_handle);                                                    

?>