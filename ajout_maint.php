<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$num = $_POST['num']; 
$pers = $_POST['personnel']; 
$com = $_POST['comm']; 
$date = $_POST['datem']; 

$sql_aj="Insert into maintenance values (default,$num,'$date','$com',$pers)" ;   
   
if($result = pg_query($sql_aj)) { 
    header('Location: compagnie_aerienne.html');
    }
else { 
echo "Erreur de requete" ;
}


?>
