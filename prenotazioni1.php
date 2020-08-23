<?php
include "include/sessioni.php";
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
include "include/connessione.php";

$giorno=date('Y-m-d');
$giorno1=date('Y-m-d', strtotime('+1 day'));
$giorno2=date('Y-m-d', strtotime('+2 day'));
$giorno3=date('Y-m-d', strtotime('+3 day'));
$giorno4=date('Y-m-d', strtotime('+4 day'));
$giorno5=date('Y-m-d', strtotime('+5 day'));
$giorno6=date('Y-m-d', strtotime('+6 day'));
$numero_campo=$_POST["numero_campo"];
$numero_campi=$_SESSION["numero_campi"];
$_SESSION["numero_campo"]=$numero_campo;
if (($numero_campo<1)||($numero_campo>$numero_campi))
{
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Devi inserire il campo esatto ! </p></td>
			</tr></table>';exit;
}

$query1 = "SELECT tipo FROM superfici WHERE id='$numero_campo'";
$res=mysqli_query($connect, $query1);
$row=mysqli_fetch_array($res);

echo '<br><br>
<table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
	<tr>
		<td align="center"><p>LA SUPERFICIE <u>'; printf ("%s",$row[0]); echo '</u> E\' DISPONIBILE NEI SEGUENTI ORARI!</p></td>
	</tr>
</table><br><br>';

include "include/calendario.php";

echo '<br><br><table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
	<tr>
		<td align="center"><i>INSERISCI ORARIO E GIORNO DELLA PRENOTAZIONE!</i></td>
	</tr>
</table><br>
<form method="post" action="prenotazioni2.php">
<table align="center" max-width="0%" border ="1" cellpadding="2" bgcolor="#DCDCDC">
	<tr>
		<td align="center"><i>ORARIO</i>
		<select name="dalle">
			<option value="9">9:00-10:00</option>
			<option value="10">10:00-11:00</option>	
			<option value="11">11:00-12:00</option>
			<option value="14">14:00-15:00</option>
			<option value="15">15:00-16:00</option>	
			<option value="16">16:00-17:00</option>
			<option value="17">17:00-18:00</option>
			<option value="18">18:00-19:00</option>
			<option value="19">19:00-20:00</option>
			<option value="20">20:00-21:00</option>
		</select></td>
		<td align="center"><i>GIORNO</i>
		<select name="giorno">
			<option value="'.$giorno.'">'.$giorno.'</option>
			<option value="'.$giorno1.'">'.$giorno1.'</option>	
			<option value="'.$giorno2.'">'.$giorno2.'</option>
			<option value="'.$giorno3.'">'.$giorno3.'</option>
			<option value="'.$giorno4.'">'.$giorno4.'</option>	
			<option value="'.$giorno5.'">'.$giorno5.'</option>
			<option value="'.$giorno6.'">'.$giorno6.'</option>
		</select>
	</tr>
</table>
<br>
<table>
	 <td width="1%" align="center">
    <input type="submit" value="CONTINUA" style="width: 200px;height:30px">
    </td>
</table><br><br><br><br>';


/*
$numero_orario=$_POST["numero_orario"];
if (($numero_orario<1)||($numero_orario>10))
{
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Devi inserire l\'orario esatto ! </p></td>
			</tr></table>';exit;
}
$numero_giorno=$_POST["numero_giorno"];
if (($numero_giorno<1)||($numero_giorno>6))
{
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Devi inserire il giorno esatto ! </p></td>
			</tr></table>';exit;
}

$query = "SELECT * FROM prenotazioni WHERE id_campo='$numero_campo' and id_giorni='$numero_giorno' and id_orari='$numero_orario'";
        if($ris=mysqli_query($connect, $query));
    	$num=mysqli_num_rows($ris);
        if($num>0)
        {	
        	echo'<br><br><table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> IL CAMPO NON E\' PIU\' DISPONIBILE ! <--</strong></p> 
			</tr></table>';exit;	
        }
*/

/*$query= "SELECT prezzo FROM campi WHERE id='$numero_campo'";
$res=mysqli_query($connect, $query);
$row=mysqli_fetch_array($res);

$query = "SELECT tipo,prezzo FROM servizi_agg ORDER BY id";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
	echo '<tr><td align="center">
		<input type="text" name="numero_servizi[]" maxlength="2" onkeypress="onlyNumbers(event)" value="0"></td>
		<td align="center">';
	printf ("%s\n",$row[0]);
	echo '<td align="center">';
	printf ("%s,00 €\n",$row[1]);
	echo "</td></tr>";
}
echo '</table><br><br><br><br>
<table align="center"><tr>
    <td width="50%" align="center">
    <input type="submit" value="CONTINUA" style="width: 200px;height:30px">
    </td>
</tr></table></form>';

$numero_camp=$_POST['numero_campo'];
print("%s",$numero_camp);*/





?>



