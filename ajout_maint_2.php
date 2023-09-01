<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

    echo"<h2> Ajouter maintenance </h2>
    <form action='ajout_maint.php' method=POST> 
     
    <table border=0> 
        <tr>  
        <td> Numero d avion </td>
        <td> <select name='num'>
                        <option value ='' >  </option>' "; 
            $resp="SELECT * from avion ;" ;
            $result = pg_query($connect, $resp) ; 
            while($ligne =pg_fetch_array($result)) {
                    $num = $ligne ["num_avion"] ;
                    echo "<option value ='$num'> $num </option>" ; 
            }
                echo "</select>
            </td> 
        </tr>
        
        
        <tr> 
        <td> Date </td>
                    <td> <input type='date' required name='datem'></td>
        </tr>
        <tr>
        
        <tr> 
        <td> Commentaire </td>
                    <td> <input type='text'  name='comm'></td>
        </tr>
        <tr>
        
        <td> Membre responsable </td>
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
        <input type ='submit' value='Ajouter cette maintenance'></td> 
        </tr> 
    </table>
    </form> "   ; 

     ?>
