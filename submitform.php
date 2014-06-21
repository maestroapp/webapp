<?php
header('content-type: application/json; charset=utf-8');

if (isset($_GET["name"])) {
	$name = strip_tags($_GET['name']);
	$email = strip_tags($_GET['email']);
	$telefon = strip_tags($_GET['telefon']);
	$artanfrage = strip_tags($_GET['artanfrage']);
	$anfrage = strip_tags($_GET['anfrage']);
	//$header = "Von: ". $name . " <" . $email . ">"; 
$header = "From:" . $email . "\r\n" . "Reply-To:" . $email . "\r\n" ;

	$empfaenger = 'istrika@yahoo.de';
	$titel = 'Mailanfrage via m.augen-abc.de: ' . $artanfrage;
	$mailtext = "
	Dies ist eine Mailanfrage via m.augen-abc.de von:
	
	Name: $name
	
	E-Mail: $email
	
	Telefon: $telefon
	
	Art der Anfrage: $artanfrage
	
	Text der Anfrage: 
	
	$anfrage
	";
	$result = 'success';

	if (mail($empfaenger, $titel, $mailtext, $header)) {
		echo json_encode($result);
	}
}
?>