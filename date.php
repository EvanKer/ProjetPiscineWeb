<?php

$heures   = 15;  // les heures < 24
$minutes  = 2;   // les minutes  < 60
$secondes = 22;  // les secondes  < 60

$annee = date("Y");  // par defaut cette année
$mois  = date("m");  // par defaut ce mois
$jour  = date("d");  // par defaut aujourd'hui

// quand le compteur arrive à 0
// -> redirection
$redirection = 'https://phpsources.net/code_s.php?id=493';

/*******************************************************************************
    * calcul des secondes
    ***************************************************************************/

$secondes = mktime(date("H") + $heures,
                            date("i") + $minutes,
                            date("s") + $secondes,
                            $mois,
                            $jour,
                            $annee
                            ) - time();
?>


<html>
<head>
<title>Demo compte a rebour</title>
<script type="text/javascript">
var temps = <?php echo $secondes;?>;
var timer =setInterval('CompteaRebour()',1000);
function CompteaRebour(){

  temps-- ;
  j = parseInt(temps) ;
  h = parseInt(temps/3600) ;
  m = parseInt((temps%3600)/60) ;
  s = parseInt((temps%3600)%60) ;
  document.getElementById('minutes').innerHTML= (h<10 ? "0"+h : h) + '  h :  ' +
                                                (m<10 ? "0"+m : m) + ' mn : ' +
                                                (s<10 ? "0"+s : s) + ' s ';
if ((s == 0 && m ==0 && h ==0)) {
   clearInterval(timer);
   url = "<?php echo $redirection;?>"
   Redirection(url)
}
}
function Redirection(url) {
setTimeout("window.location=url", 500)
}
</script>
</head>

<body onload="timer">
<?php
// la condition est que le nombre de seconde soit etre superieur a 24 heures
if ($secondes <= 3600*24) {
?>
<span style="font-size: 36px;">Il vous reste comme temps</span>
<div id="minutes" style="font-size: 36px;"></div></span>
<?php
 }
?>
<body>
<html>

