<?php

if(isset($_POST['addtask'])){

    $taskName = $_POST["taskname"];
    $taskDescription = $_POST["taskdescription"];
    $taskDate = $_POST["taskdate"];
    $taskUserEmail = $_POST["taskuseremail"];

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    if(emptyFieldTask($taskName, $taskDescription, $taskDate) !== false){
        header("location: ../app.php?error=emptyfield");
        exit();
    }

    addTask($conn, $taskUserEmail, $taskName, $taskDescription, $taskDate);

}
else{
    header("location: ../index.php");
    exit();
}