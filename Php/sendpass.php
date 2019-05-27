<?php

$servername = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "carmag";

    $conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

    $mail = mysqli_real_escape_string($conn, $_POST['postmail']);


    if(!empty($mail)){
        $sql = "SELECT * FROM utilizatori WHERE mail='$mail'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1)
        {
            echo("mailnotexist");
        } else{
            $length=8;
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $newpass=substr(str_shuffle($chars),0,$length);

            $hashedPwd = password_hash($newpass, PASSWORD_DEFAULT);
            $sql = "UPDATE utilizatori set Parola='$hashedPwd' WHERE mail='$mail'";
            mysqli_query($conn,$sql);

            $headers = 'From: stfn_olteanu@yahoo.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n". 'Content-Type: text/html; charset=utf-8';

            $subject ="
            CarMag
            <br/>
            Noua dvs. parola este: $newpass.
            <br/>
            Asigurati-va ca dupa ce va logati sa schimbati parola cu cea dorita!
            <br/>
            Nu ati fost dvs? Semnalati problema la adresa de <a href=\"http://localhost/Pages/contact.php\">Contact</a>!";

            $result=mail($mail,"Recuperare parola",$subject,$headers);
            echo("success");

        }
    }
    else{
        echo("nothing");
    }


/*
$headers = 'From: stfn_olteanu@yahoo.com'. "\r\n". 'MIME-Version: 1.0'. "\r\n". 'Content-Type: text/html; charset=utf-8';

$subject = "Noua dvs. parola este: \r\n"."Asigurati-va ca dupa ce va logati sa schimbati parola cu cea dorita!\r\n". "Nu ati fost dvs? Semnalati problema la adresa de <a href=\"http://localhost/index.html#about\">Contact</a>!";

$result=mail("stfn_olteanu@yahoo.com","Recuperare parola",$subject,$headers);
*/

?>
