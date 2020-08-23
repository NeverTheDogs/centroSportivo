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
				array("9:00-10:00",false,false,false,false,false,false,false),
				array("10:00-11:00",false,false,false,false,false,false,false),
				array("11:00-12:00",false,false,false,false,false,false,false),
				array("14:00-15:00",false,false,false,false,false,false,false),
				array("15:00-16:00",false,false,false,false,false,false,false),
				array("16:00-17:00",false,false,false,false,false,false,false),
				array("17:00-18:00",false,false,false,false,false,false,false),
				array("18:00-19:00",false,false,false,false,false,false,false),
				array("19:00-20:00",false,false,false,false,false,false,false),
				array("20:00-21:00",false,false,false,false,false,false,false),
				 );

$i=9;$u=1;
while ($i <= 11)
{
	$query = "SELECT * FROM prenotazioni WHERE (id_superfici='$campo')AND(dalle='$i')";
	$res=mysqli_query($connect, $query);
	while ($row=mysqli_fetch_array($res))
	{	
		switch ($row[8]) {
			case $giorno:
				$table[$u][1]="X";
				break;
			case $giorno1:
				$table[$u][2]="X";
				break;
			case $giorno2:
				$table[$u][3]="X";
				break;
			case $giorno3:
				$table[$u][4]="X";
				break;
			case $giorno4:
				$table[$u][5]="X";
				break;
			case $giorno5:
				$table[$u][6]="X";
				break;
			case $giorno6:
				$table[$u][7]="X";
				break;
			default:
					//code...;
				break;
		}
	}
	$u++;
	$i++;
}

$i=14;$u=4;
while ($i <= 20)
{
	$query = "SELECT * FROM prenotazioni WHERE (id_superfici='$campo')AND(dalle='$i')";
	$res=mysqli_query($connect, $query);
	while ($row=mysqli_fetch_array($res))
	{	
		switch ($row[8])
		{
			case $giorno:
				$table[$u][1]="X";
				break;
			case $giorno1:
				$table[$u][2]="X";
				break;
			case $giorno2:
				$table[$u][3]="X";
				break;
			case $giorno3:
				$table[$u][4]="X";
				break;
			case $giorno4:
				$table[$u][5]="X";
				break;
			case $giorno5:
				$table[$u][6]="X";
				break;
			case $giorno6:
				$table[$u][7]="X";
				break;
			default:
				//code...;
				break;
		}
	}
	$u++;
	$i++;
}

echo'<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">';
for ($i=0; $i < 11; $i++)
{ 
	echo'<tr>';
	for ($j=0; $j < 8; $j++)
	{ 
		echo'<td align="center"><i>'.$table[$i][$j].'</i></td>';
		
	}
	echo'</tr>';

}
echo '</table><br>';








