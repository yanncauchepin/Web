
<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=mgrasmic password=postgres dbname=bd1812"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 



if (isset($_POST['numclient']) && isset($_POST['nomclient']) && isset($_POST['prenomclient']) && isset($_POST['ddnclient']) && isset($_POST['paysclient'])) {

if(empty($_POST['numclient']) || empty($_POST['nomclient']) || empty($_POST['prenomclient'])){
echo ("Veuillez completer tous les champs"); exit(1);
}

$numclient= $_POST['numclient']; 

$nomclient= $_POST['nomclient']; 
$pclient= $_POST['prenomclient'];  
$ddn= $_POST['ddnclient']; 
$pays= $_POST['paysclient']; 

$client ="select count(*) AS ex from 
(SELECT num_client, nom_client, prenom_client from client
WHERE num_client =".$numclient." and  nom_client='".$nomclient."' 
and  prenom_client = '".$pclient."') AS N; " ; 

$result = pg_query($connect, $client) ;

$ajout="INSERT INTO client VALUES (default,'".$nomclient."','".$pclient."','".$ddn."','".$pays."') RETURNING num_client;" ;
$line = pg_fetch_array($result) ; 

if (($line['ex'] == 0)){

if($res = pg_query($connect, $ajout))
{
$val = pg_fetch_array($res); $num_client = $val['num_client'];
}

}

}

echo"<form action='recherche.php' method='POST'>
        <tr> <td> <input type='text' name='numclient' value=".$numclient.">  </td> 
        <td> <input type='text' name='nomclient' value=".$nomclient."> </td>
        <td> <input type='text' name='prenomclient' value=".$pclient.">  </td>
        <td colspan=2> 
        <input type ='submit' value='Reservation'></td> 
        </tr>
        </form>" ; 

?>
