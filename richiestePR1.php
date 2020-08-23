<?php
include "include/visualizza.php";
include "check1.php";
include "include/menu1.php";


echo '<html><head>
<title>Richieste Effettuate</title><br><br>
	<table border="0" align="center" cellpadding="0" cellspacing="5" width="0%">
		<tr>
			<td align="center"><p>RICHIESTE DI ORDINI IN CORSO</table><br><br>
		<table align="center" max-width="100%" border ="2" cellpadding="5" bgcolor="#DCDCDC">
		<tr>
			<td align="center"><i>DITTA</td><td align="center"><i>FORNITORE</td><td align="center"><i>PRODOTTO</td><td align="center"><i>QUANTITA\'</td><td align="center"><i>RICHIEDENTE</tr>
		<tr>';


$query= "SELECT fornitore.ditta, fornitore.nome, servizi.nome, fornisce.quantita, persone.nome, persone.cognome FROM fornisce INNER JOIN fornitore ON fornisce.id_fornitore = fornitore.id INNER JOIN servizi ON fornisce.id_servizi = servizi.id INNER JOIN persone ON fornisce.committente = persone.codice";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
	echo '<tr><td align="center">'.$row[0].'<td align="center">'.$row[1].'<td align="center">'.$row[2].'<td align="center">'.$row[3].'</td><td align="center">'.$row[4].' '.$row[5].'</tr>';
}


echo '</table><br><br>';



?>