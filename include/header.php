<?php
include "include/sessioni.php";
include "include/visualizza.php";

if (!$username || !$password)
{
  echo'
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
      <center><img class="resize" align="center" src="images.png"></center><br><br>
    </tr>
    <tr>
      <td align="left"><b>Benvenuto nuovo visitatore ! ! ! </b></td>
    </tr>
  </table><br><br>
  <link rel="stylesheet" href="include/style.css" type="text/css">
<table border ="1" celspacing="0" cellpadding="0">
  <tr>
    <td align="center" width="1%"><a href="formlog.php">Login</a></td>
    <td align="center" width="1%"><a href="index.php">Home</a></td>
    <td align="center" width="1%"><a href="formreg.php">Registrati</a></td>
    <td align="center" width="1%"><a href="about.php">About</a> </td>
    <td align="center" width="1%"><a href="javascript:self.print()">Stampa</a></td>
  </tr>
</table>';
}
elseif ($username && $password)
{
  echo'
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <center><img class="resize" src="images.png"></center><br><br>
    </tr>
      <tr>
        <td align="left"><b>Benvenuto ';
        if ($permesso==1)
        {
          echo "Amministratore";
        }
        else
        {
        echo $username;
        };
        echo' ! ! ! </font></b></td>
      </tr>
    </table><br><br>
    <link rel="stylesheet" href="include/style.css" type="text/css">
    <table border ="1" celspacing="0" cellpadding="0">
      <tr>
        <td align="center" width="1%"><a href="index.php">Home</a></td>
        <td align="center" width="1%"><a href="account.php">Account</a></td>
        <td align="center" width="1%"><a href="prenotazioni.php">Prenotazioni</a></td>
        <td align="center" width="1%"><a href="about.php">About</a> </td>
        <td align="center" width="1%"><a href="uscita.php"><u>Logout</a></td>
      </tr>
    </table>';
}
else
{
  echo'
    <link rel="stylesheet" href="include/style.css" type="text/css">
    </head>
    <body>
    <tr>
      <center><img width="100%" src="images.png"></center><br><br>
    </tr>
    <table max-width="1%" border ="1" celspacing="0" cellpadding="0">
      <tr>
        <td align="center" width="1%"><a href="uscita.php"><u>Logout</a></td>
        <td align="center" width="1%"><a href="index.php">Home</a></td>
        <td align="center" width="1%"><a href="formreg.php">Registrati</a></td>
        <td align="center" width="1%"><a href="prenotazioni.php">Prenotazioni</a></td>
        <td align="center" width="1%"><a href="about.php">About</a> </td>
        <td align="center" width="1%"><a href="javascript:self.print()">Stampa</a></td>
      </tr>
    </table>';
}

echo '
<script type="text/javascript">
  function onlyNumbers(evt)
  {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[0-9,/]/;
    if( !regex.test(key) )
    {
      alert("Questo carattere non può essere inserito!");
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
</script>';

echo '
<script type="text/javascript">
  function onlyAlpha(evt)
  {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[a-z,A-Z, ]/;
    if( !regex.test(key) )
    {
      alert("Questo carattere non può essere inserito!");
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }  
</script>';

echo'
<script type="text/javascript">
  function onlyAlphaNum(evt)
  {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[a-z,A-Z,@,0-9,.,_,-, ]/;
    if( !regex.test(key) )
    {
      alert("Questo carattere non può essere inserito!");
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
      alert("la password deve essere almeno 8 di caratteri!");
      return false;
    }   
   }
</script>';

echo '
<script type="text/javascript">
  function controllaCodice(valore1)
  {
    if (valore1.length == 16)
    {
      return true;
    }  
    else
    {
      alert("Il codice deve contenere 16 caratteri!");
      return false;
    }   
   }
</script>';

echo '
<script type="text/javascript">
  function controllaTelefono(valore1)
  {
    if (valore1.length == 10)
    {
      return true;
    }  
    else
    {
      alert("Il numero deve essere di 10 cifre! ");
      return false;
    }   
   }
</script>';

?>
