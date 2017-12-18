<?php
/* $name = $_POST["name"];
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
$success = mail($EmailTo,  $Title,  $Fields, "From:".$email); */


if($_POST)
{
    $to_email       = "santiagogarzon04@gmail.com"; //Recipient email, Replace with own email here
 
     
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        $output = json_encode(array( //create JSON data
            'type'=>'error',
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    }
     
    //email body
    $message_body = $message."rnrn".$user_name."rnEmail : ".$user_email."rnPhone Number : ". $phone_number ;
 
    ### Attachment Preparation ###
    $file_attached = false;
    if(isset($_FILES['file_attach'])) //check uploaded file
    {
        //get file details we need
        $file_tmp_name    = $_FILES['file_attach']['tmp_name'];
        $file_name        = $_FILES['file_attach']['name'];
        $file_size        = $_FILES['file_attach']['size'];
        $file_type        = $_FILES['file_attach']['type'];
        $file_error       = $_FILES['file_attach']['error'];
 
        //exit script and output error if we encounter any
        if($file_error>0)
        {
            $mymsg = array(
            1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini",
            2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
            3=>"The uploaded file was only partially uploaded",
            4=>"No file was uploaded",
            6=>"Missing a temporary folder" );
             
            $output = json_encode(array('type'=>'error', 'text' => $mymsg[$file_error]));
            die($output);
        }
         
        //read from the uploaded file & base64_encode content for the mail
        $handle = fopen($file_tmp_name, "r");
        $content = fread($handle, $file_size);
        fclose($handle);
        $encoded_content = chunk_split(base64_encode($content));
        //now we know we have the file for attachment, set $file_attached to true
        $file_attached = true;
    }
     
    if($file_attached) //continue if we have the file
    {
        # Mail headers should work with most clients
        $headers = "MIME-Version: 1.0rn";
        $headers = "X-Mailer: PHP/" . phpversion()."rn";
        $headers .= "From: ".$user_email."rn";
        $headers .= "Subject: ".$subject."rn";
        $headers .= "Reply-To: ".$user_email."" . "rn";
        $headers .= "Content-Type: multipart/mixed; boundary=".md5('boundary1')."rnrn";
         
        $headers .= "--".md5('boundary1')."rn";
        $headers .= "Content-Type: multipart/alternative;  boundary=".md5('boundary2')."rnrn";
         
        $headers .= "--".md5('boundary2')."rn";
        $headers .= "Content-Type: text/plain; charset=utf-8rnrn";
        $headers .= $message_body."rnrn";
         
        $headers .= "--".md5('boundary2')."--rn";
        $headers .= "--".md5('boundary1')."rn";
        $headers .= "Content-Type:  ".$file_type."; ";
        $headers .= "name="".$file_name.""rn";
        $headers .= "Content-Transfer-Encoding:base64rn";
        $headers .= "Content-Disposition:attachment; ";
        $headers .= "filename="".$file_name.""rn";
        $headers .= "X-Attachment-Id:".rand(1000,9000)."rnrn";
        $headers .= $encoded_content."rn";
        $headers .= "--".md5('boundary1')."--";
    }else{
        //proceed with PHP email.
        $headers = 'From: '.$user_name.'' . "rn" .
        'Reply-To: '.$user_email.'' . "rn" .
        'X-Mailer: PHP/' . phpversion();
    }
    
    $send_mail = mail($to_email, $subject, $message_body, $headers);
 
    if(!$send_mail)
    {
        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        die($output);
    }else{
        $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_name .' Thank you for your order, will get back to you shortly'));
        die($output);
    }
}

