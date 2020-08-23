<?php
include "include/visualizza.php";
include "check1.php";
include "include/menu1.php";


echo '<html><head>
<title>Registra Nuovo Utente</title><br><br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
  <tr>
    <td align="center"><p>REGISTRAZIONE DI UN NUOVO UTENTE</p></td>
  </tr>
</table><br><br>
<form method="post" action="registrazionePR.php">
<table border="0" align="center" cellpadding="10" cellspacing="10" width="0%">
      <tr>
      <td width="50%">
          <div align="right">
          <b>*TIPO UTENTE: </b></div>
			<td width="50%"><select name="permessi">
			<option value="1">Amministratore</option>
			<option value="2">Dipendente</option>
			<option value="3">Cliente</option>
		</select>
	</tr>
        <td width="50%">
          <div align="right">
          <b>*USERNAME: </b></div></td>
          <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2">
          <input type="text" name="username" size="50%" maxlength="20" onkeypress="onlyAlphaNum(event)">
          </font></td>
    </tr>
    <tr>
        <td width="50%">
          <div align="right"><b>*PASSWORD: </b></div></td>
        <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2">
          <input type="password" name="password" size="50%" maxlength="20" onBlur="controllaPassword(password.value)">
          </font></td>
    </tr>
    <tr>
        <td width="50%">
          <div align="right">
          <b>*CONFERMA PASSWORD: </b></div></td>
          <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2">
          <input type="password" name="verifica" size="50%" maxlength="20 ">
          </font></td>
    </tr>
    <tr>
        <td width="50%">
          <div align="right">
          <b>*CODICE FISCALE: </b></div></td>
          <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2">
          <input type="text" name="codice" size="50%" maxlength="16" onkeypress="onlyAlphaNum(event)" onBlur="controllaCodice(codice.value)">
          </font></td>
    </tr>
    <tr>
        <td width="50%">
          <div align="right">
          <b>*COGNOME: </b></div></td>
          <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2">
          <input type="text" name="cognome" size="50%" maxlength="40" onkeypress="onlyAlpha(event)">
          </font></td>
    </tr>
    <tr>
        <td width="50%">
          <div align="right">
          <b>*NOME: </b></div></td>
          <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2">
          <input type="text" name="nome" size="50%" maxlength="40" onkeypress="onlyAlpha(event)">
          </font></td>
    </tr>
    <tr>
        <td width="50%">
          <div align="right">
          <b>*EMAIL: </b></div></td>
          <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2">
          <input type="email" name="mail" size="50%" maxlength="40"onkeypress="onlyAlpha(Numevent)">
          </font></td>
    </tr>
    <tr>
        <td width="50%">
          <div align="right">
          <b>*TELEFONO: </b></div></td>
          <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2"><b>+39</b>
          <input type="text" name="numero" size="41%" maxlength="10" onkeypress="onlyNumbers(event)">
          </font></td>
    </tr>
    <tr>
        <td width="50%">
          <div align="right">
          <b>CITTA\': </b></div></td>
          <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2"><br>
          <input type="text" name="citta" size="50%" maxlength="40" onkeypress="onlyAlpha(event)">
          </font></td>
    </tr>
    <tr>
        <td width="50%">
          <div align="right">
          <b>INDIRIZZO: </b></div></td>
          <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2"><b>Via/Piazza</b>
          <input type="text" name="indirizzo" size="27%" maxlength="40" onkeypress="onlyAlpha(event)">
          </font></td>
    </tr>
    <tr>
        <td width="50%">
          <div align="right">
          <b>NUMERO: </b></div></td>
          <td width="50%"> <font face="Arial, Helvetica, sans-serif" size="2"><br>
          <input type="text" name="civico" size="50%" maxlength="4" onkeypress="onlyNumbers(event)">
          </font></td>
      </tr>
    <tr>
        <td width="50%">
          <div align="right">
          <b>SESSO: </b></div></td>
          <td width="0%"> <font face="Arial, Helvetica, sans-serif" size="2">
          <b><input type="radio" name="sesso" value="M"/> M</b>
          <b><input type="radio" name="sesso" value="F"/> F</b>
          </font></td>
    </tr>
	</table>
<table border="0" align="center" cellpadding="10" cellspacing="10" width="100%">
<tr>
    <td width="50%" align="center">
      <input type="submit" value="CONFERMA" name="submit" style="width: 200px;height:30px">
</tr></form>
<tr><td width="50%" align="center"><i>N.B. = i campi contrassegnati con il simbolo (*) sono obbligatori. </i></table></body></html>';





?>