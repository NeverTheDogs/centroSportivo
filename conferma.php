<?php
include"include/sessioni.php";
include "include/connessione.php";
$codice=rand(111111, 999999);

if ($trap==1)
{
	include "include/header.php";
	$query = "INSERT INTO conferme (numero, codice) VALUES ('$numero','$codice') ";
	mysqli_query($connect, $query);


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "cloud.fowiz.com/api/message_http_api.php?username=pippoilpazzo&phonenumber=".$numero."&message=Il%20codice%20per%20la%20registazione%20sul%20sito%20del%20centro%20sportivo%20è%20".$codice."&passcode=pippoilpazzo");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $inv=curl_exec($ch);
    curl_close($ch);
echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>PER COMPLETARE LA REGISTAZIONE INSERISCI QUI SOTTO</strong></p>
			</tr>
			<tr>
				<td align="center"><p><strong>IL CODICE INVIATO PER MESSAGGIO SUL NUMERO DI TELEFONO</strong></p>
			</tr>
		</table>
		<form method="post" action="finereg.php">
		<table border="0" align="center" cellpadding="10" cellspacing="10" width="0%">
      		<tr>
          		<td width="100%"> <font face="Arial, Helvetica, sans-serif" size="2">
          		<input type="text" name="sms" size="35%" maxlength="6" onkeypress="onlyNumbers(event)">
      		</tr>
      		<tr>
    			<td width="50%" align="center">
      			<input type="submit" value="CONFERMA" name="submit" style="width: 200px;height:30px">
			</tr>
      	</table>
      	</form>';
$_SESSION["trap"]="";
exit;
}
elseif ($trap==2)
{
	$query = "SELECT confermato FROM utenti WHERE user='$conf_user'";
$res=mysqli_query($connect, $query);
$row=mysqli_fetch_array($res);
if ($row[0]==0)
{
	include "include/header.php";
	echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>PER COMPLETARE LA REGISTAZIONE INSERISCI QUI SOTTO</strong></p>
			</tr>
			<tr>
				<td align="center"><p><strong>IL CODICE INVIATO PER MESSAGGIO SUL NUMERO DI TELEFONO</strong></p>
			</tr>
		</table>
		<form method="post" action="finereg.php">
		<table border="0" align="center" cellpadding="10" cellspacing="10" width="0%">
      		<tr>
          		<td width="100%"> <font face="Arial, Helvetica, sans-serif" size="2">
          		<input type="text" name="sms" size="35%" maxlength="6" onkeypress="onlyNumbers(event)">
      		</tr>
      		<tr>
    			<td width="50%" align="center">
      			<input type="submit" value="CONFERMA" name="submit" style="width: 200px;height:30px">
			</tr>
      	</table>
      	</form>';
      	exit();
}

}
else{echo'<body><br><br>
		<table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
			<tr>
				<td align="center"><p><strong>--> ERRORE <--</strong></p>
			</tr>
			<tr>
				<td align="center"><p>Area riservata ! Accesso negato ! </p></td>
			</tr></table>';exit;}


?>
