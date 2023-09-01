<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$type = $_POST['nomtype']; 

$sql_aj="Insert into type_avion values (default,'".$type."')" ;   
   
if($result = pg_query($sql_aj)) { 
    header('Location: compagnie_aerienne.html');
    }
else { 
echo "Erreur de requete" ;
}


?>
