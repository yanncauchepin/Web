<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$villeDEP="SELECT DISTINCT ville.nom_ville FROM ville
                INNER JOIN vol ON ville.num_ville = vol.n_ville_depart 
                WHERE ville.num_ville IN (SELECT distinct vol.n_ville_depart from vol) ; " ;
   
$result = pg_query($connect, $villeDEP) ; 

$numclient= $_POST['numclient'];
$nomclient= $_POST['nomclient'];
$prenomclient= $_POST['prenomclient'];
   
if ($result = pg_query($villeDEP)){
    echo"<h2> Faire une reservation </h2>
    <form action='choisir.php' method=POST> 
    
    <table border=0> 
    
         <tr> <td> <input type='text' name='numclient' value=".$numclient.">  </td> 
        <td> <input type='text' name='nomclient' value=".$nomclient."> </td>
        <td> <input type='text' name='prenomclient' value=".$prenomclient.">  </td>
        
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