/*
// Array etichette X
// Array etichette y
// Inizializzare un array bi da x+1; y+1 (etichette -> strighe, i vuoti -> false, le x -> true)
// Query
// Sfruttando la query popolare l'array (ricordandoti le etichette)
// Fai un for:for così:

	echo'<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">

	for (i=0; i<8; i++){
		<tr>
		
		for (j=0; j<8; j++){
			if (arr[j,i] == "true"){
				<td align="center"><font color="blue" size="6"><b><strong>X</strong></font></b></td>

			} else if (arr[j,i] == "false") {
				<td align="center"><font color="blue" size="6"><b><strong></strong></font></b></td>

			} else {
				<td align="center"><font color="blue" size="6"><b><strong>'.$arr[j,i].'</strong></font></b></td>
			}

		}

		</tr>
	}





echo $table[0][0];echo $table[0][1];echo $table[0][2];echo $table[0][3];echo $table[0][4];echo $table[0][5];echo $table[0][6];echo $table[0][7];
echo '<br>';
echo $table[1][0];echo $table[1][1];echo $table[1][2];echo $table[1][3];echo $table[1][4];echo $table[1][5];echo $table[1][6];echo $table[1][7];
echo '<br>';
echo $table[2][0];echo $table[2][1];echo $table[2][2];echo $table[2][3];echo $table[2][4];echo $table[2][5];echo $table[2][6];echo $table[2][7];
echo '<br>';
echo $table[3][0];echo $table[3][1];echo $table[3][2];echo $table[3][3];echo $table[3][4];echo $table[3][5];echo $table[3][6];echo $table[3][7];
echo '<br>';
echo $table[4][0];echo $table[4][1];echo $table[4][2];echo $table[4][3];echo $table[4][4];echo $table[4][5];echo $table[4][6];echo $table[4][7];
echo '<br>';
echo $table[5][0];echo $table[5][1];echo $table[5][2];echo $table[5][3];echo $table[5][4];echo $table[5][5];echo $table[5][6];echo $table[5][7];
echo '<br>';
echo $table[6][0];echo $table[6][1];echo $table[6][2];echo $table[6][3];echo $table[6][4];echo $table[6][5];echo $table[6][6];echo $table[6][7];
echo '<br>';
echo $table[7][0];echo $table[7][1];echo $table[7][2];echo $table[7][3];echo $table[7][4];echo $table[7][5];echo $table[7][6];echo $table[7][7];
echo '<br>';
echo $table[8][0];echo $table[8][1];echo $table[8][2];echo $table[8][3];echo $table[8][4];echo $table[8][5];echo $table[8][6];echo $table[8][7];
echo '<br>';
echo $table[9][0];echo $table[9][1];echo $table[9][2];echo $table[9][3];echo $table[9][4];echo $table[9][5];echo $table[9][6];echo $table[9][7];
echo '<br>';
echo $table[10][0];echo $table[10][1];echo $table[10][2];echo $table[10][3];echo $table[10][4];echo $table[10][5];echo $table[10][6];echo $table[10][7];
echo '<br>';











echo'<table align="center" max-width="100%" border ="1" cellpadding="5" bgcolor="#DCDCDC">
	<tr>
		<td align="center"><font color="blue" size="6"><b><strong> ############ </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> '.date('d-m-Y').'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> '.date('d-m-Y', strtotime('+1 day')).'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> '.date('d-m-Y', strtotime('+2 day')).'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> '.date('d-m-Y', strtotime('+3 day')).'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> '.date('d-m-Y', strtotime('+4 day')).'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> '.date('d-m-Y', strtotime('+5 day')).'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> '.date('d-m-Y', strtotime('+6 day')).'</strong></font></b></td>
	</tr>';
$query = "SELECT * FROM prenotazioni WHERE (id_superfici='$campo')AND(dalle=9)";//AND(giorno='$giorno')";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
	if ($row[8]==$giorno)
	{
		$a1='X';
	}
	elseif ($row[8]==$giorno1) {
		$a2='X';
	}
	elseif ($row[8]==$giorno2) {
		$a3='X';
	}
	elseif ($row[8]==$giorno3) {
		$a4='X';
	}
	elseif ($row[8]==$giorno4) {
		$a5='X';
	}
	elseif ($row[8]==$giorno5) {
		$a6='X';
	}
	elseif ($row[8]==$giorno6) {
		$a7='X';
	}
}

echo'<tr>
		<td align="center"><font color="blue" size="6"><b><strong> 9:00-10:00 </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$a1.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$a2.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$a3.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$a4.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$a5.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$a6.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$a7.'</strong></font></b></td>
	</tr>';

$query = "SELECT * FROM prenotazioni WHERE (id_superfici='$campo')AND(dalle=10)";//AND(giorno='$giorno')";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
	if ($row[8]==$giorno)
	{
		$b1='X';
	}
	elseif ($row[8]==$giorno1) {
		$b2='X';
	}
	elseif ($row[8]==$giorno2) {
		$b3='X';
	}
	elseif ($row[8]==$giorno3) {
		$b4='X';
	}
	elseif ($row[8]==$giorno4) {
		$b5='X';
	}
	elseif ($row[8]==$giorno5) {
		$b6='X';
	}
	elseif ($row[8]==$giorno6) {
		$b7='X';
	}
}

echo'	<tr>
		<td align="center"><font color="blue" size="6"><b><strong> 10:00-11:00 </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$b1.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$b2.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$b3.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$b4.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$b5.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$b6.'</strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong>'.$b7.'</strong></font></b></td>
	</tr>
	<tr>
		<td align="center"><font color="blue" size="6"><b><strong> 11:00-12:00 </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
	</tr>
	<tr>
		<td align="center"><font color="blue" size="6"><b><strong> 14:00-15:00 </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
	</tr>
	<tr>
		<td align="center"><font color="blue" size="6"><b><strong> 15:00-16:00 </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
	</tr>
	<tr>
		<td align="center"><font color="blue" size="6"><b><strong> 16:00-17:00 </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
	</tr>
	<tr>
		<td align="center"><font color="blue" size="6"><b><strong> 17:00-18:00 </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
	</tr>
	<tr>
		<td align="center"><font color="blue" size="6"><b><strong> 18:00-19:00 </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
	</tr>
	<tr>
		<td align="center"><font color="blue" size="6"><b><strong> 19:00-20:00 </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
	</tr>
	<tr>
		<td align="center"><font color="blue" size="6"><b><strong> 20:00-21:00 </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
		<td align="center"><font color="blue" size="6"><b><strong> </strong></font></b></td>
	</tr>
</table>';
*/
?>