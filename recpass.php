<?php
include "include/connessione.php";

if(isset ($_POST["username"]))
{
  $username=$_POST["username"];
  if(isset ($_POST["telefono"]))$telefono=$_POST["telefono"];
  if(!$username || !$telefono)include("errata.php");

  $query = "SELECT codice FROM utenti,persone WHERE telefono='$telefono' AND user='$username'";
  $res=mysqli_query($connect, $query);
  if ($row=mysqli_fetch_array($res))
  {
    $cod=$row[0];
    $pass=rand(11111111, 99999999);
    $cypass=md5($pass.DB_SALT);
    $query = "UPDATE utenti SET pass='$cypass' WHERE codice_persone = '$cod'";
    mysqli_query($connect, $query);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "cloud.fowiz.com/api/message_http_api.php?username=pippoilpazzo&phonenumber=".$telefono."&message=La%20password%20temporanea%20per%20il%20recupero%20è%20".$pass."%20sei%20pregato%20di%20cambiarla%20al%20prossimo%20accesso&passcode=pippoilpazzo");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $inv=curl_exec($ch);
    curl_close($ch);
    include "formlog.php";

  }else{include("errata.php");}
}else{include("errata.php");}

?>
