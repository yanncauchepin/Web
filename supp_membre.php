

<html> 

<head> <title>  </title> </head> 

<body>

    <?php
    
       $connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
     if (!$connect) {
        echo "Erreur de connexion" ; 
        exit ; 
    }
    
    $recup = $_POST['supp'];
    
    $query  = "DELETE from personnel where num_pers=".$recup;
    
    pg_query($connect, $query);
    
    header('Location: compagnie_aerienne.html');
                
    ?>

</body>

</html>
