<?php
include "include/sessioni.php";


if ($permesso==1)
{
	echo '<table border="2" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="left"><font color="blue" size="2"><a href="index.php"><u>Visualizzazione utente</u></font>
		</tr>
		<tr>
			<td align="left"><font color="blue" size="2"><a href="private1.php"><u>Visualizzazione gestore</u></font>
		</tr>
	</table>';
}
elseif ($permesso==2)
{
	echo '<table border="2" align="left" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="left"><font color="blue" size="2"><a href="index.php"><u>Visualizzazione utente</u></font>
		</tr>
		<tr>
			<td align="left"><font color="blue" size="2"><a href="private2.php"><u>Visualizzazione dipendente</u></font>
		</tr>
	</table>';
}
else
{
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Area riservata ! Accesso negato ! </p></td>
			</tr></table>';
 exit;
}
?>