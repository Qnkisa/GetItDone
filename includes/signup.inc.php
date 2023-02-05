<?php

if(isset($_POST["submit"])){
    if(isset($_POST["terms"])){
        $fullName = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeatPassword = $_POST["passwordrepeat"];
    
        include_once 'dbh.inc.php';
        include_once 'functions.inc.php';
    
        if(emptyField($fullName, $email, $password, $repeatPassword) !== false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
    
        if(invalidName($fullName) !== false){
            header("location: ../signup.php?error=invalidname");
            exit();
        }
    
        if(invalidEmail($email) !== false){
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
    
        if(somethingExits($conn, $email) !== false){
            header("location: ../signup.php?error=emailtaken");
            exit();
        }
    
        if(passwordsNotMatching($password, $repeatPassword)){
            header("location: ../signup.php?error=passwordsnotmatching");
            exit();
        }
    
        createUser($conn, $fullName, $email, $password);
    }
    else{
        header("location: ../signup.php?error=termsnotmet");
        exit();
    }
    
}
else{
    header("location: ../signup.php");
    exit();
}