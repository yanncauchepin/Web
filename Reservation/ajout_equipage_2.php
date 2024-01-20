<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

    echo"<h2> Ajouter un equipage </h2>
    <form action='ajout_equipage.php' method=POST> 
     
    <table border=0> 
        <tr>  
        <td> Numero du vol </td>
        <td> <select name='num'>
                        <option value ='' >  </option>' "; 
            $resp="SELECT * from vol ;" ;
            $result = pg_query($connect, $resp) ; 
            while($ligne =pg_fetch_array($result)) {
                    $numvol = $ligne ["num_vol"] ;
                    echo "<option value ='$numvol'> $numvol </option>" ; 
            }
                echo "</select>
            </td> 
        </tr>
        
        <td> Membre </td>
        <td> <select name='personnel'>
                        <option value ='' >  </option>' "; 
            $resp="SELECT * from personnel where fonction ='Pilote' or fonction ='Co-pilote' or fonction ='Hotesse' or fonction ='Stewart' ;" ;
            $result = pg_query($connect, $resp) ; 
            while($ligne =pg_fetch_array($result)) {
                    $resp = $ligne ["num_pers"] ;
                    $nomresp = $ligne ["nom_pers"] ;
                    $fonc = $ligne ["fonction"] ;
                    echo "<option value ='$resp'> $nomresp - $fonc </option>" ; 
            }
                echo "</select>
            </td> 
        </tr>
        
        <tr>
        <td colspan=2> 
        <input type ='submit' value='Ajouter ce membre'></td> 
        </tr> 
    </table>
    </form> "   ; 

     ?>
