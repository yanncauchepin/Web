<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$num = $_POST['num']; 
$pers = $_POST['personnel']; 

$sql_aj="Insert into equipe_maintenance values ($pers,$num)" ;   
   
if($result = pg_query($sql_aj)) { 
    header('Location: compagnie_aerienne.html');
    }
else { 
echo "Erreur de requete" ;
}


?>
