<?php
include "include/connessione.php";
include "include/sessioni.php";
$username = $_SESSION['username'];
if (!$username)
{
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Devi effettuare l\'accesso prima di poter prenotare ! </p></td>
			</tr></table>';exit;
}
include "include/header.php";

echo '
<title>INIZIO PRENOTAZIONE</title><br><br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
	<tr>
		<td align="center"><p>SCEGLI UN CAMPO</p></td>
	</tr>
</table><br><br>
<form method="post" action="prenotazioni1.php">
<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">
	<tr>
	<td align="center"><i> # </i></td>
	<td align="center"><i> CAMPO </i></td>
	<td align="center"><i> PREZZO </i></td>
	</tr>';

$query1 = "SELECT id,tipo,prezzo FROM superfici WHERE prezzo > 0 ORDER BY id";
$res1=mysqli_query($connect, $query1);
while ($row1=mysqli_fetch_array($res1))
{
	echo '<tr><td align="center">';
	printf ("%s\n",$row1[0]);
	$num=$row1[0];
	echo '<td align="center">';
	printf ("%s\n",$row1[1]);
	echo '<td align="center">';
	printf ("€ %s/h\n",$row1[2]);
	echo "</td></tr>";
}

$_SESSION['numero_campi']=$num;
echo '</table>
<table border="0" align="center" cellpadding="10" cellspacing="10">
<tr>
	<td width="50%" align="center">
	<b> NUMERO CAMPO </b> 
	<td width="50%" align="center"><input type="text" name="numero_campo" maxlength="2" onkeypress="onlyNumbers(event)">
</tr></table>';

echo '<table border="0" align="center" cellpadding="10" cellspacing="10">
<tr>
    <td width="50%" align="center">
    <input type="submit" value="CONTINUA" name="submit" style="width: 200px;height:30px">
    </td>
</tr></table>';




/*echo '<br><br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
	<tr>
		<td align="center"><p>SCEGLI UN ORARIO</p></td>
	</tr>
</table><br><br>
<form method="post" action="prenotazioni2.php">
<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">
	<tr><td align="center"><font color="blue" size="6"><b><strong> NUMERO </strong></font></b></td>
	<td align="center"><font color="blue" size="6"><b><strong> ORARIO </strong></font></b></td>
	</tr>';

$query = "SELECT id,dalle,alle FROM orari ORDER BY id";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
	echo '<tr><td align="center">';
	printf ("%s\n",$row[0]);
	echo '<td align="center">';
	printf ("%s:00 - %s:00\n",$row[1],$row[2]);
	echo "</td></tr>";
}

echo '</table>
<table border="0" align="center" cellpadding="10" cellspacing="10">
<tr>
	<td width="50%" align="center">
	<font color="blue" face="Arial, Helvetica, sans-serif" size="3">ORARIO: </font></div>
	<input type="text" name="numero_orario" maxlength="2" onkeypress="onlyNumbers(event)">
</tr></table>';

echo '<br><br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
	<tr>
		<td align="center"><p>SCEGLI UN GIORNO</p></td>
	</tr>
</table><br><br>
<form method="post" action="prenotazioni3.php">
<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">
	<tr><td align="center"><font color="blue" size="6"><b><strong> NUMERO </strong></font></b></td>
	<td align="center"><font color="blue" size="6"><b><strong> GIORNO </strong></font></b></td>
	</tr>';

$query = "SELECT id_giorni,giorno FROM giorni ORDER BY id_giorni";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
	echo '<tr><td align="center">';
	printf ("%s\n",$row[0]);
	echo '<td align="center">';
	printf ("%s\n",$row[1]);
	echo "</td></tr>";
}
echo '</table>';



echo '<table border="0" align="center" cellpadding="10" cellspacing="10">
<tr>
	<td width="50%" align="center">
	<font color="blue" face="Arial, Helvetica, sans-serif" size="3">GIORNO: </font></div>
	<input type="text" name="numero_giorno" maxlength="1" onkeypress="onlyNumbers(event)">
	</tr><tr>
    <td width="50%" align="center">
    <input type="submit" value="CONTINUA" name="submit" style="width: 200px;height:30px">
    </td>
</tr></table>';*/
?>

