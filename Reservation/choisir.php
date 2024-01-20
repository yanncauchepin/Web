<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
}

$villedepart= $_POST['villeDEP']; 
$villearrivee= $_POST['villeARR']; 
$datevol= $_POST['dateR']; 

$numclient= $_POST['numclient'];
$nomclient= $_POST['nomclient'];
$prenomclient= $_POST['prenomclient'];

$requet_vol = "(SELECT DISTINCT vol.num_vol, v1.nom_ville AS villeDep, v2.nom_ville AS villeArr, vol.date_depart FROM vol
INNER JOIN ville v1 ON v1.num_ville = vol.n_ville_depart
INNER JOIN ville v2 ON v2.num_ville = vol.n_ville_arrivee 
INNER JOIN avion ON vol.n_avion=avion.num_avion
WHERE date_depart > '".$datevol."' AND v1.nom_ville ='".$villedepart."' AND v2.nom_ville ='".$villearrivee."' AND vol.num_vol IN (SELECT vol.num_vol from billet 
INNER JOIN vol on billet.n_vol = vol.num_vol
GROUP BY vol.num_vol
HAVING count(billet.num_billet) <= avion.taille_avion))
UNION(SELECT vol.num_vol, v1.nom_ville AS villeDep, v2.nom_ville AS villeArr, vol.date_depart FROM vol
INNER JOIN ville v1 ON v1.num_ville = vol.n_ville_depart
INNER JOIN ville v2 ON v2.num_ville = vol.n_ville_arrivee 
WHERE date_depart > '".$datevol."' AND v1.nom_ville = '".$villedepart."' AND v2.nom_ville ='".$villearrivee."' AND num_vol NOT IN (SELECT distinct billet.n_vol from billet));" ; 

$result = pg_query($connect, $requet_vol) ; 

if($result = pg_query($requet_vol)) { 
    echo "<p> La liste des vols </p>" ; 
    echo "<form action='valider_res.php' method='POST'>
    <table border=1> 

        <td> <input type='text' name='numclient' value=".$numclient."></td> 
        <td> <input type='text' name='nomclient' value=".$nomclient."> </td>
        <td> <input type='text' name='prenomclient' value=".$prenomclient.">  </td> </tr> 
        
    <tr> <td> Numero Vol </td> <td> Ville Depart </td> <td> Ville d'arrivee </td> <td> Date Depart </td> <td> Selectionner </td> </tr> " ; 
    while($ligne =pg_fetch_array($result)) {
        $num_vol = $ligne ['num_vol'] ;
        $v_depart = $ligne ['villedep']; 
        $v_arrivee = $ligne ['villearr']; 
        $d_depart = $ligne ['date_depart']; 
        echo "<tr> <td> $num_vol </td> <td>  $v_depart </td> <td>  $v_arrivee </td> <td>  $d_depart </td> <td><input value=$num_vol type='radio' name='choisir'></td> </tr>" ; 
        }
    echo "</table>" ; 
    echo "<input type='submit' value ='Reserver'>" ; 
    echo "</form>";
}
else { 
echo "Erreur de requete" ;
}
    
     ?>
