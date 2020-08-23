<?php
include "include/connessione.php";
include "include/sessioni.php";

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

if(isset ($_POST["username"]))$username=$_POST["username"];
if(isset ($_POST["password"]))$password=md5($_POST["password"].DB_SALT);
if(!$username || !$password)
include "errata.php";

$_SESSION['conf_user'] = $username;

$query = "SELECT * FROM utenti WHERE user = '$username'AND pass = '$password' AND permesso ";
$res = mysqli_query($connect, $query);
$count = mysqli_num_rows($res);
$row = mysqli_fetch_array($res);
mysqli_close($connect);


if ($count==1) 
{
  if ($row[5]==1)
  {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['permesso'] = $row['permesso'];

    setcookie("user", $username, time() + (60), "/"); //(86400 * 30) = 1 giorno * 30


    if ($_SESSION['permesso']==1)
    {
      include "nuovoPR1.php";
    }
    elseif ($_SESSION['permesso']==2)
    {
      include "turniPR2.php";
    }
    else
    {
      include "index.php";
    }
    //session_register("myusername");
    //$_SESSION['login_user'] = $myusername;
  }
  elseif ($row[5]==2)
  {
    $errore="Il tuo account è stato disattivato!";
    include "include/header.php";
    echo'<body><br><br>
    <table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
      <tr>
        <td align="center"><p><strong>--> ERRORE <--</strong></p>
      </tr>
      <tr>
        <td align="center"><p>Sono stati inseriti dati errati ! </p></td>
      </tr>
    </table><br><br><br>
    <table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
      <tr>
        <td align="center"><p><u>'.$errore.'</u></p></td>
      </tr>
      </table>';
      $_SESSION['errore']="";

 exit;
  }
  else
  {
    $_SESSION['trap'] = 2;
    include "conferma.php";
  }
}
else
{
  $_SESSION['errore']="Username o password errati!";
  include "errata.php";
}


?>
