<?php
include "include/visualizza.php";
include "check1.php";
include "include/menu1.php";
$_SESSION["zokkei"]="";
echo '<html><head>
<title>Visualizza Utenti</title><br><br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
  <tr>
    <td align="center"><p>TABELLA UTENTI REGISTRATI</p></td>
  </tr>
</table><br><br>
<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
	<tr>
		<form method="post" action="gestionePR1.php"> 
		<td align="center"><i>MOSTRA PER:</i><td>
		<select name="ordina">
			<option value="tipo">Tipo</option>
			<option value="cognome">Cognome</option>
			<option value="nome">Nome</option>
		</select>
		<td><input type="submit">
		</form>
	</tr></table>
<br><br>';
if (isset($_POST["ordina"]))
{
echo '<table align="center" max-width="100%" border ="2" cellpadding="5" bgcolor="#DCDCDC">
	<tr>
	<td align="center"><i><strong> CODICE FISCALE </strong></i></td>
	<td align="center"><i><strong> TELEFONO </strong></i></td>
	<td align="center"><i><strong> EMAIL </strong></i></td>
	<td align="center"><i><strong> NOME </strong></i></td>
	<td align="center"><i><strong> COGNOME </strong></i></td>
	<td align="center"><i><strong> INDIRIZZO </strong></i></td>
	<td align="center"><i><strong> GRADO </strong></i></td>
	<td align="center"><i><strong> SESSO </strong></i></td>
	</tr>
	<tr>';
	$ordina=$_POST["ordina"];
}
else
{
	echo '<br><br><br><br><table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
		<tr>
		<td align="center"><i>--> EFFETTUA UNA RICERCA <--</i></td>
		</tr></table><br><br><br><br><br><br><br><br><br><br>';	
}
////////////////////////////////////////////////////////////////////////////////////
switch ($ordina) {
	case 'tipo':
		$query1 = "SELECT * FROM persone ORDER BY $ordina";
		$res1=mysqli_query($connect, $query1);
		stampa($res1);
		break;
////////////////////////////////////////////////////////////////////////////////////
	case 'cognome':
		$query1 = "SELECT * FROM persone ORDER BY $ordina";
		$res1=mysqli_query($connect, $query1);
		stampa($res1);
		break;
////////////////////////////////////////////////////////////////////////////////////
	case 'nome':
		$query1 = "SELECT * FROM persone ORDER BY $ordina";
		$res1=mysqli_query($connect, $query1);
		stampa($res1);
		break;
	//case '':
	default:
		# code...
		break;
}

// COMPLETARE LA RICHIESTA DELLA RICERCA CON GLI STIPENDI FACENDO LE GIUSTE RICHIESTE AL DATABASE TOGLIENDO I CAMPI CHE NON CI INTERESSANO 
$i=0;
function stampa($res1)
{
	$fp = fopen("fpdf/data.txt", "w");
	while ($row1=mysqli_fetch_array($res1))
		{
			echo '<td align="center">';
			printf ("%s\n",$row1[0]);
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
			echo "</td></tr>";
			fwrite($fp, $row1[0].";".$row1[1].";".$row1[2].";".$row1[3].";".$row1[4].";".$row1[5].";".$row1[6].";".$row1[7]);
			fwrite($fp, "\n");
			$i++;
		}
	fclose($fp);
	echo '</table><br>
	</table><br><br><table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
	<tr>
		<form method="post" action="pdfPR1.php"> 
			<td><td align="center"><input type="submit" name="pdf" value="ESPORTA PDF" style="width: 300px;height:30px">
			</form>
	</tr></table><br><br>
	<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" >
	<tr>
		<td align="center"><b>Copia il codice fiscale dell\'utente che ti servirà per la sezione di modifica dati !</b></td>
	</tr>
	</table><br>
	<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
	<tr>
		<form method="post" action="modificaPR1.php"> 
			<td><td align="center"><input type="submit" name="submit" value="MODIFICA UTENTE" style="width: 300px;height:30px">
			</form>
	</tr></table><br><br><br><br><br><br><br><br><br>';

}



?>