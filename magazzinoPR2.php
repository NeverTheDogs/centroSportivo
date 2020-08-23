<?php
include "include/visualizza.php";
include "check2.php";
include "include/menu2.php";


echo '<html><head>
<title>Gestione Magazzino</title><br><br>
	<table border="0" align="center" cellpadding="0" cellspacing="5" width="0%">
		<tr>
			<td align="center"><p>'.$end_order.'</p></td>
		</tr>
		<tr>
			<td align="center"><p>INVENTARIO MAGAZZINO</table><br><br>
		<table align="center" max-width="100%" border ="2" cellpadding="5" bgcolor="#DCDCDC">
		<tr>
			<td align="center"><i>DITTA</td><td align="center"><i>FORNITORE</td><td align="center"><i>PRODOTTO</td><td align="center"><i>PREZZO</td><td align="center"><i>QUANTITA\'</tr>
		<tr>';


$_SESSION['end_order']="";
$query= "SELECT  fornitore.ditta, fornitore.nome, servizi.nome, servizi.prezzo_acq, servizi.totale FROM servizi INNER JOIN fornitore ON servizi.id_fornitore = fornitore.id";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
	echo '<tr><td align="center">'.$row[0].'<td align="center">'.$row[1].'<td align="center">'.$row[2].'<td align="center">'.$row[3].',00 €</td><td align="center">'.$row[4].'</tr>';
}


echo '</table><br><br>
<table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
	<tr>
		<td align="center"><p>INSERISCI ORDINE</p></td>
	</tr>
</table><br><br>
<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
	<tr>
		<form method="post" action="ordina.php"> 
		<td align="center"><i>FORNITORE :</i><td>
		<select name="fornitore">';



//////////////////////////////   


		$query = "SELECT nome FROM fornitore ORDER BY id";
		$res=mysqli_query($connect, $query);
		$count = mysqli_num_rows($res);
		$i=0;
		/*
			$dip = array(
					array(),
					array(),
					);
		while ($row=mysqli_fetch_array($res))
		{
			
			for ($j=0; $j < 3; $j++)
			{
				$dip[$i][$j]=$row[$j];
			}
			$i++;
		}*/
		while ($row=mysqli_fetch_array($res))
		{
			echo'<option value="'.$row[0].'">'.$row[0].'</option>';
		}/*



		
for ($i=0; $i < $count ; $i++)
{ 
	echo'<option value="'.$dip[$i][0].'">'.$dip[$i][1]." ".$dip[$i][2].'</option>';
}*/
echo '</select><td align="center"><i>PRODOTTO :</i><td><select name="prodotto">';

$query = "SELECT nome,id_fornitore FROM servizi";
		$res=mysqli_query($connect, $query);
		$count = mysqli_num_rows($res);
		$i=0;
		while ($row=mysqli_fetch_array($res))
		{
			echo'<option value="'.$row[0].'">'.$row[0].'</option>';
		}

echo '</select><td align="center"><i>QUANTITA\' :</i><td>
		<td align="center"><select name="quantita'.$a.'">';
		for ($i=0; $i < 21 ; $i++)
				{ 
					echo'<option value="'.$i.'">'.$i.'</option>';
				}
		echo '</td></tr>
		</table><br>
		<table align="center">
		<tr>
			<td align="center"><input type="submit" name="submit" value="ORDINA" style="width: 100px;height:30px">
		</tr>
		</form></table>';




?>