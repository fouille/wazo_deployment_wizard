<?php
$tab = array();
$mail = $_POST['email'];
$to = "franckisys@wazo.io";/* YOUR EMAIL HERE */
$subject = "Wizard Deployment Setup";
$headers = "From: Wizard Deployment <fmuller@wazo.io>\n";
$message = "DETAILS\n";
$message .= "\nFirst name: " . $_POST['firstname'];
$message .= "\nLast name: " . $_POST['lastname'];
$message .= "\nEmail: " . $_POST['email'];
$message .= "\nCountry: " . $_POST['function'];
$message .= "\nSociety: " . $_POST['society'];

//Receive Variable
//$sentOk = mail($to,$subject,$message,$headers);
mail($to,$subject,$message,$headers);
array_push($tab, $message);
//Confirmation page
$user = "$mail";
$usersubject = "Merci !";
$userheaders = "From: pbx@wazo.io\n";
/*$usermessage = "Thank you for your time. Your quotation request is successfully submitted.\n"; WITH OUT SUMMARY*/
//Confirmation page WITH  SUMMARY
$usermessage = "Thank you for your time. Your request is successfully submitted. We will reply shortly.\n\nBELOW A SUMMARY\n\n$message";
mail($user,$usersubject,$usermessage,$userheaders);

$json = array('sendmail' => $sentOk, 'mail' => $tab);
echo json_encode($json);
?>