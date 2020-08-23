<?php
include "include/connessione.php";
include "include/sessioni.php";
if (isset($_POST["username"]))$username=$_POST["username"];
if (isset($_POST["password"]))$password=md5($_POST["password"].DB_SALT);
if ((isset($_POST["verifica"]))&&(md5($_POST["verifica"].DB_SALT)==$password));	else include ("errata.php");
if (isset($_POST["mail"]))$mail=$_POST["mail"];
if (isset($_POST["codice"]))$codice=strtoupper($_POST["codice"]);  
if (isset($_POST["cognome"]))$cognome=$_POST["cognome"]; 
if (isset($_POST["nome"]))$nome=$_POST["nome"]; 
if (isset($_POST["numero"]))$numero=$_POST["numero"];
if (isset($_POST["citta"]))$citta=$_POST["citta"]; 
if (isset($_POST["indirizzo"]))$indirizzo=$_POST["indirizzo"];
if (isset($_POST["civico"]))$civico=$_POST["civico"];
if (isset($_POST["sesso"]))$sesso=$_POST["sesso"];
$pass_free=$_POST["password"];
$lung=strlen($pass_free);
$_SESSION['numero']=$numero;
$_SESSION['codice']=$codice;
$_SESSION['us']=$username;
$trap=1;
$_SESSION['trap']=$trap;
if(!$username || !$password || !$mail || !$codice || !$cognome || !$nome || !$numero)include("errata.php");
$loc=$citta." via/piazza ".$indirizzo." ".$civico;
if($lung<8)
{
    $_SESSION['errore']="La password inserita è troppo corta!";
    include("errata.php");
}

$query = "SELECT User FROM user WHERE User='$username'";
        if($ris=mysqli_query($connect_root, $query));
    	$num=mysqli_num_rows($ris);
        if($num==0)
        {
        	$query = "SELECT email FROM PERSONE WHERE email='$mail'";
        	if($ris=mysqli_query($connect, $query));
        	$num=mysqli_num_rows($ris);
			if($num==0)
        	{
        		$query = "SELECT numero FROM PERSONE WHERE numero='$numero'";
        		if($ris=mysqli_query($connect, $query));
        		$num=mysqli_num_rows($ris);
				if($num==0)
				{   
					$query = "INSERT INTO persone (codice,cognome,nome,email,telefono,sesso,indirizzo,tipo) VALUES ('$codice','$cognome','$nome','$mail','$numero','$sesso','$loc','Cliente') ";
					mysqli_query($connect, $query);
                    $query = "INSERT INTO utenti (user,pass,permesso,codice_persone,confermato) VALUES ('$username','$password','3','$codice','0') ";
                    mysqli_query($connect, $query);
                    

                    ////////////////  CONTROLLO DEI PERMESSI DEGLI UTENTI
                    
                    /*$query = "CREATE USER '$username'@'localhost' IDENTIFIED BY '$pass_free'";
                    mysqli_query($connect_root, $query);
                    $query = "GRANT ALL PRIVILEGES ON *.* TO '$username'@'localhost'";
                    mysqli_query($connect_root, $query);
                    $query = "FLUSH PRIVILEGES";
                    mysqli_query($connect_root, $query);
                    mysqli_close($connect);*/

                    //////////////////////////////

                    //$connect= mysqli_connect("127.0.0.1", "root", "root", "mysql");
                    //$query = "INSERT INTO user (Host,User,Password) VALUES ('127.0.0.1','$username','$password') ";
                    //mysqli_query($connect, $query);
                    //header("Location: conferma.php");
					include ("conferma.php");
				}else{$_SESSION['errore']="Il numero di telefono inserito è già presente nel database!";include ("errata.php");}
			}else{$_SESSION['errore']="La mail inserita è già presente nel database!";include ("errata.php");}
        }else{$_SESSION['errore']="L'username inserito è già presente nel database!";include ("errata.php");}  

/*
$query = "INSERT INTO utenti (id,user,pass,permesso) VALUES ('','$username','$password','112') ";

if (mysqli_query($connect, $query)) {
    echo "Tutto apposto";
} else {
    echo mysqli_error($connect);
}
mysqli_close($connect);
*/
include ("index.php");

/* quindi i dati sono stati salvati nel database e l'utente è registrato */ 
//mysql_close($db); 
?>