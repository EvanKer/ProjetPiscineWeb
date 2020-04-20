<?php

session_start();

$utilisateur = $_SESSION['vendeur'];


$database = "selleraccounts";

$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle,$database);

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
                                              	       while ($data = mysqli_fetch_assoc($result)) { 

                                                        $Nom = $data['nom'];
                                                        }

                                                        if ($Nom !=""){

                                                        	header('location:vendeurprofil.php');
                                                        }
                                                           
                                                           } 
 
}

?>

<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Vendeur Login and Registration </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" type="text/css"/>
	
  <link rel="stylesheet" type="text/css" href="styleconnexionvendeur.css"> 
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">



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

	<div class="login-box">
	<div class="row">
		<div class="col-md-6 login-center">
			<h2> L'équipe ECEbay vous souhaite la bienvenue !</h2>
			<h4> Veuillez remplir ce formulaire afin de finaliser votre inscription.</h4>
			<form action="vendeurmaj.php" method="post">
				<div class="form-group">
					<label>Nom Complet : </label>
					<input type="text" name="Nom" class="form-control" required>
					</div>
				<div class="form-group">
					<label>Photo de profil : </label>
					<input type="file" name="Photo_de_profil" value=""><br><br>				
					</div>
				<div class="form-group">
					<label>image de fond : </label>
					<input type="file" name="Image_de_fond" value=""><br><br>				
					</div>

					<button type="submit" name="bouton01" class="mon-bouton"> Enregistrer </button>	 
            </form>
        </div>    
    </div>
    </div>



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