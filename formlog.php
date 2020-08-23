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

echo '
<html><head>
<title>Login</title><br><br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
  <tr>
    <td align="center"><p>EFFETTUA IL LOGIN</p></td>
  </tr>
</table><br><br>
<form method="post" action="login.php">
<table border="0" align="center" cellpadding="10" cellspacing="10" width="100%">
      <tr>
        <td width="50%">
          <div align="right">
          <b>USERNAME: </b></div></td>
          <td width="50%">
          <input type="text" name="username" maxlength="20" onkeypress="onlyAlphaNum(event)">
          </font></td>
      </tr>
      <tr>
        <td width="50%">
          <div align="right"><b>PASSWORD: </b></div></td>
        <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2">
          <input type="password" name="password" maxlength="20" onBlur="controllaPassword(password.value)">
          </font></td>
      </tr>
	</table>
<table border="0" align="center" cellpadding="10" cellspacing="10" width="100%">
<tr>
    <td width="50%" align="center">
      <input type="submit" value="ACCEDI" name="submit" style="width: 200px;height:30px">
    </td>
</tr></form>
<form method="post" action="formrecpass.php">
  <tr>
      <td width="50%" align="center">
        <input type="submit" value="RECUPERA PASSWORD" name="submit" style="width: 200px;height:30px">
      </td>
  </tr>
</table></form></body></html>';
?>