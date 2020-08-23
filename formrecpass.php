<?php
include "include/header.php";

if ($username)
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

echo '<html>
<head>
<title>Recupero Password</title>
<br><br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
  <tr>
    <td align="center"><p>RECUPERO PASSWORD</p></td>
  </tr>
</table><br><br>
<table align="center">
 <tr>
    <td align="center"><i>La password temporanea ti verrà inviata sul numero di telefono inserito al momento della registrazione sei pregato di aggiornarla al primo accesso!</i>
  </tr>
</table>
<form method="post" action="recpass.php">
<table border="0" align="center" cellpadding="10" cellspacing="10" width="100%">
      <tr>
        <td width="50%">
          <div align="right">
          <b>USERNAME: </b></div></td>
          <td width="50%">
          <input type="text" name="username" onkeypress="onlyAlphaNum(event)">
          </font></td>
      </tr>
      <tr>
        <td width="50%">
          <div align="right"><b>TELEFONO: </b></div></td>
        <td width="50%">
          <input type="text" name="telefono" maxlength="10" onkeypress="onlyNumbers(event)" onBlur="controllaTelefono(telefono.value)">
          </font></td>
      </tr>
	</table>
<table border="0" align="center" cellpadding="10" cellspacing="10" width="100%">
  <tr>
      <td width="50%" align="center">
        <input type="submit" value="CONFERMA" name="submit" style="width: 200px;height:30px">
      </td>
  </tr>
</table></form></body></html>';
?>