<?php
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["phone"];
$message = $_POST["cv"];


$EmailTo = "santiagogarzon04@gmail.com";
$Title = "Nueva Consulta para trabajar en Craver de la Web Page";

// prepare email body text
$Fields .= "Nombre: ";
$Fields .= $name;
$Fields .= "\n";

$Fields.= "Email: ";
$Fields .= $email;
$Fields .= "\n";

$Fields.= "Telefono: ";
$Fields .= $subject;
$Fields .= "\n";

$Fields .= "CV: ";
$Fields .= $message;
$Fields .= "\n";


// send email
$success = mail($EmailTo,  $Title,  $Fields, "From:".$email);

