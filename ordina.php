<?php
include "include/connessione.php";
include "include/sessioni.php";
include "check2.php";

if (!$_POST["submit"])
{
    echo'<body><br><br>
        <table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
            <tr>
                <td align="center"><p><strong>--> ERRORE <--</strong></p>
            </tr>
            <tr>
                <td align="center"><p>Devi eseguire il giusto ordine per poter ordinare ! </p></td>
            </tr></table>';exit;
}

$query = "SELECT codice_persone FROM utenti WHERE user='$username'";
        $res=mysqli_query($connect, $query);
        $row=mysqli_fetch_array($res);
        $codice=$row[0];


if ($_POST["quantita"]!=0)
{   
    $fornitore=$_POST["fornitore"];
    $nome_prodotto=$_POST["prodotto"];
    $quantita=$_POST["quantita"];

    $query= "SELECT servizi.prezzo_acq, servizi.id_fornitore, servizi.id FROM servizi INNER JOIN fornitore ON servizi.id_fornitore = fornitore.id WHERE (fornitore.nome='$fornitore')AND(servizi.nome='$nome_prodotto')";
    if($ris=mysqli_query($connect, $query));
    $num=mysqli_num_rows($ris);
    $row=mysqli_fetch_array($ris);
    if($num==1)
    {
        $tot=$quantita*$row[0];
        $id_forn=$row[1];
        $id_serv=$row[2];
        $query = "SELECT id FROM fornisce ORDER BY id";
        $res=mysqli_query($connect, $query);
        while ($row=mysqli_fetch_array($res))
        {
            $count=$row[0];
        }
        $count=$count+1;
        $query="INSERT INTO fornisce (id, id_fornitore, id_servizi, quantita, committente) VALUES ('$count','$id_forn','$id_serv', '$quantita', '$codice')";
        mysqli_query($connect, $query);
        $query = "SELECT prezzo_acq, totale FROM servizi WHERE nome='$nome_prodotto'";
        $res=mysqli_query($connect, $query);
        $count = mysqli_num_rows($res);
        while ($row=mysqli_fetch_array($res))
        {
            $tot=$quantita*$row[0];
            $totale=$row[1]+$quantita;
        }
        $query="INSERT INTO fatture (id_fornisce, tipo, totale) VALUES ('$count', 'Uscita', '$tot')";   
        mysqli_query($connect, $query);
        $query="UPDATE servizi SET totale='$totale' WHERE nome='$nome_prodotto'";   
        mysqli_query($connect, $query);
        $_SESSION['end_order']="LA PRENOTAZIONE E' AVVENUTA CON SUCCESSO!";
        include "magazzinoPR1.php";exit;

    }else{$_SESSION['errore']="Il fornitore scelto non possiede questo articolo!";include ("errata.php");}
}else{$_SESSION['errore']="Hai dimenticato di inserire la quantità!";include ("errata.php");}  

?>