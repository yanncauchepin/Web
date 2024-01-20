

<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 
 
   $requet="select * from type_avion" ;
   
   $result = pg_query($connect, $requet) ; 
   
if ($result = pg_query($requet)){

    echo"<h2> Ajouter un avion </h2>
    <form action='ajout_avion.php' method=POST> 
     
     
    <table border=0> 
        <tr> 
        <td> Type </td> 
            <td> <select name='ntype'>
                        <option value ='' >  </option>' "; 
            while($ligne =pg_fetch_array($result)) {
                    $ntp = $ligne ["num_type"] ;
                    $nomtp = $ligne ["nom_type"] ;
                    echo "<option value ='$ntp'> $ntp - $nomtp </option>" ; 
            }
                echo "</select>
            </td> 
        </td>
        </tr>
        
        <tr>  
        <td> Taille </td>
        <td> <input type='text' name='t_avion'></td>
        </tr>
        
        <tr>
        <td> Date service </td> 
            <td> <input type='date' required='required' name='dateserv'></td>
        </tr>
        
        <tr>
        <td colspan=2> 
        <input type ='submit' value='Ajouter cet avion'></td> 
        </tr> 
    </table>
    </form> "   ; 
    }
    else {
    echo "Erreur de requete" ;
}
    
     ?>
