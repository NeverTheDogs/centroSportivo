<?php
include "include/connessione.php";
include "include/sessioni.php";

if ($permesso!=1)
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

$campo=$_SESSION["numero_campo"];
$giorno=date('Y-m-d');
$giorno1=date('Y-m-d', strtotime('+1 day'));
$giorno2=date('Y-m-d', strtotime('+2 day'));
$giorno3=date('Y-m-d', strtotime('+3 day'));
$giorno4=date('Y-m-d', strtotime('+4 day'));
$giorno5=date('Y-m-d', strtotime('+5 day'));
$giorno6=date('Y-m-d', strtotime('+6 day'));

$table = array(
				array("#############", $giorno, $giorno1, $giorno2, $giorno3, $giorno4, $giorno5, $giorno6),
				array("8:00-13:00",false,false,false,false,false,false,false),
				array("13:00-18:00",false,false,false,false,false,false,false),
				array("18:00-22:00",false,false,false,false,false,false,false),
				 );



$i=1;
$u=1;
while ($i < 4)
{


	$query= "SELECT persone.nome, persone.cognome, mansione.nome, turni.giorno, turni.id_fascia FROM turni INNER JOIN persone ON turni.id_persone = persone.codice INNER JOIN mansione ON turni.zona_superfici = '$zona_turno'";
	//$query = "SELECT id_persone,id_mansioni,codice,nome FROM turni,persone,mansioni WHERE id_fascia='$i' AND zona_superfici='$zona_turno')";
	$res=mysqli_query($connect, $query);
	while ($row=mysqli_fetch_array($res))
	{
		switch ($row[3])
		{
			case $giorno:
				if ($row[4]==$i)
				{
					$table[$u][1]=$row[0]." ".$row[1];
				}
				break;
			case $giorno1:
				if ($row[4]==$i)
				{
					$table[$u][2]=$row[0]." ".$row[1];
				}
				break;
			case $giorno2:
				if ($row[4]==$i)
				{
					$table[$u][3]=$row[0]." ".$row[1];
				}
				
				break;
			case $giorno3:
				if ($row[4]==$i)
				{
					$table[$u][4]=$row[0]." ".$row[1];
				}
				break;
			case $giorno4:
				if ($row[4]==$i)
				{
					$table[$u][5]=$row[0]." ".$row[1];
				}
				break;
			case $giorno5:
				if ($row[4]==$i)
				{
					$table[$u][6]=$row[0]." ".$row[1];
				}
				break;
			case $giorno6:
				if ($row[4]==$i)
				{
					$table[$u][7]=$row[0]." ".$row[1];
				}
				break;
			default:
					//code...;
				break;
		}
	}
	$i++;
	$u++;
}


echo'<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">';
for ($i=0; $i < 4; $i++)
{ 
	echo'<tr>';
	for ($j=0; $j < 8; $j++)
	{ 
		echo'<td align="center"><i>'.$table[$i][$j].'</i></td>';
		
	}
	echo'</tr>';

}
echo '</table><br>';



?>