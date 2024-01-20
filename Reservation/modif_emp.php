<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$num = $_POST['nump']; 
$nompers = $_POST['nomp']; 
$prenompers = $_POST['prenomp']; 
$fonction = $_POST['fonct']; 
$numposte = $_POST['nposte']; 


$query  = "UPDATE personnel SET num_pers=".$num.", nom_pers='".$nompers."', prenom_pers='".$prenompers."', fonction='".$fonction."', num_poste='".$numposte."' where num_pers=".$num."; " ; 



pg_query($connect, $query);
    
header('Location: compagnie_aerienne.html');

?>
     
