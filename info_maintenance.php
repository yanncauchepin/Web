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
    
    $query  = "SELECT maintenance.num_maint, maintenance.date_maint, personnel.nom_pers, maintenance.commentaire from maintenance 
                INNER JOIN personnel ON personnel.num_pers = maintenance.n_pers
                INNER JOIN avion ON avion.num_avion = maintenance.n_avion
                WHERE avion.num_avion=".$numero; 
                
    if($result = pg_query($query)) {
    echo "<p> La liste des maintenances </p>" ;  
    echo "<table border=1> <tr> <td> Numero de maintenance </td> <td> Date de maintenance </td> <td> Responsable </td> <td> Commentaire </td> <td> Equipage</td> </tr> " ; 
        while($line = pg_fetch_array($result)){
        $num_maint = $line ['num_maint'] ;
        $date_maintenance = $line ['date_maint'] ;
        $nom_pers = $line ['nom_pers']; 
        $commentaire = $line ['commentaire']; 
        echo "<tr> <td> $num_maint </td> <td>  $date_maintenance </td> <td>  $nom_pers </td> <td>  $commentaire </td> <td> <a href='info_equipage_maint.php?id=$num_maint'> Consulter equipage </td> </tr>" ; 
        }
    echo "</table>" ; 
    }
    else { 
echo "Erreur de requete" ;
}
    ?>

</body>

</html>


