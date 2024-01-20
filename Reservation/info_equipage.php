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
                INNER JOIN equipage ON equipage.n_pers = personnel.num_pers 
                INNER JOIN vol on vol.num_vol = equipage.n_vol 
                WHERE vol.num_vol =".$numero;
                
    if($result = pg_query($query)) {
    echo "<p> La liste de l equipage </p>" ;  
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


