<?php

session_start();

$database = "selleraccounts";
$utilisateur = $_SESSION['vendeur'];

$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle,$database);

if ($db_found){
         $sql = "SELECT * FROM seller";
             if ($utilisateur != "") {
                  //on cherche un client avec les memes donnees     
                  $sql .= " WHERE pseudo LIKE '%$utilisateur%'";
                                      }
                                          $result = mysqli_query($db_handle, $sql);
                                              //regarder s'il y a de résultat    
                                              if (mysqli_num_rows($result) != 0) {
                                                   //on a trouve le vendeur dans la BDD
                                                 while ($data = mysqli_fetch_assoc($result)) { 

                                                        $Email = $data['email'];

                                                        $Pseudo = $data['pseudo'];
                                                        $nb_caractere_visible = 0;
                                                        $remplacement = '*';
                                                        $longueur_pseudo = strlen($Pseudo);
                                                        $partie_visible = substr($Pseudo, 0, $nb_caractere_visible);

                                                        //numéro de carte masquée
                                                        $Pseudo_final = str_pad($partie_visible, $longueur_pseudo, $remplacement);

                                                        $Nom = $data['nom'];                                                                                                        
                                                        $Pdp = $data['photo'];                                                     
                                                        $Idf = $data['imagepref'];
                                                        $_SESSION['image'] = $Idf;
                                                        
                                                        }    } 
                                                                                                             
                                                        else { 
                                                          echo "le client n'existe pas dans la bdd";}
                                                                                
                                                            
 }else {    echo "Database not found";   } 

 //fermer la connexion  
  mysqli_close($db_handle);  
 $color = "red";
?>

<html>
<head>
  <title> Vendeur Infos </title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" type="text/css"/>


 <link rel="stylesheet" type="text/css" media="all" href="styleconnexionvendeur2.php">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">



</head>
<body>


 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href='http://localhost/ecebay/index.php'>Le shop du BG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>            
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/adminconnexion.php'>Admin</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/vendeurconnexion.php'>Espace Vendeur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/achat.php'>Achat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= 'http://localhost/ecebay/vente.php'>Ventes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= 'http://localhost/ecebay/negociations.php'>Negociations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/contact.php'>Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/connexion.php'>Mon Compte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='http://localhost/ecebay/panier.php'>Mon Panier</a>
          </li>
          <input type="search" name="research" id="site-search">
          <button>Search</button>
        </ul>
      </div>
    </div>
  </nav>


<div class="userinfos">
  <h1> Informations de votre compte vendeur </h1><br>
   <div class="info-client">
   	<p><?php echo '<img src="'.$Pdp.'" width="100" height="120" alt="PhotoDeProfil"/>'.'<br>'?></p>
    <p> Adresse e-mail : <?php echo $Email ?></p>
    <p> Pseudo : <?php echo $Pseudo_final ?></p>
    <p> Nom Complet : <?php echo $Nom ?></p>
    <a class="float-right" href="deconnexion.php" style="color:#FF0000;"> Se deconnecter </a><br><br><br>
     <a href="vente.php" style="color:#11f494;"><center>               cliquez ici pour ajouter des items.                   </center></a><br>
   </div>
</div>


  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
  
  </footer>

 
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>

