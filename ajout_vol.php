

<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$d_depart = $_POST['d_dep']; 
$d_arrivee = $_POST['d_arr']; 
$respo = $_POST['respo']; 
$num_avion = $_POST['n_avion']; 
$v_depart = $_POST['nville']; 
$v_arrivee = $_POST['nville2']; 

$sql_aj="Insert into vol values (default,'$d_depart','$d_arrivee','$respo',$num_avion,$v_depart,$v_arrivee)" ;   
   
if($result = pg_query($sql_aj)) { 
    header('Location: compagnie_aerienne.html');
    }
else { 
echo "Erreur de requete" ;
}

?>
