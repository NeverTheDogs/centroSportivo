<?php
include "include/connessione.php";
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
if (!$_POST["submit"])
{
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Devi eseguire il giusto ordine per poter prenotare ! </p></td>
			</tr></table>';exit;

}
$query = "SELECT nome,cognome,codice,telefono,email,indirizzo FROM utenti,persone WHERE codice_persone=codice AND user='$username'";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
	$nome=$row[0];
	$_SESSION['pre_nome']=$nome;
	$cognome=$row[1];
	$_SESSION['pre_cognome']=$cognome;
	$codice=strtoupper($row[2]);
	$_SESSION['pre_codice']=$codice;
	$telefono=$row[3];
	$_SESSION['pre_telefono']=$telefono;
	$mail=$row[4];
	$_SESSION['pre_mail']=$mail;
	$indirizzo=$row[5];
}


$query2 = "SELECT * FROM servizi WHERE (tipo='vendita-consumo')OR(tipo='vendita') ORDER BY id";
	$res2=mysqli_query($connect, $query2);
	$num2=mysqli_num_rows($res2);

$servizi = array(
			array(),
			array(),
			array(),
			array(),
			array(),
			array(),
			array(),
			array(),
			array(),
			array(),
			array(),
			array(),
			array(),
			array(),
				);
$prezzi_serv= array();

$i=0;
while ($row2=mysqli_fetch_array($res2))
{
	//printf ("%s\n//",$row2[2]);
	$servizi[$i][0]=$row2[2];
	$_SESSION['pre_servizio'.$i]=$servizi[$i][0];
	$prezzi_serv[$i]=$row2[3];
	$i++;
}
	
$_SESSION['pre_numeroserv']=$numero_servizi;
for ($i=0; $i < $numero_servizi ; $i++)
{ 
	$servizi[$i][1]=$_POST["quantita".$i];
	$_SESSION['pre_quantserv'.$i]=$servizi[$i][1];
	//echo $servizi[$i][1];
}

$query1 = "SELECT tipo,prezzo FROM superfici WHERE id='$numero_campo'";
$res=mysqli_query($connect, $query1);
$row=mysqli_fetch_array($res);
$_SESSION['pre_nomecampo']=$row[0];
$alle=$dalle+1;

echo'<br><br>
	<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
		<tr>
			<td align="center"><p>RIEPILOGO DELLA PRENOTAZIONE</p></td>
		</tr>
	</table>
	<br><br>
	<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">
	<tr>
		<td align="center"><i> CODICE :</i></td>
		<td align="center"><i>'.$codice.'</i></td>
	</tr>
	<tr>
		<td align="center"><i> NOME : </i></td>
		<td align="center"><i>'.$nome." ".$cognome.'</i></td>
	</tr>
	<tr>
		<td align="center"><i> TELEFONO : </i></td>
		<td align="center"><i>'.$telefono.'</i></td>
	</tr>';
	/*<tr>
		<td align="center"><i> E-MAIL : </i></td>
		<td align="center"><i>'.$mail.'</i></td>
	</tr>
	<tr>
		<td align="center"><i> RESIDENZA : </i></td>
		<td align="center"><i>'.$indirizzo.'</i></td>
	</tr>*/
echo'<tr>
		<td align="center"><i> DATA : </i></td>
		<td align="center"><i>'.$giorno.'</i></td>
	</tr>
	<tr>
		<td align="center"><i> ORARIO : </i></td>
		<td align="center"><i>'.$dalle.":00-".$alle.":00".'</i></td>
	</tr>
	<tr>
		<td align="center"><i> CAMPO : </i></td>
		<td align="center"><i>'.$row[0].'</i></td>
	</tr>';
$luci=0;
if ($dalle>17 || $row[1]==10)
{
	$luci=10;
	echo'
		<tr>
			<td align="center"><i> LUCI : </i></td>
			<td align="center"><i>SI</i></td>
		</tr>';
}

$j=1;
for ($i=0; $i < $numero_servizi; $i++)
{ 
	if ($servizi[$i][1]!=0)
	{
		$tot_serv=$tot_serv+($prezzi_serv[$i]*$servizi[$i][1]);
		echo'
			<tr>
				<td align="center"><i> EXTRA: </i></td>
				<td align="center"><i>'.$servizi[$i][0].' n° '.$servizi[$i][1].'</i></td>
			</tr>';
	}
	$j++;
}


$tot=$row[1]+$tot_serv+$luci;
$_SESSION['pre_totale']=$tot;



echo'
			<tr>
				<td align="center"><i> TOTALE : </i></td>
				<td align="center"><i>'.$tot.',00€</i></td>
			</tr>
			</table><br>
			<table border="0" align="center" cellpadding="10" cellspacing="10" width="100%">
	<tr><td width="50%" align="center"><i>I dati verranno registrati sul database e la tua smart card verra abilitatà all\'accesso del campo dopo la conferma del pagamento.</i></table>
			<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
				<form method="post" action="prenota.php">

					<tr>
				 		<td align="center"><input name="gen_fatt" type="checkbox" value="si"/><b> Spunta questo campo se vuoi che venga generata la fattura.</td>
					</tr>
					<tr>
				 		<td align="center"><input type="checkbox" id="checkme"/><b> Conferma i dati precedentemente descitti nel riepilogo della prenotazione.</td>
					</tr>
					<tr>
				 		<td width="1%" align="center"><input type="submit" name="submit" value="PRENOTA"  id="sendNewSms" disabled="disabled" style="width: 200px;height:30px">
					</tr>
					<script type="text/javascript">
					var checker = document.getElementById("checkme");
					var sendbtn = document.getElementById("sendNewSms");
					checker.onchange = function()
					{
						if(this.checked)
						{
							sendbtn.disabled = false;
						}
						else
						{
						    sendbtn.disabled = true;
						}
					}
					</script>
				</form>
			</table><br><br><br><br><br>
			';

?>