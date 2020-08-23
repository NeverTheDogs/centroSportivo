<?php
include "include/visualizza.php";
include "check1.php";
include "include/menu1.php";


//$scelta=$_POST["scelta"];
//echo  "scelta ".$scelta;
//echo "--ricerca ".$ricerca;
//echo "session".$_SESSION['codice_ricerca'];

if (isset($_SESSION['codice_ricerca']))
{
	$ricerca1=$_SESSION['codice_ricerca'];
	$scelta=$_POST["scelta"];
	$permesso=$_POST["permesso"];
	$modifica=$_POST["modifica"];

	if (($_POST["permesso"])!="")
	{
		switch ($permesso) {
			case 'Amministratore':
				$grado=1;
				break;
			case 'Dipendente':
				$grado=2;
				break;
			case 'Cliente':
				$grado=3;
				break;
		}
		$query = "UPDATE persone SET tipo='$permesso' WHERE codice = '$ricerca1'";
		mysqli_query($connect, $query);
		$query = "UPDATE utenti SET permesso='$grado' WHERE codice_persone = '$ricerca1'";
		mysqli_query($connect, $query);
	}

	if (isset($_POST["scelta"])!="")
	{
		$query = "UPDATE persone SET $scelta='$modifica' WHERE codice = '$ricerca1'";
		mysqli_query($connect, $query);
	}
	unset($_SESSION['codice_ricerca']);
	$_SESSION["zokkei"]="MODIFICA AVVENUTA CON SUCCESSO!";
}

echo '<head>
<title>Modifica Utenti</title><br><br><table border="0" align="center" cellpadding="0" cellspacing="5" width="0%">
  <tr>
    <td align="center"><i>'.$_SESSION["zokkei"].'</i></td>
  </tr>
  <tr><td><br></tr>
  <tr>
    <td align="center"><p>SEZIONE DI MODIFICA DEI DATI DI UN UTENTE</p></td>
  </tr>
</table><br><br><br><br>
<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
	<tr>
		<form method="post" action="modificaPR1.php"> 
		<td align="center"><i>INSERISCI IL CODICE FISCALE:</i><td>
		<input type="text" name="ricerca" size="50%" maxlength="16" onkeypress="onlyAlphaNum(event)">
		<td><input type="submit" value="CERCA">
		</form>
	</tr>
</table><br><br>';
$_SESSION["zokkei"]="";
if (isset($_POST["ricerca"]))$ricerca=$_POST["ricerca"];
$_SESSION['codice_ricerca']=$ricerca;
if (!$ricerca)
{
	echo '<br><br><br><br><table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
		<tr>
		<td align="center"><i>--> INSERISCI IL CODICE NALLA BARRA QUI SOPRA <--</i></td>
		</tr></table><br><br><br><br><br><br><br><br><br><br>';	
}
else
{	
	$query1 = "SELECT * FROM persone WHERE codice='$ricerca'";
	$res1=mysqli_query($connect, $query1);
	$count = mysqli_num_rows($res1);
	if ($count==1)
	{
		echo '
		<table align="center" max-width="100%" border ="2" cellpadding="5" bgcolor="#DCDCDC">
		<tr>
		<td align="center"><i><strong> CODICE </strong></i></td>
		<td align="center"><i><strong> TELEFONO </strong></i></td>
		<td align="center"><i><strong> EMAIL </strong></i></td>
		<td align="center"><i><strong> NOME </strong></i></td>
		<td align="center"><i><strong> COGNOME </strong></i></td>
		<td align="center"><i><strong> INDIRIZZO </strong></i></td>
		<td align="center"><i><strong> TIPO </strong></i></td>
		<td align="center"><i><strong> SESSO </strong></i></td>
		</tr>';
		while ($row1=mysqli_fetch_array($res1))
		{
			echo '<td align="center">';
			printf ("%s\n",$row1[0]);
			$del_user=$row1[0];
			echo '<td align="center">';
			printf ("%s\n",$row1[1]);
			echo '<td align="center">';
			printf ("%s\n",$row1[2]);
			echo '<td align="center">';
			printf ("%s\n",$row1[3]);
			echo '<td align="center">';
			printf ("%s\n",$row1[4]);
			echo '<td align="center">';
			printf ("%s\n",$row1[5]);
			echo '<td align="center">';
			printf ("%s\n",$row1[6]);
			echo '<td align="center">';
			printf ("%s\n",$row1[7]);
			echo "</td></tr></table>";
		}
		$query1 = "SELECT * FROM utenti WHERE codice_persone='$del_user'";
		$res1=mysqli_query($connect, $query1);
		while ($row1=mysqli_fetch_array($res1))
		{
			$del_user=$row1[1];
			$_SESSION['del_user']=$del_user;
		}
		echo '
		<br><br>
		<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
			<tr>
				<form method="post" action="delete.php"> 
				<td><input type="submit" value="ELIMINA UTENTE">
			</tr>
		</table></form>';
		ricerca();

	}
	else
		echo '<br><br><br><br><table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
  		<tr><td align="center"><p>IL CODICE FISCALE NON ESISTE IN ARCHIVIO</p></td>
 		</tr></table><br><br><br><br><br><br><br><br><br><br>';
}


	echo '<table border="0" align="center" cellpadding="10" cellspacing="10" width="100%">
	<tr><br><br><br><br><br><br><br><br><td width="50%" align="center"><b>N.B. = è possibile modificare un solo utente per volta.</table></body></html>';

function ricerca()
{
	unset($ricerca);
	echo '
	<br><br>
	<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
	<form method="post" action="modificaPR1.php"> 
		<tr>
			<td align="center"><i>MODIFICA:</i><td>
			<select name="scelta">
				<option value=""></option>
				<option value="codice">Codice Fiscale</option>
				<option value="telefono">Telefono</option>	
				<option value="email">E-mail</option>
				<option value="nome">Nome</option>
				<option value="cognome">Cognome</option>	
				<option value="indirizzo">Indirizzo</option>
				<option value="sesso">Sesso</option>
			</select>
		</tr>
	</table><br>
	<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
		<tr>
			<td align="center"><i>COSA DEVO SCRIVERE:</i><td>
			<input type="text" name="modifica" size="50%" maxlength="100" onkeypress="onlyAlphaNum(event)">
		</tr>
	</table><br>
	<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
		<tr>
			<td align="center"><i>GRADO DI :</i><td>
			<select name="permesso">
				<option value=""></option>
				<option value="Amministratore">Amministratore</option>
				<option value="Dipendente">Dipendente</option>	
				<option value="Cliente">Cliente</option>
			</select>
		</tr>
	</table><br>
	<table align="center">
		<tr>
			<td><input type="submit" value="CONFERMA">
		</tr>
	</form></table>';
		
	// COMPLETARE L'INSERIMENTO DEI DATI NEL DATABASE CON I DATI CORRETTI DEL POST DELLA MODIFICA
}

?>




