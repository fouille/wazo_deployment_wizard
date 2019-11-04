<?php
$mail = $_POST['email'];

$ports_cloud = '';
for($count = 0; $count<count($_POST['question_2']); $count++)
{
    $ports_cloud .= $_POST['question_2'][$count].',';
}

$wazo = "fmuller@wazo.io\n";
$subject = "Wizard Deployment Setup";
$headers = "From: Wizard Deployment <pbx@wazo.io>\n";
$message = "DETAILS\n";
$message .= "\nFirst name: " . $_POST['firstname'];
$message .= "\nLast name: " . $_POST['lastname'];
$message .= "\nEmail: " . $_POST['email'];
$message .= "\nFonction: " . $_POST['fonction'];
$message .= "\nType Infra : " . $_POST['question_1'];
$message .= "\nInfra info : " . $_POST['deploy_info'];
$message .= "\nTechnologie : " . $_POST['uce_infra_tech'];
$message .= "\nProvider : " . $_POST['uce_infra_provider'];
$message .= "\nNom de produit : " . $_POST['uce_infra_productname'];
$message .= "\nEngine Abonnés : " . $_POST['uce_carac_user'];
$message .= "\nEngine RAM : " . $_POST['uce_carac_ram'];
$message .= "\nEngine Reseau : " . $_POST['uce_carac_network'];
$message .= "\nEngine type HDD : " . $_POST['uce_carac_hddtype'];
$message .= "\nEngine Stockage : " . $_POST['uce_carac_hddsize'];
$message .= "\nPorts Cloud : " . $ports_cloud;
$message .= "\nPorts on Premise : " . $_POST['question_3'];
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
echo json_encode($ports_cloud);
}

?>
