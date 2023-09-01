<!DOCTYPE HTML>


<html> 

<head> <title> </title> </head> 

<body>

    <?php
       $connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
     if (!$connect) {
        echo "Erreur de connexion" ; 
        exit ; 
    }
    
    $numero = $_GET['id'] ; 
    
    $query  = "SELECT client.num_client, client.nom_client, client.prenom_client from client 
                    INNER JOIN billet ON billet.n_client = client.num_client
                    WHERE billet.n_vol=".$numero;
                
    if($result = pg_query($query)){
    echo "<p> La liste des passagers </p>" ;  
    echo "<table border=1> <tr> <td> Numero </td>  <td> Nom </td> <td> Prenom </td> </tr> " ; 
        while($line = pg_fetch_array($result)){
        $num = $line ['num_client']; 
        $nom_pa = $line ['nom_client'] ;
        $prenom_pa = $line ['prenom_client']; 
        echo "<tr> <td> $num </td> <td> $nom_pa </td> <td>  $prenom_pa </td> </tr>" ; 
        }
    echo "</table>" ; 
    }
    else { 
echo "Erreur de requete" ;
}
    ?>

</body>

</html>
