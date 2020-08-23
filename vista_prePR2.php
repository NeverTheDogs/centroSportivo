<?php
include "include/visualizza.php";
include "check2.php";
include "include/menu2.php";



echo '<html><head>
<title>Prenotazioni Effettuate</title><br><br><table border="0" align="center" cellpadding="0" cellspacing="2" width="0%">
		<tr>
			<td align="center"><p>CONTROLLO PRENOTAZIONI
		</tr>
	 </table><br><br>
	 <table align="center" max-width="100%" border ="2" cellpadding="10" cellspacing="2" bgcolor="#DCDCDC">
		<tr>
			<td align="center"><i> CLIENTE</i><td align="center"><i> SUPERFICIE</i><td align="center"><i> GIORNO</i><td align="center"><i> DALLE</i><td align="center"><i> ALLE</i>
		</tr><tr>';

$today=date('Y-m-d');

$query= "SELECT persone.nome, persone.cognome, superfici.tipo,  prenotazioni.giorno, prenotazioni.dalle, prenotazioni.alle FROM prenotazioni INNER JOIN persone ON prenotazioni.id_persone = persone.codice INNER JOIN superfici ON prenotazioni.id_superfici = superfici.id WHERE (giorno >='$today')";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
	echo '<td align="center"><i>'.$row[0].' '.$row[1].'</i><td align="center"><i>'.$row[2].'</i><td align="center"><i>'.$row[3].'</i><td align="center"><i>'.$row[4].':00</i><td align="center"><i>'.$row[5].':00</i></tr>';
}



// 			NELLE PAGINE PRIVATE DI LIVELLO 1 BASTA AGGIUNGERE CHECK.PHP 
?>