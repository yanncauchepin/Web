<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

    echo"<h2> Ajouter un type </h2>
    <form action='ajout_type.php' method=POST> 
     
    <table border=0> 
        <tr> 
        <td> Type </td>
                    <td> <input type='text'name='nomtype'></td>
        </tr>
        <tr>
        <td colspan=2> 
        <input type ='submit' value='Ajouter ce type'></td> 
        </tr> 
    </table>
    </form> "   ; 

     ?>
