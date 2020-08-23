<?php
include "include/visualizza.php";
include "check1.php";
include "include/menu1.php";

if ($_POST["scelta"]||$_POST["seleziona"])
{
    $pre_data=$_POST["pre_anno"]."-".$_POST["pre_mese"]."-".$_POST["pre_giorno"];
    $pos_data=$_POST["pos_anno"]."-".$_POST["pos_mese"]."-".$_POST["pos_giorno"];

	$fatt = array(array(),);

    $query = "SELECT tipo, orario, totale FROM fatture WHERE (orario>'$pre_data')AND(orario<'$pos_data')";
	$res=mysqli_query($connect, $query);
	$c = mysqli_num_rows($res);
	$i=0;
	while ($row=mysqli_fetch_array($res))
	{
		for ($j=0; $j < 3; $j++)
		{ 
			$fatt[$i][$j]=$row[$j];
		}
		$i++;
	}
	if ($_POST["seleziona"])
	{
		$fatt = array(array(),);
		$ordina=$_POST["ordina"];
	    $query = "SELECT tipo, orario, totale FROM fatture WHERE (orario>'$prima_data')AND(orario<'$seconda_data')AND(tipo='$ordina')";
		$res=mysqli_query($connect, $query);
		$c = mysqli_num_rows($res);
		$i=0;
		while ($row=mysqli_fetch_array($res))
		{
			for ($j=0; $j < 3; $j++)
			{ 
				$fatt[$i][$j]=$row[$j];
			}
			$i++;
		}
	}

	
	echo '<html><head>
<title>Fatturato</title><br><br>
	<table border="0" align="center" cellpadding="0" cellspacing="5" width="0%">
		<tr>
			<td align="center"><p>RESOCONTO FATTURATO
	</table><br><br>
	<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
	<tr>
		<form method="post" action="conteggio.php"> 
		<td align="center"><i>SELEZIONA: </b><td>
		<select name="ordina">
			<option value="Entrata">Entrate</option>
			<option value="Uscita">Uscite</option>
		</select>
		<td><input type="submit" name="seleziona">
		</form>
	</tr></table><br><br>
	<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">
	<tr>';
	if ($c==0)
	{
		echo '</tr></table><br><br><table align="center"><tr><td align="center"><p>NON SONO STATE RISCONTRATE FATTURE IN QUESTO PERIODO!</p>';
		exit();
	}
	else
	{
		echo '<td align="center"><i>TIPO<td align="center"><i>IN DATA<td align="center"><i>TOTALE';
		for ($i=0; $i < $c; $i++)
		{ 
			echo'<tr>';
			for ($j=0; $j < 3; $j++)
			{ 
				if ($j==2)
				{
					echo'<td align="center">'.$fatt[$i][$j].',00€</td>';

				}
				else
				{
					echo'<td align="center">'.$fatt[$i][$j].'</td>';
				}
			}
		echo'</tr>';
		}

		echo '</table><br>';
		$_SESSION['prima_data']=$pre_data;
		$_SESSION['seconda_data']=$pos_data;
	 	exit();
	}
}






echo '<html><head>
<title>Fatturato</title><br><br>
	<table border="0" align="center" cellpadding="0" cellspacing="5" width="0%">
		<tr>
			<td align="center"><p>RESOCONTO FATTURATO
	</table><br><br>';
tabella();


function tabella()
{
echo '
<table align="center" max-width="0%" border ="0" cellspacing="0" cellpadding="0" bgcolor="white">
	<tr>
		<form method="post" action="conteggio.php">
		<td align="center"><i>INSERISCI IL PERIODO DA CONTROLLARE:</b><td>
	</tr>
</table><br><br>
<table align="center" max-width="100%" border ="0" cellpadding="0" bgcolor="#DCDCDC">
	<tr>
		<td align="center"><i> DA GIORNO:</b>
			<select name="pre_giorno">';
			for ($i=1; $i < 32; $i++)
			{ 
				echo '<option value="'.$i.'">'.$i.'</option>';	
			}
			echo '</select><td align="center"><i>MESE:</b>
			<select name="pre_mese">';
			for ($i=1; $i < 13; $i++)
			{ 
				echo '<option value="'.$i.'">'.$i.'</option>';	
			}
			echo '</select><td align="center"><i>ANNO:</b>
			<select name="pre_anno">';
			
			for ($i=0; $i < 5; $i++)
			{ 
				$anno=date('Y', strtotime('-'.$i.' year'));
				echo '<option value="'.$anno.'">'.$anno.'</option>';	
			}
echo'</tr>
		<td align="center"><i> A GIORNO:</b>
			<select name="pos_giorno">';
			for ($i=1; $i < 32; $i++)
			{ 
				echo '<option value="'.$i.'">'.$i.'</option>';	
			}
			echo '</select><td align="center"><i>MESE:</b>
			<select name="pos_mese">';
			for ($i=1; $i < 13; $i++)
			{ 
				echo '<option value="'.$i.'">'.$i.'</option>';	
			}
			echo '</select><td align="center"><i>ANNO:</b>
			<select name="pos_anno">';
			
			for ($i=0; $i < 5; $i++)
			{ 
				$anno=date('Y', strtotime('-'.$i.' year'));
				echo '<option value="'.$anno.'">'.$anno.'</option>';	
			}

echo '</tr></table><br><br><table align="center"><td><input type="submit" name="scelta" value="CERCA">
	</form>
</table><br><br>';
}




?>