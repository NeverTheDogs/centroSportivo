<?php
include "include/connessione.php";
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

if (isset($_POST["password"]))
{
	$password=md5($_POST["password"].DB_SALT);
	if (isset($_POST["nuova"]))
	{
		$nuova=md5($_POST["nuova"].DB_SALT);
		if ((isset($_POST["verifica"]))&&(md5($_POST["verifica"].DB_SALT)==$nuova))
		{
			$query = "SELECT pass FROM utenti WHERE user='$username'";
        	if($res=mysqli_query($connect, $query))
            {
    			$num=mysqli_num_rows($res);
    			if ($num==1)
    			{
    				$row=mysqli_fetch_array($res);
    				if ($row[0]==$password)
    				{   
                        $query="UPDATE utenti SET pass='$nuova' WHERE user='$username'";
                        mysqli_query($connect, $query);
                        $_SESSION['mod_pass']="La password è stata modificata correttamente...ripeti il login!";
                        include "uscita.php";
    				}
    				else{$_SESSION['errore']="La password inserita non è corretta!";include ("errata.php");}
    			}else {$_SESSION['errore']="La password inserita non è corretta!";include ("errata.php");}
			}else {include ("errata.php");}
		}else {$_SESSION['errore']="La password di verifica non corrisponde!";include ("errata.php");}
	}else {$_SESSION['errore']="Devi riempire tutti i campi!";include ("errata.php");}
}else {$_SESSION['errore']="Devi riempire tutti i campi!";include ("errata.php");}


?>