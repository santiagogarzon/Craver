<?php
 $name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];


$EmailTo = "info@craver.com.ar";
$Title = "Pedido de Presupuesto Web Page Craver";

// prepare email body text
$Fields .= "Se ha solicitado desde la Web Page Craver un presupuesto.\n\nPor favor contactarse con:\n\nNombre: ";
$Fields .= $name;
$Fields .= "\n";

$Fields.= "Email: ";
$Fields .= $email;
$Fields .= "\n";

$Fields.= "Telefono: ";
$Fields .= $phone;
$Fields .= "\n";

$Fields .= "Otras Preferencias: ";
$Fields .= $message;
$Fields .= "\n";


// send email
$success = mail($EmailTo,  $Title,  $Fields, "info@dnsprivado29.info");



