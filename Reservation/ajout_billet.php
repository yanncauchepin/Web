
<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$dateres = $_POST['dateR']; 
$numclient = $_POST['nclient']; 

$numvol = $_POST['nvol']; 

$sql_aj="Insert into billet values (default,'25A','".$dateres."',".$numclient.",".$numvol.")" ;   

   

?>

