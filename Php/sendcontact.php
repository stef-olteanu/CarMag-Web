<?php


$headers = 'From: carmag2k19@gmail.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n". 'Content-Type: text; charset=utf-8';

$mail = $_POST['postmail'];
$nume = $_POST['postnume'];
$subiect = $_POST['postsubiect'];
$mesaj = $_POST['postmesaj'];


$subject="E-mail: $mail
Nume: $nume
Subiect: $subiect
Mesaj:
$mesaj";

$result=mail("carmag2k19@gmail.com","Contact E-mail",$subject,$headers);
echo("success");

?>