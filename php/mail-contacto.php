<?php
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];


$EmailTo = "info@craver.com.ar";
$Title = "Nueva Consulta Web Page Craver";

// prepare email body text
$Fields .= "Nombre: ";
$Fields .= $name;
$Fields .= "\n";

$Fields.= "Email: ";
$Fields .= $email;
$Fields .= "\n";

$Fields.= "Asunto: ";
$Fields .= $subject;
$Fields .= "\n";

$Fields .= "Mensaje: ";
$Fields .= $message;
$Fields .= "\n";


// send email
$success = mail($EmailTo,  $Title,  $Fields, "From:".$email);

