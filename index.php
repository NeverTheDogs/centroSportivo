<?php
include "include/header.php";

echo '<html>
<head>
<title>Centro_sportivo</title><br><br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="0%">
	<tr>
		<td align="center"><p>IL COMUNE DI ANTILLO DICHIARA LA NUOVA APERTURA DEL SITO WEB PER LE PRENOTAZIONI DEL CENTRO SPORTIVO ! ! !</p></td>
	</tr>
</table>
<table align="center" ><br><br>
	<tr>
		<td align="center"><i>DA ADESSO POTRAI USUFRUIRE DEI NOSTRI SERVIZI DI PRENOTAZIONE ONLINE E SCOPRIRE TUTTE LE NUOVE OFFERTE SU ARTICOLI IN VENDITA E TORNEI IN PROGRAMMAZIONE ! ! !</i></td>
	</tr>
</table>
<style type="text/css">
#img{display:-webkit-box;-webkit-box-pack:center;opacity:1;}
</style>
<div class="img-wrapper">
<script type="text/javascript">
var arr = [];
arr[0]= new Image();
arr[0].src = "/foto/foto0.jpg";
arr[1]= new Image();
arr[1].src = "/foto/foto1.jpg";
arr[2]= new Image();
arr[2].src = "/foto/foto2.jpg";
arr[3]= new Image();
arr[3].src = "/foto/foto3.jpg";
arr[4]= new Image();
arr[4].src = "/foto/foto4.jpg";
arr[5]= new Image();
arr[5].src = "/foto/foto5.jpg";
arr[6]= new Image();
arr[6].src = "/foto/foto6.jpg";
arr[7]= new Image();
arr[7].src = "/foto/foto7.jpg";
arr[8]= new Image();
arr[8].src = "/foto/foto8.jpg";
var i=0;
function slide()
{
 document.getElementById("image1").src= arr[i].src;
 i++;
 if(i==arr.length)
 {i=0;}
 setTimeout(function(){ slide(); },2000);
}
</script>
</head>
<br><br><br>
<body onLoad="slide(image1,arr);">
<div id="img"><img id="image1" max-height="50%" max-width="50%" border="0";" /></div>
<br><br>
<table align="right"><br><br>
	<tr>
		<td align="right"><i>Per info e supporto contattare</i> <a href ="mailto:c1506t@gmail.com">Cristian Costa</td>
	</tr>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>';

?>