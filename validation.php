<?php

session_start();
header('location:connexion.php');
$database = "useraccounts";
$db_handle = mysqli_connect('localhost','root','');
mysqli_select_db($db_handle,$database);

$util  = $_POST['utilisateur'];
$mdp  = $_POST['password'];

$s = "SELECT * FROM user WHERE email = '$util' && password= '$mdp' ";

$result = mysqli_query($db_handle,$s);

$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['client'] = $util;
	header('location:index.php');
}else{
	header('location:connexion.php');
}

?>