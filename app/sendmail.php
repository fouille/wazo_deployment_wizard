<?php
$mail = $_POST['email'];

$wazo = "fmuller@wazo.io\n";
$subject = "Wizard Deployment Setup";
$headers = "From: Wizard Deployment <pbx@wazo.io>\n";
$message = "DETAILS\n";
$message .= "\nFirst name: " . $_POST['firstname'];
$message .= "\nLast name: " . $_POST['lastname'];
$message .= "\nEmail: " . $_POST['email'];
$message .= "\nFonction: " . $_POST['fonction'];
$message .= "\nSociety: " . $_POST['society'];

//Receive Variable

//Confirmation page
$user = "$mail";
$usersubject = "Merci !";
$userheaders = "From: Wazo Deployment Wizard <pbx@wazo.io>\n";
/*$usermessage = "Thank you for your time. Your quotation request is successfully submitted.\n"; WITH OUT SUMMARY*/
//Confirmation page WITH  SUMMARY
$usermessage = "Thank you for your time. Your request is successfully submitted. We will reply shortly.\n\nBELOW A SUMMARY\n\n$message";

if (mail($wazo,$subject,$message,$headers) == true) {
$send = mail($user,$usersubject,$usermessage,$userheaders);
echo json_encode($send);
}

?>
