<?php

session_start();

$database = "useraccounts";
$utilisateur = $_SESSION['client'];

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
                                                        $mot_de_passe= $data['password'];
                                                       
                                                        $nb_caractere_visible = 0;
                                                        $remplacement = '*';
                                                        $longueur_mdp = strlen($mot_de_passe);
 
                                                        $partie_visible = substr($mot_de_passe, 0, $nb_caractere_visible);

                                                        //mot de passe masqué
                                                        $mdp_final = str_pad($partie_visible, $longueur_mdp, $remplacement);

                                                        $Nom = $data['nom'];                                                                                                        
                                                        $Prenom = $data['prenom'];      
                                                        $Adresse1 = $data['adresse1'];      
                                                        $Adresse2 = $data['adresse2'];      
                                                        $Ville = $data['ville'];
                                                        $CodePostal = $data['code_postal'];      
                                                        $Pays = $data['Pays'];      
                                                        $Tel = $data['tel'];      
                                                        $CB = $data['typecarte']; 

                                                        $NumCB = $data['numcarte'];

                                                        if ($NumCB ==""){

                                                          header('location:userinfo.php');
                                                        }

                                                        $nb_caractere_visible = 2;
                                                        $remplacement = 'X';
                                                        $longueur_numcb = strlen($NumCB);
 
                                                        $partie_visible = substr($NumCB, 0, $nb_caractere_visible);

                                                        //numéro de carte masquée
                                                        $NumCB_final = str_pad($partie_visible, $longueur_numcb, $remplacement);


                                                        }    } 
                                                                                                             
                                                        else { 
                                                          echo "le client n'existe pas dans la bdd";}
                                                                                
                                                            
 }else {    echo "Database not found";   } 

 //fermer la connexion  
  mysqli_close($db_handle);                                                    

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>VENTE</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
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

  <!-- Page Content -->
<div class="userinfos">
  <h1> Récapitulatif de facturation : </h1><br>
   <div class="info-client">
    <p> Adresse e-mail : <?php echo $utilisateur ?></p>
    <p> Nom : <?php echo $Nom ?></p>
    <p> Prenom : <?php echo $Prenom ?></p>
    <p> Adresse de livraison : <?php echo $Adresse1 ?>, <?php echo $CodePostal ?>, <?php echo $Ville ?>.</p>
    <p> Pays : <?php echo $Pays ?></p>
    <p> Tel : <?php echo $Tel ?></p>
    <p> Numéro Carte Bancaire : <?php echo $NumCB_final ?></p><br>
   </div>
</div>

<?php

$mysqli= new mysqli('localhost', 'root', '', 'items');
$mysqli->set_charset("utf8");

$requete='SELECT * FROM sneakers';
$resultat = $mysqli->query($requete);
$prixfinal = 0;

while ($ligne=$resultat->fetch_assoc()) {

  if ($ligne['acheteur']==$utilisateur  && $ligne['etat']==1 )
  {

echo '<img src="'.$ligne['photo'].'" alt=""/>'.'<br>'; 

  echo $ligne['nom'].''.'<br>';
  echo $ligne['description'].''.'<br>';
  echo $ligne['categorie'].''.'<br>';
  echo $ligne['vente'].''.'<br>';
  echo $ligne['prix'].''.'<br>';


  $prixfinal = $prixfinal + $ligne['prix'];

}

}

$requete1='SELECT * FROM streetwear';
$resultat1 = $mysqli->query($requete1);


while ($ligne=$resultat1->fetch_assoc()) {

  if ($ligne['acheteur']==$utilisateur  && $ligne['etat']== 1 ) // et etat != 3
  {

    echo '<img src="'.$ligne['photo'].'" alt=""/>'.'<br>';

  echo $ligne['nom'].''.'<br>';
  echo $ligne['description'].''.'<br>';
  echo $ligne['categorie'].''.'<br>';
  echo $ligne['vente'].''.'<br>';
  echo $ligne['prix'].''.'<br>';

  $prixfinal = $prixfinal + $ligne['prix'];


}

}

$requete2='SELECT * FROM collectibles';
$resultat2 = $mysqli->query($requete2);


while ($ligne=$resultat2->fetch_assoc()) {

  if ($ligne['acheteur']==$utilisateur  && $ligne['etat']== 1 ) // et etat != 3
  {

    echo '<img src="'.$ligne['photo'].'" alt=""/>'.'<br>';

  echo $ligne['nom'].''.'<br>';
  echo $ligne['description'].''.'<br>';
  echo $ligne['categorie'].''.'<br>';
  echo $ligne['vente'].''.'<br>';
  echo $ligne['prix'].''.'<br>';


  $prixfinal = $prixfinal + $ligne['prix'];



}
}
$_SESSION['prixtotalfinal'] = $prixfinal;

echo 'Prix de votre commande : "'.$prixfinal.'"';
echo '<a href="paiementfinal.php"><button>PAYER </button></a>'.'<br><br><br>'

  

?>

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

