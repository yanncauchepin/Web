<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$nompers = $_POST['nomp']; 
$prenompers = $_POST['prenomp']; 
$fonction = $_POST['fonct']; 
$numposte = $_POST['nposte']; 


$sql_aj="Insert into personnel values (default,'".$nompers."','".$prenompers."','".$fonction."','".$numposte."')" ;   
   
if($result = pg_query($sql_aj)) { 
    header('Location: compagnie_aerienne.html');
    }
else { 
echo "Erreur de requete" ;
}



?>


