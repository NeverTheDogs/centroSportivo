<?php
include "include/connessione.php";
include "include/header.php";

if (isset($_POST["sms"]))
{
	echo $us;
	echo $conf_user;
	echo $numero;
	$sms=$_POST["sms"];
	$query= "SELECT  persone.telefono FROM utenti INNER JOIN persone ON utenti.codice_persone = persone.codice WHERE user='$us'";
	$res=mysqli_query($connect, $query);
	if($row=mysqli_fetch_array($res))
	{
		$numero=$row[0];
	}

	$query= "SELECT  persone.telefono FROM utenti INNER JOIN persone ON utenti.codice_persone = persone.codice WHERE user='$conf_user'";
	$res=mysqli_query($connect, $query);
	if($row=mysqli_fetch_array($res))
	{
		$numero=$row[0];
	}

	$query = "SELECT codice FROM conferme WHERE numero=$numero";
	$ris=mysqli_query($connect, $query);
	while ($row=mysqli_fetch_array($ris))
	{
		$control=$row[0];
	}
	if ($control==$sms)
	{
		$query = "DELETE FROM conferme WHERE numero='$numero'";
		mysqli_query($connect, $query);
		$query = "UPDATE utenti SET confermato='1' WHERE user = '$conf_user'";
    	mysqli_query($connect, $query);
    	$query = "UPDATE utenti SET confermato='1' WHERE user = '$us'";
    	mysqli_query($connect, $query);
		echo'<br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>REGISTAZIONE AVVENUTA CON SUCCESSO</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Da adesso puoi iniziare ad usufruire dei nostri servizi online !</p></td>
			</tr>
		</table>';
			exit;
	}/*
	else{
		echo "2";
	}
	if($sms==$ris)
	{
		$query = "DELETE FROM conferme WHERE numero='$numero'";
		mysqli_query($connect, $query);
		echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>REGISTAZIONE AVVENUTA CON SUCCESSO</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Da adesso puoi iniziare ad usufruire dei nostri servizi online !</p></td>
			</tr>
		</table>';
			exit;
	}*/
	else
	{
		/*$utente="DROP USER '$us'@'localhost'";
		$utente1="DROP USER '$us'@'localhost'";
		$query = "DELETE FROM conferme WHERE numero='$numero'";
		mysqli_query($connect, $query);
		$query = "DELETE FROM persone WHERE telefono='$numero'";
		mysqli_query($connect, $query);
		mysqli_query($connect_root, $utente);
		mysqli_query($connect_root, $utente1);*/
		$errore="Il codice inserito è sbagliato, riprova!";
		echo'<body><br><br>
			<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Sono stati inseriti dati errati ! </p></td>
			</tr>
			</table><br><br><br>';
		echo '<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><u>'.$errore.'</u></p></td>
			</tr>
			</table>';
			exit;
	}
}
else
{
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Area riservata ! Accesso negato ! </p></td>
			</tr></table>';exit;
}
?>
