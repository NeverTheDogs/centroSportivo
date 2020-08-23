<?php

include "check1.php";

$query1 = "SELECT codice_persone FROM utenti WHERE user='$del_user' ";
$res1=mysqli_query($connect, $query1);
while ($row1=mysqli_fetch_array($res1))
{
	$codice=$row1[0];
}

echo $del_user.$codice;


//$query = "DELETE FROM utenti WHERE user='$del_user'";
$query="UPDATE utenti SET confermato='2' WHERE user = '$del_user'";
if ($ris=mysqli_query($connect, $query))
{
	//$query = "DELETE FROM persone WHERE codice='$codice'";
	//if ($ris=mysqli_query($connect, $query))
	//{
		//$query="DROP USER '$del_user'@'localhost'";
		//if ($ris1=mysqli_query($connect_root, $query))
		//{
			$zokkei="Cancellazione avvenuta con successo!";
			$_SESSION["zokkei"]=$zokkei;
			include "modificaPR1.php";
		//}else{$_SESSION['errore']="Ci sono stati problemi con la cancellazione di questo utente!";include ("errata.php");}
	//}else{$_SESSION['errore']="Ci sono stati problemi con la cancellazione di questo utente!";include ("errata.php");}
}else{$_SESSION['errore']="Ci sono stati problemi con la cancellazione di questo utente!";include ("errata.php");}

?>