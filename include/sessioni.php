<?php

session_start();
$conf_user= $_SESSION['conf_user'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$permesso = $_SESSION['permesso'];
$numero_campo = $_SESSION['numero_campo'];
$numero_orario = $_SESSION['numero_orario'];
$numero_giorno = $_SESSION['numero_giorno'];
$tot = $_SESSION['tot'];
$errore= $_SESSION['errore'];
$numero= $_SESSION['numero'];
$us=$_SESSION['us'];
$dalle=$_SESSION["dalle"];
$giorno=$_SESSION["giorno"];
$numero_servizi=$_SESSION["numero_servizi"];
$del_user=$_SESSION["del_user"];
$zokkei=$_SESSION["zokkei"];
$trap=$_SESSION["trap"];
$pre_nome=$_SESSION['pre_nome'];
$pre_cognome=$_SESSION['pre_cognome'];
$pre_codice=$_SESSION['pre_codice'];
$pre_telefono=$_SESSION['pre_telefono'];
$pre_mail=$_SESSION['pre_mail'];
$pre_nomecampo=$_SESSION['pre_nomecampo'];
$pre_totale=$_SESSION['pre_totale'];
$pre_end=$_SESSION['pre_end'];
$mod_pass=$_SESSION['mod_pass'];
$end_order=$_SESSION['end_order'];
$zona_turno=$_SESSION['zona_turno'];
$prima_data=$_SESSION['prima_data'];
$seconda_data=$_SESSION['seconda_data'];
$end_turni=$_SESSION['end_turni'];

$pre_numeroserv=$_SESSION['pre_numeroserv'];
for ($i=0; $i < $pre_numeroserv; $i++)
{ 
	$pre_servizio[$i]=$_SESSION['pre_servizio'.$i];
	$pre_quantserv[$i]=$_SESSION['pre_quantserv'.$i];
}

?>




