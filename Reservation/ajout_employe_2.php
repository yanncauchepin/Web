


<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

    echo"<h2> Ajouter un membre du personnel </h2>
    <form action='ajout_employe.php' method=POST> 
     
    <table border=0> 
        <tr> 
        <td> Nom </td>
                    <td> <input type='text'name='nomp'></td>
        </tr>
        
        <tr>
        <td> Prenom </td>
        <td> <input type='text' name='prenomp'></td>
        </tr>
        
        <tr>  
        <td> Fonction </td>
            <td> <select name='fonct'>
                        <option>   </option>
                        <option> Pilote </option>
                        <option> Co-pilote </option> 
                        <option> Hotesse </option> 
                        <option> Stewart </option>  
                        <option> Hotesse d acceuil </option>
                        <option> Mecanicien </option>
                </select>
   
            </td> 
        </tr>
        </tr>
        
        <tr>  
        <td> Numero de telephone </td>
        <td> <input type='text' name='nposte'></td>
        </tr>
        
        <tr>
        <td colspan=2> 
        <input type ='submit' value='Ajouter ce membre'></td> 
        </tr> 
    </table>
    </form> "   ; 

     ?>
     
