<?php
include "include/connessione.php";
include "include/sessioni.php";

/*
echo $pre_nome;
echo $pre_cognome;
echo $pre_codice;
echo $pre_telefono;
echo $pre_mail;
echo $numero_campo;
echo $pre_nomecampo;
echo $dalle;echo $dalle+1;
echo $giorno;
echo $gen_fatt;
*/

if (!$_POST["submit"])
{
    echo'<body><br><br>
        <table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
            <tr>
                <td align="center"><p><strong>--> ERRORE <--</strong></p>
            </tr>
            <tr>
                <td align="center"><p>Devi eseguire il giusto ordine per poter prenotare ! </p></td>
            </tr></table>';exit;
}

$alle=$dalle+1;
$query="INSERT INTO prenotazioni (id_persone, id_superfici, dalle, alle, giorno) VALUES ('$pre_codice','$numero_campo','$dalle','$alle', '$giorno')";
mysqli_query($connect, $query);

$query="SELECT id FROM prenotazioni WHERE id_persone='$pre_codice' AND id_superfici='$numero_campo' AND dalle='$dalle' AND giorno='$giorno'";
$res=mysqli_query($connect, $query);
$row=mysqli_fetch_array($res);


/////////               CHE SI SCELGA O NO DI FARE LA FATTURA VIENE INSERITA LO STESSO IN MANCANZA DI UN CONTROLLO SULLE SMART CARD

//$gen_fatt = isset($_POST['gen_fatt']) ? $_POST['gen_fatt'] : 'no';
//if ($gen_fatt=="si")
//{
    $query="INSERT INTO fatture (tipo, id_prenotazioni, totale) VALUES ('Entrata','$row[0]','$pre_totale')";   
    mysqli_query($connect, $query);

    $query="SELECT id FROM fatture WHERE id_prenotazioni='$row[0]'";
    $res1=mysqli_query($connect, $query);
    $row1=mysqli_fetch_array($res1);

    $query="UPDATE prenotazioni SET id_fatture='$row1[0]' WHERE id='$row[0]'";   
    mysqli_query($connect, $query);
//}


for ($i=0; $i < $pre_numeroserv; $i++)
{ 
    if ($pre_quantserv[$i]>0)
    {
        $query="SELECT id,totale FROM servizi WHERE nome='$pre_servizio[$i]'";
        $res2=mysqli_query($connect, $query);
        $row2=mysqli_fetch_array($res2);

        $row2[1]=$row2[1]-$pre_quantserv[$i];
        $query="UPDATE servizi SET totale='$row2[1]' WHERE id='$row2[0]'";
        mysqli_query($connect, $query);
        
        $query="INSERT INTO richiesti (id_prenotazioni, id_servizi, totale) VALUES ('$row[0]', '$row2[0]','$pre_quantserv[$i]')";
        $res3=mysqli_query($connect, $query);
    }
}

$serv = array(array(),);

$query = "SELECT id_prenotazioni, id_servizi, totale FROM richiesti WHERE id_prenotazioni='$row[0]'";
if($res4=mysqli_query($connect, $query));
$num=mysqli_num_rows($res4);
if ($num > 0)
{
    $query="UPDATE prenotazioni SET id_richiesti='$row[0]' WHERE id='$row[0]'";
    mysqli_query($connect, $query);
}
$k=0;
while ($row4=mysqli_fetch_array($res4))
{  
    for ($j=0; $j < 2; $j++)
    { 
        $serv[$i][$j]=$row[$k];
        $k++;
    }
}






$a=false;
$_SESSION['pre_codice']=$a;
$_SESSION['pre_totale']=$a;
$_SESSION['pre_numeroserv']=$a;
$gen_fatt=$a;
$pre_end="LA PRENOTAZIONE E' AVVENUTA CON SUCCESSO";
$_SESSION['pre_end']=$pre_end;
include "account.php";

?>