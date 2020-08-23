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
        <td align="center"><p>Devi effettuare l\'accesso prima di poter prenotare ! </p></td>
      </tr></table>';exit;
}
include "include/header.php";
echo '
<html><head>
<title>Login</title><br><br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
  <tr>
    <td align="center"><p>SEZIONE DEDICATA ALL\'AGGIORNAMENTO DELLA PASSWORD</p></td>
  </tr>
</table><br><br>
<form method="post" action="modificapass.php">
<table border="0" align="center" cellpadding="10" cellspacing="10" width="100%">
      <tr>
        <td width="50%">
          <div align="right"><i> VECCHIA PASSWORD: </i></div></td>
        <td width="50%"><input type="password" name="password" maxlength="20" onBlur="controllaPassword(password.value)"></td>
      </tr>
      <tr>
        <td width="50%">
          <div align="right"><i> NUOVA PASSWORD: </i></div></td>
        <td width="50%"><input type="password" name="nuova" maxlength="20" onBlur="controllaPassword(nuova.value)"></td>
      </tr>
      <tr>
        <td width="50%">
          <div align="right"><i> CONFERMA PASSWORD: </i></div></td>
        <td width="50%"><input type="password" name="verifica" maxlength="20" onBlur="controllaPassword(verifica.value)"></td>
      </tr>
  </table>
<table border="0" align="center" cellpadding="10" cellspacing="10" width="100%">
<tr>
    <td width="50%" align="center">
      <input type="submit" value="CONFERMA" name="submit" style="width: 200px;height:30px">
    </td>
</tr></form></html>';






?>