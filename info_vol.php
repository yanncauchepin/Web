<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$requet_vol = 'select vol.num_vol, v1.nom_ville AS villeDepart, v2.nom_ville AS villeArrivee, vol.date_depart, vol.date_arrivee, avion.num_avion, personnel.nom_pers from vol 
                INNER JOIN ville v1 ON v1.num_ville = vol.n_ville_depart 
                INNER JOIN ville v2 ON v2.num_ville = vol.n_ville_arrivee
                INNER JOIN avion ON vol.n_avion = avion.num_avion  
                INNER JOIN personnel ON personnel.num_pers = vol.responsable ;' ; 

$result = pg_query($connect, $requet_vol) ; 

if($result = pg_query($requet_vol)) { 
    echo "<p> La liste des vols </p>" ; 
    echo "<table border=1> 
    <tr> <td> Numero Vol </td> <td> Ville Depart </td> <td> Ville d'arrivee </td> <td> Date Depart </td> <td> Date Arrivee </td> <td> Numero Avion </td> <td> Responsable </td> <td> Equipage </td> <td> Passagers </td> </tr> " ; 
    while($ligne =pg_fetch_array($result)) {
        $num_vol = $ligne ['num_vol'] ;
        $v_depart = $ligne ['villedepart']; 
        $v_arrivee = $ligne ['villearrivee']; 
        $d_depart = $ligne ['date_depart']; 
        $d_arrivee = $ligne ['date_arrivee']; 
        $type_avion = $ligne ['num_avion']; 
        $responsable = $ligne ['nom_pers'];
        echo "<tr> <td> $num_vol </td> <td>  $v_depart </td> <td>  $v_arrivee </td> <td>  $d_depart </td> <td>  $d_arrivee </td> <td>  $type_avion </td> <td>  $responsable </td> <td>  <a href='info_equipage.php?id=$num_vol'> Consulter equipage </td> <td> <a href='info_passager.php?id=$num_vol'> Consulter la liste </td>  </tr>" ; 
        }
    echo "</table>" ; 
        }
else { 
echo "Erreur de requete" ;
}

  ?>
 



