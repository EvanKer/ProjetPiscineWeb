<?php

session_start();
if(isset($_SESSION['vendeur'])){
  header('location:vendeurprofil.php');
}elseif(isset($_SESSION['client'])){
  header('location:utilvendeur.php');
}elseif(isset($_SESSION['admin'])){
  header('location:utilvendeur.php');
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
			<h2> Espace Vendeur</h2>
			<form action="vendeurvalidation.php" method="post">
				<div class="form-group">
					<label>Adresse e-mail : </label>
					<input type="text" name="Email" class="form-control" required>
					</div>
				<div class="form-group">
					<label>Pseudo : </label>
					<input type="password" name="Pseudo" class="form-control" required>
					</div>
					<button type="submit" class="mon-bouton"> Se connecter </button>	 
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