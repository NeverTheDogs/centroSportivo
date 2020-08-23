<?php
include "include/sessioni.php";
if (!$username)
{
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Area riservata ! Accesso negato ! </p></td>
			</tr></table>';exit;
}
include "include/header.php";


echo'<body><br><br>
		<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
			<tr>
    		<td align="center"><p>'.$mod_pass.'</p></td>
  			</tr></table><br><br>
			<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
			<tr>
				<td align="center"><p><strong>--> HAI EFFETTUATO IL LOGOUT <--</strong></p></td>
			</tr>
		</table>';

$_SESSION=array(); 
session_destroy();
?>