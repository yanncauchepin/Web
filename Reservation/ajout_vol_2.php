

<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 
 
   $requet="select * from ville" ;
   
   $result = pg_query($connect, $requet) ; 
   
if ($result = pg_query($requet)){

    echo"<h2> Ajouter un vol </h2>
    <form action='ajout_vol.php' method=POST> 
     
     
    <table border=0> 
        <tr> 
        <td> Date de départ </td>
                    <td> <input type='date' required name='d_dep'></td>
        </tr>
        
        <tr>
        <td> Date d'arriver </td>
        <td> <input type='date' required name='d_arr'></td>
        </tr>
        
        <tr>  
        <td> Responsable du vol </td>
        <td> <select name='respo'>
                        <option value ='' >  </option>' "; 
            $resp="SELECT * from personnel where fonction ='Pilote' or fonction ='Co-pilote' or fonction ='Hotesse' or fonction ='Stewart' ;" ;
            $result = pg_query($connect, $resp) ; 
            while($ligne =pg_fetch_array($result)) {
                    $resp = $ligne ["num_pers"] ;
                    $nomresp = $ligne ["nom_pers"] ;
                    echo "<option value ='$resp'> $nomresp </option>" ; 
            }
                echo "</select>
            </td> 
        </tr>
        
        <tr>  
        <td> Numero de l'avion </td>
        <td> <select name='n_avion'>
                        <option value ='' >  </option>' "; 
            $numavion="SELECT avion.num_avion, type_avion.nom_type from avion INNER JOIN type_avion ON type_avion.num_type=avion.n_type ;" ;
            $result = pg_query($connect, $numavion) ; 
            while($ligne =pg_fetch_array($result)) {
                    $numavion = $ligne ["num_avion"] ;
                    $typeavion = $ligne ["nom_type"] ;
                    echo "<option value ='$numavion'>  $numavion - $typeavion </option>" ; 
            }
                echo "</select>
            </td> 
        </tr>
        
        <tr>
        <td> Ville de départ </td> 
            <td> <select name='nville'>
                        <option value ='' >  </option>' "; 
            $villeDEP="SELECT * from ville ;" ;
            $result = pg_query($connect, $villeDEP) ; 
            while($ligne =pg_fetch_array($result)) {
                    $numvilleD = $ligne ["num_ville"] ;
                    $villeD = $ligne ["nom_ville"] ;
                    echo "<option value ='$numvilleD'> $villeD </option>" ; 
            }
                echo "</select>
            </td> 
        </tr>
        
        <tr>
        <td> Ville d arrivee </td> 
        <td> <select name='nville2'>
                        <option value ='' >  </option>' "; 
                        
            $villeARR="SELECT * from ville ; " ;
            $result = pg_query($connect, $villeARR) ;             
            
            while($ligne =pg_fetch_array($result)) {
                    $numvilleA = $ligne ["num_ville"] ;
                    $villeA = $ligne ["nom_ville"] ;
                    echo "<option value ='$numvilleA'> $villeA </option>" ; 
            }
                echo "</select>
            </td> 
            </td> 
        </tr>
        
        <tr>
        <td colspan=2> 
        <input type ='submit' value='Ajouter ce vol'></td> 
        </tr> 
    </table>
    </form> "   ; 
    }
    else {
    echo "Erreur de requete" ;
}
    
     ?>
