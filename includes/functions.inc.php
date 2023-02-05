<?php

function emptyField($fullName, $email, $password, $repeatPassword){
    $result = true;
    if(empty($fullName) || empty($email) || empty($password) || empty($repeatPassword)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidName($fullName){
    $result = true;
    if(!preg_match("/^[a-zA-Z ]*$/", $fullName)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidEmail($email){
    $result = true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function passwordsNotMatching($password, $repeatPassword){
    $result = false;
    if($password !== $repeatPassword){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function somethingExits($conn, $email){
    $sql = "SELECT * FROM users WHERE userEmail = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $fullName, $email, $password){
    $sql = "INSERT INTO users (userFullName, userEmail, userPassword) VALUES (?,?,?)";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signupsuccess.php");
    exit();
}





/*login page functions start*/

function emptyInputLogin($email, $password){
    $result = true;
    if(empty($email) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function loginUser($conn, $email, $password){
    $emailExists = somethingExits($conn, $email);

    if($emailExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordHashedExists = $emailExists["userPassword"];
    $checkPassword = password_verify($password, $passwordHashedExists);

    if($checkPassword === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }else if($checkPassword === true){
        session_start();
        $_SESSION["userFullName"] = $emailExists["userFullName"];
        $_SESSION["userEmail"] = $emailExists["userEmail"];
        header("location:../app.php");
        exit(); 
    }
    
    
}

//task db start

function emptyFieldTask($taskName, $taskDescription, $taskDate){
    $result = true;
    if(empty($taskName) || empty($taskDescription) || empty($taskDate)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function addTask($conn, $taskUserEmail, $taskName, $taskDescription, $taskDate){
    $sql = "INSERT INTO tasks (userEmail, taskName, taskDescription, taskDate) VALUES (?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../app.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $taskUserEmail, $taskName, $taskDescription, $taskDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../app.php?error=none");
    exit();
}

//remove task start

function removeTask($conn, $removeId){
    $sql = "DELETE FROM tasks WHERE taskid = '$removeId'; ";
    $conn->query($sql);

    header("location: ../app.php");
    exit();
}

//contact form start

function emptyFieldContact($fullNameContact, $subjectContact, $messageContact){
    $result = true;
    if(empty($fullNameContact) || empty($subjectContact) || empty($messageContact)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}