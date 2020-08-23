<?php
include "include/visualizza.php";
include "check2.php";
include "include/menu2.php";


$query="SELECT codice_persone FROM utenti WHERE user='$username'";
  $res=mysqli_query($connect, $query);
  $row=mysqli_fetch_array($res);
  $codice_dip=$row[0];

echo '<html><head>
<title>Orario Turni</title><br><br><table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
		<tr>
			<td align="center"><p>ORARIO DI LAVORO
		</tr>
	 </table><br><br>
	 <table align="center" max-width="100%" border ="2" cellpadding="10" cellspacing="2" bgcolor="#DCDCDC">
		<tr>
			<td align="center"><i> GIORNO</i><td align="center"><i> DALLE</i><td align="center"><i> ALLE</i><td align="center"><i> RUOLO</i><td align="center"><i> SUPERFICIE</i>
		</tr><tr>';

$today=date('Y-m-d');

$query= "SELECT turni.giorno, fascia.dalle, fascia.alle, mansione.nome, turni.zona_superfici FROM turni INNER JOIN fascia ON turni.id_fascia = fascia.id INNER JOIN mansione ON turni.id_mansione = mansione.id WHERE (giorno >='$today') AND (id_persone='$codice_dip') ORDER BY giorno";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
	echo '<td align="center"><i>'.$row[0].'</i><td align="center"><i>'.$row[1].':00</i><td align="center"><i>'.$row[2].':00</i><td align="center"><i>'.$row[3].'</i><td align="center"><i>'.$row[4].'</i></tr>';
}



// 			NELLE PAGINE PRIVATE DI LIVELLO 1 BASTA AGGIUNGERE CHECK.PHP 
?>