<?php
include("include/sessioni.php");

if (($_SESSION['permesso']<1)||($_SESSION['permesso']>2)){
  echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Area riservata ! Accesso negato ! </p></td>
			</tr></table>';
 exit;

 // 			PERMESSO GESTORE E DIPENDENTI
}
?>
