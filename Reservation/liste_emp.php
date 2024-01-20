
<form action="supp_membre.php" method="POST">
<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$requet_vol = 'select num_pers, nom_pers, prenom_pers, fonction  from personnel' ; 

$result = pg_query($connect, $requet_vol) ; 

if($result = pg_query($requet_vol)) { 
    echo "<p> La liste du personnel </p>" ; 
    echo "<form><table border=1> <tr> <td> Numero </td> <td> Nom </td> <td> Prenom </td> <td> Fonction </td> <td> Supprimer </td> </tr> " ; 
    while($ligne =pg_fetch_array($result)) {
        $num_p = $ligne ['num_pers'] ;
        $nom = $ligne ['nom_pers']; 
        $prenom = $ligne ['prenom_pers']; 
        $fonct = $ligne ['fonction']; 
        echo "<tr> <td> $num_p </td> <td>  $nom </td> <td>  $prenom </td> <td>  $fonct </td> <td> <input value=$num_p type='radio' name='supp'></td> </tr>" ; 
        }
        echo "</table>" ;
        echo "<input type='submit' value ='Supprimer'>" ; 
    echo "</form>";
    }
else { 
echo "Erreur de requete" ;
}

  ?>
 
</form>
