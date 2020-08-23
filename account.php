<?php
include "include/header.php";
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

$query = "SELECT codice_persone FROM utenti WHERE user='$username'";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
  $codice=strtoupper($row[0]);
}
$query = "SELECT * FROM utenti,persone WHERE user='$username'AND codice='$codice'";
$res=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($res))
{
  $nome=$row[9];
  $cognome=$row[10];
  $telefono=$row[7];
  $mail=$row[8];
  $indirizzo=$row[11];
  $sesso=$row[13];
}

echo '<html><head>
<title>Account</title><br><br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
  <tr>
    <td align="center"><p>'.$pre_end.'</p></td>
  </tr>
  <tr>
    <td align="center"><p>I MIEI DATI</p></td>
  </tr>
</table><br><br>
<form method="post" action="formpass.php">
<table border="5" align="center" cellpadding="10" cellspacing="10" width="0%">
      <tr>
        <td align="center">
          <i>USERNAME: </i></td>
          <td align="center"><i>'.$username.'</i>
      </tr>
      <tr>
        <td align="center">
          <i>PASSWORD: </font></td>
          <td align="center"><input type="submit" value="MODIFICA" name="submit" style="width: 200px;height:30px">
      </tr>
      <tr>
        <td align="center">
          <i>CODICE FISCALE: </i></td>
          <td align="center"><i>'.$codice.'</i>
      </tr>
      <tr>
        <td align="center">
          <i>COGNOME:  </i></td>
          <td align="center"><i>'.$cognome.'</i>
      </tr>
      <tr>
        <td align="center">
          <i>NOME: </i></td>
          <td align="center"><i>'.$nome.'</i>
      </tr>
      <tr>
        <td align="center">
          <i>EMAIL: </i></td>
          <td align="center"><i>'.$mail.'</i>
      </tr>
      <tr>
        <td align="center">
          <i>TELEFONO: </i></td>
          <td align="center"><i>+39'.$telefono.'</i>
      </tr>
      <tr>
        <td align="center">
          <i>INDIRIZZO: </i></td>
          <td align="center"><i>'.$indirizzo.'</i>
      </tr>
      <tr>
        <td align="center">
          <i>SESSO:  </i></td>
          <td align="center"><i>'.$sesso.'</i>
      </tr>
	</table><br><br>
  <table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
    <tr>
      <td align="center"><p>LE MIE PRENOTAZIONI</p></td>
    </tr>
  </table><br><br>
  <table border="0" cellpadding="10" cellspacing="10" align="center">
  <tr><td><p>Orario Prenotazione<td><p>Stato della Prenotazione<tr><tr>

';


$oggi=date('Y-m-d');

$query = "SELECT orario, giorno FROM prenotazioni WHERE id_persone='$codice' ORDER BY orario";
$res=mysqli_query($connect, $query);
$count = mysqli_num_rows($res);
while ($row=mysqli_fetch_array($res))
{
  echo '<td align="center"><a href="pre_fatte.php?prenotazione='.$row[0].'">'.$row[0];
  $try=strcmp($row[1], $oggi);
  if ($try<0)
  {
    echo '<td align="center"><i>Prenotazione scaduta!';
  }
  else
  {
    echo '<td align="center"><i>Prenotazione effettuata!';
  }

echo '</tr>';


}
echo '</table><br><br><br><br>';





//$query= "SELECT persone.nome, persone.cognome, mansione.nome, turni.giorno, turni.id_fascia FROM turni INNER JOIN persone ON turni.id_persone = persone.codice INNER JOIN mansione ON turni.zona_superfici = '$zona_turno'";

$a=false;
$_SESSION['pre_end']=$a;






?>