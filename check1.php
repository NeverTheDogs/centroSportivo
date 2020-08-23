<?php
include("include/sessioni.php");
include "include/connessione.php";

if ($permesso!=1)
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
  // 			PERMESSO GESTORE ?>