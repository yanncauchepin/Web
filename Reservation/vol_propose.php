

OKAYYYYYYYYYYYYYY dans ajout billet 2 
<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$villedepart= $_POST['villeDEP']; 
$villearrivee= $_POST['villeARR']; 
$datevol= $_POST['dateR']; 


$requet_vol = "SELECT DISTINCT vol.num_vol, v1.nom_ville AS villeDep, v2.nom_ville AS villeArr, vol.date_depart FROM vol
INNER JOIN ville v1 ON v1.num_ville = vol.n_ville_depart
INNER JOIN ville v2 ON v2.num_ville = vol.n_ville_arrivee 
WHERE  v1.nom_ville='".$villedepart."' and v2.nom_ville='".$villearrivee."'
GROUP BY vol.num_vol,v1.nom_ville, v2.nom_ville,vol.date_depart,vol.date_arrivee ; " ; 

$result = pg_query($connect, $requet_vol) ; 

if($result = pg_query($requet_vol)) { 
    echo "<p> La liste des vols </p>" ; 
    echo "<form><table border=1> 
    <tr> <td> Numero Vol </td> <td> Ville Depart </td> <td> Ville d'arrivee </td> <td> Date Depart </td> <td> Selectionner </td> </tr> " ; 
    while($ligne =pg_fetch_array($result)) {
        $num_vol = $ligne ['num_vol'] ;
        $v_depart = $ligne ['villedep']; 
        $v_arrivee = $ligne ['villearr']; 
        $d_depart = $ligne ['date_depart']; 
        echo "<tr> <td> $num_vol </td> <td>  $v_depart </td> <td>  $v_arrivee </td> <td>  $d_depart </td> <td><input value=$num_vol type='radio' name='choisir'></td> </tr>" ; 
        }
    echo "</table>" ; 
    echo "<input type='submit' value ='Choisir ce vol'>" ; 
    echo "</form>";
        }
else { 
echo "Erreur de requete" ;
}

  ?>

