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

$nombre = $name;
$asunto = $subject;
$mensaje = $message;
$para = 'info@craver.com.ar';
$titulo = 'Web Craver: '. $asunto;
$header = 'From: ' . $email;
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";
  
if ($_POST['submit']) {
if (mail($para, $titulo, $msjCorreo, $header)) {
echo "<script language='javascript'>
alert('Mensaje enviado, muchas gracias.');
window.location.href = 'http://craver.com.ar/index.htm';
</script>";
} else {
echo 'Fall� el envio';
}
}
