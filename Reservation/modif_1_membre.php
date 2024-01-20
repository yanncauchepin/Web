<html> 

<head> <title>  </title> </head> 

<body>

    <?php
    
       $connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
     if (!$connect) {
        echo "Erreur de connexion" ; 
        exit ; 
    }
    
    $recup = $_POST['modif'];
    
    
    $query  = "Select * from personnel where num_pers=".$recup;
    $result = pg_query($connect, $query) ;
    $pers = pg_fetch_array($result) ; 

    $nom = $pers['nom_pers'] ; 
    $prenom = $pers['prenom_pers'] ; 
    $fonction = $pers['fonction'] ; 
    $poste = $pers['num_poste'] ; 
    
    echo"<h2> Ajouter un membre du personnel </h2>
    <form action='modif_emp.php' method=POST> 
     
    <table border=0> 
        <tr> 
        <td> Num </td>
                    <td> <input type='text'name='nump' value='".$recup."'></td>
        </tr>
        <tr> 
        <td> Nom </td>
                    <td> <input type='text'name='nomp' value='".$nom."'></td>
        </tr>
        
        <tr>
        <td> Prenom </td>
        <td> <input type='text' name='prenomp' value='".$prenom."'></td>
        </tr>
        
        <tr>  
        <td> Fonction </td>
            <td> <select name='fonct' value='".$fonction."'>
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
        <td> <input type='text' name='nposte' value='".$poste."'></td>
        </tr>
        
        <tr>
        <td colspan=2> 
        <input type ='submit' value='Modifier ce membre'></td> 
        </tr> 
    </table>
    </form> "   ; 

                
    ?>

</body>

</html>
