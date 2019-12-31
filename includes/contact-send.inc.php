<?php
if (isset($_POST['contact-submit'])){
    //пихаем информацию из формы в переменную
    $contactName = $_POST['contact-name'];
    $contactEmail = $_POST['contact-email'];
    $contactSubject = $_POST['contact-subject'];
    $contactText = $_POST['contact-text'];

    $mailTo = "info@velidoss.fun";
    $headers = "From:".$contactEmail;
    $txt = "You have received and email from". $contactName.".\n\n".$contactText;
    mail($mailTo, $contactSubject, $txt, $headers);
    header("Location:../index.php?mailsend");
}
