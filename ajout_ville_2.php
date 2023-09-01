<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

    echo"<h2> Ajouter une ville </h2>
    <form action='ajout_ville.php' method=POST> 
     
    <table border=0> 
        <tr> 
        <td> Ville </td>
                    <td> <input type='text'name='ville'></td>
        </tr>
        <tr>
        <td colspan=2> 
        <input type ='submit' value='Ajouter cette ville'></td> 
        </tr> 
    </table>
    </form> "   ; 

     ?>
