<?php
include "include/sessioni.php";

if ($permesso==1)
{
  echo '
  <tr>
      <center><img width="100%" src="images.png"></center><br><br>
    </tr>
  <head>
  <link rel="stylesheet" href="include/style.css" type="text/css">
</head>
<body>
<table max-width="100%" border ="1" celspacing="0" cellpadding="0">
  <tr>
    <td align="center" width="1%"><a href="nuovoPR1.php">Nuovo Utente</a></td>
    <td align="center" width="1%"><a href="gestionePR1.php">Utenti</a></td>
    <td align="center" width="1%"><a href="orariPR1.php">Turni</a></td>
    <td align="center" width="1%"><a href="magazzinoPR1.php">Magazzino</a></td>
    <td align="center" width="1%"><a href="richiestePR1.php">Richieste</a></td>
    <td align="center" width="1%"><a href="conteggio.php">Resoconto</a></td>
    <td align="center" width="1%"><a href="stipendiPR1.php">Stipendi</a></td>
    <td align="center" width="1%"><a href="javascript:self.print()"">Stampa</a></td>
  </tr>
</table>
</td>';
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

  echo '<script type="text/javascript">
  function onlyNumbers(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9,/]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
  }
  </script>';

  echo '<script type="text/javascript">
  function onlyAlpha(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[a-z,A-Z, ]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
  }  
  </script>';

   echo '<script type="text/javascript">
  function onlyAlphaNum(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[a-z,A-Z,@,0-9,.,_,-, ]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
  }  
  </script>';

  echo '
<script type="text/javascript">
  function controllaPassword(valore1)
  {
    if (valore1.length >= 8)
    {
      return true;
    }  
    else
    {
      alert("La password deve essere almeno 8 di caratteri");
      return false;
    }   
   }
</script>';

echo '
<script type="text/javascript">
  function controllaCodice(valore1)
  {
    if (valore1.length >= 16)
    {
      return true;
    }  
    else
    {
      alert("Il codice deve contenere 16 caratteri");
      return false;
    }   
   }
</script>';
?>
