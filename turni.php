<?php
include "include/connessione.php";
include "include/sessioni.php";
include "check1.php";

$dipendente=$_POST["dipendente"];
$fascia=$_POST["fascia"];
$giorno=$_POST["giorno"];
$pre_mansione=$_POST["pre_mansione"];
$pre_zona=$_POST["pre_zona"];

$query = "SELECT id_fascia, zona_superfici, giorno FROM turni WHERE (id_fascia='$fascia') AND (id_mansione='$pre_mansione') AND (giorno='$giorno')";
$res=mysqli_query($connect, $query);
$count = mysqli_num_rows($res);
if ($count==0)
{
	switch ($pre_mansione)
	{
		case 1:
			if ($pre_zona=='Interno-Piscina')
			{
				$query = "SELECT id_persone,giorno FROM turni WHERE id_persone='$dipendente' AND giorno='$giorno'";
				$res=mysqli_query($connect, $query);
				$count = mysqli_num_rows($res);
				if ($count==0)
				{
					$query="INSERT INTO turni (id_fascia, id_persone, id_mansione, zona_superfici, giorno) VALUES ('$fascia','$dipendente','$pre_mansione','$pre_zona', '$giorno')";
					mysqli_query($connect, $query);
				}else{$_SESSION['errore']="Non puoi procedere con questa operazione!";include "errata.php";}  
			}else{$_SESSION['errore']="Non puoi procedere con questa operazione!";include "errata.php";}
			break;
		
		case 2:
			if ($pre_zona=='Bar')
			{
				$query = "SELECT id_persone,giorno FROM turni WHERE id_persone='$dipendente' AND giorno='$giorno'";
				$res=mysqli_query($connect, $query);
				$count = mysqli_num_rows($res);
				if ($count==0)
				{
					$query="INSERT INTO turni (id_fascia, id_persone, id_mansione, zona_superfici, giorno) VALUES ('$fascia','$dipendente','$pre_mansione','$pre_zona', '$giorno')";
					mysqli_query($connect, $query);
				}else{$_SESSION['errore']="Non puoi procedere con questa operazione!";include "errata.php";}  
			}else{$_SESSION['errore']="Non puoi procedere con questa operazione!";include "errata.php";}
			break;
		
		case 3:
			if (($pre_zona=='Esterno-Calcio')||($pre_zona=='Esterno-Tennis')||($pre_zona=='Interno-Palestra'))
			{
				$query = "SELECT id_persone,giorno FROM turni WHERE id_persone='$dipendente' AND giorno='$giorno'";
				$res=mysqli_query($connect, $query);
				$count = mysqli_num_rows($res);
				if ($count==0)
				{
					$query="INSERT INTO turni (id_fascia, id_persone, id_mansione, zona_superfici, giorno) VALUES ('$fascia','$dipendente','$pre_mansione','$pre_zona', '$giorno')";
					mysqli_query($connect, $query);
				}else{$_SESSION['errore']="Non puoi procedere con questa operazione!";include "errata.php";}  
			}else{$_SESSION['errore']="Non puoi procedere con questa operazione!";include "errata.php";}
			break;
		
		case 4:
			if ($pre_zona=='Segreteria')
			{
				$query = "SELECT id_persone,giorno FROM turni WHERE id_persone='$dipendente' AND giorno='$giorno'";
				$res=mysqli_query($connect, $query);
				$count = mysqli_num_rows($res);
				if ($count==0)
				{
					$query="INSERT INTO turni (id_fascia, id_persone, id_mansione, zona_superfici, giorno) VALUES ('$fascia','$dipendente','$pre_mansione','$pre_zona', '$giorno')";
					mysqli_query($connect, $query);
				}else{$_SESSION['errore']="Non puoi procedere con questa operazione!";include "errata.php";}  
			}else{$_SESSION['errore']="Non puoi procedere con questa operazione!";include "errata.php";}
			break;

	}
	$query = "SELECT id FROM turni WHERE id_persone='$dipendente' AND id_fascia='$fascia' AND id_mansione='$pre_mansione' AND zona_superfici='$pre_zona' AND giorno='$giorno'";
	$res=mysqli_query($connect, $query);
	$row=mysqli_fetch_array($res);
	$id=$row[0];
	$query = "SELECT compenso FROM mansione WHERE id='$pre_mansione'";
	$res=mysqli_query($connect, $query);
	$row=mysqli_fetch_array($res);
	$compenso=$row[0]*5;
	$query="INSERT INTO compenso_accumulato (id_turni, totale) VALUES ('$id', '$compenso')";
	mysqli_query($connect, $query);
	$_SESSION['end_turni']="L'INSERIMENTO DEL TURNO E' AVVENUTO CON SUCCESSO!";
	include "orariPR1.php";
	exit();


}else{$_SESSION['errore']="Non puoi procedere con questa operazione!";include "errata.php";}



?>