<?php

$mysqli= new mysqli('localhost', 'root', '', 'selleraccounts');
$mysqli->set_charset("utf8");
$requete='SELECT * FROM seller';
$resultat = $mysqli->query($requete);

echo '<img src="pinegreen.jpg" alt=""/>';

while ($ligne=$resultat->fetch_assoc()) {

  echo $ligne['nom'].''.'<br>';
  echo $ligne['pseudo'].''.'<br>';
  echo $ligne['email'].''.'<br>';
  echo $ligne['photo'].''.'<br>';
  echo '<img src="'.$ligne['photo'].'" alt=""/>'.'<br>';
  echo $ligne['imagepref'].''.'<br>';
  echo '<img src="'.$ligne['imagepref'].'" alt=""/>'.'<br>';
  


}

?>


<HTML>
 <HEAD>
  <TITLE>Titre de la page</TITLE>
 </HEAD>

<BODY>
<img src="pinegreen.jpg" alt=""/>
</BODY>
</HTML>