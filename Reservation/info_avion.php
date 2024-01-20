<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$requet_avion = 'select avion.num_avion, type_avion.nom_type, avion.date_serv, avion.taille_avion from avion, type_avion where avion.n_type = type_avion.num_type ; ' ; 

$result = pg_query($connect, $requet_avion) ; 

if($result = pg_query($requet_avion)) { 
    echo "<p> La liste des avions </p>" ; 
    echo "<table border=1> <tr> <td> Num </td> <td> Type d avion </td> <td> Date mise en service </td> <td> Taille </td> <td> maintenance </td> </tr> " ; 
    while($ligne =pg_fetch_array($result)) {
        $num_avion = $ligne ['num_avion'] ;
        $type_avion = $ligne ['nom_type'] ;
        $date_serv = $ligne ['date_serv']; 
        $taille = $ligne ['taille_avion']; 
        echo "<tr> <td> $num_avion</td> <td> $type_avion </td> <td>  $date_serv </td> <td>  $taille </td> <td> <a href='info_maintenance.php?id=$num_avion'> Consulter les maintenances </td>  </tr>" ; 
        }
    echo "</table>" ; 
        }
else { 
echo "Erreur de requete" ;
}
 ?>
