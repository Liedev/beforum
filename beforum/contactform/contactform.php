<?php      
  if( 
   empty($_POST['name'])        ||
   empty($_POST['company'])     || 
   empty($_POST['phone'])       ||
   empty($_POST['email'])       ||
   empty($_POST['subject'])     ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo("Gelieve volgende velden in te vullen: Naam, Bedrijfsnaam, Telefoonnummer, e-mail, Onderwerp");
   return "";
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$company = strip_tags(htmlspecialchars($_POST['company']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   

$to = ''; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $subject";
$email_body = "U hebt een nieuw emailbericht van uw website contact form.\n\n"."Hier zijn de details:\n\nNaam: $name\n\nBedrijf: $company\n\nTelefoonnummer: $phone\n\nEmail: $email_address\n\nOnderwerp: $subject\n\nBericht:\n$message";
$headers = "From: $name\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";  
mail($to,$email_subject,$email_body,$headers);
echo("OK");     
?>