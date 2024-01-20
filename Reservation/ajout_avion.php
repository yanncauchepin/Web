

<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$ntype = $_POST['ntype']; 
$taille = $_POST['t_avion']; 
$dateserv = $_POST['dateserv']; 

$sql_aj="Insert into avion values (default,".$ntype.",".$taille.",'".$dateserv."')" ;   
   
if($result = pg_query($sql_aj)) { 
    echo "Avion ajoute"; 
    }
else { 
echo "Erreur de requete" ;
}

header('Location: compagnie_aerienne.html');

?>
