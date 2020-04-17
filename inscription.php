<?php

session_start();
header('location:connexion.php');
$database = "useraccounts";
$db_handle = mysqli_connect('localhost','root','');
mysqli_select_db($db_handle,$database);

$nom  = $_POST['utilisateur'];
$mdp  = $_POST['password'];

$s = "SELECT * FROM user WHERE email = '$nom'";

$result = mysqli_query($db_handle,$s);

$num = mysqli_num_rows($result);

if($num == 1){
	echo "Utilisateur deja existant";
	header('location:connexion.php');
}else{
	$_SESSION['client'] = $nom;
	$reg= " INSERT INTO user(email , password) VALUES('$nom', '$mdp')";
	mysqli_query($db_handle, $reg);
	echo "Inscription effectuee avec succes !";
	header('location:userinfo.php');
}

?>