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
$timestamp=$_GET['prenotazione'];
if (preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}/', $timestamp))
{
  $query= "SELECT superfici.tipo, prenotazioni.dalle, prenotazioni.alle, prenotazioni.giorno, prenotazioni.id_richiesti, prenotazioni.id_fatture FROM prenotazioni INNER JOIN superfici ON prenotazioni.id_superfici = superfici.id INNER JOIN persone ON prenotazioni.id_persone = persone.codice WHERE orario = '$timestamp'";
  $res=mysqli_query($connect, $query);
  while ($row=mysqli_fetch_array($res))
  {
    $sup=$row[0];
    $in=$row[1].":00-";
    $fin=$row[2].":00 ";
    $gio=$row[3]."  ";
    $n_or_ser= $row[4];
    $fatt=$row[5];
  }
  $query="SELECT totale FROM fatture WHERE id='$fatt'";
  $res=mysqli_query($connect, $query);
  $row=mysqli_fetch_array($res);
  $totale=$row[0];

  
  echo'<body><br><br>
        <table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
            <tr>
                <td align="center"><p><strong>ORDINE NUMERO '.$n_or_ser.'</strong></p>
            </tr>
            <tr>
                <td align="center"><i><strong>Effettuato il giorno: '.$timestamp.'</strong></i>
            </tr>
            <tr>
                <td align="center"><i><strong>Per la superficie: '.$sup.'</strong></i>
            </tr>';
  $query= "SELECT servizi.nome, servizi.prezzo, richiesti.totale FROM richiesti INNER JOIN servizi ON richiesti.id_servizi = servizi.id";
  $res=mysqli_query($connect, $query);
  while ($row=mysqli_fetch_array($res))
  {
    echo'<tr>
                <td align="center"><i><strong>Con aggiunta di n°: '.$row[2]." ".$row[0].' al prezzo di soli: '.$row[1].',00 € cadauno</strong></i>
            </tr>';
  }


      echo '<tr>
                <td align="center"><i><strong>Dalle ore: '.$in.' Alle ore: '.$fin.'</strong></i>
            </tr>
            <tr>
                <td align="center"><i><strong>Per giorno: '.$gio.'</strong></i>
            </tr>';
    if ($fatt)
    {
      echo'<tr>
            <td align="center"><i><strong>Pagato con fattura n°: '.$fatt.'</strong></i>
          </tr>';
    }
    else
    {
      echo'<tr>
            <td align="center"><i><strong>Pagato con fattura in segreteria</strong></i>
          </tr>';
    }
        echo'
            <tr>
                <td align="center"><i><strong>Alla modica cifra di: '.$totale.',00 €</strong></i>
            </tr>';
}
else
{
  echo'<body><br><br>
        <table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
            <tr>
                <td align="center"><p><strong>--> ERRORE <--</strong></p>
            </tr>
            <tr>
                <td align="center"><p>Non si fa così!</p></td>
            </tr></table>';exit;
}
?>