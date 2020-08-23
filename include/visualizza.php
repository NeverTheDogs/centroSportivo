<?php
include "include/sessioni.php";
include "include/connessione.php";


if ($permesso==1)
{
	echo '<table align="right" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="right"><font color="blue" size="2"><a href="index.php"><u>Visualizzazione utente</u></font>
		</tr>
		<tr>
			<td align="right"><font color="blue" size="2"><a href="nuovoPR1.php"><u>Visualizzazione gestore</u></font>
		</tr>
	</table>';
}
elseif ($permesso==2)
{
	echo '<table border="0" align="right" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="right"><font color="blue" size="2"><a href="index.php"><u>Visualizzazione utente</u></font>
		</tr>
		<tr>
			<td align="right"><font color="blue" size="2"><a href="turniPR2.php"><u>Visualizzazione dipendente</u></font>
		</tr>
	</table>';
}
else
{
}

?>
