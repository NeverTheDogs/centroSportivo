<?php
include "check2.php";

if (($permesso==2)||($permesso==1))
{
	echo
	'<tr>
      <center><img width="100%" src="images.png"></center><br><br>
    </tr>
	<head>
		<link rel="stylesheet" href="include/style.css" type="text/css">
	</head>
	<body>
	<table max-width="100%" border ="1" celspacing="0" cellpadding="0">
	  <tr>
	    <td align="center" width="1%"><a href="turniPR2.php">Orari</a></td>
	    <td align="center" width="1%"><a href="vista_prePR2.php">Prenotazioni</a></td>    
	    <td align="center" width="1%"><a href="magazzinoPR2.php">Magazzino</a></td>
	    <td align="center" width="1%"><a href="richiestePR2.php">Richieste</a></td>
	    <td align="center" width="1%"><a href="javascript:self.print()"">Stampa</a> </td>
		</tr>
	</table>
	</td>
	';
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


//      SI DEVE SISTEMARE TUTTO IL MENU' DELLE PAGINE PHP DEL DIPENDENTE

?>