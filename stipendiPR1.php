<?php
include "include/visualizza.php";
include "check1.php";
include "include/menu1.php";




echo '<html><head>
<title>Stipendi</title><br><br>
	<table border="0" align="center" cellpadding="0" cellspacing="5" width="0%">
		<tr>
			<td align="center"><p>STIPENDI DIPENDENTI</p>
		</tr>
	</table><br>
	<table border="0" align="center" cellpadding="0" cellspacing="5" width="0%">
		<tr>
			<td align="center"><i>SELEZIONA IL DIPENDENTE</i>
		</tr>
	</table><br><br>';



$dip = array(
		array(),
		);
$i=0;
$query = "SELECT nome, cognome, codice FROM persone WHERE tipo='Dipendente'";
		$res=mysqli_query($connect, $query);
		$c = mysqli_num_rows($res);
		while ($row=mysqli_fetch_array($res))
		{
			$dip[0][$i]=$row[0].' '.$row[1];
			$dip[1][$i]=$row[2];
			$i++;
		}

echo' <form method="post" action="stipendiPR1.php"> 
	<table align="center" max-width="100%" border ="0" cellpadding="0" bgcolor="#DCDCDC">
	<tr>
		<td align="center">
			<select name="cod_dip">';
			for ($i=0; $i < $c; $i++)
			{ 
				echo '<option value="'.$dip[1][$i].'">'.$dip[0][$i].'</option>';	
			}
			echo '</select></table><table align="center"><td align="center"><input type="submit" name="scelta" value="CERCA"></form></table><br><br>';


if ($_POST["scelta"])
{
	$cod_dip=$_POST["cod_dip"];
	$query= "SELECT turni.id_persone, persone.nome, persone.cognome, turni.giorno, turni.entrata, turni.uscita, compenso_accumulato.totale FROM compenso_accumulato INNER JOIN turni ON compenso_accumulato.id_turni = turni.id INNER JOIN persone ON turni.id_persone = persone.codice WHERE turni.id_persone='$cod_dip'";
	$res=mysqli_query($connect, $query);
	$count = mysqli_num_rows($res);
	if ($count==0)
	{
		echo'<table align="center" max-width="100%" border ="0" cellpadding="0">
		<tr>
			<td align="center"><i>Fino adesso non ha eseguito nemmeno un turno !</i>
		</tr><tr>';
	}
	else
	{
		echo'<table align="center" max-width="100%" border ="2" cellpadding="0" bgcolor="#DCDCDC">
		<tr>
			<td align="center"><i>CODICE</i><td align="center"><i>NOME</i><td align="center"><i>GIORNO</i><td align="center"><i>ENTRATA</i><td align="center"><i>USCITA</i><td align="center"><i>COMPENSO</i>
		</tr>';
		$tot=0;
		while ($row=mysqli_fetch_array($res))
		{
			$tot=$tot+$row[6];
			echo '<td align="center">'.$row[0].'<td align="center">'.$row[1].' '.$row[2].'<td align="center">'.$row[3].'<td align="center">'.$row[4].'<td align="center">'.$row[5].'<td align="center">'.$row[6].',00 €</tr>';
		}
		echo '</table><br><br><br><table align="center" max-width="100%" border ="0" cellpadding="0">
		<tr>
			<td align="center"><i>COMPENSO TOTALE</i><td align="center"><i>
		</tr>
		<tr>
			<td align="center"><i>'.$tot.',00 €</i><td align="center"><i>
		</tr>';
	}	
}




?>