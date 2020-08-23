<?php
include "include/header.php";
if ($username || $us)
{
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Sono stati inseriti dati errati ! </p></td>
			</tr>
		</table><br><br><br>';
echo '<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><u>'.$errore.'</u></p></td>
			</tr>
			</table>';
			$_SESSION['errore']="";

 exit;
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
