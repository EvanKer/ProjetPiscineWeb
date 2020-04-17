<?php

session_start();
if(isset($_SESSION['client'])){
  header('location:userconnected.php');
}elseif(isset($_SESSION['vendeur'])){
  header('location:vendeurmoncompte.php');
}elseif(isset($_SESSION['admin'])){
  header('location:adminmoncompte.php');
}
?>

<html>
<head>
  <title> User Login and Registration </title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" type="text/css"/>

  <link rel="stylesheet" type="text/css" href="styleconnexion.css">
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
<div class="container">
	<div class="login-box">	
	<div class="row">
		<div class="col-md-6 login-left">
			<h2> Se connecter </h2>
			<form action="validation.php" method="post">
				<div class="form-group">
					<label>Pseudo (Adresse email)</label>
					<input type="text" name="utilisateur" class="form-control" required>
					</div>
				<div class="form-group">
					<label>Mot de passe</label>
					<input type="password" name="password" class="form-control" required>
					</div>
					<button type="submit" class="mon-bouton"> Se connecter </button>	 
            </form>
        </div>    
    
        <div class="col-md-6 login-right">
			<h2> Inscription </h2>
			<form action="inscription.php" method="post">
				<div class="form-group">
					<label>Pseudo (Adresse email)</label>
					<input type="text" name="utilisateur" class="form-control" required>
					</div>
				<div class="form-group">
					<label>Mot de passe</label>
					<input type="password" name="password" class="form-control" required>
					</div>
					<button type="submit" class="mon-bouton"> S'inscrire </button>	 
            </form>
        </div>         
    </div>
    </div>
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