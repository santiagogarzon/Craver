<?php
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];


$EmailTo = "sitiocraver@gmail.com";
$Title = "Nueva Consulta Web Page Craver";

// prepare email body text
$Fields .= "Un usuario ha realizado una consulta mediante el formulario de contacto en www.craver.com.ar.\n\nNombre: ";
$Fields .= $name;
$Fields .= "\n";

$Fields.= "Email: ";
$Fields .= $email;
$Fields .= "\n";

$Fields.= "Telefono: ";
$Fields .= $subject;
$Fields .= "\n";

$Fields .= "Mensaje: ";
$Fields .= $message;
$Fields .= "\n";


// send email
$success = mail($EmailTo,  $Title,  $Fields);

