<!DOCTYPE HTML>


<html> 

<head> <title>  </title> </head> 

<body>

    <?php
       $connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
     if (!$connect) {
        echo "Erreur de connexion" ; 
        exit ; 
    }
    
    $numero = $_GET['id'] ; 
    
    $query  = "SELECT personnel.num_pers, personnel.nom_pers, personnel.prenom_pers, personnel.fonction from personnel 
                INNER JOIN equipe_maintenance ON equipe_maintenance.n_pers = personnel.num_pers 
                INNER JOIN maintenance on maintenance.num_maint = equipe_maintenance.n_maint
                WHERE maintenance.num_maint =".$numero;
                
    if($result = pg_query($query)) {
    echo "<p> La liste de l equipage de maintenace </p>" ;  
    echo "<table border=1> <tr> <td> Numero personnel </td> <td> Nom </td> <td> Prenom </td> <td> Fonction </td> </tr> " ; 
        while($line = pg_fetch_array($result)){
        $num_pers = $line ['num_pers'] ;
        $nom_p = $line ['nom_pers'] ;
        $prenom_p = $line ['prenom_pers']; 
        $fonct = $line ['fonction']; 
        echo "<tr> <td> $num_pers </td> <td>  $nom_p </td> <td>  $prenom_p </td> <td>  $fonct </td> </tr>" ; 
        }
    echo "</table>" ; 
    }
    else { 
echo "Erreur de requete" ;
}
    ?>

</body>

</html>
