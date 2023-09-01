
<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
}

if (isset($_POST['numclient']) && isset($_POST['nomclient']) && isset($_POST['prenomclient']) && isset($_POST['ddnclient']) && isset($_POST['paysclient'])) {

if(empty($_POST['numclient']) || empty($_POST['nomclient']) || empty($_POST['prenomclient'])){
echo ("Veuillez completer tous les champs"); exit(1);
}

$numclient= $_POST['numclient']; 
$nomclient= $_POST['nomclient']; 
$pclient= $_POST['prenomclient'];  
$ddn= $_POST['ddnclient']; 
$pays= $_POST['paysclient']; 

$client ="select count(*) AS ex from (SELECT num_client, nom_client, prenom_client from client
WHERE num_client =".$numclient." and  nom_client='".$nomclient."' and  prenom_client = '".$pclient."') AS N; " ; 

$result = pg_query($connect, $client) ;

$ajout="INSERT INTO client VALUES (default,'".$nomclient."','".$pclient."','".$ddn."','".$pays."') RETURNING num_client;" ;

$line = pg_fetch_array($result) ; 

if (($line['ex'] == 0)){

if($res = pg_query($connect, $ajout))
{
$val = pg_fetch_array($res); $num_client = $val['num_client'];
}

}


}

echo"<form action='' method='POST'> 
    <table border=0> 
        <tr> 
        <td> Numero id </td>
                    <td> <input type='text' name='numclient'></td>
        </tr>
        <tr> 
        <td> Nom </td>
                    <td> <input type='text'name='nomclient'></td>
        </tr>
        
        <tr>
        <td> Prenom </td>
        <td> <input type='text' name='prenomclient'></td>
        </tr>
                <tr>
        <td> Date de naissance </td>
        <td> <input type='date' name='ddnclient'></td>
        </tr>
        <tr>
        <td> Pays </td>
        <td> <input type='text' name='paysclient'></td>
        </tr>
        </table>
        <tr>
        <td colspan=2> 
        <input type ='submit' value='S identifier'></td> 
        </tr> 
        </form>" ; 

   $villeDEP="SELECT DISTINCT ville.nom_ville FROM ville
                INNER JOIN vol ON ville.num_ville = vol.n_ville_depart 
                WHERE ville.num_ville IN (SELECT distinct vol.n_ville_depart from vol) ; " ;
   

   $result = pg_query($connect, $villeDEP) ; 

   
 echo "$numclient $nomclient $pclient" ;
   
if ($result = pg_query($villeDEP)){
    echo"<h2> Faire une reservation </h2>
    <form action='ajout_billet_2.php' method=POST> 
     
    <table border=0> 
       
       <tr>
        <td> Ville de départ </td>
        <td> <select name='villeDEP'>
                        <option value ='' >  </option>' "; 
            while($ligne =pg_fetch_array($result)) {
                    $villeD = $ligne ["nom_ville"] ;
                    echo "<option value ='$villeD'> $villeD </option>" ; 
            }
                echo "</select>
            </td> 
        </tr>
        
        <tr>
        <td> Ville d arrivee </td>
        <td> <select name='villeARR'>
                        <option value ='' >  </option>' "; 
            $villeARR="SELECT DISTINCT ville.nom_ville FROM ville
                INNER JOIN vol ON ville.num_ville = vol.n_ville_arrivee 
                WHERE ville.num_ville IN (SELECT distinct vol.n_ville_arrivee from vol) ; " ;
                
            $result = pg_query($connect, $villeARR) ;             
            
            while($ligne =pg_fetch_array($result)) {
                    $villeD = $ligne ["nom_ville"] ;
                    echo "<option value ='$villeD'> $villeD </option>" ; 
            }
                echo "</select>
            </td> 
        </tr>
        
       <tr>
        <td> A partir de quand ? </td>
        <td> <input type='date' required name='dateR'></td>
        </tr>
        
        <tr>
        <td colspan=2> 
        <input type ='submit' value='Voir les offres'></td> 
        </tr> 
    </table>
    </form> "   ; 
    }
    if(!empty($_POST)){
$villedepart= $_POST['villeDEP']; 
$villearrivee= $_POST['villeARR']; 
$datevol= $_POST['dateR']; 
}

$requet_vol = "SELECT DISTINCT vol.num_vol, v1.nom_ville AS villeDep, v2.nom_ville AS villeArr, vol.date_depart FROM vol
INNER JOIN ville v1 ON v1.num_ville = vol.n_ville_depart
INNER JOIN ville v2 ON v2.num_ville = vol.n_ville_arrivee 
WHERE date_depart > '".$datevol."' and v1.nom_ville='".$villedepart."' and v2.nom_ville='".$villearrivee."'
GROUP BY vol.num_vol,v1.nom_ville, v2.nom_ville,vol.date_depart,vol.date_arrivee ; " ; 

$result = pg_query($connect, $requet_vol) ; 

if($result = pg_query($requet_vol)) { 
    echo "<p> La liste des vols </p>" ; 
    echo "<form action='' method='POST'><table border=1> 
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
    
    $sql_aj="Insert into billet values (default,2,'NOW()',".$numclient.",NULL,".$num_vol.")" ;   
    
    echo $sql_aj ; 
    if(isset($_POST['Reserver'])){
        pg_query($connect, $sql_aj) ; 
        }
}
else { 
echo "Erreur de requete" ;
}

    
     ?>
     
