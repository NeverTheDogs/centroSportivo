<?php
include "include/visualizza.php";
include "check1.php";
include "include/menu1.php";

$zona = array();
$query = "SELECT DISTINCT zona FROM superfici";
		$res=mysqli_query($connect, $query);
		$count_zona = mysqli_num_rows($res);
		$i=0;
		while ($row=mysqli_fetch_array($res))
		{
			$zona[$i]=$row[0];
			$i++;
		}

echo '<html><head>
<title>Orario Turni</title><br><br>
<table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
	<tr>
		<td align="center"><p>'.$end_turni.'</p></td>
	</tr>
	</table><br><br>
	<table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
		<tr>
			<td align="center"><p>ORARIO ZONA ';

if (isset($_POST["post_zona"]))
{
	$_SESSION["zona_turno"]=$_POST["post_zona"];
	echo $_POST["post_zona"];
}
else
{
	$_SESSION["zona_turno"]=$zona[0];
	echo $zona[0];
}


echo '</p></td>
		</tr>
	</table><br><br>
	<table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
		<form method="post" action="orariPR1.php">
		<td align="center"><i>Seleziona la zona :</i><td>
		<select name="post_zona">';





//////// CONTINUARE DA QUESTO PUNTO -----> POST CON SELEZIONE ZONA

		for ($i=0; $i < $count_zona ; $i++)
		{ 
			echo'<option value="'.$zona[$i].'">'.$zona[$i].'</option>';
		}

echo '	</table><br>
		<table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
		<td align="center"><input type="submit" name="scelta_zona "value="CAMBIA ZONA" style="width: 100px;height:30px"></form></table><br><br>';
/* $query="SELECT id, fascia FROM turni UNION SELECT id_turni, id_mansione FROM compie";
 $res=mysqli_query($connect, $query);
	while ($row=mysqli_fetch_array($res))
	{	
		echo $row[0];
		echo $row[1];
		echo $row[2];
		echo $row[3];
		echo $row[4];
		echo $row[5];
		echo $row[6];
	}*/

include "include/calendario_dipendenti.php";

echo '<br><br>
<table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
	<tr>
		<td align="center"><p>INSERISCI TURNO</p></td>
	</tr>
</table><br><br>
<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0">
	<tr>
		<form method="post" action="turni.php"> 
		<td align="center"><i>DIPENDENTE</i><td>
		<select name="dipendente">';



//////////////////////////////   

$dip = array(
					array(),
					array(),
					);

		$query = "SELECT codice,nome,cognome FROM persone WHERE tipo='Dipendente'";
		$res=mysqli_query($connect, $query);
		$count = mysqli_num_rows($res);
		$i=0;
		while ($row=mysqli_fetch_array($res))
		{
			
			for ($j=0; $j < 3; $j++)
			{
				$dip[$i][$j]=$row[$j];
			}
			$i++;
		}

		
for ($i=0; $i < $count ; $i++)
{ 
	echo'<option value="'.$dip[$i][0].'">'.$dip[$i][1]." ".$dip[$i][2].'</option>';
}
echo '</select><td align="center"><i>MANSIONE </i><td><select name="pre_mansione">';

$mansioni = array(
				array(),
				array(),
		);
$query = "SELECT id,nome FROM mansione ";
		$res=mysqli_query($connect, $query);
		$count = mysqli_num_rows($res);
		$i=0;
		while ($row=mysqli_fetch_array($res))
		{
			for ($j=0; $j < 2; $j++)
			{
				$mansioni[$i][$j]=$row[$j];
			}
			$i++;
		}

		
for ($i=0; $i < $count ; $i++)
{ 
	echo'<option value="'.$mansioni[$i][0].'">'.$mansioni[$i][1].'</option>';
}

echo '</select><td align="center"><i>ZONA </i><td>
		<select name="pre_zona">';

for ($i=0; $i < $count_zona ; $i++)
		{ 
			echo'<option value="'.$zona[$i].'">'.$zona[$i].'</option>';
		}



echo '
		</select><td align="center"><i>GIORNO </i><td>
		<select name="giorno">
			<option value="'.$giorno.'">'.$giorno.'</option>
			<option value="'.$giorno1.'">'.$giorno1.'</option>	
			<option value="'.$giorno2.'">'.$giorno2.'</option>
			<option value="'.$giorno3.'">'.$giorno3.'</option>
			<option value="'.$giorno4.'">'.$giorno4.'</option>	
			<option value="'.$giorno5.'">'.$giorno5.'</option>
			<option value="'.$giorno6.'">'.$giorno6.'</option>
			</td>
		</select>
		<td align="center"><i>FASCIA </i><td>
		<select name="fascia">
			<option value="1">8:00-13:00</option>
			<option value="2">13:00-18:00</option>	
			<option value="3">18:00-22:00</option>
		</select></td></tr>
		</table><br>
		<table align="center">
		<tr>
			<td align="center"><input type="submit" name="submit" value="CONFERMA" style="width: 100px;height:30px">
		</tr>
		</form></table>';




?>