<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 


$numclient= $_POST['numclient'];

$num_vol= $_POST['choisir'];

$sql_aj="Insert into billet values (default,2,'NOW()',".$numclient.",NULL,".$num_vol.")" ;   


if($result = pg_query($sql_aj)) { 
    header('Location: compagnie_aerienne.html');
    }
else { 
echo "Erreur de requete" ;
}

?>
