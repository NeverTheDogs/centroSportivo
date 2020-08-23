<?php
include "include/sessioni.php";
include "include/connessione.php";

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
if (!$_POST["dalle"])
{
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Devi seguire il giusto ordine per poter prenotare ! </p></td>
			</tr></table>';exit;
}

$dalle=$_POST["dalle"];
$giorno=$_POST["giorno"];
$_SESSION["dalle"]=$dalle;
$_SESSION["giorno"]=$giorno;

$query = "SELECT * FROM prenotazioni WHERE (id_superfici='$numero_campo')AND(dalle='$dalle')AND(giorno='$giorno')";
if($ris=mysqli_query($connect, $query));
	$num=mysqli_num_rows($ris);
if ($num==0)
{
	echo'<br><br>
	<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
	<tr>
		<td align="center"><p>SCEGLI I SERVIZI DESIDERATI</p></td>
	</tr>
	<form method="post" action="finepre.php">
	</table><br><br>
	<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">
	<tr>
	<td align="center"><i> SERVIZI </i></td>
	<td align="center"><i> PREZZO </i></td>
	<td align="center"><i> QUANTITA\' </i></td>
	</tr>';

	$nomi_serv = array();
	$query1 = "SELECT * FROM servizi WHERE (tipo='vendita-consumo')OR(tipo='vendita') ORDER BY id";
	$res1=mysqli_query($connect, $query1);
	$num=mysqli_num_rows($res1);
	$_SESSION['numero_servizi']=$num;
	$a=0;
	$i=0;
	while ($row1=mysqli_fetch_array($res1))
	{
		echo '<tr><td align="center">';
		printf ("%s\n",$row1[2]);
		$nomi_serv[$a]=$row1[2];
		echo '<td align="center">';
		printf ("%s,00 €\n",$row1[3]);


		echo '<td align="center"><select name="quantita'.$a.'">';
		for ($i=0; $i <= $row1[5] ; $i++)
		{ 
			if ($row1[5]==0)
			{
				echo'<option value="0">ESAURITO</option>';
			}
			else
			{
				echo'<option value="'.$i.'">'.$i.'</option>';
			}
		}
		echo '</td></tr>';
		$a++;
		$i++;
	}
	
	//call_user_func_array('ricerca', array($nomi_serv));
		
		echo '</table>
		<br>
		<table>
			 <td width="1%" align="center">
		    <input type="submit" name="submit" value="CONTINUA" style="width: 200px;height:30px">
		    </td>
		</table></form>';

}
else
{
	$errore="Esiste già una prenotazione modifica i dati!";
	echo'<br><br>
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

/*
function ricerca(array $nomi_serv)
{
	$num = count($nomi_serv);
	echo '</table>';
	echo '<br><br><table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
		</table><br>
		<form method="post" action="finePre.php">
		<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">
			<tr>
				<td align="center"><b>SERVIZIO:</b>
				<select name="servizio">';
				for ($i=0; $i < $num ; $i++)
				{ 
					echo'<option value="'.$nomi_serv[$i].'">'.$nomi_serv[$i].'</option>';
				}

			echo'</select></td>
				<td align="center"><b>QUANTITA\':</b>
				<select name="quantita">';
				for ($i=0; $i < 10 ; $i++)
				{ 
					echo'<option value="'.$i.'">'.$i.'</option>';
				}
			echo'</select></td></tr>';
}
*/

?>



