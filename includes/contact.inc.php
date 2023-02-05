<?php

if(isset($_POST["sendemail"])){
    $fullNameContact = $_POST["fullnamecontact"];
    $subjectContact = $_POST["subjectcontact"];
    $messageContact = $_POST["messagecontact"];

    include_once 'functions.inc.php';

    if(emptyFieldContact($fullNameContact, $subjectContact, $messageContact) !== false){
        header("location: ../contact.php?error=emptyfield");
        exit();
    }

    header("location: ../contact.php?error=none");
    exit();
}
else{
    header("location: ..contact.php");
    exit();
}