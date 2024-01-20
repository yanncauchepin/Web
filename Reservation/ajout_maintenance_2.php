<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

    echo"<h2> Ajouter un equipage </h2>
    <form action='ajout_maintenance.php' method=POST> 
     
    <table border=0> 
        <tr>  
        <td> Numero de maintenance </td>
        <td> <select name='num'>
                        <option value ='' >  </option>' "; 
            $resp="SELECT * from maintenance ;" ;
            $result = pg_query($connect, $resp) ; 
            while($ligne =pg_fetch_array($result)) {
                    $num = $ligne ["num_maint"] ;
                    echo "<option value ='$num'> $num </option>" ; 
            }
                echo "</select>
            </td> 
        </tr>
        
        <td> Membre </td>
        <td> <select name='personnel'>
                        <option value ='' >  </option>' "; 
            $resp="SELECT * from personnel where fonction ='Mecanicien';" ;
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
        <td colspan=2> 
        <input type ='submit' value='Ajouter ce membre'></td> 
        </tr> 
    </table>
    </form> "   ; 

     ?>
